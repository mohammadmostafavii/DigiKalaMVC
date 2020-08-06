<?php
require('views/admin/layout.php');
$attrInfo = $data['attrInfo'];
$attrValues = $data['attrValues'];

?>
<div class="left">
    <p class="title">
        مقادیر پیش فرض ویژگی
        (<?= $attrInfo['title'] ?>)
    </p>

    <form action="<?= URL ?>adminCategory/editAttrVal/<?= $attrInfo['id'] ?>" method="post">
        <?php
        foreach($attrValues as $attrValue) {
            ?>
            <div class="row">مقدار ویژگی :
                <label for="title">
                    <input type="text" name="attrValue-<?= $attrValue['id'] ?>" value="<?= $attrValue['val'] ?>">
                </label>
            </div>
            <?php
        }
        ?>
        <a href="<?= URL ?>adminCategory/addAttrVal/<?= $attrInfo['id'] ?>" class="btn_green" style="width: 170px">افزودن مقدار جدید</a>
        <span class="btn_green" onclick="submitForm()">ویرایش اطلاعات</span>
    </form>

</div>
</div>

<script>
    function submitForm(){
        $('form').submit();
    }
</script>