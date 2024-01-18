<?php
$host = 'localhost';
$db = 'testing';
$user = 'root';
$password = '';
$port = '3306';
$error ='';

$dsn = 'mysql:host='. $host .';dbname='.$db;
$pdo = new PDO($dsn, $user, $password);
?>