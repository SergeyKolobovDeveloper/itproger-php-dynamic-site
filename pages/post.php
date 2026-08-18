<?php
require_once '../lib/mysql.php';

$sql = 'SELECT * FROM `articles` WHERE `id` = ?';
$query = $pdo->prepare($sql);
$query->execute([$_GET['id']]);

$article = $query->fetch(PDO::FETCH_OBJ);

$website_title = $article->title;
require "../blocks/header.php";
?>
    <main>
        <?php
            echo "<div class='post'>
            <h1>". $article->title ."</h1>
            <p>". $article->anons ."</p><br>
            <p>". $article->full_text ."</p>
            <p class='author'>Автор: <span>". $article->author ."</span></p>
            <p class='author'>Час публікації: ". date("d-m-Y H:i:s", $article->date) ."</p>
            </div>";
        ?>
    </main>
<?php require "../blocks/aside.php" ?>
<?php require "../blocks/footer.php" ?>