<?php

require('views/admin/layout.php');
$categoryInfo = $data['categoryInfo'];
$attrInfo = $data['attrInfo'];
$attr = $data['attr'];

?>
<div class="left">
    <p class="title">
        مدیریت ویژگی ها
        (
        <a style="color: red;" href="<?= URL ?>adminCategory/showAttr/<?= $categoryInfo['id'] ?>">
            <?= $categoryInfo['title']; ?>
        </a>
        <?php
        if(isset($attrInfo['id'])){
        ?>
        <span style="color: red;">
                     - ویژگی :

            <?= $attrInfo['title']; ?>
        </span>
        <?php } ?>
        )
    </p>

    <a href="<?= URL ?>adminCategory/addAttr/<?= $categoryInfo['id']; ?>/<?= $attrInfo['id']; ?>"
       class="btn-green">
        افزودن
    </a>
    <a onclick="submitForm()" class="btn-red">حذف</a>
    <form action="<?= URL ?>adminCategory/deleteAttr/<?= $categoryInfo['id']; ?>/<?= $attrInfo['id']; ?>"
          method="post">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    ردیف
                </th>
                <th style="width: 600px">
                    عنوان زیر ویژگی
                </th>
                <th style="width: 150px">
                    مقادیر پیش فرض
                </th>
                <?php
                if(!isset($attrInfo['id'])){
                ?>
                <th style="width: 150px">
                    مشاهده زیر ویژگی ها
                </th>
                <?php } ?>
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
            foreach ($attr as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
                    <td style="width: 400px;">
                        <?= $row['title'] ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminCategory/attrVal/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/view_icon.png" alt="view">
                        </a>
                    </td>
                    <?php
                    if(!isset($attrInfo['id'])){
                    ?>
                    <td>
                        <a href="<?= URL ?>adminCategory/showAttr/<?= $categoryInfo['id']; ?>/<?= $row['id']; ?>">
                            <img src="<?= URL ?>public/images/view_icon.png" alt="view">
                        </a>
                    </td>
                    <?php } ?>
                    <td>
                        <a href="<?= URL ?>adminCategory/editAttr/<?= $categoryInfo['id']; ?>/<?= $row['parent']; ?>/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/edit_icon.ico" alt="edit"
                                 style="width: 20px; height: 20px">
                        </a>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
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
