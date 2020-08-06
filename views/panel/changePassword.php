<style>
    #main::after {
        content: " ";
        clear: both;
        display: block;
    }

    #main {
        width: 1200px;
        margin: 10px auto;
        background: #FFFFFF;
        font-family: yekan;
        border-radius: 4px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .1);
    }

    .btn_green {
        background: #00a710;
        width: 170px;
        height: 40px;
        display: inline-block;
        margin: 30px 20px;
        color: #FFFFFF;
        text-align: center;
        font-size: 10.5pt;
        line-height: 35px;
        border-radius: 4px;
        box-shadow: 0 2px 3px rgba(0, 0, 0, .1);
        float: left;
        cursor: pointer;
    }

    h4 {
        padding: 20px 30px 10px 0;
        font-size: 16pt;
        font-weight: normal;
        width: 17%;
        display: inline-block;
    }

    .line {
        width: 80%;
        border: 1px solid #cccccc;
        margin: 10px auto 30px auto;
    }

    .w150 {
        display: inline-block;
        width: 150px;
    }

    .row2 {
        float: right;
        width: 90%;
        font-size: 12pt;
        margin: 10px 50px;
        color: #555555;
    }

    input[type=password] {
        width: 250px;
        padding: 2px;
        font-family: yekan;
        border: 1px solid #cccccc;
        border-radius: 3px;
        overflow: hidden;
    }

    .error {
        width: 60%;
        margin: 0 auto;
        border: 1px solid #ff3c2d;
        color: #ff3c2d;
        padding: 4px;
        text-align: center;
    }

    .success {
        width: 60%;
        margin: 0 auto;
        border: 1px solid #00a402;
        color: #00a402;
        padding: 4px;
        text-align: center;
    }

</style>

<main>
    <div id="main">
        <h4>اطلاعات پروفایل</h4>
        <?php
        if (@isset($_GET['error'])) {
            if ($_GET['error'] == '') {
                ?>
                <h4 class="success">رمز عبور با موفقیت تغییر یافت!</h4>
                <?php
            } elseif ($_GET['error'] != '') {
                ?>
                <h4 class="error"><?= @$_GET['error']; ?></h4>
                <?php
            }
        }
        ?>
        <div class="line"></div>
        <form action="<?= URL ?>panel/changePassword" method="post">
            <div class="row2">
                <span class="w150">رمز عبور فعلی : </span>
                <input type="password" name="old_password">
            </div>
            <div class="row2">
                <span class="w150">رمز عبور جدید : </span>
                <input type="password" name="new_password">
            </div>
            <div class="row2">
                <span class="w150">تکرار رمز عبور جدید : </span>
                <input type="password" name="confirm_password">
            </div>

            <span class="btn_green" onclick="submitForm()">تغییر رمز عبور</span>

        </form>
    </div>
</main>

<script>
    function submitForm() {
        $('form').submit();
    }
</script>


