<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور خرید</title>
</head>
<body>

<style>

    .border {
        border: 1px solid #cccccc;
    }

    table {
        font-family: Tahoma;
    }

    table {
        direction: rtl;
        font-size: 10.5pt;
    }


    .mainTable {
        margin: 0 auto;
        width: 600px;
        margin-top: 50px;
        border-radius: 4px;
        box-shadow: 1px 3px 1px rgba(0,0,0,.02);
    }

    .border-top {
        border-top: 1px solid #cccccc;
    }

    .border-bottom {
        border-bottom: 1px solid #cccccc;
    }

    .border-right {
        border-right: 1px solid #cccccc;
    }

    .border-left {
        border-left: 1px solid #cccccc;
    }

    p{
        padding-right: 6px;
    }

</style>

<?php
$orderInfo = $data['orderInfo'];
?>

<table class="mainTable border" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 140px">
                        <img src="<?= URL ?>public/images/logo.png" alt="logo" width="110px" height="50px">
                    </td>
                    <td style="text-align: center; font-size: 13pt; font-weight: bold">
                        فروشگاه اینترنتی دیجی کالا
                    </td>
                    <td style="width: 140px; text-align: center">
                        <?php
                        require_once ('public/barcode/BarcodeGenerator.php');
                        require_once ('public/barcode/BarcodeGeneratorHTML.php');
                        require_once('public/barcode/BarcodeGeneratorJPG.php');
                        require_once ('public/barcode/BarcodeGeneratorPNG.php');
                        require_once ('public/barcode/BarcodeGeneratorSVG.php');

                        $gen = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $barcode = $gen->getBarcode($orderInfo['id'], $gen::TYPE_CODE_128);
                        echo '<img src="data:image/png;base64,'.base64_encode($barcode).'" >'

                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td class="border-top border-left" style="width: 350px;">
                        <p>
                            نام گیرنده : <?= $orderInfo['fullName'] ?>
                        </p>
                        <p>
                            آدرس پستی : <?= $orderInfo['postal_address'] ?>
                        </p>
                    </td>
                    <td class="border-top" style="width: 250px;">
                        <p>
                            تلفن همراه:<?= $orderInfo['mobile'] ?>
                        </p>
                        <p>
                            تلفن ثابت: <?= $orderInfo['tel'] ?>
                        </p>
                        <p>
                            کد پستی: <?= $orderInfo['postal_code'] ?>
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <style>
                #product td {
                    border-left: 1px solid #cccccc;
                    border-top: 1px solid #cccccc;
                    border-bottom: 1px solid #cccccc;
                    padding: 12px;
                }

                #product td:last-child {
                    border-left: 0;
                }

                #product td{
                    border-bottom: 0;
                }

                #product th {
                    border-left: 1px solid #cccccc;
                    padding: 12px;
                }

                #product th:last-child {
                    border-left: 0;
                }


            </style>
            <table id="product" cellpadding="0" cellspacing="0" style="width: 100%; text-align: center"
                   class="border-top">
                <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>رنگ</th>
                    <th>گارانتی</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>تخفیف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $basket = unserialize($orderInfo['basket']);
                foreach ($basket as $row) {
                    ?>
                    <tr>
                        <td>
                            <?= $row['title']; ?>
                        </td>
                        <td>
                            <?= $row['colorTitle']; ?>
                        </td>
                        <td>
                            <?= $row['guaranteeTitle']; ?>
                        </td>
                        <td>
                            <?= $row['number']; ?>
                        </td>
                        <td>
                            <?= $row['price'] * $row['number']; ?>
                        </td>
                        <td>
                            <?= (($row['price'] * $row['discount']) / 100) * $row['number']; ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <style>
            .detail td{
                padding: 8px;
            }
        </style>
        <td>
            <table class="detail" cellspacing="0" cellpadding="0" style="width: 100%;">
                <tr>
                    <td class="border-bottom border-left border-top" style="padding: 18px">
                        مبلغ کل پرداختی :<?= number_format($orderInfo['amount']) ?>
                    </td>
                    <td class="border-bottom border-top" style="padding: 18px">
                        شیوه پرداخت : <?= $orderInfo['payTypeTitle'] ?>
                    </td>
                </tr>
                <tr>
                    <td class="border-bottom border-left" style="padding: 18px">
                        شیوه ارسال : <?= $orderInfo['postTypeTitle'] ?>
                    </td>
                    <td class="border-bottom" style="padding: 18px">
                        هزینه ارسال : <?= number_format($orderInfo['post_price']) ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: left; padding: 25px">
            مهر فروشگاه
        </td>
    </tr>
</table>

</body>
</html>