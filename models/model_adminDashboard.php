<?php

class model_adminDashboard extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getStat()
    {
        $today = date('Y/m/d');
        $today = self::georgianToJalili($today);
        $sevenDaysAgo = strtotime('-6 day', strtotime($today));
        $sevenDaysAgo = date('Y/m/d', $sevenDaysAgo);
        $dateRange = $this->getRange($sevenDaysAgo, $today);
        $orders = $this->getOrder($dateRange[0], $dateRange[6]);
        $orderStat = [];

        foreach($dateRange as $date){
            $orderStat[$date] = 0;
        }

        foreach ($orders as $order) {
            $order = $order['date'];
            if (in_array($order, $dateRange)) {
                if (isset($orderStat[$order]))
                    $orderStat[$order] += 1;
                else
                    $orderStat[$order] = 1;
            }
        }

        return $orderStat;

    }

    function getOrder($startDate, $endDate)
    {
        $sql = "SELECT date FROM tbl_order WHERE date >= ? AND date <= ?";
        $result = $this->doSelect($sql, [$startDate, $endDate]);
        return $result;
    }


    function getRange($startDate, $endDate)
    {
        $dates = [];
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        while ($startDate <= $endDate) {
            $dates[] = date('Y/m/d', $startDate);
            $startDate = strtotime('+1 day', $startDate);
        }

        return $dates;

    }

}