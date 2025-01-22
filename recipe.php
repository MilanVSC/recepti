<?php
include_once 'header.php';
include_once 'db.php';

$id = (int) $_GET['id'];

$sql = "SELECT r.*, c.title AS category, u.first_name, u.last_name
        FROM users u INNER JOIN recipes r ON r.user_id = u.id INNER JOIN categories c ON c.id=r.category_id
        WHERE r.id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

$row = $stmt->fetch();
?>

<h1>Pregled recepta</h1>

<div id='recept'>
    <div id="ime_recepta"><?php echo $row ['title']; ?></div>
    <div id="kategorija"><?php echo $row ['category']; ?></div>
    <div id="Slike">
        <?php
        $sql = "SELECT * FROM images WHERE recipe_id=? ORDER BY date_add";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        while ($image = $stmt->fetch()) {
            echo'<div class="slika"><img src="'.$image['url'].'" alt="" width="100px"/></div>';
        }
        ?>
        
        <div class="slika"><img src="" alt=""/></div>
        <div class="slika"><img src="" alt=""/></div>
    </div>
    <form action="recipe_image_upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <input type="file" name="fileToUpload" required="required" placeholder="Naloži sliko recepta"/>
        <input type="submit" name = "submit" value="Naloži"/>

    </form>
    <div id="opis_recepta"><?php echo $row ['description']; ?></div>
    <div id="podrobnosti">
        <div id="postopek"><?php echo $row ['proceedings']; ?></div>
        <div id="sestavine"><?php echo $row ['ingredients']; ?></div>
    </div>
    <div id="cas"><?php echo $row ['duration']; ?> min</div>
    <div id="<?php echo $row ['level']; ?>">2</div>

</div>

<?php
include_once 'footer.php';
?>
