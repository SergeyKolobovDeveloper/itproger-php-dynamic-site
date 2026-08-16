<?php
$title = trim(filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS));
$anons = trim(filter_var($_POST['anons'], FILTER_SANITIZE_SPECIAL_CHARS));
$full_text = trim(filter_var($_POST['full_text'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if(mb_strlen($title) < 5)
    $error = 'Назва статті не може бути менше п\'яти символів';
else if (mb_strlen($anons) < 10)
    $error = 'Анонс статті не може бути менше десяти символів'; 
else if (mb_strlen($full_text) < 10)
    $error = 'Основний текст не може бкти менше десяти символів'; 

if ($error != '') {
    echo $error;
    exit;
}

require_once "../lib/mysql.php";

$sql = 'INSERT INTO `articles`(`title`, `anons`, `full_text`, `date`, `author`) VALUES (?, ?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $anons, $full_text, time(), $_COOKIE['login']]);

echo "Done";