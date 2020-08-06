<style>

    #tab4 {
        padding: 30px 50px;
        width: 1100px;
    }

    .answerAndQuestion {
        font-size: 2rem;
        color: #6f6f6f;
        font-weight: 700;
        margin: 0;
    }

    .enter-question {
        font-size: 1.143rem;
        margin-top: 5px;
        color: #6f6f6f;
        font-weight: 600;
    }

    .enter-questions {
        margin-top: 70px;
        font-size: 1.143rem;
        font-weight: 600;
        color: #515151;
    }

    .question {
        float: right;
        margin-top: 40px;
    }

    .question .right {
        width: 180px;
        height: 185px;
        float: right;
        text-align: center;
        padding-top: 25px;
    }

    .question .right p {
        text-align: center;
        margin: 0;
    }

    .question .right img {
        width: 64px;
        height: 68px;

    }

    .question .left {
        width: 900px;
        height: 220px;
        float: right;
        background: #fcfcfc;
        border: 1px solid #dddddd;
        border-radius: 4px;
        overflow: hidden;
    }

    .send-question{
        width: 225px;
        height: 60px;
        background: #bdbdbd;
        border-radius: 5px;
        overflow: hidden;
        color: #FFFFFF;
        text-align: center;
        display: block;
        font-size: 15pt;
        line-height: 54px;
        float: right;
    }

    #question-place{
        width: 1100px;
        height: 180px;
        border-radius: 5px;
        overflow: hidden;
        background: #f5f5f2;
        border: 1px solid #dddddd;
    }

    .answer{
        padding: 10px;
        background: #cccccc;
        font-size: 11pt;
        float: right;
        margin: 1px 179px 0 0;
        height: fit-content;
        width: 882px;
        border-radius: 4px;
        border: 1px solid #cccccc;
    }


</style>
<p class="answerAndQuestion">پرسش و پاسخ</p>
<p class="enter-question">پرسش خود را در مورد محصول مطرح نمایید</p>
<textarea name="question" id="question-place" cols="30" rows="10"></textarea>
<span class="send-question">ثبت پرسش</span>
<p class="enter-questions">پرسش ها و پاسخ ها</p>
<div class="horizontal-row-2"></div>
<?php
$questions = $data[0];
$answers = $data[1];
foreach($questions as $question) {
    ?>
    <div class="question" style="float: right;">
        <div class="right">
            <img src="<?= URL ?>public/images/question.png" alt="image">
            <p style="color: #7a7a7a;font-size: 1.429rem;">پرسش</p>
            <p style="color: #959595; font-size: .857rem;">ناشناس</p>
            <p style="color: #959595; font-size: .857rem;"><?= $question['date']; ?></p>
        </div>
        <div class="left">
        <p>
            <?= $question['content']; ?>
        </p>
        </div>
        <div class="answer">
            <p style="margin: 0;">پاسخ: </p>
            <?= $answers[$question['id']]['content']; ?>
        </div>
    </div>
    <?php
}
    ?>
