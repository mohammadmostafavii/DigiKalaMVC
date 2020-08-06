<script src="<?= URL ?>public/jscolor/jscolor.js"></script>
<?php

$active = 'setting';
require('views/admin/layout.php');
$settings = $data['settings'];

?>
<div class="left">
    <p class="title">
        <a href="#">
            تنظیمات سایت
        </a>
    </p>

    <style>
        .row2 {
            width: 100%;
            float: right;
            margin: 15px 5px;
            padding: 0 30px;
        }
        
        .w300{
            display: inline-block;
            width: 220px;
        }

        .row2 input {
            width: 250px;
            padding: 5px;
            border: 1px solid #cccccc;
            border-radius: 3px;
        }
        .btn_green2 {
            background: #5bc0de;
            width: 67px;
            height: 30px;
            display: inline-block;
            margin: 0 2px;
            color: #FFFFFF;
            text-align: center;
            font-size: 10.5pt;
            line-height: 29px;
            border-radius: 4px;
            box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            cursor: pointer;
        }


    </style>

    <form action="<?= URL ?>adminSetting/save" method="post">
        <div class="row2">
            <span class="w300">تعداد محصولات در اسلایدرها : </span>
            <input type="text" name="limited" value="<?= $settings['limited'] ?>">
        </div>
        <div class="row2">
            <span class="w300">زمان تخفیف محصولات(به دقیقه) : </span>
            <input type="text" name="special_time" value="<?= $settings['special_time'] ?>">
        </div>
        <div class="row2">
            <span class="w300">شماره های تماس : </span>
            <input type="text" name="tel" value="<?= $settings['tel'] ?>">
        </div>
        <div class="row2">
            <span class="w300">ایمیل ارتباط با ما : </span>
            <input type="text" name="email" value="<?= $settings['email'] ?>">
        </div>
        <div class="row2">
            <span class="w300">مهلت پرداخت(به ساعت) : </span>
            <input type="text" name="usance" value="<?= $settings['usance'] ?>">
        </div>
        <div class="row2">
            <span class="w300">آدرس روت سایت : </span>
            <input type="text" style="direction: ltr" name="url" value="<?= $settings['url'] ?>">
        </div>
        <div class="row2">
            <span class="w300">کد درگاه زرین پال MID : </span>
            <input type="text" name="MID" value="<?= $settings['MID'] ?>">
        </div>
        <div class="row2">
            <span class="w300">رنگ بدنه سایت : </span>
            <input type="text" id="body_color" class="jscolor" name="body_color" value="<?= $settings['body_color'] ?>">
            <span class="btn_green2" onclick="document.getElementById('body_color').jscolor.show()">
                انتخاب
            </span>
        </div>
        <div class="row2">
            <span class="w300">رنگ منو سایت : </span>
            <input type="text" id="menu_color" class="jscolor" name="menu_color" value="<?= $settings['menu_color'] ?>">
            <span class="btn_green2" onclick="document.getElementById('menu_color').jscolor.show()">
                انتخاب
            </span>
        </div>
        <div class="row2">
            <span class="btn_green" onclick="submitForm()" style="margin-left: 50px">ثبت اطلاعات</span>
        </div>
    </form>
</div>
</div>

