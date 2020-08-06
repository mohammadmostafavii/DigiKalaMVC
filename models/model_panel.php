<?php

class model_panel extends Model
{

    private $userId;

    function __construct()
    {
        parent::__construct();
        Model::sessionInit();
        if (Model::sessionGet('userId') == false) {
            header('location:' . URL . 'login/index');
        }
        $this->userId = Model::sessionGet('userId');;
    }

    function getUserInfo()
    {
        $userId = $this->userId;

        $sql = "SELECT * FROM tbl_user WHERE id = ?";
        $userInfo = $this->doSelect($sql, [$userId], 0);
        return $userInfo;

    }

    function getOrderInfo()
    {
        $userId = $this->userId;

        $sql = "SELECT user_id FROM tbl_order WHERE user_id = ?";
        $result = $this->doSelect($sql, [$userId]);
        $stat['allOrders'] = sizeof($result);

        $sql = "SELECT user_id FROM tbl_order WHERE user_id = ? AND order_status_id = 1";
        $result = $this->doSelect($sql, [$userId]);//در انتظار تائید
        $stat['awaitingApproval'] = sizeof($result);

        $sql = "SELECT user_id FROM tbl_order WHERE user_id = ? AND order_status_id = 2";//سفارشات در حال پردازش
        $result = $this->doSelect($sql, [$userId]);
        $stat['processing'] = sizeof($result);

        $sql = "SELECT user_id FROM tbl_order WHERE user_id = ? AND order_status_id = 3";//سفارشات ارسال شده
        $result = $this->doSelect($sql, [$userId]);
        $stat['send'] = sizeof($result);

        $sql = "SELECT user_id FROM tbl_comment WHERE user_Id = ?";
        $result = $this->doSelect($sql, [$userId]);
        $stat['comment'] = sizeof($result);

        $sql = "SELECT user_id FROM tbl_user_criticism WHERE user_id = ?";
        $result = $this->doSelect($sql, [$userId]);
        $stat['criticism'] = sizeof($result);

        $sql = "SELECT * FROM tbl_message WHERE user_id = ? AND status = 0";
        $result = $this->doSelect($sql, [$userId]);
        $stat['message'] = sizeof($result);

        return $stat;
    }

    function getMessage()
    {
        $userId = $this->userId;
        $sql = "SELECT * FROM tbl_message WHERE user_id = ?";
        $message = $this->doSelect($sql, [$userId]);
        $sql = "UPDATE tbl_message SET status = ? WHERE user_id = ?";
        $this->doQuery($sql, [1, $userId]);
        return $message;
    }

    function getOrder()
    {
        $userId = $this->userId;
        $sql = "SELECT tbl_order.*, tbl_order_status.title, tbl_post_type.title AS post_title, tbl_post_type.body AS post_body
FROM tbl_order 
LEFT JOIN tbl_order_status ON tbl_order.order_status_id = tbl_order_status.id 
LEFT JOIN tbl_post_type ON tbl_order.post_type = tbl_post_type.id
WHERE user_id = ?";
        $order = $this->doSelect($sql, [$userId]);

        $sql = "SELECT city FROM tbl_user_address WHERE user_id = ?";
        $city = $this->doSelect($sql, [$userId]);
        $post_price = $this->calculatePostPrice($city[0]);

        return [$order, $post_price];
    }

    function getFavoriteDir()
    {
        $userId = $this->userId;
        $sql = "SELECT * FROM tbl_favorite WHERE user_id = ? AND parent = ?";
        $favoriteDir = $this->doSelect($sql, [$userId, 0]);
        return $favoriteDir;
    }

    function getFavoriteProduct($folderId)
    {

        $userId = $this->userId;
        if ($folderId != 0) {
            $sql = "SELECT tbl_favorite.*, tbl_product.title AS product_title, tbl_product.introduction, tbl_product.id AS product_id FROM tbl_favorite LEFT JOIN tbl_product ON tbl_favorite.product_id = tbl_product.id WHERE user_id = ? AND parent = ?";
        } else {
            $sql = "SELECT tbl_favorite.*, tbl_product.title AS product_title, tbl_product.introduction, tbl_product.id AS product_id FROM tbl_favorite LEFT JOIN tbl_product ON tbl_favorite.product_id = tbl_product.id WHERE user_id = ? AND parent != ?";
        }
        $favoriteProduct = $this->doSelect($sql, [$userId, $folderId]);
        return $favoriteProduct;
    }

    function saveFolder($folderId, $folderTitle)
    {
        $sql = "UPDATE tbl_favorite SET title = ? WHERE id = ?";
        $this->doQuery($sql, [$folderTitle, $folderId]);
    }

    function deleteFavorite($id)
    {
        $sql = "DELETE FROM tbl_favorite WHERE id = ?";
        $this->doQuery($sql, [$id]);
    }

    function getComment()
    {
        $userId = $this->userId;
        $sql = "SELECT tbl_comment.*, tbl_product.title AS product_title FROM tbl_comment LEFT JOIN tbl_product ON tbl_comment.product_id = tbl_product.id WHERE tbl_comment.user_id = ?";
        $comments = $this->doSelect($sql, [$userId]);
        return $comments;
    }

    function deleteComment($commentId)
    {
        $sql = "DELETE FROM tbl_comment WHERE id = ?";
        $this->doQuery($sql, [$commentId]);
    }

    function getDiscountCode()
    {
        $userId = $this->userId;
        $sql = "SELECT * FROM tbl_code WHERE user_id = ? ORDER BY id desc";
        $discountCode = $this->doSelect($sql, [$userId]);

        foreach ($discountCode as $key => $value) {
            $sql = "SELECT * FROM tbl_order WHERE user_id = ? AND code = ?";
            $order = $this->doSelect($sql, [$userId, $value['code']]);
            $discountCode[$key]['order'] = $order;

            $today = new DateTime(self::jaliliDate());
            $expirationDate = new DateTime($value['expiration_date']);
            $status = '';

            if ($today->format('Y-m-d') <= $expirationDate->format('Y-m-d')) {
                $status = 'معتبر';
            } else {
                $status = 'باطل شده';
            }
            $discountCode[$key]['status'] = $status;

        }
        return $discountCode;
    }

    function saveDiscountCode($code)
    {
        $userId = $this->userId;
        $sql = "UPDATE tbl_code SET user_id = ? WHERE code = ?";
        $this->doQuery($sql, [$userId, $code]);
    }

    function profile($data = [], $picture)
    {
        $userId = $this->userId;
        if (isset($picture['name'])) {
            $pictureName = $picture['name'];
            $pictureTmpName = $picture['tmp_name'];
            $ext = pathinfo($pictureName, PATHINFO_EXTENSION);

            $uploadFile = 1;
            if ($ext != 'jpg' or $ext != 'jpeg')
                $uploadFile = 0;

            if (!file_exists('public/images/users/' . $userId . '/')) {
                mkdir('public/images/users/' . $userId);
            }
            $mainDestination = 'public/images/users/' . $userId . '/';
            $newName = 'user';
            $destination = $mainDestination . $newName . '.' . $ext;
            move_uploaded_file($pictureTmpName, $destination);

            $sql = "UPDATE tbl_user SET picture = ? WHERE id = ?";
            $this->doQuery($sql, [$pictureName, $userId]);
        }

        if (isset($data['fullName'])) {
            $birthDate = $data['year'].'/'.$data['month'].'/'.$data['day'];
            $sql = "UPDATE tbl_user SET email = ?, fullName = ?, national_code = ?, tel = ?, mobile = ?, birth_date = ?, gender = ?, address = ?, subscribe_news = ?, province = ?, city = ? WHERE id = ?";
            $values = [$data['email'], $data['fullName'], $data['nationalCode'], $data['tel'], $data['mobile'], $birthDate, $data['gender'], $data['address'], $data['subscribeNews'], $data['province'], $data['city'], $userId];

            $this->doQuery($sql, $values);

        }
        $sql = "SELECT * FROM tbl_user WHERE id = ?";
        $userInfo = $this->doSelect($sql, [$userId], 0);
        return $userInfo;

    }

    function changePassword($data = [])
    {
        $userId = $this->userId;
        $sql = "SELECT password FROM tbl_user WHERE id = ?";
        $oldPassword = $this->doSelect($sql, [$userId], 0);
        $error = '';

        if($oldPassword['password'] == $data['old_password']){
            if($data['new_password'] == $data['confirm_password']){
                $sql = "UPDATE tbl_user SET password = ? WHERE id = ?";
                $this->doQuery($sql, [$data['new_password'], $userId]);
            }else{
                $error = 'تائیدیه رمز عبور نادرست است!';
            }
        }else{
            $error = 'رمز فعلی وارد شده نادرست است!';
        }

        header('location:'.URL.'panel/changePassword/?error='.$error);

    }


}