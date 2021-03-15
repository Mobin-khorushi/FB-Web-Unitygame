<?php



if(!defined('MyConst')) {
    header('Location: ../../404.php');
    exit();
 }
function userExists($conn,$user,$email){
    $resultObj = (object) [
        'success' => false,
        'error' => 'Default Error',
        'result' => null,

    ];
    $sql = "SELECT * FROM userinfo WHERE username = ? or email = ?;";
    $statement = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql)){
        $resultObj->error = "Statment failed to get database information";
        $resultObj->success = false;
        $resultObj->result = mysqli_stmt_error_list ($statement);
        return $resultObj;
    }
    mysqli_stmt_bind_param($statement,"ss",$user,$email);
    mysqli_stmt_execute($statement);
    $dataRes = mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($dataRes)){
        $resultObj->error = '';
        $resultObj->success = false;
        $resultObj->result = $row;
        mysqli_stmt_close($statement);
        return $resultObj;
    }else {
        $resultObj->error = '';
        $resultObj->success = true;
        $resultObj->result = null;
        mysqli_stmt_close($statement);
        return $resultObj;
    }
    
}

function createUser($conn,$user,$email,$password){
    $resultObj = (object) [
        'success' => false,
        'error' => 'Default Error',
        'result' => null,

    ];
    $hashPass = password_hash($password,PASSWORD_DEFAULT);

    $sql = "INSERT INTO userinfo (username,email,password) VALUES (?,?,?)";
    $statement = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql)){
        $resultObj->error = "Statment failed to get database information";
        $resultObj->success = false;
        $resultObj->result = mysqli_stmt_error_list ($statement);
        return $resultObj;
    }
    mysqli_stmt_bind_param($statement,"sss",$user,$email,$hashPass);
    mysqli_stmt_execute($statement);
    $dataRes = mysqli_stmt_get_result($statement);
    mysqli_stmt_close($statement);
    
    $resultObj->error = null;
    $resultObj->success = true;
    $resultObj->result = $dataRes;
    return $resultObj;
}
function getUserName($conn,$email){

}
function loginUser($conn,$email,$password){
    $resultObj = (object) [
        'success' => false,
        'error' => 'Default Error',
        'result' => null,

    ];
    $userRes = userExists($conn,$email,$email);

    if($userRes->success === true){
        $resultObj->error = "User not found!";
        $resultObj->success = false;
        $resultObj->result = null;
        return $resultObj;
    }
    else if($userRes->success === false && $userRes->error == '')
    {
        $pwdHashed = $userRes->result['password'];
        $checkPass = password_verify($password,$pwdHashed);
        if($checkPass === false)
        {
            $resultObj->error = "Wrong password!";
            $resultObj->success = false;
            $resultObj->result = null;
            return $resultObj;
        }
        else{
            $resultObj->error = "";
            $resultObj->success = true;
            $resultObj->result = $userRes;
            return $resultObj;
        }
    }
    return $resultObj;
}