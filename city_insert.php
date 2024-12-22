<?php
include_once "db.php";

$title = $_POST['title'];
$post_number = $_POST['post_number'];

$sql = "INSERT INTO cities (title, post_number) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $post_number]);


//preumseritev
header("Location: cities.php");
?>

git branch -m master main
git push -u origin main