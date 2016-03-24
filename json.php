<?php

include_once './library/DBConnect.php';
session_start();
$db = new DBConnect();
if (isset($_POST['login'])) {
    $registr = $db->createUser($_POST['login'], $_POST['email'], $_POST['pass']);
    if ($registr) {
        echo 'registration completed successfully';
    } else {
        echo 'This user name or a mail is already registered';
    }
}
if (isset($_POST['enter_login'])) {
    var_dump($_POST['enter_login']);
    var_dump($_POST['enter_pass']);
    $auth = $db->authUser($_POST['enter_login'], $_POST['enter_pass']);
    if ($auth) {
        echo 'authentication is successful';
        $_SESSION['user'] = $_POST['enter_login'];
        var_dump($_SESSION['user']);
    } else {
        echo'wrong login or password';
    }
}

$users = $db->getAllUsers();
$id=null;
for ($i = 0; $i < count($users); $i++) {
    if (!empty($_POST["$i"])) {
        $id = $_POST["$i"];
    }
}
if ($id!==null) {
    $deleteUser = $db->deleteUser($id);
    if ($deleteUser) {
        echo 'user is deleted';
    } else {
        echo 'user is not deleted';
    }
}
echo '<br/><a href="index.php">Go back</a>';