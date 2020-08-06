<?php

class adminSetting extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $settings = $this->model->getSetting();
        $data = ['settings'=>$settings];
        $this->view('admin/adminSetting/index', $data);
    }

    function save()
    {
        $this->model->save($_POST);
        header('location:'.URL.'adminSetting/index');
    }

}