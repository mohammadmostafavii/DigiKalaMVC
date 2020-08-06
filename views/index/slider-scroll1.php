<style>
    .sliderScroll{
        height: 310px;
        width: 890px;
        box-shadow: 0 3px 4px rgba(0, 0, 0, .2);
        background: #FFFFFF;
        margin-top: 8px;
        border-radius: 4px;
        overflow: hidden;
    }
    .sliderScroll h3{
        background: #f7f9fa;
        height: 35px;
        width: 100%;
        padding: 10px 15px 0 0;
        font-size: 10pt;
        margin: 0;
    }

    .sliderScroll-content{
        height: 265px;
        width: 100%;
    }

    .sliderScroll-prev, .sliderScroll-next{
        width: 55px;
        height: 100%;
        float: right;
    }

    .sliderScroll-main{
        width: 780px;
        height: 100%;
        float: right;
        overflow: hidden;
    }

    .sliderScroll-prev .prev{
        width: 16px;
        height: 36px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -852px -677px;
        display: block;
        position: relative;
        top: 90px;
        right: 12px;
        cursor: pointer;
    }

    .sliderScroll-next .next{
        width: 16px;
        height: 36px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -812px -677px;
        display: block;
        position: relative;
        top: 90px;
        right: 25px;
        cursor: pointer;
    }

    .sliderScroll-main ul{
        margin: 0;
        padding: 0;
        height: 100%;
        list-style: none;
    }

    .sliderScroll-main ul li{
        padding: 0;
        width: 195px;
        height: 100%;
        float: right;
    }

    .sliderScroll-main ul li a{
        padding: 0;
        width: 100%;
        height: 100%;
        display: block;
        text-align: center;
    }

</style>

<div class="sliderScroll">
    <h3 style="color: #5a5b5b">فقط در دیجی کالا</h3>
    <div class="sliderScroll-content">
        <div class="sliderScroll-prev">
            <span class="prev" onclick="sliderScroll('prev', this);"></span>
        </div>
        <div class="sliderScroll-main">
            <ul>
                <?php
                foreach($data[1] as $row) {
                    ?>
                    <li>
                        <a href="<?= URL ?>product/index/<?= $row['id'] ?>">
                            <img src=" <?= URL ?>public/images/products/<?= $row['id'] ?>/product_220.jpg" alt="image" style="width
150px; height: 155px">
                            <img src=" <?= URL ?>public/images/exclusive-blue.png" alt="image">
                            <p class="yekan" style="font-size: 10pt; padding: 0; margin-top: 10px; text-align: center">
                                <?= $row['title'] ?>
                            </p>
                            <p class="yekan fontsm" style="color: #00d901; text-align: center; padding: 0; margin-top: -9px;">
                                <?= $row['price'] ?> تومان</p>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="sliderScroll-next">
            <span class="next" onclick="sliderScroll('next', this)"></span>
        </div>
    </div>
</div>

<script>

    function sliderScroll(direction, tag){

        var span_tag = $(tag);
        var sliderScrollTag = span_tag.parents('.sliderScroll');
        var sliderScrollUl = sliderScrollTag.find('.sliderScroll-main ul');
        var sliderScrollItems = sliderScrollUl.find('li');
        var sliderScrollItemsNumbers = sliderScrollItems.length;
        var sliderScrollNumbers = Math.ceil(sliderScrollItemsNumbers/4);
        var maxNegativeMargin = -(sliderScrollNumbers - 1) * 780;
        sliderScrollUl.css('width', sliderScrollItemsNumbers * 195);

        var marginRightOld = sliderScrollUl.css('margin-right');
        marginRightOld = parseInt(marginRightOld); // because i want to remove px from number
        var marginRightNew;

        if(direction === 'next'){
            marginRightNew = marginRightOld - 780;
        }

        if(direction === 'prev'){
            marginRightNew = marginRightOld + 780;
        }

        if(marginRightNew < maxNegativeMargin){
            marginRightNew = 0;
        }

        if(marginRightNew > 0){
            marginRightNew = maxNegativeMargin;
        }

        $('.sliderScroll').find('.sliderScroll-main ul').animate({'marginRight' : marginRightNew}, 100);

    }

    $('.next').click(function(){
        sliderScroll('next');
    });

    $('.prev').click(function(){
        sliderScroll('prev');
    });

</script>