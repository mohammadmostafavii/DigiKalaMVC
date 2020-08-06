<?php

class model_index extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSlider1()
    {
        $sql = "SELECT * FROM tbl_slider1";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getSlider2()
    {
        $sql = "SELECT * FROM tbl_product WHERE special = ?";
        $result = $this->doSelect($sql, [1]);
        $first_row = $result[0];

        /** Calculate Discount Price */
        foreach ($result as $key=>$row)
        {
            $result3 = $this->calculateDiscount($row['price'], $row['discount']);
            $final_price = $result3[1];
            $result[$key]['final_price'] = $final_price;
        }

        /** Time Set With admin*/
        $options = self::getOption();
        $duration_time = $options['special_time'];

        $time = $first_row['special_time'] + intval($duration_time);
        //December 15,2019 03:39:30
        $date = date('F d,Y H:m:s', $time);
        return [$result, $date];
    }

    function getOnlyInDigi()
    {
        $sql = "SELECT * FROM tbl_product WHERE only_digi = ?";
        $result = $this->doSelect($sql, [1]);
        return $result;

    }

    function getMostViewed()
    {
        $settings = Model::getOption();
        $limited = $settings['limited'];

        $sql = "SELECT * FROM tbl_product ORDER BY viewed desc limit ".$limited."";
        $result = $this->doSelect($sql);
        return $result;
    }

}