<?php

$host = 'localhost';
$dbName = 'testing';
$username = 'root';
$password = '';
$port = '3306';

$name = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);
$login = filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']),FILTER_SANITIZE_STRING);

if(strlen($name) <=3)
    exit();
else if(strlen($login) <=3)
    exit();
else if(strlen($email) <=3)
    exit();
else if(strlen($pass) <=3)
    exit();

$hash = "qwerty";
$pass = md5($pass . $hash);

$dsn = "mysql:host=$host;dbname=$dbName";
$pdo = new PDO($dsn, $username, $password);
$sql = "INSERT INTO users(name,email,login,pass) VALUES (?,?,?,?)";
$query = $pdo->prepare($sql);
$query->execute([$name, $email, $login, $pass]);

?>