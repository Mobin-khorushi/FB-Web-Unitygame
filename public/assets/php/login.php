<?php

session_start();

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    define('MyConst', TRUE);
    require_once 'database.php';
    require_once 'functions.php';
    $response = loginUser($conn,$email,$password);
    if($response->success === true)
    {
        $_SESSION['username'] = $response->result->result['username'];
    }
        
    echo json_encode($response);
}
else
{
    header('Location: ../../404.php');
    exit();
}