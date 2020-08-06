<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.css">
<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap-select.css">
<script src="<?= URL ?>public/js/bootstrap-select.js"></script>
<style>

    #main {
        font-family: yekan;
        width: 1200px;
        margin: 15px auto;
        background: #FFFFFF;
        padding: 10px;
        font-size: 12pt;
        font-weight: normal;
    }

    #main::after {
        content: " ";
        clear: both;
        display: block;
    }


    .right {
        width: 240px;
        float: right;
        border: 1px solid #cccccc;
    }

    .left {
        width: 880px !important;
        float: right;
        padding: 10px 20px 10px 10px;
        margin-right: 10px;
        box-shadow: 1px 1px 3px #cccccc;
    }

    .right ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .right ul li a {
        display: block;
        padding: 3px;
        border-bottom: 1px dashed #cccccc;

    }

    /*.right ul li:nth-child(odd) {*/
    /*    background: #ffa2a7;*/
    /*}*/

    .right ul li {
        background: #b7edfe;
    }

    .active1 {
        background: #ffa2a7 !important;
    }

    .right ul li a img {
        display: inline-block;
        float: right;
        margin-left: 10px;
        margin-top: 8px;
        width: 12px;
    }

    .right > ul > li:last-child a {
        border: 0;
    }

    .left .title {
        border-bottom: 1px solid #cccccc;
        background: #e5ffed;
        padding: 4px;
    }

    table.list {
        width: 100%;
    }

    table.list td, th {
        border: 1px solid #cccccc;
        padding: 4px;
        text-align: center;
    }

    table.list tr:nth-child(even) {
        background: #3cb8c7;
    }

    .btn-green {
        background: #00a402;
        padding: 2px 10px;
        font-size: 10pt;
        border: 1px solid #cccccc;
        border-radius: 4px;
        overflow: hidden;
        float: left;
        margin: 0 5px 5px 0;
        cursor: pointer;
        display: block;
        color: #ffffff;
    }

    .btn-red {
        background: #e6523c;
        color: #ffffff;
        padding: 2px 10px;
        font-size: 10pt;
        border: 1px solid #cccccc;
        border-radius: 4px;
        overflow: hidden;
        float: left;
        margin-bottom: 5px;
        cursor: pointer;
        display: block;
    }

    .row {
        width: 100%;
        float: right;
        margin-top: 8px;
        position: relative;
    }

    .row2 {
        width: 100%;
        float: right;
        margin: 15px 5px;
        padding: 0 30px;
    }

    .w200 {
        width: 200px;
        float: right;
    }

    .row input {
        width: 300px;
        height: 25px;
        border: 1px solid #ccc;
        border-radius: 3px;
        overflow: hidden;
        font-family: yekan;
        font-size: 11pt;
        position: absolute;
        right: 140px;
        margin-top: 2px;
    }

    .row textarea {
        width: 460px;
        height: 180px;
        border: 1px solid #ccc;
        border-radius: 3px;
        overflow: hidden;
        font-family: yekan;
        font-size: 11pt;
        position: relative;
        right: 52px;
        margin-top: 2px;
        vertical-align: top;
    }

    .parent {
        padding: 2px;
        border-radius: 4px;
        font-family: yekan;
        position: absolute;
        right: 140px;
        width: 302px;
    }

    form {
        float: left;
        width: 100%;
        position: relative;

    }

    .span_item {
        display: inline-block;
        width: 90px;
        height: 30px;
        background: red;
        border: 1px solid #cccccc;
        position: relative;
        top: 13px;
        margin-right: 3px;
        text-align: center;
        padding: 1px;
        border-radius: 4px;
        overflow: hidden;
        color: grey;
    }

    .adminClose {
        width: 15px;
        position: absolute;
        top: 0;
        left: 0;
        cursor: pointer;
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
        cursor: pointer;
        float: left;
    }


</style>

<div id="main">
    <div class="right">
        <ul>
            <li class="<?php if($active == 'dashboard') echo 'active1' ?>" >
                <a href="<?= URL ?>adminDashboard/index">
                    داشبورد
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'category') echo 'active1' ?>" >
                <a href="<?= URL ?>adminCategory/index">
                    مدیریت دسته ها
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'products') echo 'active1' ?>" >
                <a href="<?= URL ?>adminProduct/index">
                    مدیریت محصولات
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'order') echo 'active1' ?>" >
                <a href="<?= URL ?>adminOrder/index">
                    مدیریت سفارشات
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'statistics') echo 'active1' ?>" >
                <a href="<?= URL ?>adminStatistics/index">
                    آمار و گزارشات
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'comment') echo 'active1' ?>" >
                <a href="<?= URL ?>adminComment/index">
                    مدیریت نظرات کاربران
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'setting') echo 'active1' ?>" >
                <a href="<?= URL ?>adminSetting/index">
                    تنظیمات سایت
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
            <li class="<?php if($active == 'slider') echo 'active1' ?>" >
                <a href="<?= URL ?>adminSlider/index">
                    مدیریت اسلایدر
                    <img src="<?= URL ?>public/images/circle.png" alt="image">
                </a>
            </li>
        </ul>
    </div>

    <script>

        function submitForm() {
            $('form').submit();
        }

    </script>