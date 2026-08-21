<?php
$username = trim(filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if(mb_strlen($username) < 2)
    $error = 'Ім\'я неможе бути менше двох символів';
else if (mb_strlen($email) < 5)
    $error = 'Введіть коректну пошту'; 
else if (mb_strlen($mess) < 10)
    $error = 'Повідомлення не може бути меншим 10 символів';

if ($error != '') {
    echo $error;
    exit;
}

$to = 'admin@gmail.com';
$subject = '=?utf-8?B?'. base64_encode('Нове повідомлення') .'?=';
$message = 'Користувач: '. $username .'<br>'. $mess;
$headers = "From: $email \r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8";

mail($to, $subject, $message, $headers);

echo "Done";