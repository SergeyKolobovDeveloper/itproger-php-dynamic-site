<?php
$website_title = 'Рейстрація';
require "../blocks/header.php";
?>
<main>
    <h1>Рейстрація</h1>
    <form>
        <label for="username">Ваше ім'я</label>
        <input type="text" name="username" id="username">

        <label for="login">Логін</label>
        <input type="text" name="login" id="login">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="password">Пароль</label>
        <input type="password" name="password" id="password">

        <div class="error-mess" id="error-mess"></div>

        <button type="button" id="reg_user">Зареєструватися</button>
    </form>
</main>
<?php require "../blocks/aside.php" ?>
<?php require "../blocks/footer.php" ?>
<script>
    $('#reg_user').click(function() {
        let name = $('#username').val();
        let login = $('#login').val();
        let email = $('#email').val();
        let pass = $('#password').val();

        $.ajax({
            url: '/../ajax/reg.php',
            type: 'POST',
            cache: false,
            data: {
                'username': name, 
                'login': login, 
                'email': email, 
                'password': pass
            },
            dataType: 'html',
            success: function(data) {
                if (data === "Done") {
                    $("#reg_user").text("Все чудово!");
                    $("#error-mess").hide();
                }
                else {
                    $("#error-mess").show();
                    $("#error-mess").text(data);
                }
            }
        });
    });
</script>