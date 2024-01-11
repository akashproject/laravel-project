<?php

$env = env('APP_ENV');

$date = date('Y-m-d');
$time = date('H:i:s');
$dateTime = $date . ' ' . $time;
$gender = [
    1 => "Male",
    2 => "Female",
    3 => "Other"
];

return [
    
    "admin" => "admin",
    "from_email" => "noreply@divysoft.in",
    "date_time" => $dateTime,
    "default_user" => "backend/img/user.jpg",
    "upload_path" => base_path() . '/public/uploads',
    "gender" => $gender,
   /* "social_media" => $social_media,
    "social_media_icon" => $social_media_icon,
    "currency" => 'USD',
    "currency_sign" => '$',
    "order_status" => $status,
    'admin_email' => 'admin@jewellery.com',
    'contact_number' => '888 555 6545',
    'stripepublishKey' => $stripepublishKey,
    'stripeSecretKey' => $stripeSecretKey,*/

    'APP_NAME' => env('APP_NAME', 'Hello'),
    // 'env' => env('APP_ENV', 'production'),
];
