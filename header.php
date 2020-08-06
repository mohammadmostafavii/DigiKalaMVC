<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>سایت اینترنتی دیجی کالا</title>
    <script src="<?= URL ?>public/js/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?= URL ?>public/js/jquery.flipTimer.js"></script>
    <script src="<?= URL ?>public/js/jquery.elevatezoom.js"></script>
    <script src="<?= URL ?>public/js/scroll/jquery.mCustomScrollbar.js"></script>
    <script src="<?= URL ?>public/js/scroll/jquery.mousewheel.js"></script>
    <link rel="stylesheet" href="<?= URL ?>public/css/flipTimer.css">
    <link rel="stylesheet" href="<?= URL ?>public/js/scroll/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/flipTimer.css">

    <style>
        @font-face {
            font-family: 'yekan';
            src: url('<?= URL ?>public/fonts/yekan.ttf') format("truetype"),
            url("<?= URL ?>public/fonts/yekan.eot") format("embedded-opentype");
        }

        body {
            margin: 0;
            background: #<?= body_color ?>;
            font-family: yekan;
        }

        div, p, span, a, li {
            text-align: right;
            direction: rtl;
        }

        a {
            text-decoration: none;
            color: #000000;
        }

        .yekan {
            font-family: yekan;
        }

        .fontsm {
            font-size: 10.3pt;
        }

        .fontmd {
            font-size: 11.3pt;
        }

        .fontlg {
            font-size: 12.3pt;
        }

        #header {
            width: 1200px;
            height: 100px;
            margin: 0 auto;
            padding-top: 13px;
        }

        #header-right {
            float: right;
            width: 720px;
            height: 100%;
        }

        .lock {
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url(<?= URL ?>public/images/lock.png);
            margin-left: 5px;
        }

        #basket-top {
            width: 190px;
            height: 40px;
            float: right;
        }

        #basket-top-right {
            height: 100%;
            width: 54px;
            background: #00d901 url(<?= URL ?>public/images/basket.png) no-repeat center;
            float: right;
        }

        .signup {
            display: inline-block;
            width: 20px;
            height: 20px;
            background: url(<?= URL ?>public/images/signup.png);
            margin-right: 15px;
        }

        #basket-top-left {
            height: 100%;
            width: 176px;
            background: #009a01;
        }

        .number {
            display: inline-block;
            background: #eeeeee;
            width: 25px;
            height: 25px;
            text-align: center;
            margin-top: 7px;
            border-radius: 100%;
            line-height: 23px;
        }

        #search-top {
            height: 40px;
            width: 510px;
            float: left;
        }

        .header-input {
            width: 500px;
            border: 1px solid #cccccc;
            height: 33px;
            margin-top: 3px;
            padding-right: 10px;
            color: #5a5b5b;
        }

        .search-icon {
            display: block;
            width: 42px;
            height: 37px;
            background: url(<?=URL?>public/images/search.png) no-repeat center #ccc;
            position: absolute;
            top: 46px;
            right: 753px;
        }

    </style>
</head>
<body>
<header style="background: #ffffff;">
    <div id="header">
        <div id="header-right">
            <div id="header-right-top">
                <span class="lock"></span>
                <a href="<?= URL ?>login" class="fontsm">فروشگاه اینترنتی دیجی کالا، وارد شوید</a>
                <span class="signup"></span>
                <a href="<?= URL ?>register" class="fontsm">ثبت نام کنید</a>
            </div>
            <div id="header-right-bottom">
                <div id="basket-top">
                    <div id="basket-top-right"></div>
                    <div id="basket-top-left">
                        <span class="fontsm" style="color: #ffffff; padding: 0 8px;">سبد خرید</span>
                        <span class="fontsm number">0</span>
                    </div>
                </div>
                <div id="search-top">
                    <input type="text" class="yekan fontsm header-input"
                           placeholder="محصول، دسته یا برند مورد نظر خود را سرچ کنید...">
                    <span class="search-icon"></span>
                </div>
            </div>
        </div>
        <div id="header-left" style="float: left;">
            <a href="">
                <img src=" <?= URL ?>public/images/logo.png" alt="logo">
            </a>
        </div>
    </div>
</header>

<style>

    nav {
        width: 100%;
        height: 40%;
        background: #<?= menu_color ?>;
        border: 1px solid #eeeeee;
        box-shadow: 0 2px 3px #888888;
        box-shadow: 1px 3px 4px #cccccc;
    }

    #menu-bar > ul > li {
        list-style: none;
        display: block;
        height: 40px;
        float: right;
    }

    #menu-bar > ul {
        margin: 0;
    }

    #menu-bar > ul > li > a {
        padding: 0 20px;
        height: 40px;
        display: inline-block;
        line-height: 35px;
    }

    .menu-narrow-down {
        display: inline-block;
        width: 7px;
        height: 4px;
        margin-right: 8px;
    }

    #menu-bar > ul {
        position: relative;
        padding: 0;
    }

    #menu-bar > ul > li > ul {
        position: absolute;
        right: 0;
        top: 41px;
        background: #ffffff;
        padding: 0;
        width: 1200px;
        box-shadow: 0 1px 2px #888888;
        list-style: none;
        display: none;
    }

    #menu-bar > ul > li > ul > li {
        float: right;
    }

    #menu-bar > ul > li > ul > li > a {
        padding: 5px 25px;
        display: inline-block;
    }

    .menu-bar-top3 {
        width: 299px;
        height: 100%;
        border-left: 1px solid #eeeeee;
        float: right;
    }

    .menu-bar-top3 > ul {
        padding: 0;
    }

    .menu-bar-top3 > ul > li {
        list-style: none;
        padding-right: 20px;
    }

    .menu-bar-top3 > ul > li:first-child {
        padding-right: 5px;
        color: #3cb8c7;
    }

    .submenu3 {
        display: none;
        z-index: 3;
        position: relative;
        top: 36px;
    }

    .activemenu {
        background: #ffffff;
        box-shadow: 0 -1px 3px #cccccc;
    }

    .activemenu > a {
        color: #ff3c2d;
    }

    #menu-bar a {
        cursor: pointer;
    }


</style>

<nav>
    <div id="menu-bar" style="width: 1200px; height: 40px; margin: auto;">
        <ul>
            <li data-timer="1">
                <a href="#" class="yekan fontsm">
                    کالای دیجیتال
                    <span class="menu-narrow-down" style="background: url(<?= URL ?>public/images/down.png)"></span>
                </a>
                <ul>
                    <li>
                        <a href="#" class="fontsm yekan">موبایل</a>
                        <div class="submenu3"
                             style="width: 1200px; height: 300px; background: #ffffff; border-top: 1px solid #eeeeee; position: absolute; right: 0;">
                            <div class="menu-bar-top3 yekan fontsm">
                                <ul>
                                    <li data-timer="3">گوشی موبایل</li>
                                    <li>اپل</li>
                                    <li>سامسونگ</li>
                                    <li>هوآوی</li>
                                    <li>شیائومی</li>
                                    <li>آنر</li>
                                    <li>نوکیا</li>
                                </ul>
                            </div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <img src=" <?= URL ?>public/images/mobile.png" alt="mobile" width="379" height="335"
                                 style="position: absolute; left: 2px; bottom: 2px;">
                        </div>
                    </li>
                    <li data-timer="4">
                        <a href="#" class="fontsm yekan">تبلت وکتابخوان</a>
                        <div class="submenu3"
                             style="width: 1200px; height: 300px; background: #ffffff; border-top: 1px solid #eeeeee; position: absolute; right: 0;">
                            <div class="menu-bar-top3 yekan fontsm">
                                <ul>
                                    <li data-timer="3">تبلت</li>
                                    <li>Apple</li>
                                    <li>Samsung</li>
                                </ul>
                            </div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <img src=" <?= URL ?>public/images/tablet-ebook-reader.png" alt="mobile" width="379"
                                 height="335" style="position: absolute; left: 2px; bottom: 2px;">
                        </div>
                    </li>
                    <li data-timer="5">
                        <a href="#" class="fontsm yekan">لپ تاپ</a>
                    </li>
                </ul>
            </li>
            <li data-timer="2">
                <a href="#" class="yekan fontsm">
                    لوازم خانگی
                    <span class="menu-narrow-down" style="background: url(<?= URL ?>public/images/down.png)"></span>
                </a>
                <ul>
                    <li data-timer="6">
                        <a href="#" class="fontsm yekan">صوتی و تصویری</a>
                        <div class="submenu3"
                             style="width: 1200px; height: 300px; background: #ffffff; border-top: 1px solid #eeeeee; position: absolute; right: 0;">
                            <div class="menu-bar-top3 yekan fontsm">
                                <ul>
                                    <li data-timer="3">گوشی موبایل</li>
                                    <li>Apple</li>
                                    <li>Samsung</li>
                                </ul>
                            </div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <img src="<?= URL ?>public/images/mobile.png" alt="mobile" width="379" height="335"
                                 style="position: absolute; left: 2px; bottom: 2px;">
                        </div>
                    </li>
                    <li data-timer="7">
                        <a href="#" class="fontsm yekan">لوازم خانگی برقی</a>
                        <div class="submenu3"
                             style="width: 1200px; height: 300px; background: #ffffff; border-top: 1px solid #eeeeee; position: absolute; right: 0;">
                            <div class="menu-bar-top3 yekan fontsm">
                                <ul>
                                    <li data-timer="3">تلویزیون</li>
                                    <li>کوچکتر از 32 اینچ</li>
                                    <li>32 اینچ تا 42 اینچ</li>
                                </ul>
                            </div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <div class="menu-bar-top3"></div>
                            <img src=" <?= URL ?>public/images/video-audio-entertainment.png" alt="mobile" width="379"
                                 height="335" style="position: absolute; left: 2px; bottom: 2px;">
                        </div>
                    </li>
                    <li data-timer="8">
                        <a href="#" class="fontsm yekan">آشپزخانه</a>
                    </li>
                    <li data-timer="8">
                        <a href="#" class="fontsm yekan">سرو و پذیرایی</a>
                    </li>
                    <li data-timer="8">
                        <a href="#" class="fontsm yekan">دکوراتیو</a>
                    </li>
                    <li data-timer="8">
                        <a href="#" class="fontsm yekan">فرش دستبافت</a>
                    </li>
                    <li data-timer="8">
                        <a href="#" class="fontsm yekan">خواب و حمام</a>
                    </li>
                    <li data-timer="8">
                        <a href="#" class="fontsm yekan">شستشو و نظافت</a>
                    </li>
                </ul>
            </li>
            <li data-timer="9">
                <a href="#" class="yekan fontsm">
                    زیبایی و سلامت
                    <span class="menu-narrow-down" style="background: url(<?= URL ?>public/images/down.png)"></span>
                </a>
            </li>
            <li data-timer="10">
                <a href="#" class="yekan fontsm">
                    فرهنگ و هنر
                    <span class="menu-narrow-down" style="background: url(<?= URL ?>public/images/down.png)"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<script>
    var timer = {};
    $("#menu-bar li").hover(function () {
        var tag = $(this);
        var timerAttr = tag.attr("data-timer");
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $(' > ul', tag).fadeIn(0);
            tag.addClass('activemenu');
            $(' > .submenu3', tag).fadeIn(0);
        }, 500);
    }, function () {
        var tag = $(this);
        var timerAttr = tag.attr("data-timer");
        clearTimeout(timer[timerAttr]);
        timer[timerAttr] = setTimeout(function () {
            $(' > ul', tag).fadeOut(0);
            tag.removeClass('activemenu');
            $(' > .submenu3', tag).fadeOut(0);
        }, 600);
    });
</script>
