<?php

class Search extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($categoryId)
    {
        $attrs = $this->model->getCategoryAttributes($categoryId);
        $attrsRight = $this->model->getCategoryAttributesRight($categoryId);
        $colors = $this->model->getColors();
        $data = ['attrs'=>$attrs, 'attrsRight'=>$attrsRight, 'colors'=>$colors];
        $this->view('search/index',$data);
    }

    function doSearch()
    {
       $result = $this->model->doSearch($_POST);
       echo json_encode($result);
    }

}