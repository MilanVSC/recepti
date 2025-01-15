<?php
include_once "session.php";
include_once "db.php";

$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$category_id = (int) $_POST['category_id'];
$description = $_POST['description'];
$duration =  (int) $_POST['duration'];
$level = (int) $_POST['level'];
$number_of_people = (int) $_POST['number_of_people'];
$proceedings = (int) $_POST['proceedings'];
$ingredients = (int) $_POST['ingredients'];

$sql = "INSERT INTO recipes (user_id, title, category_id, description, duration, level, number_of_people, proceedings, ingredients)
    VALUES (?,?,?,?,?,?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id,$title, $category_id, $description, $duration, $level, $number_of_people, $proceedings, $ingredients]);

header("location: recipes.php");