<?php

$active = 'order';
require('views/admin/layout.php');

?>

<style>
    #main::after {
        content: " ";
        clear: both;
        display: block;
    }

    #main {
        width: 1200px;
        margin: 10px auto;
        background: #FFFFFF;
        font-family: yekan;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    #products, #addressInfo {
        width: 95%;
        float: right;
        margin: 15px 20px;
        border-radius: 4px;
        overflow: hidden;
    }

    thead th {
        background-color: #03b45a;
        color: #ffffff;
    }

    td, th {
        border: 1px solid #cccccc;
        text-align: center;
        padding: 5px;
        background-color: #dddddd;
    }

    #payInfo {
        width: 92%;
        padding: 10px 20px;
        float: right;
        margin: 15px 20px;
        border-radius: 4px;
        overflow: hidden;
        background-color: #3cb8c7;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
        color: #333333;
    }

    .btn_green {
        background: #00a710;
        width: 170px;
        height: 40px;
        display: inline-block;
        margin: 20px 20px;
        color: #FFFFFF;
        text-align: center;
        font-size: 10.5pt;
        line-height: 35px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        cursor:pointer;
    }

    #pay_error {
        font-size: 13pt;
        text-align: center;
        border: 1px solid red;
        float: right;
        margin: 10px 20px;
        width: 95%;
        color: red;
        padding: 10px 5px;
    }

    input {
        border: 1px solid #bbbbbb;
        padding: 3px;
        border-radius: 3px;
        overflow: hidden;
        margin-right: -30px;
    }

    .change {
        position: relative;
    }

    .edit {
        position: absolute;
        top: 2px;
        left: 2px;
        display: none;
        cursor: pointer;
    }

    .active {
        background: #eeeeee;
        border: 1px solid #aaaaaa;
        border-radius: 3px;
        overflow: hidden;
    }

    h3 {
        padding: 15px 15px 0 0;
        font-size: 14pt;
        color: #444444;
    }

    .btn_save {
        background: url(<?= URL ?>public/images/btn_save.png);
        width: 34px;
        height: 34px;
        position: absolute;
        bottom: -5px;
        left: -5px;
        cursor: pointer;
        display: none;
    }

    tbody tr td span{
        background: none !important;
    }

</style>

<div class="left">
    <?php
    $orderInfo = $data['orderInfo'];
    $id = $orderInfo['id'];
    $basket = unserialize($orderInfo['basket']);
    $orderRegTime = $orderInfo['order_reg_time'];
    $elapsedTime = time() - $orderRegTime;
    $usance = 3 * 24 * 60 * 60;//مهلت پرداخت
    ?>
    <?php
    $active = 'order';
    require_once ('views/admin/layout.php');
    ?>

        <a href="<?= URL ?>adminOrder/factor/<?= $orderInfo['id'] ?>" class="btn_green" style="float: left">مشاهده فاکتور</a>
        <h3>
            جزئیات سفارش با کد:
            <?= $id ?>
        </h3>

        <?php
        if ($elapsedTime > $usance) {
            ?>
            <div id="pay_error">
                این سفارش منقضی شده است، حداکثر مهلت پرداخت <?= usance ?> ساعت میباشد.
            </div>
        <?php } ?>
        <form action="<?= URL ?>adminOrder/editOrder/<?= $orderInfo['id'] ?>">
            <table id="products" cellspacing="0">
                <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>رنگ</th>
                    <th>گارانتی</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>تخفیف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($basket as $row) {
                    ?>
                    <tr>
                        <td>
                            <?= $row['title']; ?>
                        </td>
                        <td>
                            <?= $row['colorTitle']; ?>
                        </td>
                        <td>
                            <?= $row['guaranteeTitle']; ?>
                        </td>
                        <td>
                            <?= $row['number']; ?>
                        </td>
                        <td>
                            <?= $row['price'] * $row['number']; ?>
                        </td>
                        <td>
                            <?= (($row['price'] * $row['discount']) / 100) * $row['number']; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <table id="addressInfo" cellspacing="0">
                <thead>
                <tr>
                    <th>نام تحویل گیرنده</th>
                    <th>استان</th>
                    <th>شهر</th>
                    <th>آدرس پستی</th>
                    <th>کد پستی</th>
                    <th>تلفن همراه</th>
                    <th>تلفن ثابت</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <?= $orderInfo['fullName']; ?>
                    </td>
                    <td>
                        <?= $orderInfo['province']; ?>
                    </td>
                    <td>
                        <?= $orderInfo['city']; ?>
                    </td>
                    <td class="change">
                        <span class="title"><?= $orderInfo['postal_address']; ?></span>
                        <img class="edit" onclick="editData(this)" src="<?= URL ?>public/images/icon_edit_16.png"
                             alt="image">
                        <span class="btn_save" onclick="saveChange(<?= $orderInfo['id'] ?>, this, '1')"></span>
                    </td>
                    <td class="change">
                        <span class="title"><?= $orderInfo['postal_code']; ?></span>
                        <img class="edit" onclick="editData(this)" src="<?= URL ?>public/images/icon_edit_16.png"
                             alt="image">
                        <span class="btn_save" onclick="saveChange(<?= $orderInfo['id'] ?>, this, '2')"></span>
                    </td>
                    <td class="change">
                        <span class="title"><?= $orderInfo['mobile']; ?></span>
                        <img class="edit" onclick="editData(this)" src="<?= URL ?>public/images/icon_edit_16.png"
                             alt="image">
                        <span class="btn_save" onclick="saveChange(<?= $orderInfo['id'] ?>, this, '3')"></span>
                    </td>
                    <td class="change">
                        <span class="title"><?= $orderInfo['tel']; ?></span>
                        <img class="edit" onclick="editData(this)" src="<?= URL ?>public/images/icon_edit_16.png"
                             alt="image">
                        <span class="btn_save" onclick="saveChange(<?= $orderInfo['id'] ?>, this, '4')"></span>
                    </td>
                </tr>
                </tbody>
            </table>
            <div id="payInfo">
                <style>
                    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
                        width: 220px;
                        position: absolute !important;
                    }
                    .one{
                        top: -5px!important;
                        right: 100px!important;
                    }
                    .two{
                        top: 274px;
                        right: 140px!important;
                    }
                </style>
                <div style="position: relative">
                    <span style="display: block; width: 100%;height: 38px">وضعیت پرداخت : </span>
                    <select class="selectpicker one" name="status" id="status" autocomplete="off">
                        <option value="0" onclick="saveStatus(<?= $orderInfo['id'] ?>, this, 5)"<?php if($orderInfo['pay'] == 0) echo 'selected="selected"' ?>>
                            در انتظار پرداخت
                        </option>
                        <option value="1" onclick="saveStatus(<?= $orderInfo['id'] ?>, this, 5)"<?php if($orderInfo['pay'] == 1) echo 'selected="selected"' ?>>
                            پرداخت شده
                        </option>
                    </select>
                </div>
                <div>
                    <span style="display: block; width: 100%;height: 35px">وضعیت سفارش : </span>
                    <select class="selectpicker two" name="order_status" id="order_status" autocomplete="off">
                        <?php
                        $orderStatus = $data['orderStatus'];
                        foreach($orderStatus as $status){
                        ?>
                        <option value="<?= $status['id'] ?>" onclick="saveStatus(<?= $orderInfo['id'] ?>, this, 6)"<?php if($orderInfo['order_status_id'] == $status['id']) echo 'selected="selected"' ?>>
                           <?= $status['title']?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    نوع ارسال : <?= $orderInfo['postTypeTitle'] ?>
                </div>
                <div>
                    شیوه پرداخت : <?= $orderInfo['payTypeTitle'] ?>
                    (
                    <?php
                    $date = $orderInfo['pay_year'].'/'.$orderInfo['pay_month'].'/'.$orderInfo['pay_day'];
                    $time = $orderInfo['pay_hour'].':'.$orderInfo['pay_minute'];
                    echo $date.'--'.$time;
                    ?>
                    )
                </div>
                <div>
                    شماره خرید :
                    <?= $orderInfo['before_pay'] ?>
                </div>
                <?php
                if ($orderInfo['pay'] != 1 and $elapsedTime <= $usance) {
                    ?>
                    <a href="<?= URL ?>checkOut/onlinePay/<?= $orderInfo['id']; ?>" class="btn_green">پرداخت آنلاین</a>
                    <a href="<?= URL ?>checkOut/creditCard/<?= $orderInfo['id']; ?>" class="btn_green">پرداخت با
                        کارت</a>
                <?php } ?>
            </div>
        </form>

</div>
</div>
<script>

    function saveStatus(id, tag, type){
        let value = $(tag).val();
        let url = '<?= URL ?>adminOrder/saveChange';
        let data = {'title': value, 'id' : id, 'type' : type};
        $.post(url, data, function (msg) {
        });

    }

    function saveChange(id, tag, type) {
        let spanTag = $(tag);
        let tdTag = spanTag.parents('td');
        let inputValue = tdTag.find('.title input').val();
        let url = '<?= URL ?>adminOrder/saveChange';
        let data = {'title': inputValue, 'id' : id, 'type' : type};
        $.post(url, data, function (msg) {
            tdTag.find('.title').html(inputValue);
            tdTag.find('.btn_save').fadeOut(100);
        });
    }

    $('.change').hover(function () {
        let trTag = $(this).parents('tr');
        trTag.find('.active').removeClass('active');
        $(this).addClass('active');
        $('.edit', this).fadeIn(200);
    }, function () {
        $('.edit', this).fadeOut(200);
    });

    function editData(tag) {
        let editTag = $(tag);
        let tdTag = editTag.parents('td');
        let titleTag = tdTag.find('.title');
        let titleValue = titleTag.text();
        let input = '<input type=text value="' + titleValue + '">';
        titleTag.html(input);
        tdTag.find('.btn_save').fadeIn(400);
        $('td input').click(function (e) {//e مخفف کلمه event است
            e.stopPropagation();
        });
    }

    $('td .edit').click(function (e) {
        e.stopPropagation();
    });

    $('td .btn_save').click(function (e) {
        e.stopPropagation();
    });


</script>