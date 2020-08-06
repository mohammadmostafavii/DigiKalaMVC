<?php
require('views/admin/layout.php');
$attrInfo = $data['attrInfo'];

?>
<div class="left">
    <p class="title">
        افزودن ویژگی پیش فرض جدید برای
        (<?= $attrInfo['title'] ?>)
    </p>

    <form action="<?= URL ?>adminCategory/addAttrVal/<?= $attrInfo['id'] ?>" method="post">
        <?php
        for($i = 0; $i < 5; $i++) {
            ?>
            <div class="row">مقدار ویژگی :
                <label for="title">
                    <input type="text" name="attrValue[]">
                </label>
            </div>
            <?php
        }
        ?>

        <span class="btn_green" onclick="submitForm()">ثبت اطلاعات</span>
    </form>

</div>
</div>

<script>
    function submitForm(){
        $('form').submit();
    }
</script>