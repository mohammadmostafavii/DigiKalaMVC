<?php

class model_product extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function productInfo($id)
    {
        $sql = "SELECT * FROM tbl_product WHERE id = ?";
        $result = $this->doSelect($sql, [$id], 0);
        $calculated_price = $this->calculateDiscount($result['price'], $result['discount']);
        $result['price_discount'] = $calculated_price[0];
        $result['price_final'] = $calculated_price[1];

        $options = self::getOption();
        $duration_time = $options['special_time'];
        $time = $result['special_time'] + intval($duration_time);
        $date = date('F d,Y H:m:s', $time);
        $result['date'] = $date;

        $colors = $result['colors'];
        $colors = explode(',', $colors);
        $colors = array_filter($colors);
        $all_colors = [];
        foreach($colors as $color)
        {
            $colorInfo = $this->colorInfo($color);
            array_push($all_colors, $colorInfo);
        }
        $result['all_colors'] = $all_colors;

        $guarantees = $result['guarantees'];
        $guarantees = explode(',', $guarantees);
        $guarantees = array_filter($guarantees);
        $all_guarantees = [];
        foreach($guarantees as $guarantee)
        {
            $guaranteeInfo = $this->guaranteeInfo($guarantee);
            array_push($all_guarantees, $guaranteeInfo);
        }
        $result['all_guarantees'] = $all_guarantees;

        return $result;
    }

    function colorInfo($color)
    {
        $sql = "SELECT * FROM tbl_color WHERE id = ?";
        $result = $this->doSelect($sql, [$color], 0);
        return $result;
    }

    function guaranteeInfo($guarantee)
    {
        $sql = "SELECT * FROM tbl_guarantee WHERE id = ?";
        $result = $this->doSelect($sql, [$guarantee], 0);
        return $result;
    }

    function getReview($id){
        $sql = "SELECT * FROM tbl_review WHERE product_id = ?";
        $result = $this->doSelect($sql, [$id], 1);
        return $result;
    }

    function tab2($idCategory, $idProduct)
    {
        $sql = "SELECT * FROM tbl_attr WHERE category_id = ? AND parent = 0";
        $result = $this->doSelect($sql, [$idCategory], 1);
        foreach($result as $key => $row){
            $sql2 = "SELECT tbl_attr.title, tbl_product_attr.attr_value FROM tbl_attr LEFT JOIN  tbl_product_attr ON tbl_attr.id = tbl_product_attr.attr_id AND tbl_product_attr.product_id = ? WHERE tbl_attr.parent = ?";
            $result2 = $this->doSelect($sql2, [$idProduct, $row['id']]);
            $result[$key]['children'] = $result2;
        }
        return $result;
    }

    function commentParam($idCategory, $idProduct)
    {
        $sql = "SELECT * FROM tbl_comment_param WHERE category_id = ?";
        $result = $this->doSelect($sql, [$idCategory], 1);

        $sql = "SELECT * FROM tbl_comment WHERE product_id = ?";
        $result2 = $this->doSelect($sql, [$idProduct], 1);
        $scoresTotal = [];
        foreach($result2 as $row){
            $paramScore = unserialize($row['param_score']);
            foreach($paramScore as $key => $value){
                if(!isset($scoresTotal[$key])){
                    $scoresTotal[$key] = 0;
                }
                $scoresTotal[$key] += $value;
            }
        }
        $commentCount = sizeof($result2);
        foreach($scoresTotal as $key => $value){
            $value /= $commentCount;
            $scoresTotal[$key] = $value;
        }

        return [$result, $scoresTotal];
    }

    function getComment($idProduct)
    {
        $sql = "SELECT * FROM tbl_comment WHERE product_id = ?";
        $result = $this->doSelect($sql, [$idProduct], 1);
        return $result;
    }

    function getQuestions($idProduct)
    {
        $sql = "SELECT * FROM tbl_question WHERE parent = 0 AND product_id = ?";
        $questions = $this->doSelect($sql, [$idProduct], 1);

        $sql = "SELECT * FROM tbl_question WHERE parent != 0 AND product_id = ?";
        $answers = $this->doSelect($sql, [$idProduct], 1);
        $answersNew = [];
        foreach($answers as $answer){
            $parent = $answer['parent']; //question id;
            $answersNew[$parent] = $answer;
        }
        return [$questions, $answersNew];
    }

    function getGallery($idProduct)
    {
        $sql = "SELECT * FROM tbl_gallery WHERE idProduct = ?";
        $result = $this->doSelect($sql, [$idProduct], 1);
        return $result;
    }

    function addToBasket($productId, $color, $guarantee)
    {
        $cookie = self::basketCookie();
        $sql = "SELECT * FROM tbl_basket WHERE cookie = ? AND productId = ? AND color = ? AND guarantee = ?";
        $values = [$cookie, $productId, $color, $guarantee];
        $result = $this->doSelect($sql, $values);


        if(sizeof($result) > 0){

            $basketId = $result[0]['id'];
            $sql = "UPDATE tbl_basket SET number = number + 1 WHERE id = ?";
            $values = [$basketId];
            $this->doQuery($sql, $values);

        }else{
            if($guarantee == ''){
                $guarantee = 0;
            }
            $sql = "INSERT INTO tbl_basket (cookie, productId, color, guarantee, number) VALUES (?, ?, ?, ?, ?)";
            $values = [$cookie, $productId, $color, $guarantee, 1];
            $this->doQuery($sql, $values);
        }
    }


}