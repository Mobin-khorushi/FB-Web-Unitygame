<?php



if(!defined('MyConst')) {
    header('Location: ../../404.php');
    exit();
 }
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', '2pgames');

$dbHost = DB_SERVER;
$dbUser = DB_USERNAME;
$dbPass = DB_PASSWORD;
$dbName = DB_NAME;

$conn = mysqli_connect($dbHost, $dbUser, $dbPass);
 
// Check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $sql = "CREATE DATABASE IF NOT EXISTS ${dbName}";
    if (mysqli_query($conn, $sql)) {
        mysqli_close($conn);
      } else {
        die("Error creating database: " .  mysqli_error($conn));
      }
}
$conn = mysqli_connect($dbHost, $dbUser, $dbPass,$dbName);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else{
    $sql = "SELECT 1 FROM `userinfo` LIMIT 1;";
    if(!mysqli_query($conn,$sql)) {
        $sql = "CREATE TABLE IF NOT EXISTS `userinfo` (
            `id` int(11) NOT NULL,
            `username` text DEFAULT NULL,
            `password` text DEFAULT NULL,
            `email` text DEFAULT NULL,
            `ipaddress` text DEFAULT NULL);";
        if ($conn->query($sql) === TRUE) {
        } else {
        echo "Error creating table userInfo: " . mysqli_error($conn);
        }
        $sql = "ALTER TABLE `userinfo`
        ADD PRIMARY KEY (`id`);";
        if (mysqli_query($conn, $sql)) {
        } else {
        echo "Error alter id in userInfo: " . mysqli_error($conn);
        }
        $sql = "ALTER TABLE `userinfo`
                MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
        if (mysqli_query($conn, $sql) === TRUE) {
        } else {
        echo "Error alter table userInfo: " . mysqli_error($conn);
        }
    } 
}

