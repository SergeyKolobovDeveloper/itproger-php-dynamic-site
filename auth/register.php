<?php
$website_title = 'Рейстрація';
require "../blocks/header.php";
?>
<main>
    <h1>Рейстрація</h1>
    <form action="../ajax/reg.php" method="post">
        <label for="username">Ваше ім'я</label>
        <input type="text" name="username" id="username">

        <label for="login">Логін</label>
        <input type="text" name="login" id="login">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Пароль</label>
        <input type="password" name="password" id="password">

        <button type="submit">Зареєструватися</button>
    </form>
</main>
<?php require "../blocks/aside.php" ?>
<?php require "../blocks/footer.php" ?>