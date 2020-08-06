<?php

class model_adminCategory extends Model
{
    public $allChildrenIds = [];

    function __construct()
    {
        parent::__construct();
    }

    function getCategory()
    {
        $sql = "SELECT * FROM tbl_category WHERE parent = ?";
        $result = $this->doSelect($sql, [0], 1);
        return $result;
    }

    function getAllCategory()
    {
        $sql = "SELECT * FROM tbl_category";
        $result = $this->doSelect($sql, [0], 1);
        return $result;
    }

    function getChildren($idCategory)
    {
        $sql = "SELECT * FROM tbl_category WHERE parent = ?";
        $result = $this->doSelect($sql, [$idCategory]);
        return $result;
    }

    function getParents($idCategory)
    {
        $categoryInfo = $this->categoryInfo($idCategory);
        $parent = $categoryInfo['parent'];
        $allParents = [];
        while ($parent != 0) {
            $sql = "SELECT * FROM tbl_category WHERE id = ?";
            $parentCategory = $this->doSelect($sql, [$parent], 0);
            array_push($allParents, $parentCategory);
            $parent = $parentCategory['parent'];
        }
        return $allParents;
    }

    function categoryInfo($idCategory)
    {
        $sql = "SELECT * FROM tbl_category WHERE id = ?";
        $result = $this->doSelect($sql, [$idCategory], 0);
        return $result;
    }

    function addCategory($title, $parent)
    {
        $sql = "INSERT INTO tbl_category (title, parent) VALUES (?, ?)";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $title);
        $stmt->bindValue(2, $parent);
        $stmt->execute();
    }

    function editCategory($title, $parent, $idCategory)
    {
        $sql = "UPDATE tbl_category SET title=?,parent=? WHERE id=?";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindValue(1, $title);
        $stmt->bindValue(2, $parent);
        $stmt->bindValue(3, $idCategory);
        $stmt->execute();
    }

    function getAllChildes($catIds)
    {
        $childrenIds = [];
        foreach ($catIds as $catId) {
            $children = $this->getChildren($catId);
            foreach ($children as $child) {
                array_push($childrenIds, $child['id']);
            }
        }
        return $childrenIds;
    }

    function deleteCategory($ids)
    {
        $this->allChildrenIds = array_merge($this->allChildrenIds, $ids);
        while (sizeof($ids) > 0) {
            $childrenIds = $this->getAllChildes($ids);
            $ids = $childrenIds;
            $this->allChildrenIds = array_merge($this->allChildrenIds, $childrenIds);
        }
        $ids = join(',', $this->allChildrenIds);
        $sql = "DELETE FROM tbl_category WHERE id IN (" . $ids . ")";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
    }

    function getAttr($categoryId, $attrId)
    {
        $sql = "SELECT * FROM tbl_attr WHERE category_id = ? AND parent = ? ORDER BY id desc";
        $result = $this->doSelect($sql, [$categoryId, $attrId]);
        return $result;
    }

    function getAttrInfo($attrId)
    {
        $sql = "SELECT * FROM tbl_attr WHERE id = ?";
        $result = $this->doSelect($sql, [$attrId], 0);
        return $result;
    }

    function addAttr($categoryId, $data = [])
    {
        $sql = "INSERT INTO tbl_attr (title, categroy_id, parent)VALUES(?, ?, ?)";
        $values = [$data['title'], $categoryId, $data['parent']];
        $this->doQuery($sql, $values);
    }

    function editAttr($attrId, $data = [])
    {
        $sql = "UPDATE tbl_attr SET title = ?, parent = ? WHERE id = ?";
        $values = [$data['title'], $data['parent'], $attrId];
        $this->doQuery($sql, $values);
    }

    function deleteAttr($ids = [])
    {
        $sql = "SELECT * FROM tbl_attr";
        $attrs = $this->doSelect($sql);
        foreach ($attrs as $attr) {
            if (in_array($attr['parent'], $ids))
                array_push($ids, $attr['id']);
        }
        $ids = join(',', $ids);
        $sql = "DELETE FROM tbl_attr WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

    function getAttrVal($attrVal)
    {
        $sql = "SELECT * FROM tbl_attr_val WHERE attr_id = ?";
        $attrValues = $this->doSelect($sql, [$attrVal]);
        return $attrValues;
    }

    function addAttrVal($data=[], $attrId)
    {
        foreach ($data as $row) {
            if (!empty($row)) {
                $sql = "INSERT INTO tbl_attr_val (attr_id, val)VALUES(?, ?)";
                $this->doQuery($sql, [$attrId, $row]);
            }
        }
    }

    function editAttrVal($data=[])
    {
        foreach($data as $key=>$value){
            $item = explode('-',$key);
            $valId = $item['1'];
            if($value != '') {
                $sql = "UPDATE tbl_attr_val SET val = ? WHERE id = ?";
                $this->doQuery($sql, [$value, $valId]);
            }else{
                $sql = "DELETE FROM tbl_attr_val WHERE id = ?";
                $this->doQuery($sql, [$valId]);
            }
        }
    }


}