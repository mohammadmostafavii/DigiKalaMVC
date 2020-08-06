<?php

new Model;
$option = Model::getOption();

define('URL', $option['url']); //http://127.0.0.1/digikalamvc/
date_default_timezone_set('Asia/Tehran');
define('zarinPalMerchantID', $option['MID']);//f0a107a8-eb7c-11e5-8af1-005056a205be
define('CallbackURL', 'http://www.digikala.ir/checkOut');
define('zarinPalWebAddress', 'https://www.zarinpal.com/pg/services/WebGate/wsdl');
define('usance', $option['usance']);//24
define('body_color', $option['body_color']); //#dddddd
define('menu_color', $option['menu_color']); //#f7f8fa

$zarinPalErrors = [
    '-1' => 'اطلاعات ارسال شده ناقص است.',
    '-2' => 'IP و یا مرچنت کد پذیرنده صحیح نیست',
    '-3' => 'رقم باید بالای 100 تومان باشد.',
    '-4' => 'سطح تائید پذیرنه پایین تر از سطح نقره ای است',
    '-11' => 'درخواست مورد نطر یافت نشد.',
    '-10' => 'ازش بی خبرم',
    '-13' => 'از اینم اطلاعی ندارم',
    '-21' => 'هیچ نوع عملیات مالی برای این تراکنش یافت نشد.',
    '-22' => 'تراکنش ناموفق می باشد.',
    '-33' => 'رقم تراکنش با رقم پرداخت شده مطابقت ندارد.',
    '-54' => 'درخواست موردنظر آرشیو شده.',
    '100' => 'عملیات با موفقیت انجام شد.',
    '101' => 'عملیات پرداخت با موفقیت انجام شده ولی قبلا عملیات PaymentVerification بر روی این تراکنش انجام شده است.',
];

define('zarinPalErrors', serialize($zarinPalErrors));
