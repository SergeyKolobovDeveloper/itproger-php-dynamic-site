<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
$mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_SPECIAL_CHARS));
$id = trim(filter_var($_POST['id'], FILTER_SANITIZE_SPECIAL_CHARS));

$error = '';

if(mb_strlen($username) < 2)
    $error = 'Ім\'я неможе бути менше двох символів';
else if (mb_strlen($mess) < 5)
    $error = 'Повідомлення не може бути менше п\'яти символів'; 

if ($error != '') {
    echo $error;
    exit;
}

require_once "../lib/mysql.php";

$sql = 'INSERT INTO comments(`name`, `mess`, `article_id`) VALUES (?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $mess, $id]);

echo "Done";