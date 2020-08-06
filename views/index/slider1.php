<style>
    #slider{
        height: 310px;
        margin-top: 10px;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .3);
        overflow: hidden;
        background: #ffffff;
        position: relative;
    }

    #slider a{
        display: none;
    }

    #slider-img{
        height: 260px;
    }

    #slider-img img{
        height: 260px;
        width: 100%;
    }

    #slider-navigator{
        height: 50px;
        width: 100%;
        background: rgba(0, 0, 0, .4);
    }

    #slider #prev{
        width: 19px;
        height: 33px;
        display: block;
        position: absolute;
        top: 133px;
        right: 15px;
        background: url(<?= URL ?>public/images/arrow_slider.png) no-repeat;
        background-position:0 -33px;
        cursor: pointer;
        z-index: 2;
    }
    #slider #next{
        width: 19px;
        height: 33px;
        display: block;
        position: absolute;
        top: 123px;
        left: 15px;
        background: url(<?= URL ?>public/images/arrow_slider.png) no-repeat;
        cursor: pointer;
        z-index: 2;
    }

    #slider #slider-navigator ul{
        height: 100%;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    #slider #slider-navigator ul li{
        width: 174px;
        height: 100%;
        display: block;
        float: right;
        position: relative;
    }
    #slider #slider-navigator ul li a{
        display: inline-block;
        width: 100%;
        height: 100%;
        text-align: center;
        color: #ffffff;
        line-height: 48px;
    }

    #slider #slider-navigator .active > a{
        background: #ffffff;
        color: #000000;
    }

    #slider #slider-navigator .active > a::before{
        content: " ";
        position: absolute;
        top: -13px;
        right: 0;
        left: 0;
        margin: 0 auto;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 12.5px 13px 12.5px;
        border-color: transparent transparent #ffffff transparent;
    }

</style>

<div id="slider">
    <span id="prev"></span>
    <span id="next"></span>
    <div id="slider-img">
        <?php
        $slider1 = $data[0];
        foreach ($slider1 as $row){
        ?>
        <a href="<?= $row['link'] ?>" class="item">
            <img src=" <?= URL ?><?= $row['img'] ?>" alt="slider">
        </a>
        <?php
        }
        ?>
    </div>
    <div id="slider-navigator">
        <ul>
            <li>
                <a href="#" class="fontsm">
                    محصولات کالای خواب
                </a>
            </li>
            <li>
                <a href="#" class="fontsm">
                    لوازم جانبی دوربین
                </a>
            </li>
            <li>
                <a href="#" class="fontsm">
                    سری جدید vaio
                </a>
            </li>
            <li>
                <a href="#" class="fontsm">
                    کتب معنوی
                </a>
            </li>
            <li>
                <a href="#" class="fontsm">
                    لوازم خانگی
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    /*Slider 1*/
    var nextSlider = 1;
    function slider(){
        if(nextSlider > $('#slider').find('.item').length){
            nextSlider = 1;
        }
        if(nextSlider < 1){
            nextSlider = $('#slider').find('.item').length;
        }

        $('#slider').find('.item').hide();
        $('#slider').find('.item').eq(nextSlider - 1).fadeIn(100);

        $('#slider').find('#slider-navigator ul li').removeClass('active');
        $('#slider').find('#slider-navigator ul li').eq(nextSlider - 1).addClass('active');
        nextSlider++;
    }

    slider();
    var sliderInterval = setInterval(slider, 5000);

    $('#slider #next').click(function(){
        slider();
    });

    $('#slider #prev').click(function(){
        nextSlider = nextSlider - 2;
        slider();
    });

    function goToSlide(index){
        nextSlider = index;
        slider();
    }

    $('#slider #slider-navigator ul li').hover(function(){
        var index = $(this).index();
        goToSlide(index + 1);
    },function(){

    });
</script>