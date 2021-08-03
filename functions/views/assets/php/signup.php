<?php

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    define('MyConst', true);
    require_once 'database.php';
    require_once 'functions.php';
    $response = userExists($database, $username, $email);
    if ($response->success == false) {
        echo json_encode($response);
    } else {
        $response = createUser($database, $username, $email, $password);
        if ($response->success == false) {
            echo json_encode($response);
        } else {
            $_SESSION['username'] = $username;
            echo json_encode($response);
        }
    }
} else {
    header('Location: ../../404.php');
    exit();
}
