<?php

class model_search extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getCategoryAttributes($categoryId)
    {
        $sql = "SELECT * FROM tbl_attr WHERE category_id = ? AND filter = ?";
        $attrs = $this->doSelect($sql, [$categoryId, 1]);
        foreach ($attrs as $key => $value) {
            $sql = "SELECT * FROM tbl_attr_val WHERE attr_id = ?";
            $value = $this->doSelect($sql, [$value['id']]);
            $attrs[$key]['values'] = $value;
        }
        return $attrs;
    }

    function getCategoryAttributesRight($categoryId)
    {
        $sql = "SELECT * FROM tbl_attr WHERE category_id = ? AND filter_right = ?";
        $attrs = $this->doSelect($sql, [$categoryId, 1]);
        foreach ($attrs as $key => $value) {
            $sql = "SELECT * FROM tbl_attr_val WHERE attr_id = ?";
            $value = $this->doSelect($sql, [$value['id']]);
            $attrs[$key]['values'] = $value;
        }
        return $attrs;
    }

    function getProducts($exist, $keyword, $orderType1, $orderType2)
    {

        $string = ' where 1=1 ';
        $order = 'order by';

        if ($exist == 1) {
            $string = $string . ' and remain > 0';
        }

        if ($keyword != '') {
            $string = $string . ' and title  like "%' . $keyword . '%" ';
        }
        if ($orderType1 == 1) {
            $order = $order . ' price ';
        }
        if ($orderType1 == 2) {
            $order = $order . ' viewed ';
        }
        if ($orderType1 == 3) {
            $order = $order . ' id ';
        }
        if ($orderType2 == 1) {
            $order = $order . ' asc';
        }

        if ($orderType2 == 2) {
            $order = $order . ' desc';
        }
        $sql = "select * from tbl_product " . $string . " " . $order . " ";
        $result = $this->doSelect($sql);
        return $result;
    }

    function productAttVal()
    {
        $sql = "SELECT * FROM tbl_product_attr";
        $result = $this->doSelect($sql);
        $productAttrVal = [];
        foreach ($result as $row) {
            $productId = $row['product_id'];
            $attrId = $row['attr_id'];
            $valId = $row['attr_value_id'];
            if (!isset($productAttrVal[$productId])) {
                $productAttrVal[$productId] = [];
            }
            $productAttrVal[$productId][$attrId] = $valId;
        }
        return $productAttrVal;
    }

    function getColors()
    {
        $sql = "SELECT * FROM tbl_color";
        $colors = $this->doSelect($sql);
        return $colors;
    }

    function doSearch($data = [])
    {
        @$exist = $data['exist'];
        @$keyword = $data['keyword'];
        @$colors = $data['colors'];
        $orderType1 = $data['orderType1'];
        $orderType2 = $data['orderType2'];
        $products = $this->getProducts($exist, $keyword, $orderType1, $orderType2);
        $productAttrValue = $this->productAttVal();
        $productTotal = [];

        foreach ($products as $productKey => $productValue) {
            foreach ($data as $key => $arrayValIds) {
                @$attr = explode('-', $key);
                @$attrId = $attr[1];
                @$productId = $productValue['id'];
                @$productValId = $productAttrValue[$productId][$attrId];
                if (isset($productValId)) {
                    if (!in_array($productValId, $arrayValIds)) {
                        unset($products[$productKey]);
                    }
                }
            }
            $productColors = $productValue['colors'];
            $productColors = explode(',', $productColors);
            if(isset($colors)){
            $finalColors = array_intersect($colors, $productColors);
            if (count($finalColors) == 0) {
                unset($products[$productKey]);
            }}
        }
        $productTotal = array_filter($products);
        $limit = $data['limit'];
        $current_page = $data['current_page'];
        $offset = ($current_page - 1) * $limit;
        $pageNumber = sizeof($productTotal)/$limit;
        $pageNumber = ceil($pageNumber);
        $productTotal = array_slice($productTotal, $offset, $limit);

        return [$productTotal, $pageNumber];
    }


}