<?php

class model_adminOrder extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getOrders()
    {
        $sql = "SELECT * FROM tbl_order";
        $orders = $this->doSelect($sql);
        return $orders;
    }

    function getOrderStatus()
    {
        $sql = "SELECT * FROM tbl_order_status";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getOrderInfo($orderId)
    {
        $sql = "SELECT pa.title AS payTypeTitle, o.*, po.title AS postTypeTitle FROM
        tbl_order o
        LEFT JOIN tbl_post_type po ON o.post_type = po.id
        LEFT JOIN tbl_pay_type pa ON o.pay_type = pa.id
        WHERE o.id = ?";


        $orderInfo = $this->doSelect($sql, [$orderId], 0);
        return $orderInfo;
    }

    function saveChange($data)
    {
        $title = $data['title'];
        $id = $data['id'];
        $type = $data['type'];
        $sql = '';
        if($type == 1) {
            $sql = "UPDATE tbl_order SET postal_address = ? WHERE id = ?";
        }elseif($type == 2){
            $sql = "UPDATE tbl_order SET postal_code = ? WHERE id = ?";
        }elseif($type == 3){
            $sql = "UPDATE tbl_order SET mobile = ? WHERE id = ?";
        }elseif($type == 4){
            $sql = "UPDATE tbl_order SET tel = ? WHERE id = ?";
        }elseif($type == 5){
            $sql = "UPDATE tbl_order SET pay = ? WHERE id = ?";
        }elseif($type == 6){
            $sql = "UPDATE tbl_order SET order_status_id = ? WHERE id = ?";
        }

        $this->doQuery($sql, [$title, $id]);
    }

    function deleteOrder($ids = [])
    {
        $ids = implode(',', $ids);
        $sql = "DELETE FROM tbl_order WHERE id IN (".$ids.")";
        $this->doQuery($sql);
    }

}