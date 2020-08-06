<?php

class Product extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index($idProduct, $activeTab = 'review')
    {

        $productInfo = $this->model->productInfo($idProduct);
        $gallery = $this->model->getGallery($idProduct);
        $data = ['productInfo' => $productInfo, 'gallery' => $gallery, 'activeTab' => $activeTab];

        $this->view('product/index', $data);
    }

    function tab($idProduct, $idCategory)
    {
        $number = $_POST['number'];
        if($number == 0) {
            $tabOne = $this->model->getReview($idProduct);
            $data = [$tabOne];
            $this->view('product/tab1', $data, 1, 1);
        } elseif($number == 1) {
            $tabTwo = $this->model->tab2($idCategory, $idProduct);
            $data = [$tabTwo];

            $this->view('product/tab2', $data, 1, 1);
        } elseif($number == 2){
            $commentParam = $this->model->commentParam($idCategory, $idProduct);
            $commentParamNames = $commentParam[0];
            $commentParamScores = $commentParam[1];
            $comments = $this->model->getComment($idProduct);
            $data = [$commentParamNames, $comments, $commentParamScores];
            $this->view('product/tab3', $data, 1, 1);
        } elseif($number == 3){
            $getQuestion = $this->model->getQuestions($idProduct);
            $questions = $getQuestion[0];
            $answers = $getQuestion[1];
            $data = [$questions, $answers];
            $this->view('product/tab4', $data, 1, 1);
        }
    }

    function addToBasket($productId, $color = '', $guarantee = '')
    {
        $this->model->addToBasket($productId, $color, $guarantee);
        header('location:'.URL.'product/index/'.$productId);
    }

}