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

if (!empty($title)) {
    $sql = "INSERT INTO categories (title, description) VALUES (?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description]);

//preumseritev
    header("Location: categories.php");
    die();
}

header("Location: category_add.php");
?>
