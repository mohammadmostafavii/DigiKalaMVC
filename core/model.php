<?php

class Model
{

    public static $conn = '';

    function __construct()
    {
        $serverName = 'localhost';
        $userName = 'root';
        $password = '';
        $dbName = 'digi_mvc';
        $attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8"');
        self::$conn = new PDO('mysql:host=' . $serverName . ';dbname=' . $dbName, $userName, $password, $attr);
        self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getOption()
    {
        $sql = "SELECT * FROM tbl_option";
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $options = [];
        foreach ($result as $option) {
            $setting = $option['setting'];
            $value = $option['value'];
            $options[$setting] = $value;
        }
        return $options;
    }

    function calculateDiscount($price, $discount)
    {
        $discount_price = ($price * $discount) / 100;
        $final_price = $price - $discount_price;

        return [$discount_price, $final_price];
    }

    function doSelect($sql, $values = [], $fetch = 1, $fetch_style = PDO::FETCH_ASSOC)
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindValue($key + 1, $value);
        }
        $stmt->execute();
        if ($fetch == 1)
            $result2 = $stmt->fetchAll($fetch_style);
        else if ($fetch == 0)
            $result2 = $stmt->fetch($fetch_style);
        return $result2;
    }

    function doQuery($sql, $values = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($values as $key => $value) {
            $stmt->bindVAlue($key + 1, $value);
        }
        $stmt->execute();
    }

    function create_thumbnail($file, $pathToSave = '', $w, $h = '', $crop = FALSE)
    {

        $new_height = $h;

        list($width, $height) = getimagesize($file);

        $r = $width / $height;

        if ($crop) {
            if ($width > $height) {
                $width = ceil($width - ($width * abs($r - $w / $h)));
            } else {
                $height = ceil($height - ($height * abs($r - $w / $h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w / $h > $r) {
                $newwidth = $h * $r;
                $newheight = $h;
            } else {
                $newheight = $w / $r;
                $newwidth = $w;
            }
        }

        $what = getimagesize($file);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $src = imagecreatefrompng($file);

                break;
            case 'image/jpeg':
                $src = imagecreatefromjpeg($file);
                break;
            case 'image/gif':
                $src = imagecreatefromgif($file);
                break;
            default:
                //die();
        }

        if ($new_height != '') {
            $newheight = $new_height;
        }

        $dst = imagecreatetruecolor($newwidth, $newheight);//the new image
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);//az function

        imagejpeg($dst, $pathToSave, 95);//pish farz in tabe 75 darsad quality ast

        return $dst;
    }

    function saveFile($file = [], $productId, $gallery = '', $slider = '')
    {
        $destination = '';
        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $uploadFile = 1;
        if ($fileType != 'jpg' or $fileType != 'jpeg' or $fileType != 'png')
            $uploadFile = 0;
        if ($fileSize > 5242880)
            $uploadFile = 0;
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if ($gallery == '' and $slider == '') {
            $mainDestination = 'public/images/products/' . $productId . '/';
            $newName = 'product';
            $destination = $mainDestination . $newName . '.' . $ext;
            move_uploaded_file($fileTmpName, $destination);
            $destination220 = $mainDestination . $newName . '_220.' . $ext;
            $destination350 = $mainDestination . $newName . '_350.' . $ext;
            $this->create_thumbnail($destination, $destination220, 220, 220);
            $this->create_thumbnail($destination, $destination350, 350, 350);
        } elseif($gallery != '') {
            $mainDestination = 'public/images/products/' . $productId . '/gallery/';
            $newName = time();
            $destination = $mainDestination . 'large/' . $newName . '.' . $ext;
            move_uploaded_file($fileTmpName, $destination);
            $destinationSmall = $mainDestination . 'small/' . $newName . '.' . $ext;
            $this->create_thumbnail($destination, $destinationSmall, 128, 128);
        }elseif($slider != ''){
            $mainDestination = 'public/images/slider/';
            $newName = time();
            $destination = $mainDestination . $newName . '.' . $ext;
            move_uploaded_file($fileTmpName, $destination);
        }
        $imgName = $newName . '.' . $ext;
        return [$imgName, $destination];
    }

    public static function sessionInit()
    {
        @session_start();
    }

    public static function sessionSet($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function sessionGet($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    public static function basketCookie()
    {
        if (isset($_COOKIE['basket'])) {
            $cookie = $_COOKIE['basket'];
        } else {
            $expire = time() + (7 * 24 * 60 * 60);
            $value = time() + rand(1, 1000000);
            $cookie = setcookie('basket', $value, $expire, '/');
        }
        return $cookie;
    }

    function getBasket()
    {
        $cookie = self::basketCookie();
        $sql = "SELECT tb.number, tb.id AS basketId, tp.*, tc.title AS colorTitle, tc.hex AS colorHex, tg.title AS guaranteeTitle FROM
        tbl_basket tb
        LEFT JOIN tbl_product tp ON tb.productId = tp.id
        LEFT JOIN tbl_color tc ON tb.color = tc.id
        LEFT JOIN tbl_guarantee tg ON tb.guarantee = tg.id
        WHERE cookie = ?";
        $result = $this->doSelect($sql, [$cookie]);

        $totalDiscountAll = 0;
        foreach ($result as $key => $value) {
            $discount = ($value['discount'] * $value['price']) / 100;
            $discountTotal = $discount * $value['number'];
            $result[$key]['discountTotal'] = $discountTotal;
            $totalDiscountAll += $discountTotal;
        }

        $totalPriceAll = 0;
        foreach ($result as $row) {
            $price = $row['price'];
            $number = $row['number'];
            $totalPrice = $price * $number;
            $totalPriceAll += $totalPrice;
        }
        return [$result, $totalPriceAll, $totalDiscountAll];
    }


    function calculatePostPrice($cityId)
    {
        $result = $this->getBasket();
        $basket = $result[0];
        $totalPriceAll = $result[1];

        $totalWeightAll = 0;
        foreach ($basket as $row) {
            $weight = $row['weight'];
            $number = $row['number'];
            $totalWeight = $weight * $number;
            $totalWeightAll += $totalWeight;
        }

        $buyType = 1;
        $helper = new helper('http://webservice1.link/ws/v1/rest/');

        $postTypeId = 1;
        $price = $helper->getPrices($cityId, $totalPriceAll, $totalWeightAll, $buyType, $postTypeId);
        if ($buyType == 1) {
            $postPricePishtaz = $price['posti'][$postTypeId]['post'];
        } else {
            $postPricePishtaz = $price['naghdi'][$postTypeId]['post'];
        }

        $postTypeId = 2;
        $price = $helper->getPrices($cityId, $totalPriceAll, $totalWeightAll, $buyType, $postTypeId);
        if ($buyType == 1) {
            $postPriceSefareshi = $price['posti'][$postTypeId]['post'];
        } else {
            $postPriceSefareshi = $price['naghdi'][$postTypeId]['post'];
        }
        $result = ['postPricePishtaz' => $postPricePishtaz / 10, 'postPriceSefareshi' => $postPriceSefareshi / 10];
        return $result;
    }

    public static function jaliliDate($dateFormat = 'Y/n/j')
    {
        require_once('public/jdf/jdf.php');
        $date = jdate($dateFormat);
        return $date;
    }

    public static function georgianToJalili($dateFormat = 'Y/n/j')
    {
        $date = explode('/', $dateFormat);
        $year = $date['0'];
        $month = $date['1'];
        $day = $date['2'];
        require_once('public/jdf/jdf.php');
        $date = gregorian_to_jalali($year, $month, $day);
        $date = implode('/',$date);
        return $date;
    }


}

class helper
{
    private $url;
    private $api_key;
    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    /**
     * list of errors
     *
     * @var array
     */
    private $errors = array();

    /**
     * @param string $webserviceUrl
     * @param string $apiKey
     */
    public function __construct($webserviceUrl)
    {
        $this->url = $webserviceUrl;
        $this->api_key = 'F4960daa89D73A33332382fE661E7a18';
    }

    public function getPrices($des_city, $price, $weight, $buy_type, $delivery_type)
    {
        $params = array(
            'des_city' => $des_city,
            'price' => $price,
            'weight' => $weight,
            'buy_type' => $buy_type,
            'send_type' => $delivery_type
        );
        return $this->call('order/getPrices.json', $params);
    }


    private function call($url, $params, $methodType = helper::METHOD_POST)
    {
        // flush error list
        $this->errors = array();
        if (stripos($url, 'http://') === false)
            $url = $this->url . $url;
        $params['api'] = $this->api_key;
        $data = http_build_query($params);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, $methodType === helper::METHOD_POST);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        $result = json_decode($result, true);
        if (json_last_error() == JSON_ERROR_NONE)
            return $this->parseResponse($result);
        throw new FrotelResponseException('Failed to Parse Response (' . json_last_error() . ')');
    }

    /**
     * parse webservice response
     *
     * @param array $response
     * @return bool
     * @throws FrotelResponseException
     * @throws FrotelWebserviceException
     */
    private function parseResponse($response)
    {
        if (!isset($response['code'], $response['message'], $response['result']))
            throw new FrotelResponseException('پاسخ دریافتی از سرور معتبر نیست.');
        if ($response['code'] == 0)
            return $response['result'];
        $this->errors[] = $response['message'];
        throw new FrotelWebserviceException($response['message']);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

class FrotelResponseException extends Exception
{
}

class FrotelWebserviceException extends Exception
{
}