<style>

    #main{
        width: 1200px;
        margin: 10px auto;
        font-family: yekan;
    }

    #main::after{
        content: " ";
        clear: both;
        display: block;
    }

</style>

<main>
    <div id="main">

        <?php
        @$productInfo = $data['productInfo'];
        require ('details.php');
        require ('introduction.php');
        ?>

        <style>

            #tab-section{
                width: 1200px;
                margin-top: 20px;
                float: right;
            }

            #tab{
                width: 100%;
                list-style: none;
                padding: 0;
                background: #f5f6f7;
                float: right;
                margin: 0;
            }

            #tab li{
                width: 130px;
                height: 60px;
                float: right;
                line-height: 55px;
                padding-right: 46px;
                color: rgb(111, 111,111);
                font-size: 13.5pt;
                cursor: pointer;
                border: 1px solid #eeeeee;
                position: relative;
            }

            #tab li.active{
                height: 57px;
                background: #ffffff;
                border-top: 2px solid blue;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .1);
            }

            #tabChilds section{
                width: 91.6%;
                background: #ffffff;
                float: right;
                display: none;
            }

            #tabChilds section:first-child{
                display: block;
            }

            #tab li::after{
                content: " ";
                background: url(<?= URL ?>public/images/slices.png) no-repeat;
                width: 28px;
                height: 28px;
                display: block;
                position: absolute;
                top: 15px;
                right: 11px;
            }

            #tab .review::after{
                background-position: -105px -266px;
            }
            #tab .mosh::after{
                background-position: -315px -266px;
            }
            #tab .nazar::after{
                background-position: -261px -266px;
            }
            #tab .soal::after{
                background-position: -210px -266px;
            }

            #tab .review.active::after{
                background-position: -105px -308px;
            }
            #tab .mosh.active::after{
                background-position: -315px -308px;
            }
            #tab .nazar.active::after{
                background-position: -261px -308px;
            }
            #tab .soal.active::after{
                background-position: -210px -308px;
            }

        </style>


        <div id="tab-section">
            <ul id="tab">
                <li class="review">نقد و بررسی</li>
                <li class="mosh">مشخصات</li>
                <li class="nazar">نظرات کاربران</li>
                <li class="soal">پرسش و پاسخ</li>
            </ul>

            <div id="tabChilds">

                <section class="tab1" style="display: none">
                    <?php
                    require ('tab1.php');
                    ?>
                </section>
                <section id="tab2">
                    <?php
                    require ('tab2.php');
                    ?>
                </section>
                <section id="tab3">
                    <?php
                    require ('tab3.php');
                    ?>
                </section>
                <section id="tab4">
                    <?php
                    require ('tab4.php');
                    ?>
                </section>

            </div>
        </div>
    </div>
</main>

<script>

    $('#tab li').click(function(){
        clickTab($(this));
    });

    function clickTab(tag){
        let index = $(tag).index();
        $('#tab li').removeClass('active');
        $(tag).addClass('active');
        $('#tabChilds section').fadeOut(0);
        let selectedSection = $('#tabChilds section').eq(index);

        let url = '<?= URL ?>product/tab/<?= $productInfo['id'] ?>/<?= $productInfo['idCategory'] ?>';
        let data = {'number' : index};
        $.post(url , data, function(msg){
            selectedSection.html(msg);
        });

        selectedSection.fadeIn(0);
    }

    $('.<?php if(isset($data['activeTab'])) echo $data['activeTab'] ?>').trigger('click');

    $('.colors li').click(function(){
        $('.circle').removeClass('active');
        $('.circle', this).addClass('active');
    });


</script>

<?php
require ('gallery.php');
?>
