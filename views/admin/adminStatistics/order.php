<?php

$active = 'statistics';
require('views/admin/layout.php');

$result = $data['result'];
$startDate = $result['startDate'];
$endDate = $result['endDate'];
$orders = $result['result'];
?>

<style>

    .spanTag {
        font-size: 13pt;
        margin-left: 50px;
    }
    .row2{
        float: right;
        margin-bottom: 20px;
    }

</style>

<div class="left">
    <p class="title">
        <a href="#">
            آمار و سفارشات در بازه زمانی <?= $startDate ?> تا <?= $endDate ?>
        </a>
    </p>
    <div class="row2">
        <span class="spanTag">
            تعداد کل سفارشات : <?= sizeof($orders) ?>
        </span>

            <span class="spanTag">
            تعداد سفارشات پرداخت شده : <?= $result['payedOrder'] ?>
        </span>

            <span class="spanTag">
            مبلغ کل فروش : <?= $result['totalAmount'] ?>
        </span>
    </div>

    <table class="list" cellspacing="0">
        <thead>
        <tr>
            <th>
                کد
            </th>
            <th>
                تاریخ
            </th>
            <th>
                تحویل گیرنده
            </th>
            <th>
                مبلغ کل
            </th>
            <th>
                استان
            </th>
            <th>
                شهر
            </th>
            <th>
                جزئیات
            </th>
            <th>
                انتخاب
            </th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($orders as $order) {
            ?>
            <tr>
                <td>
                    <?= $order['id'] ?>
                </td>
                <td style="width: 100px;">
                    <?= $order['date'] ?>
                </td>
                <td style="width: 200px;">
                    <?= $order['fullName'] ?>
                </td>
                <td>
                    <?= $order['amount'] ?>
                </td>
                <td>
                    <?= $order['province'] ?>
                </td>
                <td>
                    <?= $order['city'] ?>
                </td>
                <td>
                    <a href="<?= URL ?>adminOrder/editOrder/<?= $order['id'] ?>">
                        <img src="<?= URL ?>public/images/edit_icon.ico" alt="edit"
                             style="width: 20px; height: 20px">
                    </a>
                </td>
                <td>
                    <input type="checkbox" name="id[]" value="<?= $order['id'] ?>">
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</div>

