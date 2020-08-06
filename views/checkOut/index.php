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

        <?php
        $orderInfo = $data['orderInfo'];
        $basket = unserialize($orderInfo['basket']);
        $orderRegTime = $orderInfo['order_reg_time'];
        $elapsedTime = time() - $orderRegTime;
        $usance = 24 * 60 * 60;
        ?>

        <style>

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

        </style>

        <?php
        if ($elapsedTime > $usance) {
            ?>
            <div id="pay_error">
                این سفارش منقضی شده است، حداکثر مهلت پرداخت <?= usance ?> ساعت میباشد.
            </div>
        <?php } ?>
         <style>
            .success_record{
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
                padding: 8px;
            color: #ffffff;
            border-radius: 5px;
            border: 1px solid #cccccc;
            margin: 8px 3px;
            float: right;
            width: 98%;
            background: #00d901;
            }
</style>
            <?php
            if ($orderInfo['pay_day'] > 0) {
                ?>
                <p class="success_record">ثبت اطلاعات با موفقیت انجام شد.</p>
                <?php
            }
            ?>
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
                <td>
                    <?= $orderInfo['postal_address']; ?>
                </td>
                <td>
                    <?= $orderInfo['postal_code']; ?>
                </td>
                <td>
                    <?= $orderInfo['mobile']; ?>
                </td>
                <td>
                    <?= $orderInfo['tel']; ?>
                </td>
            </tr>
            </tbody>
        </table>

        <div id="payInfo">
            <div>
                وضعیت پرداخت :
                <?php
                if ($orderInfo['pay'] == 0) {
                    echo 'در انتظار پرداخت';
                } else {
                    echo 'پرداخت با موفقیت انجام شده';
                }
                ?>
            </div>
            <div>
                نوع ارسال :
                <?php
                if ($orderInfo['post_type'] == 1) {
                    echo 'ارسال از طریق پست پیشتاز';
                } else {
                    echo 'ارسال از طریق پست سفارشی';
                }
                ?>
            </div>
            <div>
                شماره خرید :
                <?= $orderInfo['before_pay'] ?>
            </div>
            <?php
            if ($orderInfo['pay'] != 1 and $elapsedTime <= $usance) {
                ?>
                <a href="<?= URL ?>checkOut/onlinePay/<?= $orderInfo['id']; ?>" class="btn_green">پرداخت آنلاین</a>
                <a href="<?= URL ?>checkOut/creditCard/<?= $orderInfo['id']; ?>" class="btn_green">پرداخت با کارت</a>
            <?php } ?>
        </div>

    </div>
</main>
