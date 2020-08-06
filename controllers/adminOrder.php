<?php

class adminOrder extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $orders = $this->model->getOrders();
        $data = ['orders' => $orders];
        $this->view('admin/adminOrder/index', $data);
    }

    function editOrder($orderId = '')
    {
        $orderStatus = $this->model->getOrderStatus();
        $orderInfo = $this->model->getOrderInfo($orderId);
        $data = ['orderInfo' => $orderInfo, 'orderStatus' => $orderStatus];
        $this->view('admin/adminOrder/detail', $data);
    }

    function saveChange()
    {
        $this->model->saveChange($_POST);
    }

    function factor($orderId)
    {
        $orderInfo = $this->model->getOrderInfo($orderId);
        $data = ['orderInfo' => $orderInfo];
        $this->view('admin/adminOrder/factor', $data, 1, 1);
    }

    function deleteOrder()
    {
        $this->model->deleteOrder($_POST['id']);
        header('location:'.URL.'adminOrder/index');
    }


}