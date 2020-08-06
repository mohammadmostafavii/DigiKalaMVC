<?php

$active = 'order';
require('views/admin/layout.php');

?>
<div class="left">
    <p class="title">
        <a href="#">
            مدیریت سفارشات
        </a>
    </p>

    <a onclick="submitForm()" class="btn-red">حذف</a>
    <form action="<?= URL ?>adminOrder/deleteOrder" method="post">
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
            $orders = $data['orders'];
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
                    <td >
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
    </form>
</div>
</div>

