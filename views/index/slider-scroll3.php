<div class="sliderScroll" style="margin-top: 8px; float: right;">
    <h3 style="color: #5a5b5b">پربازدیدترین ها</h3>
    <div class="sliderScroll-content">
        <div class="sliderScroll-prev">
            <span class="prev" onclick="sliderScroll('prev', this);"></span>
        </div>
        <div class="sliderScroll-main">
            <ul>
                <?php
                foreach($data[4] as $row) {
                    ?>
                    <li>
                        <a href="<?= URL ?>product/index/<?= $row['id'] ?>">
                            <img src=" <?= URL ?>public/images/products/<?= $row['id'] ?>/product_220.jpg" alt="image"
                                 style="width: 150px;">
                            <img src=" <?= URL ?>public/images/exclusive-blue.png" alt="image">
                            <p class="yekan" style="font-size: 8pt; padding: 0; margin-top: 10px; text-align: center">
                                <?= $row['title'] ?>
                            </p>
                            <p class="yekan fontsm" style="color: #00d901; text-align: center; padding: 0; margin: 0;">
                                <?= $row['price'] ?>
                                تومان
                            </p>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div class="sliderScroll-next">
            <span class="next" onclick="sliderScroll('next', this)"></span>
        </div>
    </div>
</div>