<?php
require('views/admin/layout.php');
$attrInfo = $data['attrInfo'];

?>
<div class="left">
    <p class="title">
        ویرایش ویژگی
    </p>

    <style>
        .btn-green{
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

    <form action="<?= URL ?>adminCategory/editAttr/<?= $attrInfo['categoryId']; ?>/<?= $attrInfo['parent']; ?>/<?= $attrInfo['id'] ?>" method="post">
        <div class="row">
            <label for="title">عنوان ویژگی:
                <input type="text" name="title" value="<?= $attrInfo['title'] ?>">
            </label>
        </div>
        <div class="row">
            <label for="parent">ویژگی والد:
                <select class="selectpicker" name="parent" class="parent" autocomplete="off">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $attrs = $data['attrs'];
                    $parentId = $attrInfo['parent'];
                    foreach ($attrs as $attr) {
                        if ($attr['id'] == $parentId)
                            $x = 'selected';
                        else
                            $x = '';
                        ?>
                        <option value="<?= $attr['id'] ?>" <?= $x; ?>>
                            <?= $attr['title']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </label>
        </div>
        <input type="hidden" name="id" value="<?= $attrInfo['id'] ?>">
        <button class="btn-green">اجرای عملیات</button>
    </form>

</div>
</div>