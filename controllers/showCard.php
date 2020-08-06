<?php

class ShowCard extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $result = $this->model->getBasket();
        $data = ['basket' => $result[0], 'totalPriceAll' => $result[1]];
        $this->view('showCard/index', $data);
    }

    function deleteBasket()
    {
        $this->model->deleteBasket($_POST);
        $result = $this->model->getBasket();
        echo json_encode($result);
    }

    function updateBasket()
    {
        $this->model->updateBasket($_POST);
        $result = $this->model->getBasket();
        echo json_encode($result);
    }


    
}