<?php

$username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

$error ='';
if(strlen($username) <=3)
    $error = 'Введите имя';
else if(strlen($email) <=3)
    $error = 'Введите  email';
else if(strlen($login) <=3)
    $error = 'Введите login';
else if(strlen($pass) <=3)
    $error = 'Введите пароль';
if($error != '') {
    echo $error;
    exit();
    }

$hash = "qwerty";
$pass = md5($pass . $hash);

require_once '../mysql_connect.php';

$sql = 'INSERT INTO users(name,email,login,pass) VALUES (?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo 'Готово';

?>