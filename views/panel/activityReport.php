<style>
    .box{
        width: 100%;
        border-radius: 4px;
        overflow: hidden;
    }

    .box .header{
        width: 100%;
        height: 40px;
        background: #3f3f3f;
        color: #FFFFFF;
        font-size: 10.5pt;
        padding: 5px 15px 0 0;
        line-height: 35px;
    }

    .box .content{
        background: #FFFFFF;
    }

    .box .content table{
        width: 100%;
        padding: 10px;
    }

    .box .content table tr td{
        padding: 7px;
    }

    .box .content table .title{
        color: darkblue;
        font-size: 10.5pt;
    }

    .box .content table .value{
        color: #000000;
        font-size: 10pt;
    }

</style>
<?php
$stat = $data['stat'];
?>
<div class="box" style="margin-top: 30px">
    <div class="header">
        گزارش عملکرد
    </div>
    <div class="content">
        <table>
            <tr>
                <td>
                    <span class="title">تعداد کل سفارشات:</span>
                    <span class="value">
                        <?= $stat['allOrders'] ?>
                    </span>
                </td>
                <td>
                    <span class="title">تعداد نظرات ارسال شده:</span>
                    <span class="value">
                        <?= $stat['comment']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">سفارشات در انتظار تایید:</span>
                    <span class="value">
                        <?= $stat['awaitingApproval']; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">سفارشات در حال پردازش:</span>
                    <span class="value">
                        <?= $stat['processing']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">تعداد نقدهای ارسال شده:</span>
                    <span class="value">
                        <?= $stat['criticism']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">دیجی بن مانده مصرف شده:</span>
                    <span class="value">0</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">سفارشات ارسال شده:</span>
                    <span class="value">
                        <?= $stat['send'] ?>
                    </span>
                </td>
                <td>
                    <span class="title">تعداد پیغام های خوانده نشده:</span>
                    <span class="value">
                        <?= $stat['message']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">دیجی بن مانده قابل مصرف:</span>
                    <span class="value">0</span>
                </td>
            </tr>
        </table>
    </div>
</div>
