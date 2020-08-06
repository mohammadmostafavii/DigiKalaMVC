<?php

class login extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('login/index');
    }

    function checkUser()
    {
        $this->model->checkUser($_POST);
        Model::sessionInit();
        Model::sessionGet('userId');
        if (Model::sessionGet('userId') == false) {
            header('location:' . URL . 'login/index');
        } else {
            header('location:' . URL . 'panel/index');
        }
    }

}