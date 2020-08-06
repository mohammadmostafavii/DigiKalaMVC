<?php

class comment extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index($productId)
    {
        $result = $this->model->getCommentParam($productId);
        $commentInfo = $this->model->commentInfo($productId);
        $data = ['params' => $result[0], 'productInfo' => $result[1], 'commentInfo' => $commentInfo];
        $this->view('comment/index', $data);
    }

    function saveComment($productId)
    {
        $this->model->saveComment($_POST, $productId);
        header('location:'.URL.'comment/index/'.$productId);

    }

}