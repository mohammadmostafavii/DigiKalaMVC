<style>

    .tab1 {
        padding: 1px 20px;
        width: 1100px;
    }

    .itemContainer {
        float: right;
        margin-right: 35px;
        margin-top: 50px;
        border-right: 3px solid #f1f2f3;

    }

    .itemContainer .item {
        cursor: pointer;
    }

    .itemContainer .item:first-child i {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -153px -615px;
        display: inline-block;
        width: 31px;
        height: 44px;
        position: relative;
        right: -16px;
        top: -3px;
    }

    .itemContainer .item:first-child .item-label.active i {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -98px -615px;
    }

    .itemContainer .item i {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -259px -606px;
        display: inline-block;
        width: 31px;
        height: 56px;
        position: relative;
        right: -17px;
        top: -3px;
    }

    .itemContainer .item .item-label.active i {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -207px -606px;
    }


    .itemContainer .item:last-child i {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -312px -606px;
        display: inline-block;
        width: 31px;
        height: 56px;
        position: relative;
        right: -16px;
        top: -3px;
        margin-bottom: -22px;
    }

    .itemContainer .item:last-child .item-label.active i {
        background: url(<?= URL ?>public/images/slices.png) no-repeat -206px -606px;
        margin-bottom: -15px;
    }

    .itemContainer .item:last-child .item-label.active span {
        top: -11px !important;
    }

    .itemContainer span {
        position: relative;
        top: -24px;
        right: -8px;
    }

    .itemContainer .item .item-description {
        display: none;
    }

</style>

<div class="itemContainer">
    <?php
    @$tab1 = $data[0];
    foreach ($tab1 as $row) {
        ?>
        <div class="item">
            <div class="item-label">
                <i></i>
                <span>
                    <?php if(isset($row['title'])) echo $row['title']; ?>
                </span>
            </div>
            <div class="item-description">
                <?php if(isset($row['body'])) echo $row['body']; ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script>
    $('.itemContainer .item .item-label').on('click', function(){
        let item = $(this).parents('.item');
        $(this).toggleClass('active');
        $('.item-description', item).slideToggle(200);
    });
</script>
