<?php

$active = 'comment';
require('views/admin/layout.php');

$comment = $data['comment'];

?>
<div class="left">
    <p class="title">
        <a href="#">
            ویرایش نظرات کاربران
        </a>
    </p>

    <form action="<?= URL ?>adminComment/edit/<?= $comment['id'] ?>" method="post">
        <div class="row">
            <span class="w200">عنوان : </span>
            <input type="text" name="title" value="<?php if(isset($comment['title'])) echo $comment['title'] ?>">
        </div>
        <div class="row">
            <span class="w200">نقاط قوت : </span>
            <input type="text" name="positive" value="<?php if(isset($comment['positive'])) echo $comment['positive'] ?>">
        </div>
        <div class="row">
            <span class="w200">نقاط ضعف : </span>
            <input type="text" name="negative" value="<?php if(isset($comment['negative'])) echo $comment['negative'] ?>">
        </div>
        <div class="row">
            <span style="width: 87px; display: inline-block">متن نظر : </span>
            <textarea name="body" id="body" cols="0" rows="0"><?php if(isset($comment['body'])) echo $comment['body'] ?></textarea>
        </div>
        <div class="row">
            <span class="btn_green" onclick="submitForm()">ثبت اطلاعات</span>
        </div>
    </form>
</div>
</div>

