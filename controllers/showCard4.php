<?php

class ShowCard4 extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($Status = '')
    {
        $data = ['Status' => $Status];
        $this->view('showCard4/index', $data);
    }

    function checkCode($code)
    {
        $result = $this->model->checkCode($code);
        $totalPrice = $this->model->calculateTotalPrice($code);
        echo json_encode([$result, $totalPrice]);
    }

    function calculateTotalPrice()
    {
        $totalPrice = $this->model->calculateTotalPrice($_POST['code']);
        echo $totalPrice;
    }

    function saveOrder()
    {
        $this->model->saveOrder($_POST);
    }


}