<?php

$active = 'comment';
require('views/admin/layout.php');

$comments = $data['comments'];

?>

<style>
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
        width: 105px !important;
        text-align: left !important;
        float: left !important;
        margin-bottom: 7px !important;
        margin-right: 10px !important;
    }
</style>
<div class="left">
    <p class="title">
        <a href="#">
            مدیریت نظرات کاربران
        </a>
    </p>


    <select class="selectpicker" name="action" id="action">
        <option value="1">تائید</option>
        <option value="2">عدم تائید</option>
        <option value="3">حذف</option>
    </select>
    <a onclick="submitMultiForm()" class="btn btn-success btn-sm pull-left" style="margin-top: 2px!important;">اجرای عملیات</a>
    <form action="" method="post">
        <table class="list" cellspacing="0">
            <thead>
            <tr>
                <th>
                    کد
                </th>
                <th>
                    تاریخ
                </th>
                <th>
                    عنوان
                </th>
                <th>
                    نقاط قوت
                </th>
                <th>
                    نقاط ضعف
                </th>
                <th>
                    وضعیت
                </th>
                <th>
                    جزئیات
                </th>
                <th>
                    انتخاب
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($comments as $comment) {
                ?>
                <tr>
                    <td>
                        <?= $comment['id'] ?>
                    </td>
                    <td style="width: 100px;">
                        <?= $comment['record_date'] ?>
                    </td>
                    <td style="width: 200px;">
                        <?= $comment['title'] ?>
                    </td>
                    <td>
                        <?= $comment['positive'] ?>
                    </td>
                    <td>
                        <?= $comment['negative'] ?>
                    </td>
                    <td>
                        <?php
                        if ($comment['confirm'] == 1)
                            echo 'تائید شده';
                        else
                            echo 'تائید نشده';
                        ?>
                    </td>
                    <td>
                        <a href="<?= URL ?>adminComment/show/<?= $comment['id'] ?>">
                            <img src="<?= URL ?>public/images/edit_icon.ico" alt="edit"
                                 style="width: 20px; height: 20px">
                        </a>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $comment['id'] ?>">
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>
</div>

<script>
    function submitMultiForm() {
        let value = $('#action option:selected').val();
        let form = $('form');
        let action = '';

        if (value === '1') {
            action = '<?= URL ?>adminComment/confirm';
        } else if (value === '2') {
            action = '<?= URL ?>adminComment/unConfirm';
        } else if (value === '3') {
            action = '<?= URL ?>adminComment/delete'
        }

        form.attr('action', action);
        form.submit();
    }
</script>

