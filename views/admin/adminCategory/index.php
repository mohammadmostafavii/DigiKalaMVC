<?php

$active = 'category';
require('views/admin/layout.php');

$categoryInfo = [];
if (isset($data['categoryInfo'])) {
    $categoryInfo = $data['categoryInfo'];
}

$categoryParents = [];
if (isset($data['parents'])) {
    $categoryParents = $data['parents'];
    $categoryParents = array_reverse($categoryParents);
}

?>
<div class="left">
    <p class="title">
        مدیریت دسته ها
        (
        <?php
        foreach ($categoryParents as $categoryParent) {
            ?>
            <a href="<?= URL ?>adminCategory/showChildren/<?= $categoryParent['id'] ?>"><?= $categoryParent['title']; ?></a>
            -
            <?php
        }
        ?>
        <a href="<?= URL ?>adminCategory/<?php if (isset($categoryParent['id'])) echo 'showChildren/' . $categoryParent['id']; ?>">
            <?php
            if (isset($categoryInfo['title']))
                echo $categoryInfo['title'];
            else
                echo 'دسته های اصلی'
            ?>
        </a>
        )
    </p>

    <a href="<?= URL ?>adminCategory/addCategory/<?php if (isset($categoryInfo['id'])) echo $categoryInfo['id']; ?>"
       class="btn-green">
        افزودن
    </a>
    <a onclick="submitForm()" class="btn-red">حذف</a>
    <form action="<?= URL ?>adminCategory/deleteCategory/<?php if(isset($categoryInfo['id'])) echo $categoryInfo['id']; ?>" method="post">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    ردیف
                </th>
                <th>
                    عنوان دسته
                </th>
                <th>
                    مشاهده زیردسته ها
                </th>
                <th>
                    مشاهده ویژگی ها
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
            $category = $data['adminCategory'];
            foreach ($category as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
                    <td style="width: 400px;">
                        <?= $row['title'] ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminCategory/showChildren/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/view_icon.png" alt="view">
                        </a>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminCategory/showAttr/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/view_icon.png" alt="view">
                        </a>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminCategory/editCategory/<?= $row['id'] ?>">
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
