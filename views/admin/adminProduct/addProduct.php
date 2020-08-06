<script src="<?= URL ?>public/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?= URL ?>public/css/bootstrap.css">
<script src="<?= URL ?>public/js/bootstrap.min.js"></script>

<?php
require('views/admin/layout.php');
$productInfo = $data['productInfo'];
$edit = 0;
if (isset($productInfo['title'])) {
    $edit = 1;
}

?>
<div class="left">
    <p class="title">
        <?php
        if ($edit == 0) {
            ?>
            افزودن محصول جدید
            <?php
        } else {
            ?>
            ویرایش محصول
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

        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 303px;
            margin-right: 55px;
            margin-top: 10px;
        }

        #guaranteeSelect {
            position: static;
            margin-right: 45px;
            width: 200px;
        }

        .productImage {
            width: 150px;
            height: 150px;
            position: absolute;
            top: 0;
            left: 0;
        }

    </style>
    <form action="<?= URL ?>adminProduct/addProduct/<?php if (isset($productInfo['id'])) echo $productInfo['id']; ?>"
          method="post" enctype="multipart/form-data">
        <div class="row">
            <label for="title">عنوان محصول:
                <input type="text" name="title"
                       value="<?php if (isset($productInfo['title'])) echo $productInfo['title']; ?>">
            </label>
        </div>
        <div class="row">
            <label for="category">دسته محصول:
                <select class="bootstrap-select" name="category" autocomplete="off">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $categories = $data['categories'];
                    foreach ($categories as $category) {
                        if ($productInfo['category'] == $category['id'])
                            $x = 'selected';
                        else
                            $x = '';
                        ?>
                        <option value="<?php if (isset($category['id'])) echo $category['id'] ?>" <?= $x; ?>>
                            <?php if (isset($category['title'])) echo $category['title']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </label>
        </div>
        <div class="row">
            <label for="price">قیمت:
                <input type="text" name="price"
                       value="<?php if (isset($productInfo['price'])) echo $productInfo['price']; ?>">
            </label>
        </div>

        <div class="row">
            <label for="image">انتخاب تصویر:
                <input type="file" name="image" value="">
            </label>
        </div>

        <div class="row">
            <label for="introduction">معرفی اجمالی:
            </label><textarea name="introduction" id="introduction" cols="30"
                              rows="10"><?php if (isset($productInfo['introduction'])) echo $productInfo['introduction']; ?></textarea>
            <script>
                CKEDITOR.replace('introduction', {});
            </script>
        </div>

        <div class="row">
            <label for="remain">تعداد موجود:
                <input type="text" name="remain"
                       value="<?php if (isset($productInfo['remain'])) echo $productInfo['remain']; ?>">
            </label>
        </div>

        <div class="row">
            <label for="discount">میزان تخفیف(%):
                <input type="text" name="discount"
                       value="<?php if (isset($productInfo['discount'])) echo $productInfo['discount']; ?>">
            </label>
        </div>

        <div class="row">
            <label for="color" style="position: static;">انتخاب رنگ
                <select name="color" style="position: static; margin-right: 68px;"
                        autocomplete="off">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $colors = $data['colors'];
                    foreach ($colors as $color) {
                        ?>
                        <option value="<?= $color['id'] ?>"
                                onclick="addColor('<?= $color['title'] ?>', this, '<?= $color['id'] ?>','<?= $color['hex'] ?>')">
                            <?= $color['title']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </label>
            <?php
            $colorsInfo = $productInfo['colorsInfo'];
            $colorsInfo = array_filter($colorsInfo);
            foreach ($colorsInfo as $item) {
                ?>
                <span style="background: <?= $item['hex']; ?>" class="span_item"><input type="hidden"
                                                                                        value="<?= $item['id']; ?>"
                                                                                        name="color[]"><?= $item['title']; ?>
            <img src="<?= URL ?>public/images/close-icon.gif" class="adminClose" onclick="removeItem(this);"></span>
                <?php
            }
            ?>
        </div>

        <div class="row">
            <label for="guarantee" style="position: static;">انتخاب گارانتی:
                <select name="guarantee" id="guaranteeSelect" autocomplete="off">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $guarantees = $data['guarantees'];
                    $guarantees = $data['guarantees'];
                    foreach ($guarantees as $guarantee) {
                        ?>
                        <option value="<?= $guarantee['id'] ?>"
                                onclick="addGuarantee('<?php echo $guarantee['title']; ?>', this, '<?php echo $guarantee['id']; ?>')">
                            <?= $guarantee['title']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </label>
            <?php
            $guaranteesInfo = $productInfo['guaranteesInfo'];
            $guaranteesInfo = array_filter($guaranteesInfo);
            foreach ($guaranteesInfo as $item) {
                ?>
                <span class="span_item" style="width: 150px;"><input type="hidden" value="<?= $item['id'] ?>"
                                                                     name="guarantee[]"><?= $item['title']; ?><img
                            src="<?= URL ?>public/images/close-icon.gif" class="adminClose" onclick="removeItem(this);"></span>
                <?php
            }
            ?>
        </div>

        <?php
        if (isset($productInfo['id'])) {
            ?>
            <img src="<?= URL ?>public/images/products/<?= $productInfo['id'] ?>/product_220.jpg" class="productImage">
        <?php } ?>
        <button class="btn-green">اجرای عملیات</button>
    </form>

</div>
</div>

<script>

    function addColor(colorName, tag, colorId, colorCode) {
        alert('hei');
        let optionTag = $(tag);
        let spanTag = '<span style = "background: ' + colorCode + '" class="span_item"><input type = "hidden" value="' + colorId + '" name="color[]">' + colorName + '' +
            '<img src="<?=URL?>public/images/close-icon.gif" class="adminClose" onclick="removeItem(this);"></span>';
        let rowTag = optionTag.parents('.row');
        rowTag.append(spanTag);
    }

    function removeItem(tag) {
        let parentTag = $(tag).parents('.span_item');
        parentTag.remove();
    }

    function addGuarantee(guaranteeName, tag, guaranteeId) {
        alert('hei');
        let optionTag = $(tag);
        let spanTag = '<span class="span_item" style = "width: 150px;"><input type = "hidden" value="' + guaranteeId + '" name="guarantee[]">' + guaranteeName + '<img src="<?= URL ?>public/images/close-icon.gif" class="adminClose" onclick="removeItem(this);"></span>';
        let rowTag = optionTag.parents('.row');
        rowTag.append(spanTag);
    }

</script>