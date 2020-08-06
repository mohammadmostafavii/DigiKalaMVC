<?php

class model_showCard4 extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function checkCode($code)
    {
        $sql = "SELECT * FROM tbl_code WHERE code = ? AND used_validation = 0";
        $result = $this->doSelect($sql, [$code]);
        if (sizeof($result) > 0) {
            return $result[0]['percent'];
        } else {
            return 0;
        }
    }

    function calculateTotalPrice($code)
    {
        self::sessionInit();
        $addressInfo = self::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        $cityId = $addressInfo['city'];
        $postPriceBoth = self::calculatePostPrice($cityId);
        $postTypeId = self::sessionGet('postTypeId');
        $postPrice = 0;
        if ($postTypeId == 1) {
            $postPrice = $postPriceBoth['postPricePishtaz'];
        } else {
            $postPrice = $postPriceBoth['postPriceSefareshi'];
        }

        $basketInfo = $this->getBasket();
        $totalPrice = $basketInfo[1];
        $totalDiscount = $basketInfo[2];

        $check = $this->checkCode($code);
        $codeDiscount = 0;
        if ($check != 0) {
            $codeDiscount = ($check * $totalPrice) / 100;
        }
        return ($postPrice + $totalPrice - $totalDiscount - $codeDiscount);
    }

    function saveOrder($data = [])
    {
        self::sessionInit();
        $userId = self::sessionGet('userId');
        $addressInfo = self::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        $basketInfo = $this->getBasket();
        $basket = $basketInfo[0];
        $price = $basketInfo[1];
        $discountPrice = $basketInfo[2];
        $basket = serialize($basket);

        $postPriceBoth = $this->calculatePostPrice($addressInfo['city']);
        $postTypeId = self::sessionGet('postTypeId');
        if ($postTypeId == 1) {
            $postPrice = $postPriceBoth['postPricePishtaz'];
        } else {
            $postPrice = $postPriceBoth['postPriceSefareshi'];
        }


        $discountCode = $data['code'];
        $discountCode = $this->checkCode($discountCode);
        $discountCode = ($price * $discountCode) / 100;

        $totalPrice = $price - $discountPrice + $postPrice - $discountCode;
        $totalPrice = ceil($totalPrice);

        $payType = $data['payType'];
        $description = 'خرید از سایت دیجی کالا';
        $beforePay = '';
        $Status = '';

        if ($payType == 1) {
            $payment = new Payment;
            $result = $payment->zarinPalRequest($totalPrice, $description, 'muhammadmustafavi@gmail.com', $addressInfo['mobile']);
            $Status = $result['Status'];
            $Authority = $result['Authority'];
            $beforePay = $Authority;
        }

        $time = time();
        $date = self::jaliliDate();

        $sql = "INSERT INTO tbl_order (user_id, fullName, amount, before_pay, province, city, postal_code, postal_address, mobile, tel, post_type, basket, order_status_id, pay_type, order_reg_time,post_price, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $values = [$userId, $addressInfo['fullName'], $totalPrice, $beforePay, $addressInfo['province_name'], $addressInfo['city_name'], $addressInfo['postalCode'], $addressInfo['postalAddress'], $addressInfo['mobile'], $addressInfo['tel'], $postTypeId, $basket, 1, $payType, $time, $postPrice, $date];
        $this->doQuery($sql, $values);

        if ($payType == 1) {
            if ($Status == 100) {
                header('Location: https://www.zarinpal.com/pg/StartPay/' . $Authority);
            } else {
                header('Location:' . URL . 'showCard4/index/' . $Status);
            }
        }

        if ($payType == 4) {
            echo 'hello';
            $sql = "SELECT id FROM tbl_order ORDER BY id desc limit 1";
            $orderId = $this->doSelect($sql, [], 0);
            header('Location:'.URL.'checkOut/index/'.$orderId['id']);
        }

    }

}