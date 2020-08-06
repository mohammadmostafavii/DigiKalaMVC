<?php
$messages = $data['message'];
?>
    <table cellspacing="0">
        <thead>
        <tr>
            <td>ردیف</td>
            <td>کد</td>
            <td>تاریخ</td>
            <td>عنوان</td>
            <td>متن</td>
            <td>وضعیت</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach($messages as $message) {
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $message['id']; ?></td>
                <td><?= $message['date']; ?></td>
                <td><?= $message['title']; ?></td>
                <td><?= $message['body']; ?></td>
                <td>
                    <?php
                    if($message['status'] == 0){
                        echo 'خوانده نشده';
                    }else{
                        echo 'خوانده شده';
                    }
                    ?>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
        </tbody>
    </table>