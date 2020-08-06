<?php

class adminCategory extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $category = $this->model->getCategory();
        $data = ['adminCategory' => $category];
        $this->view('admin/adminCategory/index', $data);
    }

    function showChildren($idCategory)
    {
        $categoryChildes = $this->model->getChildren($idCategory);
        $categoryParents = $this->model->getParents($idCategory);
        $categoryInfo = $this->model->categoryInfo($idCategory);
        $data = ['adminCategory' => $categoryChildes, 'parents' => $categoryParents, 'categoryInfo' => $categoryInfo];
        $this->view('admin/adminCategory/index', $data);
    }

    function addCategory($parentId = 0)
    {
        if(isset($_POST['title'])) {
            $this->model->addCategory($_POST['title'], $_POST['parent']);
        }
        $category = $this->model->getAllCategory();
        $data = ['adminCategory' => $category, 'parentId' => $parentId];
        $this->view('admin/adminCategory/addCategory', $data);
    }

    function editCategory($idCategory = 0)
    {
        $categoryInfo = $this->model->categoryInfo($idCategory);
        $parentInfo = $this->model->categoryInfo($categoryInfo['parent']);
        $category = $this->model->getAllCategory();
        if(isset($_POST['title']))
        $this->model->editCategory($_POST['title'], $_POST['parent'], $_POST['id']);
        $data = ['adminCategory' => $category, 'categoryInfo' => $categoryInfo, 'parentInfo' => $parentInfo];
        $this->view('admin/adminCategory/editCategory', $data);
    }

    function deleteCategory($parentId = 0)
    {
        $ids = $_POST['id'];
        $this->model->deleteCategory($ids);
        header('location:'.URL.'adminCategory/showChildren/'. $parentId);
    }

    function showAttr($categoryId, $attrId = 0)
    {
        $attr = $this->model->getAttr($categoryId, $attrId);
        $categoryInfo = $this->model->categoryInfo($categoryId);
        $attrInfo = $this->model->getAttrInfo($attrId);
        $data = ['attr' => $attr, 'categoryInfo' => $categoryInfo, 'attrInfo' => $attrInfo];
        $this->view('admin/adminCategory/showAttr', $data);
    }

    function addAttr($categoryId, $attrId = 0)
    {
        if(isset($_POST['title'])){
            $this->model->addAttr($categoryId, $_POST);
            header('location:'.URL.'adminCategory/showAttr/'.$categoryId.'/'.$attrId);
        }
        $attrs = $this->model->getAttr($categoryId, 0);
        $categoryInfo = $this->model->categoryInfo($categoryId);
        $attrInfo = $this->model->getAttrInfo($attrId);
        $data = ['attrs' => $attrs, 'categoryInfo' => $categoryInfo, 'attrId' => $attrId, 'attrInfo' => $attrInfo];
        $this->view('admin/adminCategory/addAttr', $data);
    }

    function editAttr($categoryId, $attrParentId, $attrId = '')
    {
        if(isset($_POST['title'])){
            $this->model->editAttr($attrId, $_POST);
        }
        $attrs = $this->model->getAttr($categoryId, 0);
        $attrInfo = $this->model->getAttrInfo($attrId);
        $data = ['attrs' => $attrs, 'attrInfo' => $attrInfo];
        $this->view('admin/adminCategory/editAttr', $data);
    }

    function deleteAttr($categoryId, $attrId = 0)
    {
        $this->model->deleteAttr($_POST['id']);
        header('location:'.URL.'adminCategory/showAttr/'.$categoryId.'/'.$attrId);

    }

    function attrVal($attrId)
    {
        $attrInfo = $this->model->getAttrInfo($attrId);
        $attrValues = $this->model->getAttrVal($attrId);
        $data = ['attrValues'=>$attrValues, 'attrInfo'=>$attrInfo];
        $this->view('admin/adminCategory/attrVal',$data);
    }

    function addAttrVal($attrId)
    {
        if(isset($_POST['attrValue'])){
            $this->model->addAttrVal($_POST['attrValue'],$attrId);
            header('location:'.URL.'adminCategory/attrVal/'.$attrId);
        }
        $attrInfo = $this->model->getAttrInfo($attrId);
        $data = ['attrInfo'=>$attrInfo];
        $this->view('admin/adminCategory/addAttrValue',$data);
    }

    function editAttrVal($attrId)
    {
        $this->model->editAttrVal($_POST);
        header('location:'.URL.'adminCategory/attrVal/'.$attrId);

    }


}