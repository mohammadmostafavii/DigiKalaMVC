<?php

class adminProduct extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $product = $this->model->getProduct();
        $data = ['adminProduct' => $product];
        $this->view('admin/adminProduct/index', $data);
    }

    function addProduct($productId = '')
    {
        if (isset($_POST['price'])) {
            $this->model->addProduct($_POST, $productId, $_FILES['image']);
        }
        $productInfo = $this->model->productInfo($productId);
        $categories = $this->model->getCategory();
        $colors = $this->model->getColor();
        $guarantees = $this->model->getGuarantee();

        $data = ['categories' => $categories, 'colors' => $colors, 'guarantees' => $guarantees, 'productInfo' => $productInfo];
        $this->view('admin/adminProduct/addProduct', $data);
    }

    function productReviews($productId)
    {
        $productInfo = $this->model->productInfo($productId);
        $reviews = $this->model->getReviews($productId);
        $data = ['productInfo' => $productInfo, 'reviews' => $reviews];
        $this->view('admin/adminProduct/reviewProduct', $data);
    }

    function addReview($productId, $reviewId = '')
    {
        if (isset($_POST['title'])) {
            $this->model->addReview($_POST, $productId, $reviewId);
            header('location:' . URL . 'adminProduct/productReviews/' . $productId);
        }
        $productInfo = $this->model->productInfo($productId);
        $reviewInfo = $this->model->reviewInfo($reviewId);
        $data = ['productInfo' => $productInfo, 'reviewInfo' => $reviewInfo];
        $this->view('admin/adminProduct/addReview', $data);
    }

    function deleteReview($productId)
    {
        $this->model->deleteReview($_POST['id']);
        header('location:' . URL . 'adminProduct/productReviews/' . $productId);
    }

    function deleteProduct()
    {
        $this->model->deleteProduct($_POST['id']);
        header('location:' . URL . 'adminProduct/index');
    }

    function showProductAttr($productId)
    {
        if (isset($_POST['id'])) {
            $this->model->addProductAttr($_POST, $productId);
        }
        $productAttr = $this->model->getProductAttr($productId);
        $data = ['productInfo' => $productAttr[0], 'productAttr' => $productAttr[1]];
        $this->view('admin/adminProduct/productAttr', $data);
    }

    function gallery($productId)
    {
        $gallery = $this->model->getGallery($productId);
        $productInfo = $this->model->productInfo($productId);
        $data = ['gallery' => $gallery, 'productInfo' => $productInfo];
        $this->view('admin/adminProduct/gallery', $data);
    }

    function addGallery($productId)
    {
        $this->model->addGallery($productId, $_FILES['image']);
        header('location:' . URL . 'adminProduct/gallery/' . $productId);
    }

    function deleteGallery($productId)
    {
        $this->model->deleteGallery($_POST['id']);
        header('location:' . URL . 'adminProduct/gallery/' . $productId);
    }

}