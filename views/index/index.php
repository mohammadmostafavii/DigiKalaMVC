<style>

    #main{
        width: 1200px;
        margin: 10px auto;
    }

    #content{
        width: 890px;
        float: left;
    }


    #main-banner{
        width: 100%;
        height: 138px;
    }


    #main-banner .banner
    {
        box-shadow: 0 2px 4px #aaaaaa;
        border-radius: 5px; width: 100%;
    }
</style>

<main>

    <div id="main">

        <div id="main-banner" >
            <img src=" <?= URL ?>public/images/banner.jpg" alt="banner" class="banner">
        </div>

        <?php
        require ('sidebar-right.php');
        ?>

        <div id="content">

            <?php
            require ('slider1.php');
            require('services-feature.php');
            require ('slider2.php');
            require('slider-scroll1.php');
            require ('direct-access.php');
            require ('slider-scroll2.php');
            require ('slider-scroll3.php');
            ?>

        </div>
    </div>
</main>

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
