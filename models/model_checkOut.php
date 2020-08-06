<?php

class model_checkOut extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getOrderInfo($orderId)
    {
        $sql = "select * from tbl_order where id=?";
        $result = $this->doSelect($sql, [$orderId], 0);
        return $result;
    }

    function zarinPalCheckout($data)
    {

        $Status = $data['Status'];
        $Authority = $data['Authority'];
        $sql = "select * from tbl_order where beforepay=?";
        $result = $this->doSelect($sql, [$Authority], 0);
        $Amount = $result['amount'];

        $Payment = new Payment;

        $result = $Payment->zarinPalVerify($Amount, $Authority);
        $Status = $result['Status'];
        $Error = $result['Error'];
        $RefID = $result['RefID'];

        if ($Status == 100) {

            $sql = "update tbl_order set pay=1,afterpay=? where beforepay=?";
            $params = array($RefID, $Authority);
            $this->doQuery($sql, $params);
        }

        $sql = "select * from tbl_order where beforepay=?";
        $result = $this->doSelect($sql, [$Authority], 0);
        return $result;


    }


    function onlinePay($orderId)
    {
        $orderInfo = $this->getOrderInfo($orderId);
        $payType = $orderInfo['pay_type'];
        if($payType == 4){
            $sql="update tbl_order set pay_type = 1 where id=?";
            $this->doQuery($sql, [$orderId]);
            $payType = 1;
        }

        if ($payType == 1) {

            $Amount = $orderInfo['amount'];
            $Email = 'muhammadmustafavi@gmail.com';
            $Mobile = $orderInfo['mobile'];
            $Payment = new Payment;
            $result = $Payment->zarinPalRequest($Amount, 'خرید از دیجی کالا', $Email, $Mobile);

            $Status = $result['Status'];
            $Authority = $result['Authority'];
            $Error= $result['Error'];

            if ($Status == 100) {
                header('location: https://www.zarinpal.com/pg/StartPay/' . $Authority);
            } else {
                header('location:'.URL.'checkOut/showError?error='.$Error.'&orderId='.$orderId);
            }
        }//zarinpal
        elseif ($payType == 2) {
        }//saman
        elseif ($payType == 3) {
        }//pasargad...

    }

    function creditCardSave($date = [], $orderId)
    {
        $sql = "UPDATE tbl_order SET pay_day = ?, pay_month = ?, pay_year = ?, pay_card = ?, pay_bank_name = ?, pay_hour = ?, pay_minute = ?, pay_type = ? WHERE id = ?";
        $this->doQuery($sql, [$date['day'], $date['month'], $date['year'], $date['card_number'], $date['bank_name'], $date['hour'], $date['minute'], 4, $orderId]);
    }

}












