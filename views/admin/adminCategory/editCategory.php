<?php
require('views/admin/layout.php');
$categoryInfo = $data['categoryInfo'];
?>
<div class="left">
    <p class="title">
        ویرایش دسته
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

    <form action="<?= URL ?>adminCategory/editCategory" method="post">
        <div class="row">
            <label for="title">عنوان دسته:
                <input type="text" name="title" value="<?= $categoryInfo['title'] ?>">
            </label>
        </div>
        <div class="row">
            <label for="parent">دسته والد:
                <select class="selectpicker" name="parent" id="parent" autocomplete="off">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $categories = $data['adminCategory'];
                    $parentInfo = $data['parentInfo'];
                    foreach($categories as $category) {
                        if($category['id'] == $parentInfo['id'])
                            $x = 'selected';
                        else
                            $x = '';
                        ?>
                        <option value="<?= $category['id']; ?>" <?php $x ?>>
                            <?= $category['title']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </label>
        </div>
        <input type="hidden" name="id" value="<?= $categoryInfo['id'] ?>">
        <button class="btn-green">اجرای عملیات</button>
    </form>

</div>
</div>