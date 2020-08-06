<style>


    #tabChilds section > div > table {
        width: 100%;
        padding: 15px;
    }

    #tabChilds section > div > table > thead > tr:first-child {
        background: #3f3f3f;
        text-align: center;
        font-size: 12pt;
        color: #FFFFFF;
    }

    #tabChilds section > div > table > tbody > tr {
        background: #eeeeee !important;
        color: #333333 !important;
        text-align: center;
    }


    #tabChilds section > div > table > tbody tr td {
        border-left: 1px solid #cccccc;
        padding: 10px;
        border-bottom: 1px solid #000000;
    }


    .digiBon .digiCode {
        background: #cccccc;
        width: 97%;
        margin: 0 auto;
        height: 80px;
        border: 1px dotted #555555;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
        margin-top: 10px;
    }

    .digiBon .digiCode span {
        font-size: 18px;
        font-weight: normal;
        float: right;
        padding: 19px;
    }

    .digiBon .digiCode input {
        width: 300px;
        height: 28px;
        border: 1px solid #ccc;
        border-radius: 3px;
        overflow: hidden;
        float: right;
        margin: 22px 4px 19px 10px;
    }

    .digiBon .digiCode img {
        position: relative;
        float: right;
        padding: 23px 15px;
    }

    .digiBon .details .sub table {
        width: 100%;
        color: #000000;
        text-align: center;
    }

    .digiBon .details .sub tabel tbody tr {
        background: #eeeeee !important;
    }

    .digiBon .details .sub table thead tr:first-child {
        width: 100%;
        background: #5a5b5b;
        color: #FFFFFF;
        text-align: center;
    }

    .digiCode img{
        cursor: pointer;
    }

</style>

<?php
@$discountCodes = $data['discountCodes'];
?>
<div class="test" style="float: right; width: 100%;">
<div class="digiCode">
    <span>کد دریافت دیجی بن:</span>
    <input type="text" name="codeName" class="codeName">
    <img onclick="saveDiscountCode(this)" src="<?= URL ?>public/images/SaveVoucher.gif" alt="image">
</div>
<table cellspacing="0">
    <thead>
    <tr>
        <td>ردیف</td>
        <td>کد</td>
        <td>شرح</td>
        <td>تاریخ ثبت</td>
        <td>تاریخ انقضا</td>
        <td>اعتبار اولیه</td>
        <td>اعتبار مصرفی</td>
        <td>مانده</td>
        <td>وضعیت</td>
        <td>جزییات</td>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($discountCodes as $discountCode) {
        @$remain_validation = $discountCode['primary_validation'] - $discountCode['used_validation'];
        ?>
        <tr>
            <td>
                <?= $i ?>
            </td>
            <td>
                <?php if (isset($discountCode['id'])) echo $discountCode['id']; ?>
            </td>
            <td>
                <?php if (isset($discountCode['code'])) echo $discountCode['code']; ?>
            </td>
            <td>
                <?php if (isset($discountCode['creation_date'])) echo $discountCode['creation_date'] ?>
            </td>
            <td>
                <?php if (isset($discountCode['expiration_date'])) echo $discountCode['expiration_date'] ?>
            </td>
            <td>
                <?php if (isset($discountCode['primary_validation'])) echo $discountCode['primary_validation'] ?>
            </td>
            <td>
                <?php if (isset($discountCode['used_validation'])) echo $discountCode['used_validation'] ?>
            </td>
            <td>
                <?php if (isset($remain_validation)) echo $remain_validation ?>
            </td>
            <td>
                <?php if(isset($discountCode['status'])) echo $discountCode['status'] ?>
            </td>
            <td>
                <img class="showDetails" onclick="showDetailsTr(this)" style="cursor: pointer; margin-top: 5px;"
                     src="<?= URL ?>public/images/orderdetailsopen.png" alt="image">
            </td>
        </tr>
        <tr class="details" style="display: none;">
            <td colspan="11">
                <div class="sub">
                    <table>
                        <thead>
                        <tr>
                            <td>نام محصول</td>
                            <td>تاریخ</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $orders = $discountCode['order'];
                        foreach ($orders as $order) {
                            ?>
                            <tr>
                                <td>گوشی سامسونگ</td>
                                <td><?php if(isset($order['date'])) echo $order['date']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
        <?php
        $i++;
    }
    ?>
    </tbody>
</table>
</div>
<script>

    function showDetailsTr(imgTag){
        let tag = $(imgTag);
        tag.toggleClass('open');
        if(tag.hasClass('open')){
            tag.attr('src', '<?= URL ?>public/images/orderdetailsclose.png');
        }else{
            tag.attr('src', '<?= URL ?>public/images/orderdetailsopen.png');
        }
        let trParent = tag.parents('tr');
        trParent.next().fadeToggle(100);
    }
    

    function saveDiscountCode(tag){
        let imgTag = $(tag);
        let digiCodeTag = imgTag.parents('.digiCode');
        let inputValue = digiCodeTag.find('input').val();

        $('.test').remove();

        let url = "<?= URL ?>panel/saveDiscountCode";
        let data = {'code':inputValue};
        $.post(url, data, function(msg){
            $('.test').html(msg);
            $('.digiBonLi').trigger('click');
        });
    }



</script>