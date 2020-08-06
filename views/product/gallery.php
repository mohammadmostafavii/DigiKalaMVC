<style>
    .dark{
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .8);
        position: fixed;
        top: 0;
        z-index: 5;
        display: none;
    }

    .product-gallery{
        width: 891px;
        height: 620px;
        background: #FFFFFF;
        position: fixed;
        left: 0;
        right: 0;
        margin: auto;
        top: 10px;
        z-index: 6;
        border-radius: 4px;
        overflow: hidden;
        display: none;
    }

    .product-gallery-header{
        background: #eeeeee;
        width: 100%;
        height: 50px;

    }

    .product-gallery-header .title{
        font-family: yekan;
        font-size: 14pt;
        padding: 7px;
        float: right;
        color: #666666;
    }

    .product-gallery-header .close{
        background: url(<?= URL ?>/public/images/slices.png) no-repeat -134px -123px;
        width: 28px;
        height: 28px;
        display: inline-block;
        border: 1px solid #cccccc;
        border-radius: 100%;
        float: left;
        position: relative;
        top: 9px;
        left: 15px;
        cursor: pointer;
    }

    .product-gallery .right{
        float: right;
        width: 650px;
        height: 100%;
        border-left: 1px solid #cccccc;
    }

    .product-gallery .right img{
        margin:28px 38px 0 0;
        max-width: 100%;
        max-height: 80%;
    }

    .product-gallery .left{
        float: right;
        width: 200px;
        height: 100%;
        overflow-y: auto;
    }

    .product-gallery .left ul{
        padding: 0;
        list-style: none;
    }

    .product-gallery .left ul li{
        border-bottom: 1px solid #cccccc;
        text-align: center;
        height: 140px;
        margin-top: 18px;
        cursor: pointer;
        opacity: .6;
    }

    .product-gallery .left ul li.active{
        opacity: 1;
    }



</style>
<div class="dark"></div>
<div class="product-gallery">
    <div class="product-gallery-header">
        <span class="title"><?= $productInfo['title']; ?></span>
        <span class="close"></span>
    </div>
    <div class="right">
        <img class="mainImage" src="" alt="image">
    </div>
    <div class="left">
        <ul>
            <?php
            $gallery = $data['gallery'];
            foreach($gallery as $row) {
                ?>
                <li data-main-image="<?= URL ?>public/images/products/<?= $row['idProduct']; ?>/gallery/large/<?= $row['img']; ?>">
                    <img src="<?= URL ?>public/images/products/<?= $row['idProduct']; ?>/gallery/small/<?= $row['img']; ?>" alt="image">

                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>

<script>
    var productGallery = $('.product-gallery');
    var productThumbnail = $('.left ul li');

    function showGallery(imgUrl, index){
        var x = productThumbnail.length - 20;
        productThumbnail.removeClass('active');
        productThumbnail.eq(index - x).addClass('active');
        productGallery.find('.mainImage').attr('src', imgUrl);

    }

    productThumbnail.click(function(){
        var index = $(this).index();
        var imgUrl = $(this).attr('data-main-image');
        showGallery(imgUrl, index);
    });

    $('.gallery ul li').click(function(){
        $('.dark').fadeIn(200);
        productGallery.fadeIn(200);
        var index = $(this).index();
        var galleryImgUrl = $(this).attr('data-main-image');
        showGallery(galleryImgUrl, index);
    });

    productGallery.find('.close').click(function(){
        productGallery.fadeOut(200);
        $('.dark').fadeOut(200);
    });


    $(".product-gallery .left").mCustomScrollbar({
        setWidth: false,
        setHeight: false,
        setTop: 0,
        setLeft: 0,
        axis: "y",
        scrollbarPosition: "inside",
        scrollInertia: 950,
        autoDraggerLength: true,
        autoHideScrollbar: true,
        autoExpandScrollbar: true,
        alwaysShowScrollbar: 0,
        snapAmount: null,
        snapOffset: 0,
        mouseWheel: {
            enable: true,
            scrollAmount: "auto",
            axis: "y",
            preventDefault: false,
            deltaFactor: "auto",
            normalizeDelta: false,
            invert: false,
            disableOver: ["select", "option", "keygen", "datalist", "textarea"]
        },
        scrollButtons: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        keyboard: {
            enable: true,
            scrollType: "stepless",
            scrollAmount: "auto"
        },
        contentTouchScroll: 25,
        advanced: {
            autoExpandHorizontalScroll: false,
            autoScrollOnFocus: "input,textarea,select,button,datalist,keygen,a[tabindex],area,object,[contenteditable='true']",
            updateOnContentResize: true,
            updateOnImageLoad: true,
            updateOnSelectorChange: false,
            releaseDraggableSelectors: false
        },
        theme: "3d-dark",

        callbacks: {
            onInit: false,
            onScrollStart: false,
            onScroll: false,
            onTotalScroll: false,
            onTotalScrollBack: false,
            whileScrolling: false,
            onTotalScrollOffset: 0,
            onTotalScrollBackOffset: 0,
            alwaysTriggerOffsets: true,
            onOverflowY: false,
            onOverflowX: false,
            onOverflowYNone: false,
            onOverflowXNone: false
        },
        live: false,
        liveSelector: null

    });
</script>
