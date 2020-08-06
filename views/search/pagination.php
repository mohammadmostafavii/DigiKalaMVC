<style>
    .pagination{
        width: 100%;
        margin-right: -22px;
        margin-top: 15px;
    }

    .pagination .prev{
        cursor: pointer;
        font-size: 10pt;
        float: left;
        display: inline-block;
        width: 60px;
        height: 25px;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);
        border-radius: 4px;
        overflow: hidden;
        text-align: center;
        background: rgba(255,255,255,1);
        background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -o-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );
    }

    .pagination .next{
        cursor: pointer;
        font-size: 10pt;
        float: left;
        display: inline-block;
        width: 60px;
        height: 25px;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);
        border-radius: 4px;
        overflow: hidden;
        text-align: center;
        background: rgba(255,255,255,1);
        background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -o-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(246,246,246,1) 47%, rgba(237,237,237,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed', GradientType=1 );
    }

    .pagination ul{
        padding: 0;
        list-style: none;
        float: left;
        margin: 0 5px;
    }

    .pagination ul li{
        font-size: 10pt;
        float: left;
        display: inline-block;
        width: 25px;
        height: 25px;
        box-shadow: 1px 1px 1px rgba(0, 0, 0, .1);
        border-radius: 4px;
        overflow: hidden;
        background: rgba(255,255,255,1);
        text-align: center;
        margin: 0 3px;
        cursor: pointer;
    }

    .pagination ul li.active{
        background: #cccccc;
    }

</style>
<div class="pagination">
    <span class="prev" onclick="doSearch(current_page - 1)">صفحه قبل</span>
    <ul>
        <li onclick="activePage(this,1)" class="active">1</li>
    </ul>
    <span class="next" onclick="doSearch(current_page + 1)">صفحه بعد</span>
</div>

<script>

    function activePage(tag, page){
        let liTag = $(tag);
        $('.pagination ul li').removeClass('active');
        liTag.addClass('active');
        doSearch(page);
    }

</script>