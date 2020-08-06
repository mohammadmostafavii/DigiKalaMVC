<?php

class model_checkOut extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getOrderInfoByAuthority($authority)
    {
        $sql = "SELECT * FROM tbl_order WHERE before_pay = ?";
        return $this->doSelect($sql, [$authority], 0);
    }

    function getOrderInfo($orderInfo)
    {
        $sql = "SELECT * FROM tbl_order WHERE id = ?";
        return $this->doSelect($sql, [$orderInfo], 0);
    }

    function zarinPalCheckOut($data)
    {

        $Status = $data['Status'];
        $authority = $data['Authority'];
        $orderInfo = $this->getOrderInfoByAuthority($authority);
        $amount = $orderInfo['amount'];

        $payment = new Payment;
        $result = $payment->zarinPalVerify($amount, $authority);
        $Status = $result['Status'];
        $Error = $result['Error'];
        $RefID = $result['RefID'];

        if ($Status == 100) {
            $sql = "UPDATE tbl_order SET pay = ?, after_pay = ? WHERE before_pay ?";
            $values = [1, $RefID, $authority];
            $this->doQuery($sql, $values);
        }

        $sql = "SELECT * FROM tbl_order WHERE before_pay = ?";
        $result = $this->doSelect($sql, [$authority], 0);
        return $result;

    }

    function onlinePay($orderId)
    {
        $orderInfo = $this->getOrderInfo($orderId);
        $payType = $orderInfo['pay_type'];
        $amount = $orderInfo['amount'];
        $mobile = $orderInfo['mobile'];
        if($payType == 4){
            $sql = "UPDATE tbl_order SET pay_type = ? WHERE id = ?";
            $this->doQuery($sql, [$payType, $orderId]);
        }


        if($payType == 1){
            echo 'hello';
            $payment = new Payment;
            $result = $payment->zarinPalRequest($amount, 'خرید از سایت دیجی کالا', 'muhammadmustafavi@gmail.com', $mobile);
            $Status = $result['Status'];
            $Authority = $result['Authority'];
            $Error = $result['Error'];
            if ($Status == 100) {
                header('Location: https://www.zarinpal.com/pg/StartPay/' . $Authority);
            } else {
                header('Location:' . URL . 'checkOut/showError?error=' . $Error . '&orderId=' . $orderId);
            }

        }//zarinPal
        elseif ($payType == 2){

        }//samanBank
        elseif ($payType == 3){

        }//pasargad

    }


}