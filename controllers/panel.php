<?php

class Panel extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $userInfo = $this->model->getUserInfo();
        $stat = $this->model->getOrderInfo();
        $data = ['userInfo' => $userInfo, 'stat' => $stat];
        $this->view('panel/index', $data);
    }

    function tab()
    {
        $number = $_POST['number'];

        if($number == 0){
            $message = $this->model->getMessage();
            $data = ['message' => $message];
            $this->view('panel/tab1', $data, 1, 1);
        }elseif ($number == 1){
            $order = $this->model->getOrder();
            $data = ['order' => $order];
            $this->view('panel/tab2', $data, 1, 1);
        }elseif ($number == 2){
            $favoriteDir = $this->model->getFavoriteDir();
            $data = ['favoriteDir' => $favoriteDir];
            $this->view('panel/tab3', $data , 1, 1);
        }elseif($number == 3){
            $comments = $this->model->getComment();
            $data = ['comments' => $comments];
            $this->view('panel/tab4', $data, 1, 1);
        }elseif($number == 4){
            $discountCodes = $this->model->getDiscountCode();
            $data = ['discountCodes' => $discountCodes];
            $this->view('panel/tab5', $data, 1, 1);
        }
    }

    function getFavoriteProduct($folderId)
    {
        $favoriteProduct = $this->model->getFavoriteProduct($folderId);
        echo json_encode($favoriteProduct);
    }

    function saveFolder()
    {
        $folderId = $_POST['folderId'];
        $folderTitle = $_POST['title'];
        $this->model->saveFolder($folderId, $folderTitle);
    }

    function deleteFavorite()
    {
        $id = $_POST['id'];
        $this->model->deleteFavorite($id);
    }

    function deleteComment()
    {
        $this->model->deleteComment($_POST['commentId']);
    }

    function saveDiscountCode()
    {
        $this->model->saveDiscountCode($_POST['code']);
        $data = [];
        $this->view('panel/tab5', $data, 1, 1);
    }

    function profile()
    {
        $userInfo = $this->model->profile($_POST, @$_FILES['picture']);
        $data = ['userInfo' => $userInfo];
        $this->view('panel/profile', $data);
    }

    function changePassword()
    {
        if(isset($_POST['old_password'])) {
            $this->model->changePassword($_POST);
        }
        $this->view('panel/changePassword');
    }


}