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

<style>

    .btn_green {
        background: #00a710;
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
    }

    .head .btn_green {
        float: left;
    }

    .head .basket-title {
        font-size: 12.5pt;
        display: inline-block;
        margin: 30px 20px;
    }

    .content {
        width: 96%;
        margin: 0 auto;
        margin-top: -20px;
    }

    .content table {
        width: 100%;
        margin-bottom: 10px;
        float: right;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, .2);
        border-radius: 6px;
        overflow: hidden;
    }

    .content table tr, th {
        text-align: center;
    }

    .content table tr td, th {
        padding: 10px;
        border-left: 1px solid #eeeeee;
        border-bottom: 1px solid #eeeeee;
    }

    .content table {
        border-right: 1px solid #eeeeee;
    }

    .content table thead th {
        background: #f7f9fa;
        border-top: 1px solid #eeeeee;
    }

    .content table thead th:nth-child(4) {
        border-left: 0;
    }

    .content table thead th:last-child {
        background: #f7f9fa;

    }

    .content table tr td:last-child {
        background: rgba(236, 169, 194, 0.81);
        cursor: pointer;
    }

    .content table tr td:last-child span {
        width: 12px;
        height: 12px;
        display: inline-block;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -813px -510px;
    }

    .content .right {
        float: right;
        max-width: 135px;
        max-height: 135px;
        margin-left: 15px;
    }

    .content .left {
        float: right;
        font-size: 10.5pt;
    }

    .content .left p {
        margin: 0;
    }

    .content .left .circle {
        display: inline-block;
        width: 16px;
        height: 16px;
        border-radius: 100%;
        background: red;
        border: 1px solid #cccccc;
        position: relative;
        top: 4px;
    }

    .content .selected {
        position: relative;
    }

    .content .selected span {
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

    .content .selected span::after {
        content: " ";
        width: 18px;
        height: 12px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -31px -461px;
        display: inline-block;
        position: absolute;
        right: 53px;
        top: 6px;
    }

    .content .selected ul {
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

    .content .selected ul li {
        text-align: center;
        border-bottom: 1px solid #cccccc;
        cursor: pointer;
    }

    .content .tuman {
        font-size: 10pt;
        color: #5a5b5b;
    }

    .final_price {
        width: 580px;
        height: 100px;
        border: 1px solid #00d901;
        float: left;
        margin: 20px 0;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, .2);
        border-radius: 3px;
        overflow: hidden;
    }

    .final_price .sum_price {
        width: 100%;
        height: 50%;
        border-bottom: 1px solid #00d901;
    }

    .final_price .sum_price .sum_price_text {
        float: right;
        padding: 10px;

    }

    .final_price .sum_price .price {
        margin-right: 310px;
        font-size: 14pt;
        line-height: 48px;
    }

    .final_price .sum_price .tuman {
        margin-left: 33px;
        float: left;
        font-size: 11pt;
        line-height: 46px;
    }

    .final_price .payable_price .payable_price_text {
        float: right;
        padding: 10px;
        color: #00a710;
    }

    .final_price .payable_price .price {
        margin-right: 300px;
        font-size: 17pt;
        line-height: 48px;
        color: #00a710;
    }

    .final_price .payable_price .tuman {
        margin-left: 29px;
        float: left;
        font-size: 11pt;
        line-height: 46px;
        color: #00a710;
    }


</style>

<main>
    <div id="main">

        <div class="head">
            <p class="basket-title">سبد خرید شما در دیجی کالا</p>
            <a href="<?= URL ?>showCard1" class="btn_green">خرید خود را نهایی کنید</a>
        </div>
        <div class="content">
            <table cellspacing="0">
                <thead>
                <tr>
                    <th>شرح محصول</th>
                    <th>تعداد</th>
                    <th>قیمت واحد</th>
                    <th>قیمت کل</th>
                    <th>
                        <span></span>
                    </th>
                </tr>
                </thead>
                <?php
                $basket = $data['basket'];
                foreach ($basket as $row) {
                    ?>
                    <tbody>
                    <tr>
                        <td>
                            <div class="right">
                                <img src="<?= URL ?>public/images/products/<?= $row['id'] ?>/product_220.jpg"
                                     alt="image"
                                     style="width: 100px; height: 100px; margin-left: 10px;">
                            </div>
                            <div class="left">
                                <p style="font-size: 12pt; font-weight: 600"><?= $row['title']; ?></p>
                                <p>
                                    <span>رنگ:&nbsp;&nbsp;&nbsp;</span>
                                    <span class="circle" style="background: <?php if(isset($row['colorHex'])) echo $row['colorHex'] ?>"></span>
                                    <span>&nbsp;&nbsp;<?php if(isset($row['colorTitle'])) echo $row['colorTitle']; ?></span>
                                </p>
                                <p>گارانتی:&nbsp;&nbsp;<?php if(isset($row['guaranteeTitle'])) echo $row['guaranteeTitle']; ?></p>
                            </div>
                        </td>
                        <td>
                            <div class="selected">
                                <span><?= $row['number']; ?></span>
                                <ul>
                                    <?php
                                    for ($i = 1; $i < 20; $i++) {
                                        ?>
                                        <li onclick="updateBasket(<?= $row['basketId']; ?>, <?= $i; ?>)"><?= $i; ?></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <span class="price"><?= $row['price']; ?></span>
                            <span class="tuman">تومان</span>
                        </td>
                        <td>
                            <span class="price"><?= $row['price'] * $row['number']; ?></span>
                            <span class="tuman">تومان</span>
                        </td>
                        <td onclick="deleteBasket(<?= $row['basketId']; ?>)">
                            <span></span>
                        </td>
                    </tr>
                    </tbody>
                <?php } ?>
            </table>
            <div class="final_price">
                <div class="sum_price">
                    <span class="sum_price_text">جمع کل خرید شما:</span>
                    <span class="price" class="allPrice"><?= $data['totalPriceAll']; ?></span>
                    <span class="tuman">تومان</span>
                </div>
                <div class="payable_price">
                    <span class="payable_price_text">مبلغ قابل پرداخت:</span>
                    <span class="price" class="allPrice"><?= $data['totalPriceAll']; ?></span>
                    <span class="tuman">تومان</span>
                </div>
            </div>
            <a href="<?=URL?>showCard1" class="btn_green" style="float: left; clear: both; margin: 10px 1px;">انتخاب شیوه ارسال کالاها</a>
        </div>
    </div>

</main>

<script>

    function createBasketList(basket, totalPriceAll){
        $('table tbody tr').remove();
        $('.price').text(totalPriceAll);
        $.each(basket, function (index, value) {
            let trTag = '<tr><td><div class="right"><img src="<?= URL ?>public/images/products/' + value['id'] + '/product_220.jpg" alt="image" style="width: 100px; height: 100px; margin-left: 10px;"></div><div class="left"><p style="font-size: 12pt; font-weight: 600">' + value['title'] + '</p><p><span>رنگ:&nbsp;&nbsp;&nbsp;</span><span class="circle" style="background: '+ value['colorHex'] +'"></span><span>&nbsp;&nbsp;'+ value['colorTitle'] +'</span></p><p>گارانتی:&nbsp;&nbsp;'+ value['guaranteeTitle'] +'</p></div></td><td><div class="selected"><span>' + value['number'] + '</span><ul><?php for ($i = 1; $i < 20; $i++) { ?><li onclick="updateBasket(' + value['basketId'] + ', <?= $i; ?>)"><?= $i; ?></li><?php } ?></ul></div></td><td><span class="price">' + value['price'] + '</span><span class="tuman">تومان</span></td><td><span class="price">' + value['price'] * value['number'] + '</span><span class="tuman">تومان</span></td><td onclick="deleteBasket(' + value['basketId'] + ')"><span></span></td></tr>';
            $('table tbody').eq(index).append(trTag);
        });

        $('.selected').click(function () {
            $('ul', this).fadeToggle(100);
        });
        $('.selected ul li').click(function () {
            var txt = $(this).text();
            $('.selected span').text(txt);
        });
    }

    function deleteBasket(basketId) {

        let url = '<?= URL ?>/showCard/deleteBasket/';
        let data = {'basketId': basketId};
        $.post(url, data, function (msg) {
            let basket = msg[0];
            let totalPriceAll = msg[1];
            createBasketList(basket, totalPriceAll);
        }, 'json');
    }

    function updateBasket(basketId, number){

        let url = '<?= URL ?>showCard/updateBasket/';
        let data = {'basketId':basketId, 'number':number};
        $.post(url, data, function(msg){
            let basket = msg[0];
            let totalPriceAll = msg[1];
            createBasketList(basket, totalPriceAll);
        }, 'json');
    }


    $('.selected').click(function () {
        $('ul', this).fadeToggle(100);
    });

    $('.selected ul li').click(function () {
        var txt = $(this).text();
        $('.selected span').text(txt);
    });

</script>