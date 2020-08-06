<?php
require('views/admin/layout.php');
$productInfo = $data['productInfo'];
$productAttr = $data['productAttr'];


$edit = 0;
if (isset($productAttr['title'])) {
    $edit = 1;
}

?>
<div class="left">
    <p class="title">
        <?php
        if ($edit == 0) {
            ?>
            افزودن ویژگی محصول :  <?= $productInfo['title']; ?>
            <?php
        } else {
            ?>
            ویرایش ویژگی محصول : <?= $productInfo['title']; ?>
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
    <form action="<?= URL ?>adminProduct/showProductAttr/<?= $productInfo['id'] ?>" method="post">
        <?php
        foreach ($productAttr as $row) {
            ?>
            <div class="row">
                <span class="w200"><?= $row['title'] ?></span>
                    <select class="selectpicker" name="value<?= $row['id'] ?>" id="attrValue" autocomplete="off">
                        <?php
                        $values = $row['values'];
                        foreach ($values as $value) {
                            if($row['attr_value_id'] == $value['id'])
                                $x = 'selected';
                            else
                                $x = '';
                            ?>
                            <option value="<?= $value['id'] ?>" <?php if($x == 'selected') echo 'selected' ?>><?= $value['val']?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <a style="margin-right: 20px" class="btn btn-secondary btn-sm active" href="<?= URL ?>adminCategory/attrVal/<?= $row['id'] ?>">
                        مشاهده مقادیر پیش فرض
                    </a>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </div>
            <?php
        }
        ?>

        <button class="btn-green">اجرای عملیات</button>
    </form>

</div>
</div>