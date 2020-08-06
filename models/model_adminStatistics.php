<?php

class model_adminStatistics extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function compareDate($date1, $date2)
    {
        $date1 = new DateTime($date1);
        $date2 = new DateTime($date2);

        $date1 = $date1->format('Y-m-d');
        $date2 = $date2->format('Y-m-d');

        if ($date1 > $date2)
            return 1;
        elseif ($date1 == $date2)
            return 2;
        elseif ($date1 < $date2)
            return 3;
    }

    function order($data = [])
    {
        $startDate = $data['startYear'] . '/' . $data['startMonth'] . '/' . $data['startDay'];
        $endDate = $data['endYear'] . '/' . $data['endMonth'] . '/' . $data['endDay'];

        $sql = "SELECT * FROM tbl_order";
        $dates = $this->doSelect($sql);
        $result = [];
        $payedOrder = 0;
        $totalAmount = 0;

        foreach ($dates as $row) {

            $date = $row['date'];
            $startCompare = $this->compareDate($date, $startDate);
            $endCompare = $this->compareDate($date, $endDate);

            if (($startCompare == 1 or $startCompare == 2) and ($endCompare == 2 or $endCompare == 3)) {
                array_push($result, $row);
                if ($row['pay'] == 1)
                    $payedOrder += 1;
                $totalAmount += $row['amount'];
            }
        }
        return ['result' => $result, 'totalAmount'=>$totalAmount, 'payedOrder'=>$payedOrder, 'startDate'=>$startDate, 'endDate'=>$endDate];
    }




}