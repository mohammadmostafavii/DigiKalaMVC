<?php

class index extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $slider1 = $this->model->getSlider1();
        $slider2 = $this->model->getSlider2();
        $onlyInDigi = $this->model->getOnlyInDigi();
        $mostViewed = $this->model->getMostViewed();

        $slider2_rows = $slider2[0];
        $slider2_date = $slider2[1];
        $data = [$slider1, $slider2_rows, $slider2_date, $onlyInDigi, $mostViewed];

        $this->view('index/index', $data);
    }


}
