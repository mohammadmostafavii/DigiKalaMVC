<?php

$active = 'statistics';
require('views/admin/layout.php');

?>
<div class="left">
    <p class="title">
        <a href="#">
            آمار و گزارشات
        </a>
    </p>

    <p>
        گزارش سفارشات فروشگاه
    </p>

    <style>
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

        label {
            margin-right: 28px;
            margin-left: 8px;
            font-weight: normal;
        }

        .day {
            margin-right: 0;
        }

        /*.row2 select {*/
        /*    width: 70px;*/
        /*    padding: 4px 11px;*/
        /*    border: 1px solid #cccccc;*/
        /*    border-radius: 2px;*/
        /*}*/

        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 142px!important;
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

    <form action="<?= URL ?>adminStatistics/order" method="post" id="order">
        <div class="row2">
            <span class="w200">تاریخ شروع:</span>
            <label for="day" class="day">روز
            <select class="selectpicker" name="startDay" id="day">
                <?php
                for ($i = 1; $i < 31; $i++) {
                    ?>
                    <option value="<?php if(isset($i)) echo $i; ?>"><?= $i; ?></option>
                <?php } ?>
            </select>
            </label>
            <label for="month">ماه
            <select class="selectpicker" name="startMonth" id="month">
                <?php
                for ($i = 1; $i < 13; $i++) {
                    ?>
                    <option value="<?php if(isset($i)) echo $i; ?>"><?= $i; ?></option>
                <?php } ?>
            </select>
            </label>
            <label for="year">سال
            <select class="selectpicker" name="startYear" id="year">
                <?php
                $thisYear = Model::jaliliDate('Y');
                for($i = $thisYear; $i > 1380; $i--) {
                    ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                }
                ?>
            </select>
            </label>
        </div>
        <div class="row2">
            <span class="w200">تاریخ پایان:</span>
            <label for="day" class="day">روز
            <select class="selectpicker" name="endDay" id="day">
                <?php
                for ($i = 1; $i < 31; $i++) {
                    ?>
                    <option value="<?php if(isset($i)) echo $i; ?>"><?= $i; ?></option>
                <?php } ?>
            </select>
            </label>
            <label for="month">ماه
            <select class="selectpicker" name="endMonth" id="month">
                <?php
                for ($i = 1; $i < 13; $i++) {
                    ?>
                    <option value="<?php if(isset($i)) echo $i; ?>"><?= $i; ?></option>
                <?php } ?>
            </select>
            </label>
            <label for="year">سال
            <select class="selectpicker" name="endYear" id="year">
                <?php
                $thisYear = Model::jaliliDate('Y');
                for($i = $thisYear; $i > 1380; $i--) {
                    ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                    <?php
                }
                ?>
            </select>
            </label>
        </div>
        <span class="btn_green" onclick="submitForm('order')">گزارش گیری</span>
    </form>
</div>
</div>

<script>

    function submitForm(formId){
        $('#'+ formId).submit();
    }

</script>

