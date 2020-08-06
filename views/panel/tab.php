<style>
    #tab-section {
        font-family: yekan;
        width: 1200px;
        margin-top: 20px;
        float: right;
    }

    #tab {
        width: 100%;
        list-style: none;
        padding: 0;
        background: #f5f6f7;
        float: right;
        margin: 0;
    }

    #tab li {
        width: 130px;
        height: 60px;
        float: right;
        line-height: 55px;
        text-align: center;
        color: rgb(111, 111, 111);
        font-size: 13.5pt;
        cursor: pointer;
        border: 1px solid #eeeeee;
        position: relative;
        padding: 0 5px;
    }

    #tab li.active {
        height: 57px;
        background: #ffffff;
        border-top: 2px solid blue;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
    }

    #tabChilds section {
        width: 100%;
        background: #ffffff;
        float: right;
        display: none;
    }

</style>

<div id="tab-section">
    <ul id="tab">
        <li class="myMessageLi">پیغام های من</li>
        <li>سفارشات من</li>
        <li>لیست مورد علاقه</li>
        <li>نظرات من</li>
        <li class="active digiBonLi">دیجی بن های من</li>
    </ul>

    <style>
        #tabChilds section > table {
            width: 100%;
            padding: 15px;
        }

        #tabChilds section > table > thead > tr:first-child {
            background: #3f3f3f;
            text-align: center;
            font-size: 12pt;
            color: #FFFFFF;
        }

        #tabChilds section > table > tbody > tr {
            background: #eeeeee !important;
            color: #333333 !important;
            text-align: center;
        }


        #tabChilds section > table > tbody tr td {
            border-left: 1px solid #cccccc;
            padding: 10px;
            border-bottom: 1px solid #000000;
        }

    </style>

    <div id="tabChilds">

        <section class="myMessages">
            <?php
            require('tab1.php');
            ?>
        </section>
        <section class="myOrder">
            <?php
            require('tab2.php');
            ?>
        </section>
        <section class="favorites">
            <?php
            require('tab3.php');
            ?>
        </section>
        <section class="myComments">
            <?php
            require('tab4.php');
            ?>
        </section>
        <section class="digiBon" style="display: block;">
            <?php
            require('tab5.php');
            ?>
        </section>

    </div>
</div>

<script>

    $('#tab li').click(function () {
        changeTab($(this));
    });

    function changeTab(tag){
        let index = $(tag).index();
        $('#tab li').removeClass('active');
        $(tag).addClass('active');
        $('#tabChilds section').fadeOut(0);
        let selectedSection = $('#tabChilds section').eq(index);

        let url = '<?= URL ?>panel/tab';
        let data = {'number': index};
        $.post(url, data, function (msg) {

            selectedSection.html(msg);
        });

        selectedSection.fadeIn(0);
    }

    $('.myMessageLi').trigger('click');

</script>