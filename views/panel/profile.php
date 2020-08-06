<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.css">
<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap-select.css">
<script src="<?= URL ?>public/js/bootstrap-select.js"></script>
<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
<script src="<?= URL ?>public/js/frotel/city.js"></script>
<script src="<?= URL ?>public/js/frotel/ostan.js"></script>
<style>

    body {
        background-color: #dddddd;
    }

    #main {
        width: 1100px;
        margin: 10px auto;
        background: #ffffff;
        border-radius: 2px;
        overflow: hidden;
        font-family: yekan;
        box-shadow: 2px 1px 1px rgba(0, 0, 0, .21);
    }

    #main::after {
        content: " ";
        clear: both;
        display: block;
    }


    .w150 {
        width: 150px;
        display: inline-block;
    }

    input[type=text] {
        width: 250px;
        padding: 2px;
        font-family: yekan;
        border: 1px solid #cccccc;
        border-radius: 3px;
        overflow: hidden;
    }

    input[type=radio] {
        margin-left: 20px;
    }

    .row2 {
        float: right;
        width: 90%;
        font-size: 12pt;
        margin: 10px 70px;
    }


    textarea {
        vertical-align: top;
        width: 57%;
        height: 164px;
        border: 1px solid #cccccc;
        font-family: yekan;
    }


    h4 {
        padding: 30px 50px 30px 0;
        font-size: 17pt;
    }

    .line {
        width: 80%;
        border: 1px solid #cccccc;
        margin: 10px auto 30px auto;
    }

    .btn_green {
        background: #00a710;
        width: 170px;
        height: 40px;
        display: inline-block;
        margin: 20px 30px;
        float: left;
        color: #FFFFFF;
        text-align: center;
        font-size: 10.5pt;
        line-height: 35px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        cursor: pointer;
    }

    .picture {
        position: absolute;
        top: 300px;
        left: 171px;
        width: 250px;
        height: 350px;
    }

    .profilePicture {
        border-radius: 50%;
        overflow: hidden;
        border: 1px solid #dddddd;
        width: 250px;
        height: 250px;
    }

    label {
        padding: 10px;
        background: #aaa;
        color: #fff;
        position: relative;
        top: 20px;
        right: 50px;
        font-size: 11pt;
        font-weight: normal;
        border-radius: 4px;
        overflow: hidden;
        cursor: pointer;
        width: 150px;
        height: 24px;
    }

    input[type="file"] {
        opacity: 0;
    }


    .innerSpan {
        margin: 4px 20px 4px 10px;
    }

    select {
        overflow: scroll;
        border: 1px solid #ccc;
        border-radius: 2px;
        overflow: hidden;
    }

</style>
<main>
    <?php
    @$userInfo = $data['userInfo'];
    @$birthDate = $userInfo['birth_date'];
    @$birthDate = explode('/', $birthDate);
    @$year = $birthDate[0];
    @$month = $birthDate[1];
    @$day = $birthDate[2];

    ?>
    <form action="<?= URL ?>panel/profile" method="post" enctype="multipart/form-data">
        <div id="main">
            <h4>اطلاعات پروفایل</h4>
            <div class="line"></div>
            <div class="row2">
                <span class="w150">نام و نام خانوادگی : </span>
                <input type="text" name="fullName"
                       value="<?php if (isset($userInfo['fullName'])) echo $userInfo['fullName'] ?>">
            </div>

            <div class="row2">
                <span class="w150">ایمیل : </span>
                <input type="text" name="email" value="<?php if (isset($userInfo['email'])) echo $userInfo['email'] ?>">
            </div>

            <div class="row2">
                <span class="w150">کد ملی : </span>
                <input type="text" name="nationalCode"
                       value="<?php if (isset($userInfo['national_code'])) echo $userInfo['national_code'] ?>">
            </div>

            <div class="row2">
                <span class="w150">جنسیت : </span>
                <span class="dateSpan" style="margin-right: 0!important;">مرد : </span>
                <input type="radio" name="gender" value="1"
                    <?php
                    if (isset($userInfo['gender']))
                        if ($userInfo['gender'] == 1)
                            echo 'checked';
                    ?>
                >
                <span class="dateSpan" style="margin-right: 0!important;">زن : </span>
                <input type="radio" name="gender" value="2"
                    <?php
                    if (isset($userInfo['gender']))
                        if ($userInfo['gender'] == 2)
                            echo 'checked';
                    ?>
                >
            </div>

            <div class="row2">
                <span class="w150">تلفن ثابت : </span>
                <input type="text" name="tel" value="<?php if (isset($userInfo['tel'])) echo $userInfo['tel'] ?>">
            </div>
            <div class="row2">
                <span class="w150">تلفن همراه : </span>
                <input type="text" name="mobile"
                       value="<?php if (isset($userInfo['mobile'])) echo $userInfo['mobile'] ?>">
            </div>
            <div class="row2">
                <span class="w150">محل سکونت : </span>
                <textarea name="address" id="address" cols=""
                          rows=""><?php if (isset($userInfo['address'])) echo $userInfo['address'] ?></textarea>
            </div>

            <div class="row2">
                <span class="w150">استان/شهر : </span>
                <span class="innerSpan" style="margin-right: 0!important;">استان : </span>
                <select name="province" id="province" class="province" style="overflow: scroll" autocomplete="off">

                </select>
                <span class="innerSpan">شهر : </span>
                <select name="city" id="city" class="city" style="overflow: scroll">
                    <option value="<?php if (isset($userInfo['city'])) echo $userInfo['city'] ?>">انتخاب شهر</option>
                </select>

            </div>

            <div class="row2">
                <span class="w150">تاریخ تولد : </span>
                <span class="innerSpan" style="margin-right: 0!important;">روز : </span>
                <select name="day" id="day">
                    <?php
                    for ($i = 1; $i < 30; $i++) {
                        if ($i == $day)
                            $x = 'selected';
                        else
                            $x = '';
                        ?>
                        <option value="<?= $i ?>" <?= $x ?>><?= $i ?></option>
                    <?php } ?>
                </select>
                <span class="innerSpan">ماه : </span>
                <select name="month" id="month" autocomplete="off">
                    <?php
                    for ($i = 1; $i < 13; $i++) {
                        if ($i == $month)
                            $x = 'selected';
                        else
                            $x = '';
                        ?>
                        <option value="<?= $i ?>" <?= $x ?>><?= $i ?></option>
                        <?php
                    }
                    ?>
                </select>
                <span class="innerSpan">سال : </span>
                <select name="year" id="year" autocomplete="off">
                    <?php
                    for ($i = 1300; $i <= Model::jaliliDate('Y'); $i++) {
                        if ($i == $year)
                            $x = 'selected';
                        else
                            $x = ''
                        ?>
                        <option value="<?= $i ?>" <?= $x ?> ><?= $i ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="picture">
                <img src="<?= URL ?>public/images/users/<?= $userInfo['id'] ?>/user.jpg" alt="image"
                     class="profilePicture">
                <label> عکس خود را انتخاب کنید
                    <input type="file" name="picture">
                </label>
            </div>

            <div class="row2" style="position: relative">
                <span>
                    آیا مایل به دریافت خبرنامه دیجی کالا هستید؟
                </span>
                <style>

                    input.subscribeNews {
                        opacity: 0;
                        position: relative;
                        right: 24px;
                        z-index: 4;
                        width: 40px;
                        height: 35px;
                        top: 15px;
                    }

                    .test::after {
                        content: " ";
                        width: 35px;
                        height: 30px;
                        display: inline-block;
                        background: #eeeeee;
                        border: 1px solid #cccccc;
                        border-radius: 4px;
                        overflow: hidden;
                        position: relative;
                        top: 10px;
                        right: -16px;
                    }

                    .active {
                        display: inline-block;
                        width: 30px;
                        height: 30px;
                        background: url(<?= URL ?>public/images/checkIcon.png) no-repeat;
                        z-index: 3;
                        position: absolute;
                        right: 305px;
                        top: 18px;
                    }

                </style>

                <input type="checkbox" class="subscribeNews" name="subscribeNews" value="1" onclick="checkMe(this)">
                <span class="test"><span class="test2"></span></span>
            </div>

            <span class="btn_green" onclick="submitForm()">ثبت اطلاعات</span>
        </div>

    </form>
</main>
<script>

    function checkMe(tag) {
        if (tag.checked) {
            let divTag = $(tag).parents('.row2');
            let spanTag = divTag.find('.test2').addClass('active');
        } else {
            let divTag = $(tag).parents('.row2');
            let spanTag = divTag.find('.test2').removeClass('active');
        }
    }

    function submitForm() {
        $('form').submit();
    }

    loadOstan('province');
    $('#province').change(function () {
        let i = $(this).find('option:selected').val();
        ldMenu(i, 'city');
    });


    $('.subscribeNews').trigger('click');
</script>

