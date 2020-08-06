<?php

class model_comment extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function productInfo($productId)
    {
        $sql = "SELECT * FROM tbl_product WHERE id = ?";
        $result = $this->doSelect($sql, [$productId], 0);
        return $result;
    }

    function commentInfo($productId)
    {
        self::sessionInit();
        $userId = self::sessionGet('userId');
        $sql = "SELECT * FROM tbl_comment WHERE product_id = ? AND user_id = ?";
        $commentInfo = $this->doSelect($sql, [$productId, $userId], 0);
        return $commentInfo;
    }

    function getCommentParam($productId)
    {
        $productInfo = $this->productInfo($productId);
        $categoryId = $productInfo['category_id'];
        $sql = "SELECT * FROM tbl_comment_param WHERE category_id = ?";
        $params = $this->doSelect($sql, [$categoryId]);
        return [$params, $productInfo];
    }

    function saveComment($data = [], $productId)
    {
        self::sessionInit();
        $userId = self::sessionGet('userId');

        $commentInfo = $this->commentInfo($productId);

        if ($commentInfo < 1) {
            $paramsResult = [];
            $params = self::getCommentParam($productId);
            foreach ($params[0] as $param) {
                $id = $param['id'];
                $paramsResult[$id] = $_POST['param' . $id];
            }

            $sql = "INSERT INTO tbl_comment (user_id, product_id, title, body, record_date, positive, negative, param_score) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this->doQuery($sql, [$userId, $productId, $data['title'], $data['body'], '2 مرداد', $data['positive'], $data['negative'], serialize($paramsResult)]);
        }else{

            $paramsResult = [];
            $params = self::getCommentParam($productId);
            foreach ($params[0] as $param) {
                $id = $param['id'];
                $paramsResult[$id] = $_POST['param' . $id];
            }

            $sql = "UPDATE tbl_comment SET title = ?, body = ?, record_date = ?, positive = ?, negative = ?, param_score = ? WHERE id = ?";
            $this->doQuery($sql, [$data['title'], $data['body'], '2 مرداد', $data['positive'], $data['negative'], serialize($paramsResult), $commentInfo['id']]);
        }
    }


}