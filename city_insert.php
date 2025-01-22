<?php
include_once 'session.php';
if (!isAdmin()) {
    header('location: ../index.php');
    die();
}
include_once "db.php";

$title = $_POST['title'];
$post_number = $_POST['post_number'];

$sql = "INSERT INTO cities (title, post_number) VALUES (?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $post_number]);


//preumseritev
header("Location: cities.php");
?>
