<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if(mb_strlen($username) < 2)
    $error = 'Ім\'я неможе бути менше двох символів';
else if (mb_strlen($login) < 5)
    $error = 'Логін не може бути менше п\'яти символів'; 
else if (mb_strlen($email) < 5)
    $error = 'Введіть коректну пошту'; 
else if (mb_strlen($pass) < 5)
    $error = 'Пароль не може бути менше п\'яти символів';

if ($error != '') {
    echo $error;
    exit;
}

require_once "../lib/mysql.php";
$salt = 'egyvfuck^DHSjh!JDKJ';
$pass = md5($salt.$pass);

$sql = 'INSERT INTO users(`name`, `email`, `login`, `password`) VALUES (?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo "Done";