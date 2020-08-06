<link href="<?= URL ?>public/slider/jquery.range.css" rel="stylesheet">
<script src="<?= URL ?>public/slider/jquery.range.js"></script>
<style>

    #main {
        width: 1200px;
        margin: 10px auto;
        background: #FFFFFF;
        box-shadow: 0 1px 3px #cccccc;
        margin-bottom: 12px;
        border-radius: 2px;
        overflow: hidden;
    }

    #main::after {
        content: " ";
        clear: both;
        display: block;
    }


    #main > .content_top > .right {
        width: 350px;
        float: right;
        text-align: center;
        margin-left: 20px;
        padding: 30px 10px 20px 10px;
    }

    #main > .content_top > .left {
        width: 800px;
        float: right;
        padding-top: 4px;
    }

    #main > .content_top > .left > .right {
        width: 330px;
        float: right;
    }


    #main > .content_top > .left > .left {
        width: 330px;
        float: right;
    }

    .row {
        width: 100%;
        float: right;
        margin: 24px 25px;
    }

    .title {
        color: rgb(111, 0, 4);
        font-size: 14pt;
        font-weight: normal;
        margin-bottom: 6px !important;
    }

    .product_name {
        display: inline-block;
        margin-top: 15px;
        text-align: center;
        font-size: 11.5pt
    }

    .content_top{
        width: 100%;
        float: right;
        height: max-content;
    }

    .content_bottom{
        width: 1160px;
        margin: auto auto;
        background: #FFFFFF;
        box-shadow: 0 1px 3px #cccccc;
        padding: 0 20px;
        border-radius: 2px;
        overflow: hidden;
    }

    .row2{
        width: 100%;
        float: right;
        margin: 13px 0;
    }
    .review_title{
        color: #555555;
        font-size: 11pt;
        width: 100%;
        display: block;
    }

    .review_input{
        width: 800px!important;
    }

    .content_bottom .right{
        width: 50%;
        float: right;
    }

    .content_bottom .left{
        width: 50%;
        float: right;
    }

    .content_bottom input{
        border: 1px solid #cccccc;
        border-radius: 2px;
        overflow: hidden;
        width: 300px;
        font-family: yekan;
        padding: 4px;
    }

    #body{
        width: 98%;
        border: 1px solid #cccccc;
        border-radius: 2px;
        overflow: hidden;
        font-family: yekan;

    }

    .feature_name{
        font-size: 10.5pt;
        display: inline-block;
        margin-bottom: 20px;
    }

    .btn_green {
        background: #00a710;
        width: 170px;
        height: 40px;
        display: inline-block;
        float: left;
        margin: 5px 20px;
        color: #FFFFFF;
        text-align: center;
        font-size: 10.5pt;
        line-height: 35px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        cursor: pointer;
    }


</style>

<?php
$params = $data['params'];
$productInfo = $data['productInfo'];
$paramsNumber = sizeof($params);
$right = ceil($paramsNumber/2);
$left = $paramsNumber - $right;

$rightParams = array_slice($params, 0, $right);
$leftParams = array_slice($params, $right, $left);

$commentIfo = $data['commentInfo'];
$paramsScore = unserialize($commentIfo['param_score']);


?>
<form action="<?= URL ?>comment/saveComment/<?= $productInfo['id'] ?>" method="post">
<div id="main">

    <div class="content_top">
        <div class="right">
            <img src="<?= URL ?>public/images/products/<?= $productInfo['id'] ?>/product_350.jpg" alt="image">
            <span class="product_name">
            <?= $productInfo['title']; ?>
        </span>
        </div>

        <div class="left">
            <div class="row">
                <h3 class="title">
                    امتیاز شما به این محصول
                </h3>
            </div>
            <div class="right">
                <?php
                foreach($rightParams as $rightParam){

                ?>
                <div class="row">
                    <span class="feature_name"><?php if(isset($rightParam['title'])) echo $rightParam['title']; ?></span>
                    <input class="single-slider" type="hidden" value="<?php if(isset($paramsScore[$rightParam['id']])) echo $paramsScore[$rightParam['id']]; ?>" name="param<?php if(isset($rightParam['id'])) echo $rightParam['id'] ?>">
                </div>
                <?php } ?>
            </div>
            <div class="left">
                <?php
                foreach($leftParams as $leftParam) {
                    ?>
                    <div class="row">
                        <span class="feature_name"><?php if(isset($leftParam['title'])) echo $leftParam['title']; ?></span>
                        <input class="single-slider" type="hidden" value="<?php if(isset($paramsScore[$leftParam['id']])) echo  $paramsScore[$leftParam['id']] ?>" name="param<?php if(isset($leftParam['id'])) echo $leftParam['id'] ?>">
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>

<div class="content_bottom">
    <h4 class="title" style="color: #333333; padding-bottom: 70px;">
        دیگران را با نوشتن نقد، بررسی و نظرات خود، برای انتخاب این محصول راهنمایی کنید.
    </h4>

    <div class="row2">
        <span class="review_title">عنوان نقد و بررسی شما(اجباری)</span>
        <input type="text" class="review_input" name="title" value="<?php if(isset($commentIfo['title'])) echo $commentIfo['title']; ?>">
    </div>

    <div class="row2">
        <div class="right">
            <span class="review_title" style="color: green">نقاط قوت</span>
            <input type="text" name="positive" value="<?php if(isset($commentIfo['positive'])) echo $commentIfo['positive'] ?>">
        </div>
        <div class="left">
            <span class="review_title" style="color: red">نقاط ضعف</span>
            <input type="text" name="negative" value="<?php if(isset($commentIfo['negative'])) echo $commentIfo['negative'] ?>">
        </div>
    </div>

    <div class="row2">
        <span class="review_title">متن نقد و بررسی شما(اجباری)</span>
        <textarea name="body" id="body" cols="30" rows="10"><?php if(isset($commentIfo['body'])) echo $commentIfo['body'] ?></textarea>
    </div>

    <div class="row2">
        <span class="btn_green" onclick="submitForm()">ثبت نظر</span>
    </div>

</div>
</form>


<script>



    function submitForm(){
        $('form').submit();
    }

    $('.single-slider').jRange({
        from: 1,
        to: 5,
        scale: [1, 2, 3, 4, 5],

        snap: true,
// show navigator (labels) on the top of slider
        showLabels : true,

// if you'd like to hide scale which are shown below the slider
        showScale : true,

// amount of increment on each step
        step  : 1,

// this is used to show label on the pointer
// %s is replaced by its value, e.g., "%s days", "%s goats"
        format: '%s',

// "theme-blue", "theme-green"
// You can also add more themes
        theme : 'theme-green',

// width of the range slider
        width : 300,

// Called whenever the value is changed by user.
// This same value is also automatically set for the provided Hidden Input.
// For single slider value is without comma, however for a range selector value is comma-seperated.
        nstatechange : function(){}
    });
</script>
