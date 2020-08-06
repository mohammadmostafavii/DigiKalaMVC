<?php

class ShowCard2 extends Controller
{

    function __construct()
    {

    }

    function index()
    {
        $addresses = $this->model->getAddress();
        $postType = $this->model->getPostType();
        $data = ['addresses' => $addresses, 'postType' => $postType];
        $this->view('showCard2/index', $data);
    }

    function addAddress($editAddressId = '')
    {
        $this->model->addAddress($editAddressId, $_POST);
        $addresses = $this->model->getAddress();
        echo json_encode($addresses);
    }

    function editAddress($addressId)
    {
        $result = $this->model->getAddressInfo($addressId);
        echo json_encode($result);
    }

    function deleteAddress($addressId){
        $this->model->deleteAddress($addressId);
        $result = $this->model->getAddress();
        echo json_encode($result);
    }

    function getPostPrice()
    {
        $this->model->getPostPrice($_POST);
    }

    function postTypeSession()
    {
        $this->model->postTypeSession($_POST);
    }


}