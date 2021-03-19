<?php



if (!defined('MyConst')) {
    header('Location: ../../404.php');
    exit();
}
function userExists($conn, $user, $email)
{
    $resultObj = (object) [
        'success' => false,
        'error' => 'Default Error',
        'result' => null,

    ];
    $sql = "SELECT * FROM userinfo WHERE username = ? or email = ?;";
    $snapshot = $conn->getReference("Users")->getSnapshot();

    if ($snapshot->hasChild($user) !== false) {
        $resultObj->error = 'Found-User';
        $resultObj->success = false;
        $resultObj->result = $snapshot->getChild($user)->getValue();

        return $resultObj;
    } else {
        $resultObj->error = 'Not-Found';
        $resultObj->success = true;
        $resultObj->result = null;

        return $resultObj;
    }
}

function createUser($conn, $user, $email, $password)
{
    $resultObj = (object) [
        'success' => false,
        'error' => 'Default Error',
        'result' => null,

    ];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);


    $res = $conn->getReference("Users")
        ->set([$user => [
        'name' => $user,
        'email' => $email,
        'password' => $hashPass
      ]]);

    if ($res === null) {
        $resultObj->error = "Statment failed to get database information";
        $resultObj->success = false;
        $resultObj->result = $res;
        return $resultObj;
    }
    $resultObj->error = null;
    $resultObj->success = true;
    $resultObj->result = $res;
    return $resultObj;
}
function getUserName($conn, $email)
{
}
function loginUser($conn, $email, $password)
{
    $resultObj = (object) [
        'success' => false,
        'error' => 'Default Error',
        'result' => null,

    ];
    $userRes = userExists($conn, $email, $email);

    if ($userRes->success === true) {
        $resultObj->error = "User not found!";
        $resultObj->success = false;
        $resultObj->result = null;
        return $resultObj;
    } elseif ($userRes->success === false) {
        $pwdHashed = $userRes->result['password'];
        $checkPass = password_verify($password, $pwdHashed);
        if ($checkPass === false) {
            $resultObj->error = "Wrong password!";
            $resultObj->success = false;
            $resultObj->result = null;
            return $resultObj;
        } else {
            $resultObj->error = "";
            $resultObj->success = true;
            $resultObj->result = $userRes;
            return $resultObj;
        }
    }
    return $resultObj;
}
