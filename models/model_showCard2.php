<?php

class model_showCard2 extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getAddress()
    {
        self::sessionInit();
        $userId = self::sessionGet('userId');
        $sql = "SELECT * FROM tbl_user_address WHERE user_id = ? ORDER BY id desc";
        $result = $this->doSelect($sql, [$userId]);
        return $result;
    }

    function addAddress($editAddressId, $data = [])
    {
        if ($editAddressId == '') {
            self::sessionInit();
            $userId = self::sessionGet('userId');
            $sql = "INSERT INTO tbl_user_address (user_id, fullName, mobile, tel, province, city, postalAddress, postalCode, province_name, city_name) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->doQuery($sql, [$userId, $data['fullName'], $data['mobile'], $data['tel'], $data['province'], $data['city'], $data['postalAddress'], $data['postalCode'], $data['provinceName'], $data['cityName']]);
        } else {

            $sql = "UPDATE tbl_user_address SET fullName = ?, mobile = ?, tel = ?, province = ?, city = ?, postalAddress = ?, postalCode = ?, province_name = ?, city_name = ? WHERE id = ?";
            $this->doQuery($sql, [$data['fullName'], $data['mobile'], $data['tel'], $data['province'], $data['city'], $data['postalAddress'], $data['postalCode'], $data['provinceName'], $data['cityName'], $editAddressId]);
        }
    }

    function deleteAddress($addressId){
        $sql = "DELETE FROM tbl_user_address WHERE id = ?";
        $this->doQuery($sql, [$addressId]);
    }

    function getAddressInfo($addressId)
    {
        $sql = "SELECT * FROM tbl_user_address WHERE id = ?";
        $result = $this->doSelect($sql, [$addressId], 0);
        return $result;
    }

    function getPostType()
    {
        $sql = "SELECT * FROM tbl_post_type";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getPostPrice($data = [])
    {
        $cityId = $data['cityId'];
        $addressId = $data['addressId'];

//        save address id in session
        $sql = "SELECT * FROM tbl_user_address WHERE id = ?";
        $addressInfo = $this->doSelect($sql, [$addressId], 0);
        self::sessionInit();
        self::sessionSet('addressInfo', serialize($addressInfo));
//        calculate post price
        $result = $this->calculatePostPrice($cityId);
        echo json_encode($result);
    }

    function postTypeSession($data)
    {
        $postTypeId = $data['postTypeId'];
        self::sessionInit();
        self::sessionSet('postTypeId' ,$postTypeId);
    }


}


