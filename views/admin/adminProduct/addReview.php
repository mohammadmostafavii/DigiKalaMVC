<script src="<?= URL ?>public/ckeditor/ckeditor.js"></script>
<?php
require('views/admin/layout.php');
$productInfo = $data['productInfo'];
$reviewInfo = $data['reviewInfo'];
$edit = 0;
if(isset($reviewInfo['title'])){
    $edit = 1;
}

?>
<div class="left">
    <p class="title">
        <?php
        if($edit == 0) {
            ?>
            افزودن نقد و بررسی <?= $productInfo['title']; ?>
            <?php
        }
        else{
            ?>
            ویرایش نقد و بررسی
            <?php
        }
        ?>
    </p>

    <style>
        .btn-green {
            margin-left: 30px;
            width: 130px;
            height: 40px;
            text-align: center;
            line-height: 20px;
            font-size: 11pt;
            color: #FFFFFF;
            font-family: yekan;
        }

    </style>
    <form action="<?= URL ?>adminProduct/addReview/<?= $productInfo['id'] ?>/<?= $reviewInfo['id']; ?>" method="post">
        <div class="row">
            <label for="title">عنوان نقد و بررسی:
                <input type="text" name="title" value="<?= $reviewInfo['title']; ?>">
            </label>
        </div>

        <div class="row">
            <label for="description">توضیحات:
            </label><textarea name="description" id="description" cols="30"
                              rows="10"><?= $reviewInfo['description']; ?></textarea>
            <script>
                CKEDITOR.replace('description', {
                });
            </script>
        </div>
        <button class="btn-green">اجرای عملیات</button>
    </form>

</div>
</div>