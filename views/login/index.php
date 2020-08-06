<style>

    #main {
        width: 1200px;
        margin: 10px auto;
        background: #FFFFFF;
        box-shadow: 0 1px 3px #cccccc;
    }

    #main::after{
        content: " ";
        clear: both;
        display: block;
    }

    .header {
        height: 160px;
        background: #fafcfc;
        text-align: center;
    }

    .header span {
        width: 70px;
        height: 52px;
        background: url(<?= URL ?>public/images/slices.png) no-repeat -870px -89px;
        display: block;
        position: relative;
        top: 25px;
        right: 0;
        left: 0;
        margin: auto;
    }

    .header h3 {
        margin-top: 30px;
        color: #666666;
    }

    #register-right {
        width: 49%;
        height: 340px;
        float: right;
    }

    #register-left {
        width: 50%;
        height: 340px;
        float: right;
    }

    #register-right input {
        width: 250px;
        font-family: yekan;
        height: 29px;
        border: 1px solid #dddddd;
        text-align: left;
        padding-left: 10px;
        font-size: 10.5pt;
    }

    #register-right label {
        width: 130px;
        display: inline-block;
    }

    #register-right div {
        margin-top: 8px;
    }

    #register-right ul {
        list-style: none;
        font-size: 10pt;
        padding: 0;
        margin: 30px 0 20px 10px;
    }

    #register-right button {
        float: left;
        margin: 25px 0 0 47px;
        font-family: yekan;
        font-size: 10.5pt;
        background: #5693f2;
        border-radius: 4px;
        box-shadow: 0 1px 2px #cccccc;
        overflow: hidden;
        color: #FFFFFF;
        cursor: pointer;
    }

    #register-left ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    #register-left ul li {
        font-size: 10pt;
        color: #888888;
        margin-top: 13px;
    }

    .register-background {
        float: right;
        width: 27px;
        height: 27px;
        margin-left: 13px;
    }

    .register-container {
        width: 1000px;
        height: 100%;
        margin: 60px auto;
    }

</style>

<div id="main">
    <div class="header">
        <span></span>
        <h3>به دیجی کالا بپیوندید</h3>
    </div>
    <div class="register-container">


        <div id="register-right">
            <form action="<?= URL ?>login/checkUser" method="post">
                <div>
                    <label>پست الکترونیک</label>
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div>
                    <label>کلمه عبور</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <button>ورود به دیجی کالا</button>
            </form>
        </div>
        <div id="register-left">
            <ul>
                <li>
                    <span class="register-background"
                          style="background: url(<?= URL ?>public/images/slices.png) -980px -330px;"></span>
                    سریع تر و ساده تر خرید کنید
                </li>
                <li>
                    <span class="register-background"
                          style="background: url(<?= URL ?>public/images/slices.png) -980px -285px;"></span>
                    به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید
                </li>
                <li>
                    <span class="register-background"
                          style="background: url(<?= URL ?>public/images/slices.png) -980px -243px;"></span>
                    لیست علاقمندی های خود را بسازید و تغییرات آنها را دنبال کنید
                </li>
                <li>
                    <span class="register-background"
                          style="background: url(<?= URL ?>public/images/slices.png) -980px -202px;"></span>
                    نقد بررسی و نظرات خود را با دیگران به اشتراک بگذارید
                </li>
                <li>
                    <span class="register-background"
                          style="background: url(<?= URL ?>public/images/slices.png) -980px -165px;"></span>
                    در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید
                </li>
            </ul>
        </div>
    </div>

</div>