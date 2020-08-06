<?php

class adminDashboard extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $statistics = $this->model->getStat();
        $data = ['statistics'=>$statistics];
        $this->view('admin/adminDashboard/index',$data);
    }

}