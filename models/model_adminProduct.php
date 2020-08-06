<?php

class model_adminProduct extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getProduct()
    {
        $sql = "SELECT * FROM tbl_product";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getCategory()
    {
        $sql = "SELECT * FROM tbl_category";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getColor()
    {
        $sql = "SELECT * FROM tbl_color";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getGuarantee()
    {
        $sql = "SELECT * FROM tbl_guarantee";
        $result = $this->doSelect($sql);
        return $result;
    }

    function addProduct($data = [], $productId, $file = [])
    {
        $title = $data['title'];
        $categoryId = $data['category'];
        $price = $data['price'];
        $introduction = $data['introduction'];
        $discount = $data['discount'];
        $remain = $data['remain'];
        $colors = '';
        if (!empty($data['color'])) {
            $colors = $data['color'];
            $colors = join(',', $colors);
        }
        $guarantees = '';
        if (!empty($data['guarantee'])) {
            $guarantees = $data['guarantee'];
            $guarantees = join(',', $guarantees);
        }

        if ($productId == '') {
            $sql = "INSERT INTO tbl_product (title, price, category_id, introduction, remain, discount, colors, guarantees) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $values = [$title, $price, $categoryId, $introduction, $remain, $discount, $colors, $guarantees];
        } else {
            $sql = "UPDATE tbl_product SET title = ?, price = ?, category_id = ?, introduction = ?, remain = ?, discount = ?, colors = ? , guarantees = ? WHERE id = ?";
            $values = [$title, $price, $categoryId, $introduction, $remain, $discount, $colors, $guarantees, $productId];
        }
        $this->doQuery($sql, $values);
        $productId = self::$conn->lastInsertId();
        if(!file_exists('public/images/products/'.$productId))
            mkdir('public/images/products/' . $productId);

        if (!empty($file['name'])) {
            $this->saveFile($file, $productId);
        }



    }

    function deleteProduct($productIds = [])
    {
        $productIds = join(',', $productIds);
        $sql = "DELETE FROM tbl_product WHERE id IN (" . $productIds . ")";
        $this->doQuery($sql);

        $sql = "DELETE FROM tbl_review WHERE product_id IN (" . $productIds . ")";
        $this->doQuery($sql);

    }

    function productInfo($productId)
    {
        $sql = "SELECT * FROM tbl_product WHERE id = ?";
        $result = $this->doSelect($sql, [$productId], 0);
        @$colors = $result['colors'];
        @$guarantees = $result['guarantees'];
        $colors = explode(',', $colors);
        $guarantees = explode(',', $guarantees);
        $result['colorsInfo'] = [];
        foreach ($colors as $color) {
            $sql = "SELECT * FROM tbl_color WHERE id = ?";
            $colorInfo = $this->doSelect($sql, [$color], 0);
            array_push($result['colorsInfo'], $colorInfo);
        }
        $result['guaranteesInfo'] = [];
        foreach ($guarantees as $guarantee) {
            $sql = "SELECT * FROM tbl_guarantee WHERE id = ?";
            $guaranteeInfo = $this->doSelect($sql, [$guarantee], 0);
            array_push($result['guaranteesInfo'], $guaranteeInfo);
        }
        return $result;
    }

    function getReviews($productId)
    {
        $sql = "SELECT * FROM tbl_review WHERE product_id = ? ORDER BY id desc";
        $result = $this->doSelect($sql, [$productId]);
        return $result;
    }

    function addReview($data = [], $productId, $reviewId = '')
    {
        $title = $data['title'];
        $description = $data['description'];

        if ($reviewId == '') {
            $sql = "INSERT INTO tbl_review (title, description, product_id)VALUES(?, ?, ?)";
            $values = [$title, $description, $productId];
        } else {
            $sql = "UPDATE tbl_review SET title = ?, description = ? WHERE id = ?";
            $values = [$title, $description, $reviewId];
        }
        $this->doQuery($sql, $values);
    }

    function deleteReview($reviewIds = [])
    {
        $reviewIds = join(',', $reviewIds);
        $sql = "DELETE FROM tbl_review WHERE id IN (" . $reviewIds . ")";
        $this->doQuery($sql);
    }

    function reviewInfo($reviewId)
    {
        $sql = "SELECT * FROM tbl_review WHERE id = ?";
        $result = $this->doSelect($sql, [$reviewId], 0);
        return $result;
    }

    function getAttrValues($attrId)
    {
        $sql = "SELECT * FROM tbl_attr_val WHERE attr_id = ?";
        $result = $this->doSelect($sql, [$attrId]);
        return $result;
    }

    function getProductAttr($productId)
    {
        $productInfo = $this->productInfo($productId);
        $sql = "SELECT tbl_attr.*, tbl_product_attr.attr_value_id FROM tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id = tbl_product_attr.attr_id AND tbl_product_attr.product_id = ? WHERE category_id = ? AND parent != 0";
        $attrs = $this->doSelect($sql, [$productId, $productInfo['category_id']]);
        foreach($attrs as $key=>$value){
            $values = $this->getAttrValues($value['id']);
            $attrs[$key]['values'] = $values;
        }

        return [$productInfo, $attrs];
    }

    function addProductAttr($data = [], $productId)
    {
        $attrIds = $data['id'];
        foreach ($attrIds as $attrId) {
            $sql = "DELETE FROM tbl_product_attr WHERE product_id = ? AND attr_id = ?";
            $this->doQuery($sql, [$productId, $attrId]);

            $sql = "INSERT INTO tbl_product_attr (product_id, attr_id, attr_value_id)VALUES(?, ?, ?)";
            $this->doQuery($sql, [$productId, $attrId, $data['value' . $attrId]]);
        }
    }

    function getGallery($productId)
    {
        $sql = "SELECT * FROM tbl_gallery WHERE idProduct = ? ORDER BY id desc";
        $result = $this->doSelect($sql, [$productId]);
        return $result;
    }

    function addGallery($productId, $file = [])
    {
        if (!empty($file['name'])) {
            $imgName = $this->saveFile($file, $productId, 1);
            $sql = "INSERT INTO tbl_gallery (idProduct, img) VALUES (?, ?)";
            $values = [$productId, $imgName];
            $this->doQuery($sql, $values);
        }
    }

    function deleteGallery($ids = [])
    {
        foreach($ids as $id) {
            $sql = "SELECT * FROM tbl_gallery WHERE id = ?";
            $result = $this->doSelect($sql, [$id], 0);
            $filePath = 'public/images/products/'.$result['idProduct'].'/gallery/';
            $filePathSmall = $filePath . 'small/'.$result['img'];
            $filePathLarge = $filePath . 'large/'.$result['img'];
            unlink($filePathSmall);
            unlink($filePathLarge);
        }

        $ids = join(',', $ids);
        $sql = "DELETE FROM tbl_gallery WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

}
