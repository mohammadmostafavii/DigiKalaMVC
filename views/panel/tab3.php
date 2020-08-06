<style>
    .favorites ul {
        list-style: none;
        margin-right: 15px;
        width: 94%;
        padding: 13px 30px 10px 10px;
        background: #dddddd;
        border-radius: 4px;
        border: 1px dashed #aaa;
        overflow: hidden;
        float: right;
    }

    .favorites ul li {
        width: 280px;
        height: 35px;
        position: relative;
        padding: 10px;
        margin-left: 20px;
        float: right;
    }

    .favorites ul li.active {
        background: #eeeeee;
        border: 1px solid #aaaaaa;
        border-radius: 3px;
        overflow: hidden;
    }

    .favorites ul li:hover {
        background: #eeeeee;
        border: 1px solid #aaaaaa;
        border-radius: 3px;
        overflow: hidden;
    }


    .favorites ul li a {
        width: 100%;
        height: 100%;
        display: block;
        position: relative;
    }

    .favorites ul li .folder {
        vertical-align: center;
        float: right;
    }

    .favorites ul li span {
        float: right;
        margin-right: 10px;
    }

    .favorites ul li .edit {
        position: absolute;
        top: -3px;
        left: -3px;
        display: none;
    }

    .favorites .item {
        float: right;
        width: 100%;
        height: 150px;
    }

    .favorites .item .right {
        margin-right: 15px;
        float: right;
    }

    .favorites .item .right img {
        width: 110px;
        height: 110px;
        border: 1px solid #cccccc;
        float: right;
    }

    .favorites .item .left {
        float: right;
        position: relative;
    }

    .favorites .item .left .hor-row {
        height: 1px;
        width: 1036px;
        background: #cccccc;
        margin-right: 20px;
    }

    .favorites .item .left .title {
        margin: 7px 26px;
        font-weight: bold;
    }

    .favorites .item .left i {
        width: 18px;
        height: 18px;
        position: absolute;
        left: 20px;
        top: 14px;
    }

    .favorites .item .left .description {
        margin-right: 20px;
    }

    .btn_save {
        background: url(<?= URL ?>public/images/btn_save.png);
        width: 34px;
        height: 34px;
        position: absolute;
        bottom: -5px;
        left: -5px;
        cursor: pointer;
        display: none;
    }


</style>
<ul>
    <li class="active" onclick="getFavoriteProduct(0)">
        <a style="cursor: pointer;">
            <img class="folder" src="<?= URL ?>public/images/folder_documents_all.png" alt="image">
            <span>همه پوشه ها</span>
        </a>
    </li>
    <?php
    $favoriteDir = $data['favoriteDir'];
    foreach ($favoriteDir as $row) {
        ?>
        <li onclick="getFavoriteProduct(<?= $row['id']; ?>)">
            <a style="cursor: pointer">
                <img class="folder" src="<?= URL ?>public/images/folder_documents_all.png" alt="image">
                <span class="title"><?= $row['title']; ?></span>

                <img class="edit" onclick="editFolder(this)" src="<?= URL ?>public/images/icon_edit_16.png" alt="image">
            </a>
            <span class="btn_save" onclick="saveFolder(<?= $row['id'] ?>, this)"></span>
        </li>
        <?php
    }
    ?>

</ul>


<script>

    function saveFolder(folderId, tag) {
        let spanTag = $(tag);
        let liTag = spanTag.parents('li');
        let titleTag = liTag.find('.title input').val();
        let url = "<?= URL ?>panel/saveFolder";
        let data = {'folderId': folderId, 'title': titleTag};
        $.post(url, data, function (msg) {
            liTag.find('.title').html(titleTag);
            liTag.find('.btn_save').fadeOut(100);
        });
    }

    function deleteFavorite(id, tag){
        let iTag = $(tag);
        let url = "<?= URL ?>panel/deleteFavorite";
        let data = {'id':id};
        $.post(url, data, function(msg){
            iTag.parents('.item').remove();
        });
    }

    function editFolder(tag) {
        let imgTag = $(tag);
        let liTag = imgTag.parents('li');
        let spanTag = liTag.find('.title');
        let spanTitle = spanTag.text();
        let inputTag = '<input type="text" value="' + spanTitle + '">';
        spanTag.html(inputTag);
        liTag.find('.btn_save').fadeIn(400);
        $('li input').click(function (e) {//e مخفف کلمه event است
            e.stopPropagation();
        });
    }

    $('li .edit').click(function (e) {//e مخفف کلمه event است
        e.stopPropagation();
    });

    $('li .btn_save').click(function (e) {//e مخفف کلمه event است
        e.stopPropagation();
    });


    function getFavoriteProduct(folderId) {
        let url = "<?= URL ?>panel/getFavoriteProduct/" + folderId;
        let data = {};
        $.post(url, data, function (msg) {
            $('.item').remove();
            $.each(msg, function (index, value) {
                let itemTag = '<div class="item"><div class="right"><img src="<?= URL ?>public/images/products/' + value['product_id'] + '/product_220.jpg" alt="image"></div><div class="left"><div class="hor-row"></div><p class="title">' + value['product_title'] + '<i style="background: url(<?= URL ?>public/images/Delete.gif) no-repeat; cursor: pointer;" onclick="deleteFavorite('+ value['id'] +', this)"></i><div class="hor-row"></div><p class="description">' + value['introduction'] + '</p></div></div>';

                $('.favorites').append(itemTag);

            });

        }, 'json');
    }


    $('.favorites ul li').hover(function () {
        var ulTag = $(this).parents('ul');
        ulTag.find('.active').removeClass('active');
        $(this).addClass('active');

        $('.edit', this).fadeIn(200);
    }, function () {
        $('.edit', this).fadeOut(100);
    });
</script>