<?php
$option = Model::getOption();
?>
<style>
    footer{
        height: 300px;
        width: 100%;
        float: right;
        margin-top: 40px;
    }
    #footer-top{
        height: 45px;
        width: 100%;
        background: #6d717a none scroll 0 0;
    }

    #footer-bottom{
        height: 255px;
        background: #f7f8fa none repeat scroll 0 0;
    }

    #footer-top .main{
        margin: auto;
        height: 100%;
        width: 1200px;
    }

    #footer-top span{
        color: #FFFFFF;
        line-height: 41px;
    }

    .main ul{
        padding: 0;
        margin: 0;
        list-style: none;
        height: 100%;
        float: left;
    }

    .main ul li{
        padding: 0;
        float: right;
        height: 100%;
        line-height: 43px;
        margin-right: 35px;

    }

    .main ul li a{
        font-size: 10.5pt;
        color: #FFFFFF;
        height: 100%;
        float: right;
    }

    #footer-top i{
        width: 17px;
        height: 17px;
        display: block;
        float: left;
        position: relative;
        top: 13px;
        right: 6px;
        background: url(<?= URL ?>public/images/slices.png);
    }

    #footer-bottom-right{
        width: 230px;
        display: inline-block;
        margin: 30px 58px 10px auto;
    }

    #footer-bottom-right ul{
        padding: 0;
        margin: 0;
        list-style: none;
    }

    #footer-bottom-right ul li{
        font-size: 11.5pt;
        color: #5a5b5b;
    }

    #footer-bottom-middle{
        width: 230px;
        display: inline-block;
        margin-right: 40px;
    }

    #footer-bottom-middle ul{
        padding: 0;
        margin: 0;
        list-style: none;
    }

    #footer-bottom-middle ul li{
        font-size: 11.5pt;
        color: #5a5b5b;
    }

    #footer-bottom-left{
        float: left;
        width: 590px;
        height: 100%;
    }

    .footer-email input{
        width: 420px;
        height: 38px;
        border: 1px solid #cccccc;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1) !important;
        padding-right: 13px;
        font-family: yekan;
    }

    .footer-email button{
        width: 110px;
        height: 42px;
        color: #FFFFFF;
        border: 1px solid #cccccc;
        border-radius: 4px;
        overflow: hidden;
        background: #208de6;
    }

    .footer-social img{
        float: left;
        margin: 50px 4px 30px 40px;
    }

    .footer-social-button ul{
        list-style: none;
        float: right;
    }

    .footer-social-button ul li{
        float: right;
        margin:0 4px;
        position: relative;
        top: 42px;
    }

    .footer-social-button ul li span{
        background: url(<?= URL ?>public/images/slices.png);
        width: 30px;
        height: 30px;
        display: block;
    }

</style>

<footer>
    <div id="footer-top">
        <div class="main">
            <span class="yekan fontlg">۷ روز هفته، ۲۴ ساعته پاسخگوی شما هستیم.</span>
            <ul>
                <li>
                    <a href="#">
                        <?= $option['tel'] ?>
                        <i style="background-position: -397px -420px;"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        سوالات متداول
                        <i style="background-position: -358px -420px;"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <?= $option['email'] ?>
                        <i style="background-position: -321px -420px;"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="footer-bottom">
        <div id="footer-bottom-right">
            <ul>
                <li style="color: #000000; font-size: 13pt; margin-bottom: 12px;">راهنمای خرید از دیجی کالا</li>
                <li>ثبت سفارش</li>
                <li>رویه های ارسال سفارش</li>
                <li>شیوه های پرداخت</li>
                <li>معرفی دیجی بن</li>
            </ul>
        </div>
        <div id="footer-bottom-middle">
            <ul>
                <li style="color: #000000; font-size: 13pt; margin-bottom: 12px;">خدمات مشتریان</li>
                <li>پاسخ به پرسش های متداول</li>
                <li>رویه های بازگرداندن کالا</li>
                <li>شرایط استفاده</li>
                <li>حریم خصوصی</li>
            </ul>
        </div>
        <div id="footer-bottom-left">
            <p class="yekan" style="font-size: 13pt; line-height: 65px">اولین نفری که مطلع می شود، باشید!</p>
            <div class="footer-email">
                <input type="text" placeholder="آدرس ایمیل خود را وارد کنید">
                <button style="font-family: yekan">تایید ایمیل</button>
            </div>

            <div class="footer-social">
                <a href="#">
                    <img src=" <?= URL ?>public/images/ios_app_bg.png" alt="image" style="margin-right: 0;">
                </a>
                <a href="#">
                    <img src=" <?= URL ?>public/images/android_app_bg.png" alt="image" style="margin-left: 6px">
                </a>
                <div class="footer-social-button">
                    <ul>
                        <li>
                            <span style="background-position: -577px -621px"></span>
                        </li>
                        <li>
                            <span style="background-position: -535px -621px;"></span>
                        </li>
                        <li>
                            <span style="background-position: -493px -621px;"></span>
                        </li>
                        <li>
                            <span style="background-position: -451px -621px;"></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>