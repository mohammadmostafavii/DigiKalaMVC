<style>

    #tab3 {
        padding: 30px 50px;
        width: 1100px
    }

    .title-1 {
        font-family: yekan;
        font-size: 21pt;
        margin: 0;
        color: #6f6f6f;
        font-weight: 600;
    }

    .title-2 {
        font-family: yekan;
        font-size: 12pt;
        margin: 0;
        color: #6f6f6f;
    }

    .comments-result {
        width: 535px;
        height: 240px;
        background: #fcfcfc;
        margin-top: 40px;
        margin-left: 30px;
        border-radius: 4px;
        overflow: hidden;
        float: right;
        padding: 35px 30px;
        position: relative;
    }

    .comments-result-row {
        margin-top: 10px;
    }

    .comments-result-row:first-child {
        margin-top: 0;
    }

    .comments-result-row > span {
        color: #666666;
        font-size: 11pt;
        vertical-align: center;
        line-height: 36px;
        position: relative;
    }

    .comments-result-row ul {
        padding: 0;
        list-style: none;
        float: left;
        width: 260px;
        height: 6px;
        position: relative;
    }

    .comments-result-row ul li {
        float: right;
        border-right: 1px solid #ffffff;
        width: 51px;
        height: 100%;
        background: #eeeeee;
    }

    .comments-result-row ul li span {
        background: #00bfd6;
        width: 100%;
        height: 100%;
        display: block;
        float: right;
    }

    .comments-send {
        margin-top: 20px;
        float: right;
        width: 470px;
        height: 330px;
    }

    .comments-send-button {
        width: 250px;
        height: 60px;
        display: inline-block;
        border-right: 4px;
        color: #ffffff;
        background: #7a7a7a;
        text-align: center;
        line-height: 54px;
        font-size: 13pt;
        font-weight: 600;
        border-radius: 5px;
        overflow: hidden;
        margin: 20px 216px 0 0;
        cursor: pointer;
    }

    .comments-send-button-inner {
        width: 70px;
        height: 100%;
        background: #969696;
        float: right;
        display: block;
        border-top-left-radius: 20px 50%;
        border-bottom-left-radius: 20px 50%;
    }

    .comments {
        margin-top: 80px;
        float: right;

    }

    .user-vision {
        position: relative;
        color: #777777;
        margin-right: 18px;
    }

    .user-vision::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 5.5px 6px 5.5px 0;
        border-color: transparent #007bff transparent transparent;
        position: absolute;
        top: 12px;
        right: -15px;
    }

    .horizontal-row-2 {
        float: right;
        width: 1100px;
        height: 1px;
        background: #eeeeee;
    }

    .comment {
        float: right;
        width: 1040px;
        height: 415px;
        box-shadow: 0 0px 1px rgba(0, 0, 0, 0.1);
        margin-top: 25px;
        border: 1px solid #eeeeee;
        padding: 60px 30px;
        border-radius: 4px;
        overflow: hidden;
        background: #fcfcfc;
    }

    .comment .right {
        width: 350px;
        height: 100%;
        float: right;
    }

    .comment .right .buyer {
        width: 274px;
        height: 45px;
        border: 1px solid #dddddd;
        background: #ffffff;
        box-shadow: 0 1px 0 rgba(0, 0, 0, .1);
        position: relative;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 50px;
    }

    .comment .right .buyer img {
        width: 24px;
        height: 24px;
        position: absolute;
        top: 8px;
        right: 18px;
    }

    .comment .right .buyer span {
        float: right;
        margin: 5px 48px 0 0;
        color: #444444;
    }

    .comment .right .color {
        width: 18px;
        height: 18px;
        background: crimson;
        display: block;
        float: right;
        border-radius: 6px;
        overflow: hidden;
    }

    .comment .right .color-name {
        float: right;
        margin: -8px 10px 0 0;
        color: #555;
        font-size: 11.3pt;
    }

    .comment .right .Ok {
        width: 265px;
        height: 45px;
        background: #f1feff;
        border-radius: 4px;
        overflow: hidden;
        border: 1px solid #389ba9;
        color: #389ba9;
        position: relative;
        cursor: pointer;
        margin-top: 36px;
    }

    .comment .right .Ok img {
        width: 22px;
        height: 22px;
        position: absolute;
        right: 12px;
        top: 8px;
    }

    .comment .right .Ok span {
        margin: 5px 44px 0 0;
        float: right;
    }

    .comment .left {
        width: 680px;
        height: 100%;
        float: right;
    }

    .comment .left .title {
        color: #333333;
        font-size: 18pt;
        margin: 0;
        width: 100%;

    }

    .comment .left .date {
        color: #777777;
        font-size: 12.5pt;
        margin-top: 10px;
    }

    .left .middle ul {
        float: right;
        list-style: none;
        margin-top: 48px;
    }

    .left .middle .good ul li:before {
        content: "\2022";
        color: #00bfd6;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: 1px;
    }

    .left .middle .good span {
        float: right;
        margin-top: 46px;
        color: #00bfd6;
    }

    .left .middle .bad ul li:before {
        content: "\2022";
        color: #ff637d;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: 1px;
    }

    .left .middle .bad span {
        float: right;
        margin-top: 46px;
        color: #ff637d;
    }

    .bottom {
        float: right;
        position: relative;
        width: 100%;
    }

    .left .bottom i {
        background: #ffffff;
        border: 1px solid #dddddd;
        width: 60px;
        height: 30px;
        border-radius: 4px;
        overflow: hidden;
        display: inline-block;
        text-align: center;
        color: #666666;
        float: left;
        margin-left: 10px;
        cursor: pointer;
    }

    .comment_body {
        width: 100%;
        height: 110px;
        padding-top: 10px;
    }


</style>

<p class="title-1">امتیاز کاربران به:</p>
<p class="title-2">گوشی موبایل نوکیا مدل 3.2 دو سیم کارت با ظرفیت 64 گیگابایت|۳/ ۵(۱۰۸ نفر)</p>
<div class="comments-result">

    <?php
    @$commentsParamNames = $data[0];
    @$commentsParamScores = $data[2];
    foreach ($commentsParamNames as $paramName) {
        $score = $commentsParamScores[$paramName['id']];
        $liCount = 0;
        $intPart = floor($score);
        $floatPart = $score - $intPart;
        $liCount = $intPart;
        ?>

        <div class="comments-result-row">
            <span><?php if (isset($paramName['title'])) echo $paramName['title']; ?></span>
            <ul>
                <?php
                for ($i = 0; $i < $intPart; $i++) {
                    ?>
                    <li><span></span></li>
                    <?php
                }
                ?>
                <?php
                if ($floatPart != 0) {
                    $liCount++;
                    ?>
                    <li><span style="width: <?= $floatPart * 100 ?>%;"></span></li>
                    <?php
                }
                ?>
                <?php
                for ($i = 0; $i < 5 - $liCount; $i++) {
                    ?>
                    <li></li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <?php
    }
    ?>

</div>
<div class="comments-send">
    <p style="font-size: 16pt; color: #555555;">شما هم می‌توانید در مورد این کالا نظر بدهید.</p>
    <p style="font-size: 12pt; color: #777777;">برای ثبت نظر، لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را
        قبلا از دیجی‌کالا خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.</p>
    <a href="<?= URL ?>comment/index" class="comments-send-button">
                            <span class="comments-send-button-inner"><img src="<?= URL ?>public/images/addComment.png"
                                                                          alt="image" width="35px" height="35px"
                                                                          style="margin: 12px 10px;"></span> افزودن نظر جدید
                        </a>
</div>

<div class="comments">
    <p class="user-vision">نطرات کاربران</p>
    <div class="horizontal-row-2"></div>
    <?php
    @$comments = $data[1];
    foreach ($comments as $comment) {
        ?>
        <div class="comment" id="comment<?= $comment['id'] ?>">
            <div class="right">
                <div class="buyer">
                    <img src="<?= URL ?>public/images/basket-2.png" alt="image">
                    <span>خریدار این محصول</span>
                </div>
                <p style="color: #555555; margin-bottom: 5px;">رنگ خریداری شده:</p>
                <span class="color"></span>
                <span class="color-name">زرشکی</span>
                <p style="margin-top: 43px; color: #555555">خریداری شده از:</p>
                <img src="<?= URL ?>public/images/shopStore.svg" alt="image" width="25px" height="28px"
                     style="float: right; margin-top: -13px;">
                <a href="#" style="float: right; margin: -13px 10px 0 0; color: #3cb8c7;">بازرگانی ستاره</a>
                <p style="color: #555555; margin-top: 58px">قیمت خرید:</p>
                <p style="margin-top: -15px; color: #555555">۲۵۵,۰۰۰ تومان</p>

                <div class="Ok">
                    <img src="<?= URL ?>public/images/well-done-icon.jpg" alt="image">
                    <span>خرید این محصول را توصیه میکن</span>
                </div>

            </div>

            <div class="left">
                <div class="top" style="float: right;">
                    <p class="title"><?php if (isset($comment['title'])) echo $comment['title']; ?></p>
                    <p class="date">توسط کاشف توانگران
                        در <?php if (isset($comment['record_date'])) echo $comment['record_date']; ?></p>
                </div>
                <div class="horizontal-row-2" style="width: 693px; height: 2px;"></div>
                <div class="middle" style="float: right; margin-top: 20px;">
                    <div class="good" style="float: right">
                        <span>نقاط قوت</span>
                        <ul>
                            <?php if (isset($comment['positive'])) echo $comment['positive'] ?>
                        </ul>
                    </div>
                    <div class="bad" style="float: right; margin-right: 80px">
                        <span>نقاط ضعف</span>
                        <ul>
                            <?php if (isset($comment['negative'])) echo $comment['negative']; ?>
                        </ul>
                    </div>
                </div>
                <div class="bottom">
                    <p class="comment_body"> <?php if (isset($comment['body'])) echo $comment['body']; ?> </p>

                    <i class="like"><?php if (isset($comment['like_count'])) echo $comment['like_count']; ?> بله</i>
                    <i class="dislike"><?php if (isset($comment['dislike_count'])) echo $comment['dislike_count']; ?>
                        خیر</i>
                    <span style="float: left; margin-left: 25px;">آیا این نظر برایتان مفید بود؟</span>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</div>