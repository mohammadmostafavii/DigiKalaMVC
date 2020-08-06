<?php

require('views/admin/layout.php');
$gallery = $data['gallery'];
$productInfo = $data['productInfo'];
?>
<div class="left">
    <p class="title">
        <a href="#">
            مدیریت محصولات
        </a>
    </p>

    <form action="<?= URL ?>adminProduct/addGallery/<?= $productInfo['id'] ?>" method="post"
          enctype="multipart/form-data" id="addGallery">
        <div style="width: 500px">
            <span>انتخاب تصویر:</span>
            <input type="file" name="image" style="margin: 1px 16px 20px 0">
            <a onclick="submitForm3()" class="btn-red" style="float: left; margin-right: 10px">حذف</a>
            <a onclick="submitForm2()" class="btn-green">افزودن</a>
        </div>
    </form>


    <form action="<?= URL ?>adminProduct/deleteGallery/<?= $productInfo['id']; ?>" method="post" id="deleteGallery">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    ردیف
                </th>
                <th style="width: 650px">
                    تصویر
                </th>
                <th>
                    انتخاب
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            foreach ($gallery as $row) {
                ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <img
                                src="<?= URL ?>public/images/products/<?= $productInfo['id'] ?>/gallery/small/<?= $row['img'] ?>"
                                alt="gallery">
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
</div>

<script>
    function submitForm2() {
        $('#addGallery').submit();
    }

    function submitForm3() {
        $('#deleteGallery').submit();
    }
</script>

