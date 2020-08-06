<?php

class model_login extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function checkUser($data = [])
    {
        $sql = "SELECT * FROM tbl_user WHERE email = ? AND password = ?";
        $result = $this->doSelect($sql, [$data['email'], $data['password']]);

        if(sizeof($result) > 0 and !empty($result[0]['email'] and !empty($result[0]['password']))){
            Model::sessionInit();
            Model::sessionSet('userId', $result[0]['id']);
        }
    }




}