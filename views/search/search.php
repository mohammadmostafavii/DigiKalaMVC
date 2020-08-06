<style>
    #search input {
        width: 330px;
        height: 24px;
        margin: 15px;
        border: 1px solid #cccccc;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);
        font-size: 10.5pt;
        padding: 1px 9px 1px 1px;
    }

    #search .search-picture {
        background: url(<?= URL ?>public/images/search2.png) no-repeat;
        display: inline-block;
        width: 16px;
        height: 17px;
        position: relative;
        top: 3px;
        right: -41px;
        cursor: pointer;
    }

    .exist {
        position: relative;
        top: 6px;
        right: 7px;
    }

    .exist-background {
        background: url(<?= URL ?>public/images/btnchecked.png) no-repeat;
        width: 40px;
        height: 22px;
        display: inline-block;
    }

    #search .exist.active .exist-background {
        background-position: -40px 0;
    }

    #search .exist.active .exist-button {
        background-position: 0 0;
    }

    .exist-button {
        background: url(<?= URL ?>public/images/yesno.png) no-repeat 0 -21px;
        display: inline-block;
        width: 31px;
        height: 21px;
        position: relative;
        top: -1px;
        right: -35px;
        cursor: pointer;
    }

    .exist-text {
        position: relative;
        right: -26px;
        top: -2px;
        font-size: 10pt;
    }

    .display-text {
        font-size: 10pt;
        float: left;
        margin: 14px 10px;
    }

    .mode-1 {
        background: url(<?= URL ?>public/images/displaytype.png) 0 0;
        width: 24px;
        height: 24px;
        display: block;
        float: left;
        margin: 16px 0 0 29px;
        cursor: pointer;
    }

    .mode-2 {
        background: url(<?= URL ?>public/images/displaytype.png) -24px -24px;
        width: 24px;
        height: 24px;
        display: block;
        float: left;
        margin: 16px 0 0 0;
        cursor: pointer;
    }

    .order-by select {
        font-size: 9pt;
    }

    .order-by span {
        font-size: 9.5pt;
    }

</style>

<div id="search">
    <input type="text" id="keyword" placeholder="جستجو ...">
    <span class="search-picture" onclick="doSearch()"></span>
    <span class="exist">
                    <span class="exist-background"></span>
                    <span class="exist-button"></span>
                </span>
    <span class="exist-text">فقط نمایش کالاهای موجود</span>
    <span class="display-mode">
        <span class="mode-1"></span>
        <span class="mode-2"></span>
        <span class="display-text">نوع نمایش</span>
    </span>
</div>
<div class="order-by" style="margin:5px 15px">
    <span>مرتب سازی بر اساس</span>
    <select id="1" name="orderType1" onchange="doSearch()">
        <option value="1">پربازدیدترین</option>
        <option value="2">جدیدترین</option>
        <option value="3">قیمت</option>
        <option value="4">فروش ویزه</option>
    </select>

    <select id="2" name="orderType2" onchange="doSearch()">
        <option value="1">نزولی</option>
        <option value="2">صعودی</option>
    </select>

    <span style="margin-right: 13px">تعداد نمایش</span>

    <select name="limit" id="limit" onchange="doSearch(1)">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4" selected="selected">4</option>
        <option value="5">5</option>
    </select>

</div>

<script>
    $('.exist').click(function () {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('.exist-button', this).animate({'right': '-46px'}, 400);
        } else {
            $('.exist-button', this).animate({'right': '-35px'}, 400);
        }
        doSearch();
    });
</script>
