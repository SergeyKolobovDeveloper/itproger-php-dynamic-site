<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if (mb_strlen($login) < 5)
    $error = 'Логін не може бути менше п\'яти символів'; 
else if (mb_strlen($pass) < 5)
    $error = 'Пароль не може бути менше п\'яти символів';

if ($error != '') {
    echo $error;
    exit;
}

require_once "../lib/mysql.php";
$salt = 'egyvfuck^DHSjh!JDKJ';
$pass = md5($salt.$pass);

$sql = 'SELECT `id` FROM `users` WHERE `login` = ? AND `password` = ?';

$query = $pdo->prepare($sql);
$query->execute([$login, $pass]);

if($query->rowCount() == 0) {
    echo 'Такого користувача немає';
} else {
    setcookie('log', $login, time() + 3600 * 24 * 30, '/');
    echo 'Done';
}