<?php

$title = filter_var(trim($_POST['title']),FILTER_SANITIZE_STRING);
$intro = filter_var(trim($_POST['intro']),FILTER_SANITIZE_STRING);
$text = filter_var(trim($_POST['text']),FILTER_SANITIZE_STRING);
$error ='';

if(strlen($title) <=3)
    $error = 'Введите название статьи';
else if(strlen($intro) <=10)
    $error = 'Введите  интро';
else if(strlen($text) <=20)
    $error = 'Введите текст';
if($error != '') {
    echo $error;
    exit();
}

require_once '../mysql_connect.php';

$sql = 'INSERT INTO articles(title,intro,text, date, avtor) VALUES (?,?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$title, $intro, $text, time(), $_COOKIE['login']]);

echo 'Готово';

?>