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


    <div id="main" style="width: 1200px; margin: 10px auto;">

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

            .btn_gray {
                background: #5a5b5b;
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

            .head {
                width: 100%;
                float: right;
            }

            .head .select_address {
                font-size: 14.5pt;
                margin: 30px 20px;
                float: right;
            }

            .head .btn_gray {
                float: left;
            }

            .content {
                float: right;
                width: 100%;
            }

            table {
                width: 98%;
                height: 140px;
                margin: auto;
                margin-bottom: 30px;
            }

            table td {
                border-left: 1px solid #cccccc;
                border-bottom: 1px solid #cccccc;
            }

            table .circle {
                width: 19px;
                height: 19px;
                border: 1px solid #cccccc;
                border-radius: 100%;
                display: inline-block;
                position: relative;
                right: 13px;
            }

            .content .receiver {
                font-size: 13pt;
                padding: 3px 20px 5px 5px;
                float: right;
            }

            .content .edit {
                background: #57f5f5 !important;
                width: 100%;
                position: relative;
                cursor: pointer;
                border: 0 !important;
            }

            .content .edit i {
                display: inline-block;
                background: url(<?= URL ?>public/images/slices.png) no-repeat -812px -446px;
                width: 19px;
                height: 19px;
                position: absolute;
                top: 27px;
                right: 7px;
            }

            .content .remove {
                background: #ff7a94 !important;
                width: 100%;
                position: relative;
                cursor: pointer;
                border: 0 !important;
            }

            .content .remove i {
                display: inline-block;
                background: url(<?= URL ?>public/images/slices.png) no-repeat -813px -510px;
                width: 19px;
                height: 19px;
                position: absolute;
                top: 31px;
                right: 7px;
            }

            table tbody tr:first-child td:first-child {
                width: 50px;
                border-top: 1px solid #ccc;
                border-right: 1px solid #ccc;
            }

            table tbody tr:first-child td {
                border-top: 1px solid #ccc;
            }

            .content table.active {
                border: 1px solid #00ff01;
            }

            table.active tr:first-child td:first-child {
                border-left: 1px solid #00ff01;
                background: #f7fff7;
                position: relative;
            }

            table.active .circle {
                background: #2396f3;
                border: none;
                position: relative;
                right: 14px;
                top: 4px;
            }

            table.active .circle::after {
                content: " ";
                width: 5px;
                height: 5px;
                background: #FFFFFF;
                border-radius: 100%;
                display: inline-block;
                position: absolute;
                top: 7px;
                right: 7px;
            }

            table.active .triangle {
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 38px 38px 0;
                border-color: transparent #2dbf00 transparent transparent;
                position: absolute;
                top: 0;
                right: 0;
            }

        </style>

        <div class="head">
            <span class="select_address">انتخاب آدرس</span>
            <span class="btn_gray add_new_address" onclick="addNewAddress()"
                  style="cursor:pointer;">افزودن آدرس جدید</span>
        </div>

        <div class="content">
            <?php
            $addresses = $data['addresses'];
            $first = 1;
            foreach ($addresses as $address) {
                ?>
                <table data-addressId="<?= $address['id']; ?>" data-city="<?= $address['city']; ?>" cellspacing="0"
                       class="table_address <?php if ($first == 1) echo 'active' ?>">
                    <tr>
                        <td rowspan="3" onclick="selectedAddress(this)">
                            <span class="circle"></span>
                            <span class="triangle"></span>
                        </td>
                        <td colspan="3">
                            <span class="receiver"><?= $address['fullName']; ?></span>
                        </td>
                        <td rowspan="3" style="width: 40px; padding: 0; margin: 0">
                            <table cellspacing="0" style="width: 100%; height: 138px; margin: 0;">
                                <tr onclick="editAddress(<?= $address['id']; ?>)">
                                    <td class="edit">
                                        <i></i>
                                    </td>
                                </tr>
                                <tr onclick="deleteAddress(<?= $address['id'] ?>)">
                                    <td class="remove">
                                        <i></i>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="font-size: 10pt;">
                        <td style="width: 200px; text-align: center;">استان: <?= $address['province_name']; ?></td>
                        <td rowspan="2" style="padding: 5px 50px 5px 20px; clear: both">
                            <span><?= $address['postalAddress']; ?></span>
                            <br>
                            <span>کد پستی:<?= $address['postalCode']; ?></span>
                        </td>
                        <td style="width: 200px">
                            شماره تماس اضطراری: <?= $address['mobile']; ?>
                        </td>
                    </tr>
                    <tr style="font-size: 10pt;">
                        <td style="text-align: center;">شهر: <?= $address['city_name']; ?></td>
                        <td>شماره تلفن ثابت: <?= $address['tel']; ?></td>
                    </tr>
                </table>
                <?php
                $first = 0;
            }
            ?>
        </div>

        <div class="head">
            <span class="select_address">شیوه ارسال</span>
        </div>

        <style>
            .send_option table {
                height: 100px !important;
            }

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
        </style>

        <div class="send_option" style="float: right; width: 100%;">
            <?php
            $postTypes = $data['postType'];
            $first = 1;
            foreach ($postTypes as $postType) {
                ?>
                <table data-post-type="<?= $postType['id']; ?>" cellspacing="0" class="table_post_type <?php if($first == 1) echo 'active' ?>">
                    <tr>
                        <td onclick="selectedPostType(this)">
                            <span class="circle" style="right: 14px; top: 4px;"></span>
                            <span class="triangle"></span>
                        </td>
                        <td>
                            <img src="<?= URL ?>public/images/post_48_icon.png" alt="image"
                                 style="float: right; margin: 0 20px;">
                            <div style="float: right">
                                <p style="font-size: 10.5pt; margin: 0">
                                    <?= $postType['title']; ?>
                                </p>
                                <p style="font-size: 9.5pt; color: #5a5b5b; margin: 0;">
                                    <?= $postType['body']; ?>
                                </p>
                            </div>
                        </td>
                        <td style="width: 160px">
                            <p style="margin: 0; text-align: center; color: #00a710;">هزینه ازسال</p>
                            <p style="margin: 0; text-align: center; color: #00a710">
                                <span class="post_price<?= $postType['id']; ?>"></span>
                            </p>
                        </td>
                    </tr>
                </table>
                <?php
                $first = 0;
            }
            ?>
            <a href="showCard3" class="btn_green" style="float: left;">ثبت اطلاعات و ادامه خرید</a>
        </div>
    </div>
    <script>

        function deleteAddress(addressId){
            let url = '<?= URL ?>showCard2/deleteAddress/' + addressId;
            let data = {};
            $.post(url, data, function(msg){
                $('.content table').remove();
                $.each(msg, function(index, value){
                    let tableTag = '<table cellspacing="0" data-addressId = '+ value['id'] +' data-city = '+ value['id'] +' class="table_address"><tr><td rowspan="3" onclick="selectedAddress(this)"><span class="circle"></span><span class="triangle"></span></td><td colspan="3"><span class="receiver">'+ value['fullName'] +'</span></td><td rowspan="3" style="width: 40px; padding: 0; margin: 0"><table cellspacing="0" style="width: 100%; height: 138px; margin: 0;"><tr onclick="editAddress('+ value['id'] +')"><td class="edit"><i></i></td></tr><tr><td class="remove"><i></i></td></tr></table></td></tr><tr style="font-size: 10pt;"><td style="width: 200px; text-align: center;">استان: '+ value['province_name'] +'</td><td rowspan="2" style="padding: 5px 50px 5px 20px; clear: both"><span>'+ value['postalAddress'] +'</span><br><span>کد پستی:'+ value['postalCode'] +'</span></td><td style="width: 200px">شماره تماس اضطراری: '+value['mobile']+'</td></tr><tr style="font-size: 10pt;"><td style="text-align: center;">شهر: '+ value['city_name'] +'</td><td>شماره تلفن ثابت: '+ value['tel'] +'</td></tr></table>';
                    $('.content').append(tableTag);
                });
                selectedAddress(tag);
            }, 'json');
        }

        function getPostPrice() {
            let url = '<?= URL ?>showCard2/getPostPrice/';
            let addressTable = $('.table_address.active');
            let cityId = addressTable.attr('data-city');
            let addressId = addressTable.attr('data-addressId');
            let data = {'cityId': cityId, 'addressId': addressId};
            $.post(url, data, function (msg) {
                let postPricePishtaz = msg['postPricePishtaz'];
                let postPriceSefareshi = msg['postPriceSefareshi'];
                $('.post_price1').html(postPricePishtaz + ' تومان ');
                $('.post_price2').html(postPriceSefareshi + ' تومان ');
            }, 'json');
        }

        function postTypeSession() {
            let url = '<?= URL ?>showCard2/postTypeSession/';
            let postTypeId = $('.table_post_type.active').attr('data-post-type');
            let data = {'postTypeId': postTypeId};
            $.post(url, data, function (msg) {

            });
        }


        getPostPrice();

        function selectedAddress(tag) {
            $('.table_address').removeClass('active');
            $(tag).parents('table').toggleClass('active');
            getPostPrice();
        }

        function selectedPostType(tag) {
            $('.table_post_type').removeClass('active');
            $(tag).parents('table').toggleClass('active');
            postTypeSession();
        }

        let editAddressId = '';

        function editAddress(addressId) {

            editAddressId = addressId;
            let url = '<?= URL ?>showCard2/editAddress/' + addressId;
            let data = {};
            $.post(url, data, function (msg) {
                $('input[name = fullName]').val(msg['fullName']);
                $('input[name = mobile]').val(msg['mobile']);
                $('input[name = tel]').val(msg['tel']);
                $('input[name = postalAddress]').val(msg['postalAddress']);
                $('input[name = postalCode]').val(msg['postalCode']);

                let province = msg['province'];
                $('.province option').each(function (index) {
                    let provinceValue = $(this).val();
                    if (provinceValue === province) {
                        $(this).attr('selected', 'selected');
                        ldMenu(provinceValue, 'city');
                        $('.selectpicker').selectpicker('refresh');
                    }
                });

                let city = msg['city'];
                $('.city option').each(function (index) {
                    let cityValue = $(this).val();
                    if (cityValue === city) {
                        $(this).attr('selected', 'selected');
                        $('.selectpicker').selectpicker('refresh');
                    }
                });

                $('.dark').fadeIn(100);
                $('.add_address').fadeIn(100);
            }, 'json');

        }

    </script>
</main>
<?php
require('addAddress.php');
