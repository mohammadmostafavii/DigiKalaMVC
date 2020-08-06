<?php

class ShowCard3 extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $postPrice = $this->model->getPostPrice();
        $result = $this->model->getBasketReview();
        $basket = $result[0];
        $priceTotalAll = $result[1];
        $totalDiscountAll = $result[2];
        Model::sessionInit();
        $addressInfo = Model::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        $postTypeId = Model::sessionGet('postTypeId');

        $data = ['basket' => $basket, 'priceTotalAll' => $priceTotalAll, 'postPrice' => $postPrice, 'totalDiscountAll' => $totalDiscountAll, 'addressInfo' => $addressInfo, 'postTypeId' => $postTypeId];
        $this->view('showCard3/index', $data);
    }

}