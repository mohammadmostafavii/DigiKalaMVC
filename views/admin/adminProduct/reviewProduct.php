<?php

require('views/admin/layout.php');
$productInfo = $data['productInfo'];
$reviews = $data['reviews'];
?>
<div class="left">
    <p class="title">
        <a href="#">
            مدیریت نقد و بررسی
        </a>
        <span>
            (
            <?= $productInfo['title']; ?>
            )
        </span>
    </p>

    <a href="<?= URL ?>adminProduct/addReview/<?= $productInfo['id']; ?>"
       class="btn-green">
        افزودن
    </a>
    <a onclick="submitForm()" class="btn-red">حذف</a>
    <form action="<?= URL ?>adminProduct/deleteReview/<?= $productInfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    عنوان
                </th>
                <th>
                    ویرایش
                </th>
                <th>
                    انتخاب
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($reviews as $review) {
                ?>
                <tr>
                    <td style="width: 600px;">
                        <?= $review['title'] ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminProduct/addReview/<?= $review['idProduct']; ?>/<?= $review['id']; ?>">
                            <img src="<?= URL ?>public/images/edit_icon.ico" alt="edit"
                                 style="width: 20px; height: 20px">
                        </a>
                    </td>

                    <td>
                        <input type="checkbox" name="id[]" value="<?= $review['id']; ?>">
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
</div>

