<?php

class model_showCard1 extends Model
{

    function __construct()
    {
        self::sessionInit();
        $check = self::sessionGet('userId');
        if( $check != false ){
            header('location:'.URL.'showCard2');
        }
        parent::__construct();
    }



}