<?php
include_once'db.php';

$email = $_POST['email'];
$password = $_POST['pass'];

if (!empty($email) && !empty($password)) {
    //vse ok
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    //preverimo, če uporabnik obstaja in če je pravilno geslo
    if ($user && password_verify($password, $user['pass'])) {
        //vse ok
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
    }
    else {
        header('location: login.php');
    }
}

else {
    header('location:login.php');
}

?>