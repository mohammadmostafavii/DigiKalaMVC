<?php

class adminStatistics extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('admin/adminStatistics/index');
    }

    function order()
    {
        $result = $this->model->order($_POST);
        $data = ['result' => $result];
        $this->view('admin/adminStatistics/order', $data);
    }


}