<?php 
$website_title = "Blog Master";
require "blocks/header.php";
?>
    <main>
        <?php
        require_once 'lib/mysql.php';

        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<div class='post'>
            <h1>". $row->title ."</h1>
            <p>". $row->anons ."</p>
            <p class='author'>Автор: <span>". $row->author ."</span></p>
            <a href='/'>Читати</a>
            </div>";
        }
        ?>
    </main>
<?php require "blocks/aside.php" ?>
<?php require "blocks/footer.php" ?>