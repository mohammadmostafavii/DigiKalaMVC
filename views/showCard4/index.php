<style>
    #main::after {
        content: " ";
        clear: both;
        display: block;
    }

    #main {
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
            .order-steps {
                height: 150px;
                background: #f4f5f6;
                float: right;
                width: 86.5%;
                padding: 50px 162px 0 0;
                border-radius: 4px;
            }

            .order-steps .order-steps-dash {
                float: right;
                margin: 25px 13px;
            }

            .order-steps .order-steps-dash span {
                width: 15px;
                height: 2px;
                background: blue;
                display: block;
                float: right;
                margin-right: 10px;
            }

            .order-steps ul {
                padding: 0;
                list-style: none;
                float: right;
            }

            .order-steps ul li {
                float: right;
                position: relative;
            }

            .order-steps ul li .circle {
                width: 19px;
                height: 19px;
                border-radius: 100%;
                border: 2px solid #bbbbbb;
                display: block;
                float: right;
                position: relative;
                right: 1px;
                top: -1px;
            }

            .order-steps ul li.active .circle {
                border: 2px solid #2396f3;
                background: #2396f3 url(<?= URL ?>public/images/slices.png) no-repeat -810px -476px;
            }

            .order-steps ul li .line {
                width: 160px;
                height: 2px;
                background: #bbbbbb;
                display: block;
                float: right;
                margin: 10px;
            }

            .order-steps ul li.active .line {
                background: #2396f3;
            }

            .order-steps ul li .title {
                position: absolute;
                top: 30px;
                right: -34px;
                width: 150px;
            }

            .order-steps ul li.active .title {
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
                <li class="active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                       ورود به دیجی کالا
                    </span>
                </li>
                <li class="active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title" style="right: -58px">
                        اطلاعات ارسال سفارش
                    </span>
                </li>
                <li class="active">
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
        <?php if ($Status = $data['Status'] != '') {
            ?>
            <div id="error">
                خطا!
                <?php
                $Status = $data['Status'];
                $ErrorArray = unserialize(zarinPalErrors);
                echo $Error = $ErrorArray[$Status];

                ?>
            </div>
        <?php } ?>
        <style>
            #error {
                float: right;
                width: 95%;
                margin: 10px 15px 10px 5px;
                border: 1px solid red;
                padding: 10px;
                color: red;
                text-align: center;
                font-size: 13pt;
            }

            .head {
                width: 100%;
                float: right;
            }

            .head .select_address {
                font-size: 14.5pt;
                margin: 30px 20px;
                float: right;
            }

            .btn_green {
                background: #00a710;
                width: 130px;
                height: 35px;
                display: inline-block;
                color: #FFFFFF;
                text-align: center;
                font-size: 10.5pt;
                line-height: 35px;
                border-radius: 4px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
                position: relative;
                top: 13px;
                right: 4px;
            }

            .btn_blue {
                background: #208de6;
                width: 130px;
                height: 35px;
                display: inline-block;
                color: #FFFFFF;
                text-align: center;
                font-size: 10.5pt;
                line-height: 35px;
                border-radius: 4px;
                box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
                cursor: pointer;
                position: relative;
                top: 12px;
                right: 4px;
            }

            .discount_code {
                border: 1px solid #cccccc;
                margin: 0 13px 30px 0;
                width: 95%;
                padding: 8px 18px;
                float: right;
            }

            .discount_code .right {
                float: right;
            }

            .discount_code .right p {
                margin: 0 0 3px 0;
            }

            .discount_code .left {
                float: left;
            }

            .discount_code .left input {
                width: 210px;
                height: 31px;
                border: 1px solid #cccccc;
                border-radius: 2px;
                position: relative;
                top: 13px;
            }

        </style>
        <form action="<?= URL ?>showCard4/saveOrder" method="post">
            <div class="head">
                <span class="select_address">کد تخفیف</span>
            </div>

            <div class="discount_code">
                <div class="right">
                    <p style="font-size: 11pt">کد تخفیف دیجی کالا دارم</p>
                    <p style="font-size: 10.5pt">اگر مایل هستید از کد تخفیف دیجی کالا استفاده کنید، کافیست کد آن را وارد
                        کرده و با دکمه انتخاب ثبت مبلغ آن از هزینه قابل پرداخت شما کم شود:</p>
                </div>
                <div class="left">
                    <input type="text" id="code" name="code">
                    <span class="btn_blue" onclick="checkCode()">ثبت کد تخفیف</span>
                </div>
            </div>

            <div class="discount_code">
                <div class="right">
                    <p style="font-size: 11pt">کد هدیه دیجی کالا دارم</p>
                    <p style="font-size: 10.5pt">اگر مایل هستید از کد تخفیف دیجی کالا استفاده کنید، کافیست کد آن را وارد
                        کرده و با دکمه انتخاب ثبت مبلغ آن از هزینه قابل پرداخت شما کم شود:</p>
                </div>
                <div class="left">
                    <input type="text">
                    <span class="btn_green">ثبت کارت هدیه</span>
                </div>
            </div>

            <style>
                .final_payable_price {
                    width: 95%;
                    height: 40px;
                    background: rgba(199, 255, 255, 0.33);
                    font-size: 12.5pt;
                    float: right;
                    margin: 10px;
                    padding: 5px 20px 5px 20px;
                    border: 1px solid #eeeeee;
                    border-radius: 3px;
                }

                .final_payable_price .price {
                    color: #00a710;
                    font-size: 16pt;
                    float: left;
                    margin-left: 15px;
                }

                .final_payable_price .tuman {
                    font-size: 10pt;
                    float: left;
                    color: #00a710;
                    line-height: 40px;
                }


            </style>

            <div class="final_payable_price">
                <span>مبلغ قابل پرداخت</span>
                <span class="tuman">تومان</span>
                <span class="price"></span>
            </div>

            <div class="head" style="float: right;">
                <span class="select_address">شیوه پرداخت</span>
            </div>

            <style>

                .payment {
                    width: 96%;
                    float: right;
                    margin: 5px 20px 50px 1px;
                }

                .payment tr td {
                    border-bottom: 1px solid #cccccc;
                    border-left: 1px solid #cccccc;
                }

                .payment tr td:first-child {
                    width: 50px;
                    height: 120px;
                    border-right: 1px solid #cccccc;
                }

                .payment tr:first-child td {
                    border-top: 1px solid #cccccc;
                }


                .payment p {
                    font-size: 15pt;
                    margin: 0;
                    position: relative;
                    top: -16px;
                    right: 0;
                }

                .payment tr td:last-child {
                    padding: 5px 30px;
                }

                .container {
                    display: inline-block;
                    position: relative;
                    padding-left: 35px;
                    margin: 0 45px 12px 40px;
                    cursor: pointer;
                    font-size: 15px;
                    line-height: 24px;
                }

                .container input {
                    position: absolute;
                    opacity: 0;
                    cursor: pointer;
                }

                .checkmark {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 25px;
                    width: 25px;
                    background-color: #eee;
                    border-radius: 50%;
                }

                .container:hover input ~ .checkmark {
                    background-color: #ccc;
                }

                .container input:checked ~ .checkmark {
                    background-color: #2196F3;
                }

                .checkmark:after {
                    content: "";
                    position: absolute;
                    display: none;
                }

                .container input:checked ~ .checkmark:after {
                    display: block;
                }

                .container .checkmark:after {
                    top: 9px;
                    left: 9px;
                    width: 8px;
                    height: 8px;
                    border-radius: 50%;
                    background: white;
                }

                .green {
                    background-color: rgba(0, 249, 2, 0.61);
                    box-shadow: 2px 2px 3px rgba(0, 249, 2, 0.61);
                }

                .red {
                    background-color: rgba(230, 49, 45, 0.83);
                    box-shadow: 2px 2px 3px rgba(230, 49, 45, 0.83);
                }

                form {
                    float: right;
                    width: 1200px;
                }

            </style>
            <table class="payment" cellspacing="0">
                <tr>
                    <td>
                        <p>پرداخت اینترنتی</p>
                        <label class="container">درگاه پرداخت اینترنتی زرین پال
                            <input type="radio" name="payType" value="1">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">درگاه پرداخت اینترنتی بانک سامان
                            <input type="radio" name="payType" value="2">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">درگاه پرداخت اینترنتی بانک پارسیان
                            <input type="radio" name="payType" value="3">
                            <span class="checkmark"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>پرداخت کارت به کارت</p>
                        <label class="container">شما می توانید وجه سفلرش خود را به صورت انتقال وجه کارت به کارت پرداخت
                            نموده و حاکثر تا 24 ساعت پس از سفارش اطلاعات آن را ثبت نمایید.
                            <input type="radio" name="payType" value="4">
                            <span class="checkmark" style="right: -32px"></span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>واریز به حساب</p>
                        <label class="container">شما می توانید وجه سفارش خود را از طریق مراجعه به شعب بانک به حساب شرکت
                            واریز کرده و تا حداکثر 24 ساعت پس از سفارش اطلاعات آن را ثبت نمایید.
                            <input type="radio" name="payType" value="5">
                            <span class="checkmark" style="right: -32px"></span>
                        </label>
                    </td>
                </tr>
            </table>
            <span onclick="submitForm()" class="btn_green"
                  style="float: left; width: 200px; top: -22px; right: -23px; cursor: pointer;">ثبت اطلاعات و ادامه خرید</span>
        </form>
    </div>
</main>

<script>

    function submitForm() {
        $('form').submit();
    }

    function totalPrice() {
        let url = '<?= URL ?>showCard4/calculateTotalPrice/';
        let code = $('#code').val();
        let data = {'code': code};
        $.post(url, data, function (msg) {
            $('.price').text(msg);
        });
    }

    totalPrice();

    function checkCode() {
        let code = $('#code');
        let codeValue = code.val();
        let url = '<?= URL ?>showCard4/checkCode/' + codeValue;
        let data = {};
        $.post(url, data, function (msg) {
            if (msg[0] != 0) {
                code.addClass('green').removeClass('red');
            } else {
                code.addClass('red').removeClass('green');
            }
            $('.price').html(msg[1]);
        }, 'json');
    }


</script>