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
    $snapshot = $conn->getReference("Users")->getSnapshot();
    $keyArry = $conn->getReference("Users")->getChildKeys();
    
    if ($snapshot->hasChild($user) !== false) {
        $resultObj->error = 'Found-User';
        $resultObj->success = false;
        $resultObj->result = $snapshot->getChild($user)->getValue();

        return $resultObj;
    } else {
        
        $foundUser = null;

        foreach ($keyArry as $arr) {
            $emmAdd = $snapshot->getChild($arr)->getChild('email')->getValue();
            if(strcasecmp($emmAdd, $user) == 0)
            {
                $foundUser = $arr;
                break;
            }
        }
        if($foundUser !== null)
        {
            $resultObj->error = 'Found-User';
            $resultObj->success = false;
            $resultObj->result = $snapshot->getChild($foundUser)->getValue();

            return $resultObj;
        }
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
        ->update([$user => [
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
