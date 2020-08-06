<style>
    #offer{
        width: 1200px;
        height: 66px;
        background: #fff5f5 url(<?= URL ?>public/images/amazing-offer.png) no-repeat 97% center;
        float: right;
        position: relative;
    }

    .flipTimer, .flipTimer div {
        direction: ltr !important;
    }

    .flipTimer {
        transform: scale(.34);
        position: absolute;
        top: -15px;
        left: -100px;
    }

    .discount_price{
        float: left;
        margin: 20px 0 0 300px;
        border-radius: 4px;
        overflow: hidden;
        color: #ffffff;

    }

    .discount_price .price_offer{
        background: #dd2904;
        padding: 3px 25px 3px 25px;
    }

    .discount_price .discount_offer{
        background: #ff272f;
        position: relative;
        right: -3px;
        padding: 3px 25px 3px 25px;
    }

</style>

<div id="offer">
    <div class="flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>

    <div class="discount_price">
        <span class="price_offer">
            <?= /** @var TYPE_NAME $productInfo */
            $productInfo['price_discount'] ?>
            تومان
        </span>
        <span class="discount_offer">تخفیف</span>
    </div>

</div>

<script>
    $('.flipTimer').flipTimer({
        direction: 'down',
        date: 'December 20,2019 03:39:30',
        //date: "<?//= $data[2] ?>//",
        callback: function () {
            $('#slider2_content').css('opacity', .4);
            $('.slider2_finished').fadeIn(200);
        }
    });
</script>