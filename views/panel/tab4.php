<?php

@$comments = $data['comments'];
    ?>
    <table cellspacing="0">
        <thead>
        <tr>
            <td>ردیف</td>
            <td>تاریخ</td>
            <td>نام</td>
            <td>می پسندم</td>
            <td>مشاهده</td>
            <td>ویرایش</td>
            <td>حذف</td>
        </tr>
        </thead>
        <tbody>
        <?php
$i = 1;
foreach ($comments as $comment) {
        ?>
        <tr>
            <td><?= $i ?></td>
            <td><?php if(isset($comment['record_date'])) echo $comment['record_date'] ?></td>
            <td><?php if(isset($comment['product_title'])) echo $comment['product_title'] ?></td>
            <td><?php if(isset($comment['like_count'])) echo $comment['like_count'] ?></td>
            <td>
                <a href="<?= URL ?>product/index/<?php if(isset($comment['product_id'])) echo $comment['product_id'] ?>/nazar#comment<?= $comment['id'] ?>">
                <img src="<?= URL ?>public/images/View.gif" alt="image">
                </a>
            </td>
            <td>
                <a href="<?= URL ?>comment/index/<?php if(isset($comment['product_id'])) echo $comment['product_id'] ?>">
                <img src="<?= URL ?>public/images/Edit.gif" alt="image">
                </a>
            </td>
            <td>
                <img style="cursor: pointer" onclick="deleteComment(<?php if(isset($comment['id'])) echo $comment['id']; ?>, this)" src="<?= URL ?>public/images/Delete.gif" alt="image">
            </td>
        </tr>
    <?php
$i++;
}
        ?>
        </tbody>
    </table>

<script>

    function deleteComment(commentId, tag){

        let imgTag = $(tag);
        let trTag = imgTag.parents('tr');

        let url = "<?= URL ?>panel/deleteComment";
        let data = {commentId:commentId};
        $.post(url, data, function(msg){
            trTag.remove();
        });
    }

</script>