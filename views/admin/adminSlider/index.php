<?php

require('views/admin/layout.php');
$slider = $data['slider'];
?>
<style>
    .sliderImg {
        width: 300px;
    }

    input {
        position: static !important;
        float: left !important;
    }

    input[type=file]{
        margin: 1px 16px 3px 0!important;
    }

    .sliderFeature{
        float: right;
        margin-bottom: 20px!important;
    }

    .links{
        margin-left: -163px;
        margin-top: 111px;
    }

</style>

<div class="left">
    <p class="title">
        <a href="#">
            مدیریت اسلایدشو
        </a>
    </p>

    <form action="<?= URL ?>adminSlider/addSlider" method="post" enctype="multipart/form-data" id="addSlider">
        <div style="width: 480px" class="sliderFeature">
            <div class="row">
                <span>انتخاب تصویر:</span>
                <input type="file" name="image">
            </div>
            <div class="row">
                <span>عنوان خود را وارد کنید: </span>
                <input type="text" name="title">
            </div>
            <div class="row" style="margin-bottom: 20px">
                <span>لینک خود را وارد کنید: </span>
                <input type="text" name="link">
            </div>
            <div class="links">
            <a onclick="submitForm3()" class="btn-red" style="float: left; margin-right: 10px">حذف</a>
            <a onclick="submitForm2()" class="btn-green">افزودن</a>
            </div>
        </div>
    </form>


    <form action="<?= URL ?>adminSlider/deleteSlider" method="post" id="deleteSlider">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    ردیف
                </th>
                <th>
                    عنوان
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
            foreach ($slider as $row) {
                ?>
                <tr>
                    <td>
                        <?= $i; ?>
                    </td>
                    <td>
                        <?= $row['title']; ?>
                    </td>
                    <td>
                        <img class="sliderImg" src="<?= URL ?><?= $row['img'] ?>" alt="slider">
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
        $('#addSlider').submit();
    }

    function submitForm3() {
        $('#deleteSlider').submit();
    }
</script>

