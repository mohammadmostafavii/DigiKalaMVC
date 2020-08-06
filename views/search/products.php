<style>

    #products{
        float: right;
        width: 100%;
    }

    #products .description{
        display: none;
    }
    #products ul{
        list-style: none;
        padding: 0;
        float: right;
        width: 100%;
    }

    #products ul li{
        width: 215px;
        height: 355px;
        float: right;
        border: 1px solid #cccccc;
        margin: 3px;
    }

    #products ul li a{
        width: 100%;
        height: 100%;
        display: block;
        float: right;
        text-align: center;
    }

    #products .colors{
        text-align: center;
        margin: 13px;
    }

    #products .colors span{
        width: 12px;
        height: 12px;
        display: inline-block;
        border: 1px solid #cccccc;
    }

    .stars{
        margin-left: 10px;
        float: left;
    }

    .gray{
        background: url(<?= URL ?>public/images/stars.png) repeat 0 -9px;
        width: 56px;
        height: 9px;
        float: left;
        position: relative;
        margin-top: -4px;
    }

    .red{
        background: url(<?= URL ?>public/images/stars.png) repeat 0 0;
        width: 100%;
        height: 9px;
        float: left;
        position: absolute;
        top: 0;
        left: 0;
    }

    .star-score{
        font-size: 10.5pt;
        position: relative;
        top: -12px;
        left: 7px;
    }

    .product-info{
        padding: 0;
        margin: 0;
        float: left;
        font-size: 10.5pt;
        line-height: 0;
        width: 100%;
        float: right;
    }

    .price-info{
        float: right;
        margin: 10px 16px;
        width: 85%;
    }

    .old-price{
        font-size: 11.5pt;
        color: red;
        text-decoration: line-through;
        width: 50%;
        display: inline-block;
    }

    .new-price{
        font-size: 14pt;
        color: green;
        line-height: 0;
        width: 50%;
        display: inline-block;
    }

    .addCart-image{
        float: right;
        width: 99%;
        text-align: left;
        margin-top: -27px;
    }

    .display1 li{
        width: 100% !important;
    }

    .display1 .right{
        float: right;
        width: 220px;
        text-align: center;
        height: 100%;
        border-left: 1px solid #cccccc;
    }

    .display1 .left{
        width: 620px;
        float: left;
        height: 100%;
    }

    .display1 .left .product-info{
        font-size: 20pt;
        float: right;
        margin-top: 25px;
        display: block;
        width: 100%;
    }

    .display1 .left .description{
        float: right;
        height: 203px;
        display: block !important;
        width: 100%;
        font-size: 10pt;
        margin-top: 30px;
    }

    .display1 .old-price{
        font-size: 14pt;
    }

    .display1 .new-price{
        font-size: 17pt;
    }

    .display1 .stars{
        margin-left: 71px;
    }

    .starsDiv{
        width: 100%;
        float: right;
    }
    .mode1-active{
        background-position: 0 24px;
    }

    .mode2-active{
        background-position: -24px 0;
    }

    .right img{
        padding: 7px 18px;
    }

</style>

<div id="products"  class="display1">
    <ul>

    </ul>
</div>