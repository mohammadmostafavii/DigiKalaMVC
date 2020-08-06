<style>

    #slider2 {
        width: 890px;
        height: 304px;
        background: #ffffff;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
        position: relative;
        font-family: yekan;
    }

    #slider2_navigator {
        width: 190px;
        background: #cccccc;
        float: left;
        border-right: 1px solid #cccccc;
        height: 100%;
    }

    #slider2_content {
        background: url(<?= URL ?>public/images/slider2_bg.jpg);
        float: right;
        height: 100%;
        width: 699px;
    }

    #slider2 #slider2_navigator ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #slider2 #slider2_navigator ul li {
        text-align: center;
        line-height: 43px;
        cursor: pointer;
        height: 44px;
    }

    #slider2 #slider2_content a {
        display: block;
        float: right;
    }

    #slider2 #slider2_content .slider2_content_left {
        float: left;
        width: 290px;
        height: 100%;
    }

    #slider2 #slider2_content .slider2_content_right {
        float: right;
        width: 379px;
        height: 274px;
        padding: 20px 30px 0 0;
    }

    #slider2 #slider2_content .slider2_content_left .title {
        font-size: 15pt;
        text-align: center;
    }

    #slider2 #slider2_content .slider2_content_left img {
        margin-right: 38px;
    }

    #slider2 #slider2_content .slider2_content_right .title {
        font-size: 11pt;
        color: red;
        font-weight: bold;
    }

    .price_info {
        height: 35px;
        margin-bottom: 15px;
    }

    .price_info .price_info_right {
        width: 75px;
        height: 100%;
        background: #cccccc;
        text-align: center;
        font-family: Arial, serif;
        line-height: 34px;
        float: right;
        color: #ffffff;
        font-size: 15pt;
        position: relative;
    }

    .price_info .price_info_right:before {
        content: "";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 12px 8px 0;
        border-color: transparent #cccccc transparent transparent;
        position: absolute;
        left: -10px;
        top: 8px;
        z-index: 2;
    }

    .price_info .price_info_right:after {
        content: "";
        display: block;
        position: absolute;
        top: 17px;
        right: 8px;
        width: 80%;
        border-bottom: 1px solid #555;
        transform: rotate(-25deg);
    }

    .price_info .price_info_left {
        width: 165px;
        height: 100%;
        background: red;
        text-align: center;
        font-family: Arial, serif;
        line-height: 34px;
        float: right;
        color: #ffffff;
        font-size: 15pt;
        margin-right: 2px;
        position: relative;
        border-radius: 2px;
    }

    .price_info .price_info_left:before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 12px 8px 0;
        border-color: transparent #ffffff transparent transparent;
        position: absolute;
        top: 8px;
        right: 0;
        border-radius: 2px;
    }

    .slider2_content_right .feature p {
        margin: 0;
        font-size: 10.5pt;
    }

    .flipTimer, .flipTimer div {
        direction: ltr !important;
    }

    .flipTimer {
        transform: scale(.4);
        position: absolute;
        top: 193px;
        right: -110px;
    }

    .slider2_finished {
        width: 699px;
        height: 100%;
        position: absolute;
        background: rgba(0, 0, 0, .1);
        color: red;
        font-size: 33pt;
        z-index: 2;
        text-align: center;
        line-height: 260px;
        display: none;
    }

    #slider2_navigator .active {
        background: red;
        color: #ffffff;
        position: relative;
    }

    #slider2_navigator .active:after {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 22px 0 22px 18px;
        border-color: transparent transparent transparent #ff0000;
        position: absolute;
        top: 0;
        right: -18px;
        z-index: 3;
    }


</style>
<div id="slider2">
    <div class="flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>

    <div class="slider2_finished">
        تمام شد!
    </div>

    <div id="slider2_navigator">
        <ul>
            <?php
            $slider2 = $data[1];
            foreach ($slider2 as $row) {
                ?>
                <li>
                    <?= $row['title'] ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div id="slider2_content">
        <?php
        foreach ($slider2 as $row) {
            ?>
            <a href="<?= URL ?>product/index/<?= $row['id'] ?>" class="item">
                <div class="slider2_content_right">
                    <p class="title">جشنواره ماه نو</p>

                    <div class="price_info">
                        <div class="price_info_right">
                            <?= $row['price']; ?>
                        </div>
                        <div class="price_info_left">
                            <?= $row['final_price']; ?> <span style="font-size: 12.5pt;float: left; margin: -1px -16px 0 18px;">تومان</span>
                        </div>
                    </div>
                    <div class="feature">
                        <p>نوع: اصل</p>
                        <p>جنس بدنه: خوب</p>
                        <p>ساخت: ژاپن</p>
                    </div>

                </div>
                <div class="slider2_content_left">
                    <p class="title">
                        <?= $row['title'] ?>
                    </p>
                    <img src="<?= URL ?>public/images/products/<?= $row['id'] ?>/product_220.jpg" alt="image">
                </div>
            </a>
            <?php
        }
        ?>
    </div>

</div>

<script>

    $('.flipTimer').flipTimer({
        direction: 'down',
        // date: 'December 15,2019 03:39:30',
        date: "<?= $data[2] ?>",
        callback: function () {
            $('#slider2_content').css('opacity', .4);
            $('.slider2_finished').fadeIn(0);
        }
    });

    let sliderTag2 = $('#slider2');
    let sliderItems2 = sliderTag2.find('.item');
    let itemsNum2 = sliderItems2.length;
    let sliderNav2 = sliderTag2.find('#slider2_navigator ul li');
    let nextSlide2 = 1;

    function slider2() {
        if (nextSlide2 > itemsNum2) {
            nextSlide2 = 1;
        }

        if (nextSlide2 < 1) {
            nextSlide2 = itemsNum2;
        }

        sliderItems2.fadeOut(0);
        sliderItems2.eq(nextSlide2 - 1).fadeIn(100);
        sliderNav2.removeClass('active');
        sliderNav2.eq(nextSlide2 - 1).addClass('active');
        nextSlide2++;
    }

    slider2();

    let sliderInterval2 = setInterval(slider2, 5000);

    function goToSlide2(index) {
        nextSlide2 = index;
        slider2();
    }

    sliderNav2.click(function () {
        let index = $(this).index();
        goToSlide2(index + 1);
    })

</script>