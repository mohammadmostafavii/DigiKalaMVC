<style>

    #details {
        float: right;
        width: 1200px;
        background: #FFFFFF
    }

    #details .right {
        width: 450px;
        float: right;
    }

    #details .left {
        width: 710px;
        float: left;
        margin-right: 30px;
    }

    .right .share {
        float: right;
        width: 100%;
        padding-top: 40px;
    }

    .right .share .social {
        width: 20px;
        height: 20px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -213px -187px;
        display: block;
        float: left;
    }

    .right .share .favorite {
        width: 20px;
        height: 20px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -160px -187px;
        display: block;
        float: left;
        margin-left: 20px;
    }

    .gallery {
        float: right;
        width: 100%;
        margin-top: 40px;
        text-align: center;
    }

    .gallery ul {
        list-style: none;
        padding: 0;
        margin-top: 22px;
    }

    .gallery ul li {
        float: left;
        width: 76px;
        height: 73px;
        border: 1px solid #eeeeee;
        text-align: center;
        margin: 10px 5px;
        padding-top: 8px;
        cursor: pointer;
    }

    .tripleDot {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -562px -28px;
        width: 35px;
        height: 17px;
        display: block;
        margin: 20px auto;
    }

    #details .stars {
        margin: -30px 23px;
        float: left;
    }

    #details .stars .grey {
        background: url(<?= URL ?>public/images/stars.png) repeat 0 -9px;
        width: 56px;
        height: 9px;
        float: left;
        position: relative;
        margin-top: -4px;
    }

    #details .stars .red {
        background: url(<?= URL ?>public/images/stars.png) repeat 0 0;
        width: 100%;
        height: 9px;
        float: left;
        position: absolute;
        top: 0;
        left: 0;
    }

    #details .left .title {
        margin: 15px 0 0 5px;
        width: 98%;
        height: 70px;
        background: #eeeeee;
        float: right;
        border: 1px solid #eeeeee;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 1px 2px 3px rgba(0, 0, 0, .1);
    }

    #details .left .right {
        width: 415px;
        float: right;
    }

    #details .left .right .colors {
        float: right;
        width: 100%;
    }

    #details .left .right p {
        font-size: 10.7pt;
        font-weight: 500;
        margin: 25px 0 -4px 0;
    }

    #details .left .right ul {
        padding: 0;
        list-style: none;
        float: right;
    }

    #details .left .right .colors > ul > li {
        float: right;
        width: 78px;
        height: 28px;
        border-radius: 4px;
        border: 1px solid #eeeeee;
        margin-right: 8px;
        font-size: 9.5pt;
    }

    #details .left .right .colors > ul > li:first-child {
        margin-right: 0;

    }

    #details .left .right .colors > ul > li .circle {
        border-radius: 100%;
        width: 16px;
        height: 16px;
        float: right;
        position: relative;
        right: 10px;
        top: 5px;
        margin-left: 17px;
        border: 1px solid #eeeeee;
    }

    #details .left .right .colors > ul > li .circle.active::after {
        content: " ";
        width: 10px;
        height: 10px;
        position: absolute;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -169px -83px;
        display: inline-block;
        top: 3px;
        right: 4px;
    }


    #details .left .left {
        width: 300px;
        float: right;
    }

</style>

<?php
if ($productInfo['special'] == 1)
    require('views/product/offer.php');
?>

<div id="details">
    <div class="right">
        <div class="share">
            <i class="social"></i>
            <i class="favorite"></i>
        </div>
        <div class="gallery">

            <img id="zoomProduct" src="<?= URL ?>public/images/products/<?= $productInfo['id'] ?>/product_350.jpg"
                 alt="image"
                 data-zoom-image="<?= URL ?>public/images/products/<?= $productInfo['id'] ?>/product.jpg"
                 width="350px" height="350px">

            <script>
                $('#zoomProduct').elevateZoom({'zoomWindowOffetx': -800, 'zoomWindowOffety': -100});
            </script>

            <ul>
                <?php
                $gallery = $data['gallery'];
                foreach ($gallery as $row) {
                    ?>
                    <li data-main-image="<?= URL ?>public/images/products/<?= $row['idProduct']; ?>/gallery/large/<?= $row['img'] ?>">
                        <img style="width: 75px; height: 75px;"
                             src="<?= URL ?>public/images/products/<?= $row['idProduct'] ?>/gallery/small/<?= $row['img'] ?>"
                             alt="image">
                    </li>
                    <?php
                }
                ?>
                <li data-main-image="<?= URL ?>public/images/products/8/gallery/large/ax1.jpg">
                    <span class="tripleDot"></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="left">

        <div class="title">
            <p style="font-size: 14pt; font-weight: bold; margin: 10px 10px">
                <?= $productInfo['title']; ?>
            </p>

            <!--            <span style="font-size: 10pt; font-weight: normal; position: relative; top: -20px; right: 10px;">گوشی موبایل لنوو مدل VIBE Shot دوسیم کارت</span>-->
            <div class="stars">
                <div class="grey">
                    <div class="red"></div>
                    <span style="font-size: 9.5pt;line-height: 56px;">4 از 78 رای</span>
                </div>
            </div>
        </div>

        <div class="right">
            <p>انتخاب رنگ</p>
            <div class="colors">
                <ul>
                    <?php
                    $colors = $productInfo['all_colors'];
                    foreach ($colors as $color) {
                        ?>
                        <li>
                            <span data-color="<?= $color['id']; ?>" class="circle"
                                  style="background: <?= $color['hex']; ?>"></span>
                            <span><?= $color['title']; ?></span>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <style>

                #selected {
                    width: 390px;
                    height: 37px;
                    border: 1px solid #cccccc;
                    background: #f7f9fa;
                    float: right;
                    margin-top: 12px;
                    position: relative;
                    font-size: 10.5pt;
                    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .12);
                }

                #selected span {

                    float: right;
                    line-height: 36px;
                    font-size: 11pt;
                    padding-right: 55px;
                }

                #selected::after {
                    content: " ";
                    width: 21px;
                    height: 17px;
                    position: absolute;
                    background: url(<?= URL ?>public/images/slices.png) no-repeat -104px -79px;
                    top: 8px;
                    right: 10px;
                }

                #selected::before {
                    content: " ";
                    width: 21px;
                    height: 17px;
                    position: absolute;
                    background: url(<?= URL ?>public/images/slices.png) no-repeat -31px -461px;
                    top: 12px;
                    left: 8px;
                }

                #selected ul {
                    border: 1px solid #eeeeee;
                    width: 100%;
                    position: relative;
                    top: -12px;
                    right: -1px;
                    border-radius: 2px;
                    overflow: hidden;
                    box-shadow: 1px 1px 3px rgba(0, 0, 0, .1);
                    display: none;
                    background: #FFFFFF;
                    z-index: 3;
                }

                #selected ul li {
                    padding-right: 20px;
                    cursor: pointer;
                    z-index: 3;
                }

                #selected ul li:hover {
                    background: #eeeeee;
                }


            </style>

            <p style="float: right; margin-top: 10px;">انتخاب گارانتی</p>

            <div id="selected">
                <span>گارانتی مورد نظر خود را انتخاب کنید</span>
                <ul>
                    <?php
                    $guarantees = $productInfo['all_guarantees'];

                    foreach ($guarantees as $guarantee) {
                        ?>
                        <li data-id="<?= $guarantee['id'] ?>"><?= $guarantee['title'] ?></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <style>
                .price {
                    float: right;
                    margin-top: 55px;
                    font-size: 9.5pt;
                }

                .right .price .discount {
                    width: 140px;
                    height: 24px;
                    float: right;
                    color: #ffffff;
                    border-radius: 2px;
                    overflow: hidden;
                    box-shadow: 1px 1px 1px rgba(0, 0, 0, .2);
                    margin-top: 2px;
                }

                .right .price .discount .discount-right {
                    width: 50px;
                    height: 100%;
                    float: right;
                    background: #ff605b;
                    text-align: center;
                    position: relative;
                }

                .right .price .discount .discount-right::before {
                    content: " ";
                    width: 0;
                    height: 0;
                    border-style: solid;
                    border-width: 5px 5px 5px 0;
                    border-color: transparent #ffffff transparent transparent;
                    position: absolute;
                    display: block;
                    top: 7px;
                    right: 0;
                }

                .right .price .discount .discount-left {
                    width: 90px;
                    height: 100%;
                    float: right;
                    background: #ff0000;
                    text-align: center;
                }

                .final-price {
                    width: 100%;
                    float: right;
                    margin-top: 20px;
                }

                .final-price .chart {
                    float: right;
                    width: 30px;
                    height: 30px;
                }

                .right .buttons {
                    float: right;
                    width: 100%;
                    font-size: 11pt;
                    margin-top: 20px;
                }

                .right .buttons .compare {
                    width: 155px;
                    height: 40px;
                    background: #aaaaaa;
                    display: block;
                    float: right;
                    border-radius: 3px;
                    overflow: hidden;
                    color: #ffffff;
                    text-align: center;
                    line-height: 36px;
                    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15);
                }

                .right .buttons .addToCart {
                    width: 210px;
                    height: 40px;
                    display: block;
                    float: right;
                    margin-right: 15px;
                    border-radius: 3px;
                    overflow: hidden;
                    color: #ffffff;
                    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15);
                    cursor: pointer;
                }

                .right .buttons .addToCart .addToCart-right {
                    width: 55px;
                    height: 100%;
                    display: block;
                    float: right;
                    background: #00a710;
                    position: relative;
                }

                .right .buttons .addToCart .addToCart-right::before {
                    content: " ";
                    width: 25px;
                    height: 23px;
                    display: block;
                    float: right;
                    background: url(<?= URL ?>public/images/slices.png) no-repeat -157px -419px;
                    position: absolute;
                    top: 7px;
                    right: 14px;
                }

                .right .buttons .addToCart .addToCart-left {
                    width: 155px;
                    height: 100%;
                    background: green;
                    display: block;
                    float: right;
                    text-align: center;
                    line-height: 36px;
                }


            </style>

            <div class="price">
                <span style="padding-left: 30px; float: right;">قیمت&nbsp;:&nbsp;&nbsp;&nbsp;<span
                            style="text-decoration: line-through; font-weight: 700; font-size: 10pt"><?= $productInfo['price']; ?></span>&nbsp;&nbsp;&nbsp; تومان</span>
                <span class="discount">
                            <span class="discount-right">تخفیف</span>
                            <span class="discount-left"><?= $productInfo['price_discount'] ?> هزار تومان</span>
                        </span>
                <div class="final-price">
                    <img src="<?= URL ?>public/images/combo-chart.png" alt="image" class="chart">
                    <span style="font-size: 13pt; font-weight: 600; color: #444444; margin: 0 16px 0 15px">قیمت برای شما:</span>
                    <span style="color: green; font-size: 16pt; font-weight: 600;"><?= $productInfo['price_final']; ?></span>
                    <span style="color: green; margin-right: 10px">تومان</span>
                </div>
            </div>

            <div class="buttons">
                <span class="compare">مقایسه کن</span>
                <span class="addToCart" onclick="addToBasket(<?= $productInfo['id']; ?>)">
                            <span class="addToCart-right"></span>
                            <span class="addToCart-left">افزودن به سبد خرید</span>
                        </span>
            </div>

        </div>
        <script>

            var guarantee = '';

            function addToBasket(productId) {
                let color = $('.colors').find('.circle.active').attr('data-color');
                let url = '<?= URL ?>product/addToBasket/'+ productId +'/' + color + '/' + guarantee;
                console.log(url);
                let data = {};
                $.post(url, data, function (msg) {
                });
            }

        </script>

        <div class="left">
            <!--maybe later i add some feature-->
        </div>
        <style>
            #service-feature {
                width: 710px;
                height: 76px;
                background: #ffffff;
                border-radius: 4px;
                overflow: hidden;
                margin: 30px 0 0 0;
                float: right;
                border-top: 1px solid #aaaaaa;
            }

            #service-feature ul {
                padding: 0;
                margin: 0;
                height: 100%;
                list-style: none;
            }

            #service-feature ul li {
                height: 100%;
                width: 130px;
                float: right;
                line-height: 75px;
                padding: 0 5px;
                transform: scale(.9);
                font-size: 9pt;
            }

            #service-feature ul li span {
                width: 25px;
                height: 25px;
                display: inline-block;
                background: url(<?= URL ?>public/images/slices.png) no-repeat;
                vertical-align: middle;
                margin-left: 4px;
            }

        </style>
        <div id="service-feature">
            <ul>
                <li>
                    <a href="#">
                        <span style="background-position: -210px -473px;"></span>
                        7 روز ضمانت بازگشت
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span style="background-position: -263px -473px"></span>
                        پرداخت در محل
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span style="background-position: -157px -473px;"></span>
                        ضمانت اصل بودن کالا
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span style="background-position: -313px -473px; width: 37px; !important;"></span>
                        تحویل اکسپرس
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span style="background-position: -103px -473px"></span>
                        تضمین بهترین کیفیت
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>

    $('.colors ul li:first-child span').addClass('active');

    $('#selected').click(function () {
        let ulTag = $('ul', this);
        ulTag.slideToggle(400);
    });

    $('#selected ul li').click(function () {
        guarantee = $(this).attr('data-id');
        let txt = $(this).text();
        $('#selected span').text(txt);
    });

</script>