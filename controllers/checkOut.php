<?php

class checkOut extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function index($orderId){
        if(isset($_GET['Authority'])){

            $result= $this->model->zarinPalCheckout($_GET);
            $data=array('orderInfo'=>$result);
        }
        if(isset($orderId)){

            $result=$this->model->getOrderInfo($orderId);
            $data=array('orderInfo'=>$result);

        }

        $this->view('checkOut/index',$data);

    }


    function onlinePay($orderId){
        $this->model->onlinePay($orderId);
    }

    function showError(){
        $Error=$_GET['error'];
        $orderId=$_GET['orderId'];
        $data=array('Error'=>$Error,'orderId'=>$orderId);
        $this->view('checkOut/showError',$data);
    }
    function creditCard($orderId){

        $data = ['orderId' => $orderId];
        $this->view('checkOut/creditCard',$data);
    }

    function creditCardSave($orderId)
    {
        $this->model->creditCardSave($_POST, $orderId);
        header('location:'.URL.'checkOut/index/'.$orderId);
    }

}















