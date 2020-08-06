<style>
    #main::after{
        content: " ";
        clear: both;
        display: block;
    }

    #main{
        width: 1200px;
        margin: 10px auto;
        background: #FFFFFF;
        font-family: yekan;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }
</style>

<main>
    <div id="main">

        <style>
            .btn_green {
                background: #00a710;
                width: 170px;
                height: 40px;
                display: inline-block;
                margin: 30px 20px;
                color: #FFFFFF;
                text-align: center;
                font-size: 10.5pt;
                line-height: 35px;
                border-radius: 4px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            }

            .btn_blue {
                background: #208de6;
                width: 170px;
                height: 40px;
                display: inline-block;
                margin: 30px 20px;
                color: #FFFFFF;
                text-align: center;
                font-size: 10.5pt;
                line-height: 35px;
                border-radius: 4px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
            }

            .order-steps{
                height: 150px;
                background: #f4f5f6;
                float: right;
                width: 86.5%;
                padding: 50px 162px 0 0;
                border-radius: 4px;
            }

            .order-steps .order-steps-dash{
                float: right;
                margin: 25px 13px;
            }

            .order-steps .order-steps-dash span{
                width: 15px;
                height: 2px;
                background: blue;
                display: block;
                float: right;
                margin-right: 10px;
            }

            .order-steps ul{
                padding: 0;
                list-style: none;
                float: right;
            }

            .order-steps ul li{
                float: right;
                position: relative;
            }

            .order-steps ul li .circle{
                width: 19px;
                height: 19px;
                border-radius: 100%;
                border: 2px solid #bbbbbb;
                display: block;
                float: right;
            }

            .order-steps ul li.active .circle{
                border: 2px solid #2396f3;
                background: #2396f3 url(<?= URL ?>/public/images/slices.png) no-repeat -810px -476px;
            }

            .order-steps ul li .line{
                width: 160px;
                height: 2px;
                background: #bbbbbb;
                display: block;
                float: right;
                margin: 10px;
            }

            .order-steps ul li.active .line{
                background: #2396f3;
            }

            .order-steps ul li .title{
                position: absolute;
                top: 30px;
                right: -34px;
                width: 150px;
            }

            .order-steps ul li.active .title{
                color: #2396f3;
            }


        </style>

        <div class="order-steps">
            <div class="order-steps-dash">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li>
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                       ورود به دیجی کالا
                    </span>
                </li>
                <li>
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title" style="right: -58px">
                        اطلاعات ارسال سفارش
                    </span>
                </li>
                <li>
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                        بازبینی سفارش
                    </span>
                </li>
                <li>
                    <span class="circle"></span>
                    <span class="title">
                        اطلاعات پرداخت
                    </span>
                </li>
            </ul>
            <div class="order-steps-dash">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <style>

            .content{
                width: 100%;
                float: right;
                margin-top: 50px;
                height: 360px;
            }

            .content .right{
                width: 580px;
                float: right;
                height: 300px;
                text-align: center;
                border-left: 1px solid #cccccc;
            }

            .content .left{
                width: 580px;
                float: right;
                text-align: center;
                height: 300px;
            }

            .content .right i{
                margin: auto;
                width: 48px;
                height: 54px;
                display: inline-block;
                background: url(<?= URL ?>public/images/slices.png) no-repeat -795px -21px;
            }

            .content .left i{
                width: 48px;
                height: 54px;
                display: inline-block;
                background: url(<?= URL ?>public/images/slices.png) no-repeat -795px -90px;
            }

            .content p{
                text-align: center;
                margin: 0;
            }

        </style>

        <div class="content">
            <div class="right">
                <i></i>
                <p style="font-weight: bold;">عضو دیجی کالا هستید؟</p>
                <p style="font-size: 10pt;">برای تکمیل فرایند خود وارد شوید</p>
                <a href="<?= URL ?>login" class="btn_blue">ورود به دیجی کالا</a>
            </div>
            <div class="left">
                <i></i>
                <p style="font-weight: bold;">تازه وارد هستید؟</p>
                <p style="font-size: 10pt;">برای تکمیل فرآیند خرید خود ثبت نام کنید</p>
                <a href="<?= URL ?>register" class="btn_green">ثبت نام در دیجی کالا</a>
                <p style="font-size: 10.5pt;width: 400px; margin: 0 auto;">با عضویت در دیجی کالا تجربه متفاوتی از خرید اینترنتی داشته باشید.وضعیت سفارش خود را پیگیری نموده و سوابق خریدتان را مشاهده کنید.</p>
            </div>
        </div>
    </div>
</main>
