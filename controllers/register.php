<?php

class register extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view('register/index');
    }

}