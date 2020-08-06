<style>
    #sidebar-right{
        width: 290px;
        float: right;
    }

    .sidebar-right-ul{
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .sidebar-right-ul li{
        border-radius: 4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .3);
        overflow: hidden;
        margin-bottom: 5px;
        height: 265px;
    }

    .sidebar-right-ul li img{
        width: 290px;
        height: 265px;
    }

    #sidebar-last-news{
        width: 290px;
        background: #ffffff;
        margin-top: 10px;
    }

    #sidebar-last-news ul li a{
        float: right;
    }

    #sidebar-brands{
        margin-top: 10px;
    }

    #sidebar-brands a{
        display: block;
        width: 140px;
        height: 95px;
        background: #ffffff;
        float: right;
        margin: 0 0 10px 10px;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 2px #cccccc;
    }

    #sidebar-brands a img{
        width: 100%;
        height: 100%;
    }

    #sidebar-brands a:nth-child(even){
        float: left;
        margin-left: 0;
    }



    #sidebar-right > img{
        margin: 10px 0;
        border-radius: 4px;
        box-shadow: 0 2px 4px #aaaaaa;
    }

    #digikal-TV li a{
        position: relative;
    }

    #digikal-TV li a::before{
        position: absolute;
        content: " ";
        display: block;
        width: 100%;
        height: 160px;
        background: rgba(0, 0, 0, .3);
        border-radius: 4px;
        top: -1px;
    }

    #digikal-TV{
        padding: 0;
        margin: 0;
        list-style: none;
    }
    #digikal-TV li .circle{
        transition: all 1s ease;
    }
    #digikal-TV li:hover .circle{
        background: rgba(255, 255, 255, .5) !important;
    }

    #digikal-TV > li{
        margin-bottom: 8px;
    }

    #digikal-TV > li > a{
        display: block;
        position: relative;
    }

    #digikal-TV > li > a > img{
        width: 100%;
        height: 160px;
        border-radius: 4px;
    }

    #digikal-TV > li > a > span{
        width: 70px;
        height: 70px;
        display: block;
        position: absolute;
        top: 40px;
        left: 0;
        right: 0;
        margin: auto;
        border-radius: 50%;
        background: rgba(255, 255, 255, .3);
        text-align: center;
    }

    #digikal-TV > li > a > span > img{
        margin-top: 25px;
    }


    #sidebar-last-news{
        border-radius: 4px;
        overflow: hidden;
        width: 290px;
    }

    #sidebar-last-news h3{
        background: rgba(190,223,249,0.92);
        height: 40px;
        color: #000000;
        line-height: 36px;
        padding-right: 10px;
        margin: 0;
    }

    #sidebar-last-news .col-right{
        float: right;
    }

    #sidebar-last-news .col-right > img{
        border-radius: 50%;
    }

    #sidebar-last-news-ul{
        padding: 0;
        margin: 0;
        list-style: none;
    }

    #sidebar-last-news-ul li:first-child a{
        display: block;
        padding: 15px 8px;
    }

    .news-block{
        float: right;
        width: 190px;
        padding-right: 13px;
    }

    .news-block .date{
        font-size: 8pt;
        color: #829498;
        margin: 0;
    }

    .news-block .news-text{
        margin: 0;
    }


</style>

<div id="sidebar-right">
    <img src=" <?= URL ?>public/images/Euro2016-290.52.jpg" alt="Europ">

    <ul id="digikal-TV">
        <li>
            <a href="#">
                <img src=" <?= URL ?>public/images/TV_100_Innovative_Products.jpg" alt="TV1">
                <span class="circle">
                            <img src=" <?= URL ?>public/images/play.png" alt="play">
                        </span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src=" <?= URL ?>public/images/Motorola_Moto_360_1_Min_Intro.jpg" alt="TV1">
                <span class="circle">
                    <img src=" <?= URL ?>public/images/play.png" alt="play">
                </span>
            </a>
        </li>
    </ul>

    <ul class="sidebar-right-ul">
        <li>
            <a href="#">
                <img src=" <?= URL ?>public/images/li1.jpg" alt="image">
            </a>
        </li>
        <li>
            <a href="#">
                <img src=" <?= URL ?>public/images/li2.jpg" alt="image">
            </a>
        </li>
        <li>
            <a href="#">
                <img src=" <?= URL ?>public/images/li3.jpg" alt="image">
            </a>
        </li>
    </ul>

    <div id="sidebar-last-news">
        <h3 class="fontsm yekan">تازه ترین خبرها</h3>

        <ul id="sidebar-last-news-ul">
            <li>
                <a href="#">
                    <div class="col-right">
                        <img src=" <?= URL ?>public/images/SanDisk_Headquarters_Milpitas-60x60.jpg" alt="image" style="border-radius: 50%;">
                    </div>
                    <div class="col-left news-block">
                        <p class="fontsm yekan news-text">کارت حافظه های 256 گیگابایتی سن دیسک معرفی شدند</p>
                        <p class="yekan date">پنج شنبه 10 تیر 95</p>
                    </div>
                </a>
            </li>

            <li>
                <a href="#" style="display: block; padding: 8px;">
                    <div class="col-right">
                        <img src=" <?= URL ?>public/images/iPhone7-headphone-3-60x60.jpg" alt="image">
                    </div>
                    <div class="col-left news-block">
                        <p class="fontsm yekan news-text">اولین تصاویر از هدفون آیفون 7 با پورت لایتینیگ لو رفت</p>
                        <p class="yekan date">پنج شنبه 10 تیر 95</p>
                    </div>
                </a>
            </li>

            <li>
                <a href="#" style="display: block; padding: 8px;">
                    <div class="col-right">
                        <img src=" <?= URL ?>public/images/iPhone7-headphone-3-60x60.jpg" alt="image">
                    </div>
                    <div class="col-left news-block">
                        <p class="fontsm yekan news-text">اولین تصاویر از هدفون آیفون 7 با پورت لایتینیگ لو رفت</p>
                        <p class="yekan date">پنج شنبه 10 تیر 95</p>
                    </div>
                </a>
            </li>
        </ul>

    </div>

    <div id="sidebar-brands">
        <a href="#">
            <img src=" <?= URL ?>public/images/x.vision.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/lenovo.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/nivea.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/adata.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/d-link.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/oral-b.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/panasonic.png" alt="image">
        </a>
        <a href="#">
            <img src=" <?= URL ?>public/images/asus.png" alt="image">
        </a>
    </div>

</div>