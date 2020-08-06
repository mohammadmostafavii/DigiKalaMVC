<?php

class adminComment extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $comments = $this->model->getComments();
        $data = ['comments' => $comments];
        $this->view('admin/adminComment/index', $data);
    }

    function confirm()
    {
        if (isset($_POST['id']))
            $this->model->confirm($_POST['id']);
        header('location:'.URL.'adminComment/index');
    }

    function unConfirm()
    {
        if (isset($_POST['id']))
            $this->model->unConfirm($_POST['id']);
        header('location:'.URL.'adminComment/index');
    }

    function delete()
    {
        if (isset($_POST['id']))
            $this->model->delete($_POST['id']);
        header('location:'.URL.'adminComment/index');
    }

    function show($commentId)
    {
        $comment = $this->model->show($commentId);
        $data = ['comment'=>$comment];
        $this->view('admin/adminComment/edit', $data);
    }

    function edit($commentId)
    {
        $this->model->edit($commentId, $_POST);
        header('location:'.URL.'adminComment/show/'.$commentId);
    }

}