<?php
$website_title = 'Зворотній зв\'язок';
require "../blocks/header.php";
?>
<main>
    <h1>Зворотній зв'язок</h1>
    <form>
        <label for="username">Ваше ім'я</label>
        <input type="text" name="username" id="username">

        <label for="email">Ваша пошта</label>
        <input type="email" name="email" id="email">

        <label for="mess">Повідомлення</label>
        <textarea name="mess" id="mess"></textarea>

        <div class="error-mess" id="error-mess"></div>

        <button type="button" id="mess_send">Відправити</button>
    </form>
</main>
<?php require "../blocks/aside.php" ?>
<?php require "../blocks/footer.php" ?>
<script>
    $('#mess_send').click(function() {
        let name = $('#username').val();
        let email = $('#email').val();
        let mess = $('#mess').val();

        $.ajax({
            url: '/../ajax/mail.php',
            type: 'POST',
            cache: false,
            data: {
                'name': name, 
                'email': email, 
                'mess': mess
            },
            dataType: 'html',
            success: function(data) {
                if (data === "Done") {
                    $("#mess_send").text("Все чудово!");
                    $("#error-mess").hide();
                    $("#username").val("");
                    $("#email").val("");
                    $("#mess").val("");
                }
                else {
                    $("#error-mess").show();
                    $("#error-mess").text(data);
                }
            }
        });
    });
</script>