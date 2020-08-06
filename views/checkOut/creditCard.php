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
</style>

<main>
    <div id="main">

        <style>
            .order-steps {
                height: 150px;
                background: #f4f5f6;
                float: right;
                width: 86.5%;
                padding: 50px 162px 0 0;
                border-radius: 4px;
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
                position: relative;
                right: 1px;
                top: -1px;
            }

            .order-steps ul li.active .circle {
                border: 2px solid #2396f3;
                background: #2396f3 url(<?= URL ?>public/images/slices.png) no-repeat -810px -476px;
            }

            .order-steps ul li .line {
                width: 160px;
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
                right: -34px;
                width: 150px;
            }

            .order-steps ul li.active .title {
                color: #2396f3;
            }

        </style>

        <div class="order-steps">
            <div class="order-steps-dash">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li class="active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                       ورود به دیجی کالا
                    </span>
                </li>
                <li class="active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title" style="right: -58px">
                        اطلاعات ارسال سفارش
                    </span>
                </li>
                <li class="active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                        بازبینی سفارش
                    </span>
                </li>
                <li class="active">
                    <span class="circle"></span>
                    <span class="title">
                        اطلاعات پرداخت
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
            }

            .day {
                margin-right: 0;
            }

            .row2 select {
                width: 70px;
                padding: 4px 11px;
                border: 1px solid #cccccc;
                border-radius: 2px;
            }

            .row2 input {
                width: 250px;
                padding: 5px;
                border: 1px solid #cccccc;
                border-radius: 3px;
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

        <?php
        $orderId = $data['orderId'];

        ?>

        <h2 class="row2">اطلاعات واریز کارت به کارت</h2>
        <hr class="row2" style="width: 94%;">
        <form action="<?= URL ?>checkOut/creditCardSave/<?= $orderId; ?>" method="post">
            <div class="row2">
                <span class="w200">تاریخ واریز:</span>
                <label for="day" class="day">روز</label>
                <select name="day" id="day">
                    <?php
                    for ($i = 1; $i < 31; $i++) {
                        ?>
                        <option value="<?php if(isset($i)) echo $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                </select>
                <label for="month">ماه</label>
                <select name="month" id="month">
                    <?php
                    for ($i = 1; $i < 13; $i++) {
                        ?>
                        <option value="<?php if(isset($i)) echo $i; ?>"><?= $i; ?></option>
                    <?php } ?>
                </select>
                <label for="year">سال</label>
                <select name="year" id="year">
                    <option value="<?= 1399 ?>">1399</option>
                    <option value="<?= 1400 ?>">1400</option>
                </select>
            </div>

            <div class="row2">
                <span class="w200">شماره کارت:</span>
                <input type="text" name="card_number">
            </div>

            <div class="row2">
                <span class="w200">نام بانک صادرات کننده:</span>
                <input type="text" name="bank_name">
            </div>

            <div class="row2">
                <span class="w200">تاریخ واریز:</span>
                <label for="hour" class="hour">ساعت</label>
                <select name="hour" id="hour">
                    <?php
                    for ($i = 0; $i < 24; $i++) {
                        ?>
                        <option value="<?= $i ?>"><?php if ($i < 10) echo '0' . $i; else echo $i; ?></option>
                    <?php } ?>
                </select>
                <label for="minute">دقیقه</label>
                <select name="minute" id="minute">
                    <?php
                    for ($i = 1; $i < 60; $i++) {
                        ?>
                        <option value="<?= $i ?>"><?php if ($i < 10) echo '0' . $i; else echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>

                <span class="btn_green" onclick="submitForm()">ثبت اطلاعات</span>

        </form>
    </div>
</main>

<script>
    function submitForm() {
        $('form').submit();
    }
</script>