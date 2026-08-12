<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if(mb_strlen($username) < 2)
    exit;
else if (mb_strlen($login) < 5)
    exit; 
else if (mb_strlen($email) < 5)
    exit; 
else if (mb_strlen($pass) < 5)
    exit;

$user = 'root';
$password = 'root';
$db = 'itproger_php_dynamic_site';
$host = 'localhost';
$port = '3306';

$dsn = 'mysql:host='.$host.';dbname='.$db.';port='.$port;
$pdo = new PDO($dsn, $user, $password);

$salt = 'egyvfuck^DHSjh!JDKJ';
$pass = md5($salt.$pass);

$sql = 'INSERT INTO users(`name`, `email`, `login`, `password`) VALUES (?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);