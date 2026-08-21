<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="/../css/main.css">
    <title><?= $website_title ?></title>
</head>
<body>
<header>
    <span class="logo">Blog Master</span>
    <nav>
        <a href="/">Головна</a>
        <a href="../pages/contact.php">Зворотній зв'язок</a>
        <?php if(isset($_COOKIE['login'])): ?>
            <a href="../pages/add-article.php">Додати статтю</a>
            <a href="../auth/login.php" class="btn">Кабінет користувача</a>
        <?php else: ?>
            <a href="../auth/login.php" class="btn">Увійти</a>
            <a href="../auth/register.php" class="btn">Рейстрація</a>
        <?php endif; ?>
    </nav>
</header>