<style>
    #tabChilds .myOrder table .details table tbody tr:last-child td {
        border-bottom: 0 !important;
    }


    #tabChilds .myOrder table .details .subtable {
        width: 100%;

    }

    #tabChilds .myOrder table .details .subtable tbody tr {
        width: 100%;
        color: #333333;
        background: #FFFFFF !important;
    }

    #tabChilds .myOrder table tr td:first-child {
        border-right: 1px solid #cccccc;
    }

    #tabChilds .myOrder table .details .subtable thead tr {
        background: #cccccc !important;
    }

    .order-steps {
        height: 150px;
        background: #f4f5f6;
        margin-top: -16px;
        float: right;
        width: 92%;
        padding: 50px 92px 0 0;
    }

    .order-steps .order-steps-dash {
        float: right;
        margin: 25px 13px;
    }

    .order-steps .order-steps-dash span {
        width: 15px;
        height: 2px;
        background: blue;
        display: block;
        float: right;
        margin-right: 10px;
    }

    .order-steps ul {
        padding: 0;
        list-style: none;
        float: right;
    }

    .order-steps ul li {
        float: right;
        position: relative;
    }

    .order-steps ul li .circle {
        width: 19px;
        height: 19px;
        border-radius: 100%;
        border: 2px solid #bbbbbb;
        display: block;
        float: right;
    }

    .order-steps ul li.active .circle {
        border: 2px solid #2396f3;
        background: #2396f3 url(<?= URL ?>public/images/slices.png) no-repeat -810px -476px;
    }

    .order-steps ul li .line {
        width: 120px;
        height: 2px;
        background: #bbbbbb;
        display: block;
        float: right;
        margin: 10px;
    }

    .order-steps ul li.active .line {
        background: #2396f3;
    }

    .order-steps ul li .title {
        position: absolute;
        top: 30px;
        right: -17px;
    }

    .order-steps ul li.active .title {
        color: #2396f3;
    }

    #tabChilds .myOrder .more {
        float: right;
        margin: 15px 0;
    }

    #tabChilds .myOrder .more table {
        width: 100% !important;
        background: #FFFFFF !important;
        text-align: center;
    }

    #tabChilds .myOrder .more table td {
        width: 33%;
    }

    #tabChilds .myOrder .more table td:first-child {

        border-right: 0 !important;
    }

    #tabChilds .myOrder .more table td:last-child {

        border-left: 0 !important;
    }

    .w400{
        width: 400px!important;
    }

</style>

<table cellspacing="0">
    <thead>
    <tr>
        <td>ردیف</td>
        <td>کد</td>
        <td>تاریخ</td>
        <td>مبلغ کل</td>
        <td>وضعیت</td>
        <td>عملیات پرداخت</td>
        <td>نوع</td>
        <td>جزییات</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $data = $data['order'];
    $orders = $data[0];
    $postPrice = $data[1];

    $i = 1;
    foreach ($orders as $order) {
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?= $order['id']; ?></td>
            <td><?= $order['date']; ?></td>
            <td><?= $order['amount']; ?></td>
            <td><?= $order['title']; ?></td>
            <td>پرداخت</td>
            <td>سفارش</td>
            <td>
                <img class="showDetails" onclick="showDetailsTr(this)" style="cursor: pointer; margin-top: 5px;"
                     src="<?= URL ?>public/images/orderdetailsopen.png" alt="image">
            </td>
        </tr>
        <tr class="details" style="display: none; background: #FFFFFF!important;">
            <td colspan="8">
                <table class="subtable" cellspacing="0">
                    <thead>
                    <tr>
                        <td>کالا</td>
                        <td>تعداد</td>
                        <td>قیمت واحد</td>
                        <td>قیمت کل</td>
                        <td>تخفیف کل</td>
                        <td>مبلغ کل</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $basket = unserialize($order['basket']);
                    foreach ($basket as $row) {
                        $discount = ($row['discount'] * $row['number'] * $row['price'])/100;
                        ?>
                        <tr>
                            <td><?= $row['title']; ?></td>
                            <td><?= $row['number']; ?></td>
                            <td><?= $row['price']; ?></td>
                            <td><?= $row['number'] * $row['price']; ?></td>
                            <td><?= $discount ?></td>
                            <td><?= ($row['price'] * $row['number']) - $discount ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <p style=" background: #cccccc; font-size: 12pt;height: 30px; padding: 10px; margin-top: 0">
                    رهگیری سفارش
                </p>
                <div class="order-steps">
                    <div class="order-steps-dash">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul>
                        <li class="<?php if($order['status'] >= 2) echo 'active'; ?>">
                            <span class="circle"></span>
                            <span class="line"></span>
                            <span class="title">
                                تایید سفارش
                            </span>
                        </li>
                        <li class="<?php if($order['status'] >= 4) echo 'active'; ?>">
                            <span class="circle"></span>
                            <span class="line"></span>
                            <span class="title">
                                پرداخت
                            </span>
                        </li>
                        <li class="<?php if($order['status'] >= 5) echo 'active'; ?>">
                            <span class="circle"></span>
                            <span class="line"></span>
                            <span class="title">
                                پردازش انبار
                            </span>
                        </li>
                        <li class="<?php if($order['status'] >= 6) echo 'active'; ?>">
                            <span class="circle"></span>
                            <span class="line"></span>
                            <span class="title">
                                آماده ارسال
                            </span>
                        </li>
                        <li class="<?php if($order['status'] >= 7) echo 'active'; ?>">
                            <span class="circle"></span>
                            <span class="title" style="width: 70px">
                                تحویل شده
                            </span>
                        </li>
                    </ul>
                    <div class="order-steps-dash">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="more">
                    <table>
                        <tr>
                            <td class="w400">
                                روش ارسال:
                                <?= $order['post_title']; ?>
                                هزینه ارسال:
                                <?php
                                if($order['post_type'] == 1){
                                    echo $postPrice['postPricePishtaz'];
                                }else{
                                    echo $postPrice['postPriceSefareshi'];
                                }
                                ?>
                            </td>
                            <td class="w400">
                                زمان ارسال:
                                <?= $order['post_body']; ?>
                            </td>
                            <td class="w400">
                                کد مرسوله: نامشخص
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>