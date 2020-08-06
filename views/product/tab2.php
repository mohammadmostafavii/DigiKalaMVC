<style>

    #tab2 {
        padding: 30px 50px;
        width: 1100px;
    }

    #tab2 .technical-info {
        font-size: 22pt;
        font-weight: 500;
        color: #5a5b5b;
        margin: 0
    }

    #tab2 .product-name {
        font-size: 13pt;
        color: #888888;
        margin: 0
    }

    .hole-info {
        font-size: 13pt;
        color: #666666;
        position: relative;
        margin-right: 15px;
        margin-top: 50px;
        float: right;
    }

    .hole-info::before {
        content: " ";
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 5.5px 6px 5.5px 0;
        border-color: transparent #007bff transparent transparent;
        position: absolute;
        top: 12px;
        right: -15px;
    }

    .row {
        width: 100%;
        height: 45px;
        font-family: yekan;
        float: right;
        margin-top: 10px;
    }

    .row .row-right {
        background: #fafafa;
        width: 249px;
        float: right;
        height: 100%;
        font-size: 12pt;
        color: #777777;
        line-height: 38px;
        padding-right: 15px;
        border-radius: 4px;
        overflow: hidden;
    }

    .row .row-left {
        width: 805px;
        float: right;
        height: 100%;
        background: #fafaff;
        margin-right: 15px;
        font-size: 12pt;
        color: #555555;
        line-height: 38px;
        padding-right: 15px;
        border-radius: 4px;
        overflow: hidden;
    }


</style>

<p class="technical-info">مشخصات فنی</p>
<p class="product-name">Nokia 3.2 Dual SIM 64GB Mobile Phone</p>

<?php
$tab2 = $data[0];
foreach ($tab2 as $row) {
    $children = $row['children'];
    ?>

    <span class="hole-info">
        <?= $row['title'] ?>
    </span>
    <?php
    foreach ($children as $child) {
        ?>
        <div class="row" style="margin-top: 30px!important;">
            <div class="row-right">
                <?= $child['title']; ?>
            </div>
            <div class="row-left">
                <?php
                if($child['attr_value'] == '')
                    echo '-';
                else
                    echo $child['attr_value'];
                ?>
            </div>
        </div>

        <?php
    }
    ?>

    <?php
}
?>