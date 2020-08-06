<?php
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
        افزودن دسته جدید
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

    <form action="<?= URL ?>adminCategory/addCategory" method="post">
        <div class="row">
            <label for="title">عنوان دسته:
            <input type="text" name="title">
            </label>
        </div>
        <div class="row">
            <label for="parent">دسته والد:
                <select class="selectpicker" name="parent" id="parent">
                    <option value="">
                        انتخاب کنید
                    </option>
                    <?php
                    $categories = $data['adminCategory'];
                    $parentId = $data['parentId'];
                    foreach($categories as $category) {
                        if($category['id'] == $parentId)
                            $x = 'selected';
                        else
                            $x = '';
                        ?>
                        <option value="<?= $category['id'] ?>" <?= $x; ?> >
                            <?= $category['title']; ?>
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