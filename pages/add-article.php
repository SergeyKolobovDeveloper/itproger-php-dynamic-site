<?php
if(!isset($_COOKIE['login'])){
    header('Location: /../auth/register.php');
    exit;
}
$website_title = 'Додати статтю';
require "../blocks/header.php";
?>
<main>
    <h1>Додати статтю</h1>
    <form>
        <label for="title">Назва статті</label>
        <input type="text" name="title" id="title">

        <label for="anons">Анонс статті</label>
        <textarea name="anons" id="anons"></textarea>

        <label for="full_text">Основний текс</label>
        <textarea type="text" name="full_text" id="full_text"></textarea>

        <div class="error-mess" id="error-mess"></div>

        <button type="button" id="add_article">Додати</button>
    </form>
</main>
<?php require "../blocks/aside.php" ?>
<?php require "../blocks/footer.php" ?>
<script>
    $('#add_article').click(function() {
        let title = $('#title').val();
        let anons = $('#anons').val();
        let full_text = $('#full_text').val();

        $.ajax({
            url: '/../ajax/add-article.php',
            type: 'POST',
            cache: false,
            data: {
                'title': title, 
                'anons': anons, 
                'full_text': full_text
            },
            dataType: 'html',
            success: function(data) {
                if (data === "Done") {
                    $("#add_article").text("Все чудово!");
                    $("#error-mess").hide();
                    $("#title").val("");
                    $("#anons").val("");
                    $("#full_text").val("");
                }
                else {
                    $("#error-mess").show();
                    $("#error-mess").text(data);
                }
            }
        });
    });
</script>