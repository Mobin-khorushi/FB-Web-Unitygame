<?php
if (!defined('MyConst')) {
    header('Location: ../../404.php');
    exit();
}

require __DIR__.'/../vendor/autoload.php';
use Kreait\Firebase\Factory;

$firebase = (new Factory)
->withServiceAccount( __DIR__.'/../../../pgames-4dad9-firebase-adminsdk-ml36d-c0ec1d8b60.json')
->withDatabaseUri('https://pgames-4dad9.firebaseio.com/');
$database = $firebase->createDatabase();
