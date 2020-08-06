<style>
    .box{
        width: 100%;
        border-radius: 4px;
        overflow: hidden;
    }

    .box .header{
        width: 100%;
        height: 40px;
        background: #3f3f3f;
        color: #FFFFFF;
        font-size: 10.5pt;
        padding: 5px 15px 0 0;
        line-height: 35px;
    }

    .box .content{
        background: #FFFFFF;
    }

    .box .content table{
        width: 100%;
        padding: 10px;
    }

    .box .content table tr td{
        padding: 7px;
    }

    .box .content table .title{
        color: darkblue;
        font-size: 10.5pt;
    }

    .box .content table .value{
        color: #000000;
        font-size: 10pt;
    }

</style>

<?php
$userInfo = $data['userInfo'];
?>
<div class="box">
    <div class="header">
        اطلاعات کاربر
    </div>
    <div class="content">
        <table>
            <tr>
                <td>
                    <span class="title">نام و نام خانوادگی:</span>
                    <span class="value">
                        <?= $userInfo['fullName']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">آدرس الکترونیک:</span>
                    <span class="value">
                        <?= $userInfo['email']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">کد ملی:</span>
                    <span class="value">
                        <?= $userInfo['national_code']; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">شماره تلفن ثابت:</span>
                    <span class="value">
                        <?= $userInfo['tel']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">شماره تلفن همراه:</span>
                    <span class="value">
                        <?= $userInfo['mobile']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">تاریخ تولد:</span>
                    <span class="value">
                        <?= $userInfo['birth_date']; ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="title">جنسیت:</span>
                    <span class="value">
                        <?php
                        if($userInfo['gender'] == 1){
                            echo 'مرد';
                        }else{
                            echo 'زن';
                        }
                        ?>
                    </span>
                </td>
                <td>
                    <span class="title">محل سکونت:</span>
                    <span class="value">
                    <?= $userInfo['address']; ?>
                    </span>
                </td>
                <td>
                    <span class="title">دریافت خبرنامه:</span>
                    <span class="value">
                        <?php
                        if($userInfo['subscribe_news'] == 1){
                            echo 'بله';
                        }else{
                            echo 'خیر';
                        }
                        ?>
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: left; padding:10px 0 0 60px">
                    <a href="<?= URL ?>panel/profile" style="margin-left: 10px;">
                        <img src="<?= URL ?>public/images/Edit.png" alt="image">
                    </a>
                    <a href="<?= URL ?>panel/changePassword">
                        <img src="<?= URL ?>public/images/ChangePassword.png" alt="image">
                    </a>
                </td>
            </tr>
        </table>
    </div>
</div>