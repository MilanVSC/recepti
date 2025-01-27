<?php
include_once 'session.php';
if (!isAdmin()) {
    msg('Nedovoljen dostop', 'warning');
    header('location: ../index.php');
    die();
}
include_once "db.php";

$title = $_POST['title'];
$description = $_POST['description'];
$id = $_POST['id'];

$sql = "UPDATE categories SET title=?, description=? WHERE id=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $description,$id]);


//preumseritev
header("Location: categories.php");
?>
