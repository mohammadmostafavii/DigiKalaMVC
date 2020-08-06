<style>
    .filter-top-search-content {
        list-style: none;
        float: right;
        padding: 0;
        margin-top: 15px;
        width: 100%;
        position: relative;
        z-index: 2;
    }

    .filter-top-search-content > li {
        width: 130px;
        height: 24px;
        float: right;
        font-size: 8.9pt;
        background: #eeeeee;
        border-radius: 4px;
        overflow: hidden;
        margin-right: 4px;
        padding-right: 10px;
        color: #444444;
        cursor: pointer;
    }

    .filter-top-search-content li span {
        background: url(<?= URL ?>public/images/sideArrow.gif) no-repeat;
        width: 10px;
        height: 11px;
        display: inline-block;
        float: left;
        margin: 5px 0 0 7px;
    }


    .filter-top-search-content li .options {
        width: 160px;
        height: 200px;
        background: #FFFFFF;
        box-shadow: -4px 4px 3px rgba(0, 0, 0, .2);
        border-right: 1px solid #eeeeee;
        position: absolute;
        overflow-y: auto;
        overflow-x: hidden;
        display: none;
        border-radius: 4px;
        z-index: 10;
    }

    .filter-top-search-content li label {
        cursor: pointer;
    }

    .filter-top-search-content li .options ul {
        list-style: none;
        padding: 0;

    }

    .options ul li:first-child {
        padding: 10px 10px 5px 10px;
    }

    .options ul li {
        padding: 0 10px 0 10px;
        cursor: pointer;
    }

    .horizontal-row-options {
        width: 90%;
        margin: 10px auto;
        height: 1px;
        background: #cccccc;
    }

    .filter-top-search-content .options .square {
        width: 10px;
        height: 12px;
        background: url(<?= URL ?>public/images/spritefiltercontrols.png) no-repeat -58px -151px;
        float: right;
    }

    .square-hover {
        background: url(<?= URL ?>public/images/spritefiltercontrols.png) no-repeat -58px -202px !important;
    }

    .square-selected {
        background: url(<?= URL ?>public/images/spritefiltercontrols.png) no-repeat -58px -254px !important;
    }

    .filter-selected {
        float: right;
        width: 100%;
        padding: 5px 18px 0 0;
        font-size: 9.5pt;
        z-index: 2;

    }

    .filter-selected i {
        display: inline-block;
        position: relative;
        width: 11px;
        height: 14px;
        background: url(<?= URL ?>public/images/spritefiltercontrols.png) no-repeat -56px -382px !important;
        top: 5px;
        right: 3px;
        cursor: pointer;
    }

    .filter-selected-span {
        background: #eeeeee;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, .2);
        padding: 2px 4px;
        margin-right: 7px;
    }

</style>
<div class="filter-selected">

</div>
<ul class="filter-top-search-content" style="margin-right: 9px;">
    <?php
    $attrs = $data['attrs'];
    foreach ($attrs as $attr) {
        ?>
        <li>
            <label>
                <?= $attr['title']; ?>
            </label>
            <span></span>
            <div class="options">
                <ul>
                    <li data-id="0">
                        <span class="square"></span>
                        نمایش همه
                    </li>
                    <div class="horizontal-row-options"></div>
                    <?php
                    $values = $attr['values'];
                    foreach ($values as $value) {
                        ?>
                        <li data-valueId="<?= $value['id'] ?>" data-attrId="<?= $attr['id'] ?>">
                            <span class="square"></span>
                            <?= $value['val'] ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </li>
        <?php
    }
    ?>
</ul>

<script>
    let filters = $('.filter-top-search-content > li');

    filters.hover(function () {
        $('.options', this).slideDown(200);
    }, function () {
        $('.options', this).slideUp(200);
    });

    let Items = $('.filter-top-search-content .options li');
    Items.hover(function () {
        $('.square', this).addClass('square-hover');
    }, function () {
        $('.square', this).removeClass('square-hover');
    });

    Items.click(function () {
        $('.square', this).toggleClass('square-selected');
        let value = $(this).text();
        let title = $(this).parents('li').find('label').text();
        let valueId = $(this).attr('data-valueId');
        let attrId = $(this).attr('data-attrId');
        let filter_selected = $('.filter-selected');
        let filter_selected_span = filter_selected.find('span[data-valueId = ' + valueId + ']');
        let len = filter_selected_span.length;
        if (len > 0) {
            filter_selected_span.remove();
        } else {
            let span = '<span data-valueId="' + valueId + '" class="filter-selected-span">' + title + ':' + value + '<i onclick="removeSelected(this)"></i><input type="hidden" name="attr-'+attrId+'[]" value="'+valueId+'" ></span>';
            filter_selected.append(span);
        }
        doSearch();
    });

    function removeSelected(tag) {
        let span_tag = $(tag).parents('span');
        span_tag.remove();
        let id = span_tag.attr('data-valueId');
        $('.options li[data-valueId=' + id + ']').find('.square').removeClass('square-selected');
        doSearch();
    }


</script>