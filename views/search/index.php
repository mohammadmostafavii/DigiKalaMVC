<style>
    #main {
        width: 1160px;
        padding: 20px;
        margin: 10px auto;
        background: #FFFFFF;
        box-shadow: 0 1px 3px #cccccc;
        font-family: yekan;
    }

    #main::after {
        content: " ";
        clear: both;
        display: block;
    }

    #search-content {
        width: 900px;
        float: left;
    }
</style>
<main>
    <form id="search-form" action="<?= URL ?>search/doSearch" method="post">
        <div id="main">
            <?php
            require('sidebar.php');
            ?>
            <div id="search-content">
                <?php
                require('pageNavigator.php');
                ?>
                <?php
                require('filter.php');
                ?>
                <div style="height: 1px; background: #cccccc; width: 100%; float: right; margin-top: 3px;"></div>
                <?php
                require('search.php');
                require('pagination.php');
                require('products.php');
                ?>
            </div>
        </div>
    </form>
</main>
<script>

    let current_page = 1;

    function doSearch(page) {
        if(page !== undefined){
            current_page = page;
        }else{
            current_page = 1;
        }

        if(current_page < 1){
            current_page = 1;
        }

        let last_page = '';
        last_page = $('.pagination ul li:last').text();
        if(current_page > last_page){
            current_page = last_page;
        }

        let data = $('#search-form').serializeArray();
        let url = "<?= URL ?>search/doSearch";
        let exist = 0;
        if ($('.exist').hasClass('active') === true) {
            exist = 1;
        }
        data.push({'name': 'exist', 'value': exist});
        let keyword = $('#keyword').val();
        data.push({'name': 'keyword', 'value': keyword});
        // current_page = $('.pagination ul li.active').text();
        data.push({'name': 'current_page', 'value': current_page});
        let limit = $('#limit option:selected').val();
        data.push({'name': 'limit', 'value': limit});
        let productUl = $('#products ul');
        $.post(url, data, function (msg) {
            productUl.html('');
            $.each(msg[0], function (index, value) {
                let item = '<li><a href="#"><div class="right"><img style="width:190px!important" src="<?= URL ?>public/images/products/' + value['id'] + '/product_220.jpg" alt="image" ><div class="colors"><span style="background: silver"></span><span style="background: gold"></span><span style="background: white"></span></div><div class="starsDiv"><div class="stars"><div class="gray"><div class="red"></div></div><span class="star-score">8.8</span></div></div></div><div class="left"><div class="product-info">' + value['title'] + '</div><div class="description">' + value['introduction'] + '</div><div class="price-info"><span class="old-price">' + value['price'] + 'تومان</span><span class="new-price">1,299,000</span></div><div class="addCart-image"><img src="<?= URL ?>public/images/addtocart-min.png" alt="image"></div></div></a></li>';
                productUl.append(item);
            });

            let paginationUl = $('.pagination ul');
            let pageNumber = msg[1];
            let active = '';
            paginationUl.html('<li onclick="activePage(this,1)" class="active" style="display: none;!important;">1</li>');

            let page_number = msg[1];
            let start = current_page-1;
            if(start < 1){
                start = 1;
            }
            let end = current_page + 1;
            if(end > page_number){
                end = page_number;
            }
            for (let i = start; i <= end; i++) {
                if (i == current_page) {
                    active = 'active';
                }
                paginationUl.append('<li onclick="activePage(this,'+i+')" class="'+active+'">' + i + '</li>');
                active = '';
            }
        }, 'json');
    }

    doSearch();


    $('.mode-1').click(function () {
        $('#products').removeClass('display1');
        $(this).addClass('mode1-active');
        $('.mode-2').removeClass('mode2-active');
    });

    $('.mode-2').click(function () {
        $('#products').addClass('display1');
        $(this).addClass('mode2-active');
        $('.mode-1').removeClass('mode1-active');
    });

</script>