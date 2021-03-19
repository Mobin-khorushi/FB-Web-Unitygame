<?php

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    define('MyConst', true);
    require_once 'database.php';
    require_once 'functions.php';
    $response = loginUser($database, $email, $password);
    if ($response->success === true) {
        $_SESSION['username'] = $response->result->result['name'];
    }
        
    echo json_encode($response);
} else {
    header('Location: ../../404.php');
    exit();
}
