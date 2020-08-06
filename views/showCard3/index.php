<style>
    #main::after{
        content: " ";
        clear: both;
        display: block;
    }

    #main{
        width: 1200px;
        margin: 10px auto;
        background: #FFFFFF;
        font-family: yekan;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    .btn_blue {
        background: #208de6;
        width: 170px;
        height: 40px;
        display: inline-block;
        margin: 30px 20px;
        color: #FFFFFF;
        text-align: center;
        font-size: 10.5pt;
        line-height: 35px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        cursor: pointer;
    }

    .head .btn_blue{
        float: left;
    }

    .head .basket-title{
        font-size: 12.5pt;
        display: inline-block;
        margin: 30px 20px;
    }

    .content{
        width: 96%;
        margin: 0 auto;
        margin-top: -20px;
    }

    .content table{
        width: 100%;
        margin-bottom: 10px;
        float: right;
    }

    .content table tr{
        text-align: center;
    }

    .content table tr td{
        padding: 10px;
        border-left: 1px solid #eeeeee;
        border-bottom: 1px solid #eeeeee;
    }

    .content table tr td:first-child{
        border-right: 1px solid #eeeeee;
    }

    .content table tr:first-child td{
        background: #f7f9fa;
        border-top: 1px solid #eeeeee;
    }

    .content table tr td:nth-child(4){
        border-left: 0;
    }

    .content table tr:last-child td:last-child  {
        background: rgba(151, 225, 236, 0.81);
    }

    .content table tr:last-child td:last-child a{
        width: 16px;
        height: 16px;
        display: inline-block;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -811px -413px;
    }

    .content .right{
        float: right;
        max-width: 135px;
        max-height: 135px;
        margin-left: 15px;
    }

    .content .right img{
        width: 130px;
        height: 130px;
    }

    .content .left{
        float: right;
        font-size: 10.5pt;
    }

    .content .left p{
        margin: 0;
    }

    .content .left .circle{
        display: inline-block;
        width: 16px;
        height: 16px;
        border-radius: 100%;
        background: red;
        border: 1px solid #cccccc;
        position: relative;
        top: 4px;
    }

    .content .selected{
        position: relative;
    }

    .content .selected span{
        width: 74px;
        height: 25px;
        background: #f7f9fa;
        display: inline-block;
        border: 1px solid #cccccc;
        border-radius: 3px;
        text-align: center;
        line-height: 26px;
        position: relative;
        right: 33px;
        cursor: pointer;
    }

    .content .selected span::after{
        content: " ";
        width: 18px;
        height: 12px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -31px -461px;
        display: inline-block;
        position: absolute;
        right: 53px;
        top: 6px;
    }

    .content .selected ul{
        list-style: none;
        padding: 0;
        background: #f7f9fa;
        border: 1px solid #cccccc;
        border-top: 0;
        border-bottom: 0;
        width: 74px;
        position: absolute;
        top: 12px;
        right: 33px;
        border-radius: 3px;
        display: none;
        height: 70px;
        overflow: auto;
    }

    .content .selected ul li{
        text-align: center;
        border-bottom: 1px solid #cccccc;
        cursor: pointer;
    }

    .content .tuman{
        font-size: 10pt;
        color: #5a5b5b;
    }

    .final_price{
        width: 99%;
        height: 200px;
        border: 2px solid #00d901;
        float: left;
        margin: 20px 0;
        border-radius: 2px;
    }

    .final_price .sum_price{
        width: 100%;
        height: 25%;
        border-bottom: 1px solid #00d901;
    }

    .final_price .sum_price .sum_price_text{
        float: right;
        padding: 10px;
        font-size: 10.5pt;
    }

    .final_price .sum_price .price{
        margin-right: 850px;
        font-size: 13pt;
        line-height: 48px;
    }

    .final_price .sum_price .tuman{
        margin-left: 33px;
        float: left;
        font-size: 11pt;
        line-height: 46px;
    }

    .final_price .send_price{
        width: 100%;
        height: 25%;
        border-bottom: 1px solid #00d901;
    }

    .final_price .send_price .send_price_text{
        float: right;
        padding: 10px;
        font-size: 10.5pt;
    }

    .final_price .send_price .price{
        margin-right: 750px;
        font-size: 13pt;
        line-height: 48px;
    }

    .final_price .send_price .tuman{
        margin-left: 33px;
        float: left;
        font-size: 11pt;
        line-height: 46px;
    }

    .final_price .discount_price{
        width: 100%;
        height: 25%;
        border-bottom: 1px solid #00d901;
        background: #ffc1b2;
    }

    .final_price .discount_price .discount_price_text{
        float: right;
        padding: 10px;
        font-size: 10.5pt;
        color: #ff2f2f;
    }

    .final_price .discount_price .price{
        margin-right: 900px;
        font-size: 13pt;
        line-height: 48px;
        color: #ff2f2f;
    }

    .final_price .discount_price .tuman{
        margin-left: 33px;
        float: left;
        font-size: 11pt;
        line-height: 46px;
        color: #ff2f2f;
    }

    .final_price .payable_price{
        background: #caecee;
    }

    .final_price .payable_price .payable_price_text{
        float: right;
        padding: 10px;
        color: #00a710;
    }

    .final_price .payable_price .price{
        margin-right: 820px;
        font-size: 17pt;
        line-height: 48px;
        color: #00a710;
    }

    .final_price .payable_price .tuman{
        margin-left: 29px;
        float: left;
        font-size: 11pt;
        line-height: 46px;
        color: #00a710;
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
                <li>
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                        بازبینی سفارش
                    </span>
                </li>
                <li>
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

        <div class="head">
            <p class="basket-title">سبد خرید شما در دیجی کالا</p>
            <a href="showCard4" class="btn_blue">ثبت اطلاعات و ادامه خرید</a>
        </div>
        <div class="content">
            <?php
            $basket = $data['basket'];
            foreach($basket as $row){
            ?>
            <table cellspacing="0">
                <tr>
                    <td>شرح محصول</td>
                    <td>تعداد</td>
                    <td>قیمت واحد</td>
                    <td>قیمت کل</td>
                    <td>
                        <span></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="right">
                            <img src="<?= URL ?>public/images/products/<?= $row['id']; ?>/product_220.jpg" alt="image">
                        </div>
                        <div class="left">
                            <p style="font-weight: 600">
                                <?= $row['title']; ?>
                            </p>
                            <p>
                                <span>رنگ:&nbsp;&nbsp;&nbsp;</span>
                                <span class="circle" style="background: <?= $row['colorHex'] ?>"></span>
                                <span>&nbsp;&nbsp;<?= $row['colorTitle']; ?></span>
                            </p>
                            <p>گارانتی:&nbsp;&nbsp;<?= $row['guaranteeTitle']; ?></p>
                        </div>
                    </td>
                    <td>
                        <div style="text-align: center;">
                            <span><?= $row['number']; ?></span>
                        </div>
                    </td>
                    <td>
                        <span class="price">
                            <?= $row['price']; ?>
                        </span>
                        <span class="tuman">تومان</span>
                    </td>
                    <td>
                        <span class="price">
                            <?= $row['price'] * $row['number']; ?>
                        </span>
                        <span class="tuman">تومان</span>
                        <br>
                        <span class="price" style="color: red;">
                            <?= $row['discountTotal']; ?>
                        </span>
                        <span class="tuman" style="color: red">تومان</span>
                    </td>
                    <td onclick="redirect()">
                        <a href="showCard"></a>
                    </td>
                    
                </tr>
            </table>
            <?php } ?>
            <div class="head">
                <p class="basket-title" style="margin-right: 10px">خلاصه صورتحساب شما</p>
            </div>

            <div class="final_price">
                <div class="sum_price">
                    <span class="sum_price_text">جمع کل خرید شما:</span>
                    <span class="price"><?= $data['priceTotalAll'] ?></span>
                    <span class="tuman">تومان</span>
                </div>
                <div class="send_price">
                    <span class="send_price_text">هزینه ارسال بیمه و بسته بندی سفارش:</span>
                    <span class="price"><?= $data['postPrice']; ?></span>
                    <span class="tuman">تومان</span>
                </div>
                <div class="discount_price">
                    <span class="discount_price_text">جمع کل تخفیف:</span>
                    <span class="price"><?= $data['totalDiscountAll']; ?></span>
                    <span class="tuman">تومان</span>
                </div>
                <div class="payable_price">
                    <span class="payable_price_text">جمع کل قابل پرداخت:</span>
                    <span class="price"><?= ($data['priceTotalAll'] + $data['postPrice']) - $data['totalDiscountAll'] ?></span>
                    <span class="tuman">تومان</span>
                </div>
            </div>

            <div class="head">
                <p class="basket-title" style="margin-right: 10px">اطلاعات ارسال سفارش</p>
            </div>
        </div>

        <style>
            .send_info{
                width: 96%;
                margin: 0 auto;
                margin: 5px 30px 10px 10px;
                font-size: 10.5pt;
            }

            .send_info tr:first-child td{
                border-top: 1px solid #cccccc;
            }

            .send_info tr td:first-child{
                border-right: 1px solid #cccccc;
                width: 50px;
            }

            .send_info tr td{
                padding: 7px;
                border-bottom: 1px solid #cccccc;
                border-left: 1px solid #cccccc;
            }

            .send_info tr td i{
                display: inline-block;
                width: 30px;
                height: 30px;
                background: url(<?= URL ?>public/images/slices.png) no-repeat;
                position: relative;
            }

        </style>
        <?php
        $addressInfo = $data['addressInfo'];
        ?>
        <table cellspacing="0" class="send_info">
            <tr>
                <td>
                    <i style="background-position: -810px -202px; top: 4px; right: 2px"></i>
                </td>
                <td>این سفارش به <?= $addressInfo['fullName'] ?> به آدرس <?= $addressInfo['postalAddress']; ?> تحویل داده می شود</td>
            </tr>
            <tr>
                <td>
                    <i style="background-position: -806px -250px; top: 11px; right: 6px;"></i>
                </td>
                <td>
                    این سفارش از طریق
                    <?php
                    $postTypeId = $data['postTypeId'];
                    if($postTypeId == 1){
                        echo 'پست پیشتاز';
                    }else{
                        echo 'پست سفارشی';
                    }
                    ?>

                    (هزینه ارسال:طبق تعرفه پست)با هزینه <?= ($data['priceTotalAll'] + $data['postPrice']) - $data['totalDiscountAll'] ?> تومان تحویل داده خواهد شد.
                </td>
            </tr>
        </table>

        <a href="showCard4" class="btn_blue" style="float: left">ثبت اطلاعات و ادامه خرید</a>
        <a href="showCard2" class="btn_blue" style="background: #888888; float: left;">ویرایش</a>
    </div>
</main>
<script>

    $('.selected').click(function(){
        $('ul', this).fadeToggle(100);
    });

    $('.selected ul li').click(function(){
        var txt = $(this).text();
        $('.selected span').text(txt);
    });

</script>
