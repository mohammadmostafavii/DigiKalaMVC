<?php

class model_adminSlider extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSlider()
    {
        $sql = "SELECT * FROM tbl_slider1 ORDER BY id desc";
        $slider = $this->doSelect($sql);
        return $slider;
    }

    function addSlider($file = [], $data = [])
    {
        $link = $data['link'];
        $title = $data['title'];
        $image = $this->saveFile($file['image'],'','', 1);
        $imgAddress = $image[1];
        $sql = "INSERT INTO tbl_slider1 (title, img, link)VALUES(?, ?, ?)";
        $this->doQuery($sql, [$title, $imgAddress, $link]);
    }

    function deleteSlider($ids = [])
    {
        foreach($ids as $id) {
            $sql = "SELECT * FROM tbl_slider1 WHERE id = ?";
            $result = $this->doSelect($sql, [$id], 0);
            $filePath = $result['img'];
            unlink($filePath);
        }

        $ids = implode(',', $ids);
        $sql = "DELETE FROM tbl_slider1 WHERE id IN (".$ids.")";
        $this->doQuery($sql);
    }


}