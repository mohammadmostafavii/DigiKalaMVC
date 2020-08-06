<style>

    #search-sidebar{
        width: 250px;
        border: 1px solid #cccccc;
        float: right;
    }

    #search-sidebar h3{
        background: #696972;
        color: #FFFFFF;
        padding: 0 10px 0 0;
        margin: 0;
        font-size: 9.5pt;
        height: 30px;
        line-height: 27px;
    }

    #search-sidebar h3 span{
        background: url(<?= URL ?>public/images/subcatarrow.gif) no-repeat;
        width: 20px;
        height: 10px;
        float: left;
        position: relative;
        top: 11px;
        left: 10px;
    }

    #search-sidebar ul{
        list-style: none;
        margin: 0;
    }

    .horizontal-row{
        width: 80%;
        margin: 20px auto;
        height: 1px;
        background: #cccccc;
    }

    .filter-ul{
        list-style: none;
    }

    .filter-ul .title{
        font-size: 10pt;
        color: #000000;
    }

    .filter-ul li{
        font-size: 9.5pt;
        color: #8d8e8e;
        position: relative;

    }

    .filter-ul li:first-child{
        bottom: 3px;
        right: 0 !important;
    }
    .filter-ul li input{
        position: relative;
        top: 4px;
        left: 3px;
        margin-top: 4px;
    }
    .color-sign{
        width: 5px;
        height: 12px;
        display: inline-block;
        position: relative;
        top: 3px;
        left: 2px;
        border: 1px solid #cccccc;
    }

</style>
<div id="search-sidebar">
    <h3>
        گوشی موبایل
        <span></span>
    </h3>
    <ul>
        <li style="font-size: 9.5pt">
            کالای دیجتال
            <ul>
                <li style="font-size: 9pt; position: relative; right: -22px;">
                    موبایل
                    <ul>
                        <li style="position: relative; right: -29px">گوشی موبایل</li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div class="horizontal-row"></div>
    <?php
    $attrs = $data['attrsRight'];
    foreach($attrs as $attr) {
        ?>
        <ul class="filter-ul">
            <li class="title"><?= $attr['title'] ?></li>
            <?php
            $values = $attr['values'];
            foreach($values as $value) {
                ?>
                <li>
                    <input class="check_input" type="checkbox" name="attr-<?= $attr['id'] ?>[]" value="<?= $value['id'] ?>">
                    <?= $value['val'] ?>
                </li>

                <?php
            }
            ?>
        </ul>
        <div class="horizontal-row"></div>
        <?php
    }
    ?>
    <ul class="filter-ul">
        <li class="title">بر اساس رنگ</li>
        <?php
        $colors = $data['colors'];
        foreach($colors as $color) {
            ?>
            <li onclick="doSearch()">
                <input type="checkbox" name="colors[]" value="<?= $color['id'] ?>">
                <span class="color-sign" style="background: <?= $color['hex'] ?>"></span>
                <?= $color['title'] ?>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
<script>
    $('.check_input').click(function(){
        doSearch();
    })
</script>