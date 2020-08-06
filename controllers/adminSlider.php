<?php

class adminSlider extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $slider = $this->model->getSlider();
        $data = ['slider' => $slider];
        $this->view('admin/adminSlider/index', $data);
    }

    function addSlider()
    {
        $this->model->addSlider($_FILES, $_POST);
        header('location:'.URL.'adminSlider/index');
    }

    function deleteSlider()
    {
        $this->model->deleteSlider($_POST['id']);
        header('location:'.URL.'adminSlider/index');
    }

}