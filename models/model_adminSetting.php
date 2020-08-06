<?php

class model_adminSetting extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getSetting()
    {
        $settings = self::getOption();
        return $settings;
    }

    function save($data = [])
    {
        foreach ($data as $key=>$value){
            $sql = "UPDATE tbl_option SET value=? WHERE setting= ?";
            $this->doQuery($sql, [$value, $key]);
        }
    }

}