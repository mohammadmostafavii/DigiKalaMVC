<?php

$active = 'products';
require('views/admin/layout.php');

?>
<div class="left">
    <p class="title">
        <a href="#">
            مدیریت محصولات
        </a>
    </p>

    <a href="<?= URL ?>adminProduct/addProduct"
       class="btn-green">
        افزودن
    </a>
    <a onclick="submitForm()" class="btn-red">حذف</a>
    <form action="<?= URL ?>adminProduct/deleteProduct" method="post">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    کد
                </th>
                <th>
                    عنوان
                </th>
                <th>
                    قیمت
                </th>
                <th>
                    تخفیف
                </th>
                <th>
                    ویرایش
                </th>
                <th>
                    نقد و بررسی
                </th>
                <th>
                    گالری
                </th>
                <th>
                    ویژگی ها
                </th>
                <th>
                    انتخاب
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $product = $data['adminProduct'];
            foreach ($product as $row) {
                ?>
                <tr>
                    <td>
                        <?= $row['id'] ?>
                    </td>
                    <td style="width: 300px;">
                        <?= $row['title'] ?>
                    </td>
                    <td style="width: 150px;">
                        <?= $row['price'] ?>
                    </td>
                    <td style="width: 80px;">
                        <?= $row['discount'] ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminProduct/addProduct/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/edit_icon.ico" alt="edit"
                                 style="width: 20px; height: 20px">
                        </a>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminProduct/productReviews/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/edit_icon.ico" alt="edit"
                                 style="width: 20px; height: 20px">
                        </a>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminProduct/gallery/<?= $row['id'] ?>">
                            <img src="<?= URL ?>public/images/gallery_icon.png" alt="gallery"
                                 style="width: 20px; height: 20px">
                        </a>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminProduct/showProductAttr/<?= $row['id'] ?>">
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

