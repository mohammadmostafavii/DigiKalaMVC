<?php
require('views/admin/layout.php');

$attrInfo = [];
if (isset($data['attrInfo'])) {
    $attrInfo = $data['attrInfo'];
}
$categoryInfo = $data['categoryInfo'];
$attrId = $data['attrId'];


?>
<div class="left">
    <p class="title">
        افزودن ویژگی جدید
        (
        <span style="color: red;"><?= $categoryInfo['title']; ?></span>
        <?php if (isset($attrInfo['title'])) { ?>
            <span style="color: red"> - <?= $attrInfo['title']; ?></span>
        <?php } ?>
        )
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

    <form action="<?= URL ?>adminCategory/addAttr/<?= $categoryInfo['id']; ?>/<?php if(isset($attrId)) echo $attrId ?>" method="post">
        <div class="row">
            <label for="title">عنوان ویژگی:
                <input type="text" name="title">
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
                    $parentId = $attrId;
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
        <button class="btn-green">اجرای عملیات</button>
    </form>

</div>
</div>