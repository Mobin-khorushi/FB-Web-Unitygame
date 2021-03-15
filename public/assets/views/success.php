<?php 

session_start();

if(!isset($_POST['title'])){
    header('Location: ../../404.php');
    exit();
}
if(isset($_POST['logout'])){
    unset($_SESSION['username']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="../images/favicon.html" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Plugin css -->
    <link rel="stylesheet" href="../css/plugin.css">

    <!-- stylesheet -->
    <link rel="stylesheet" href="../css/success.css">
    <!-- responsive -->
    <link rel="stylesheet" href="../css/responsive.css">

</head>

<body>
    <div class="container" id="containerM">
        <div class="container" id="titleMsg">
        <h2>Success!</h2>
        <br/>
        <h1><?php echo $_POST['title']?></h1>
        </div>
        <br/><br/><br/>
        <div class="container" id="mainMsg">
        <p><?php echo $_POST['message']?></p>
        
        <a href="../../">Click here to return to main page!</a>
        </div>          
    </div>
</body>

</html>