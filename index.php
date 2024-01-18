<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$website_title = 'PHP блог';
require 'blocks/head.php';
?>
</head>
<body>
<?php require 'blocks/header.php'; ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
        <?php
        require_once 'mysql_connect.php';

        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            echo "<h2>$row->title</h2>
                    <p>$row->intro</p>
                   ad
                    <a href='/news.php?id=$row->id' title='$row->title'>
                    <button class='btn btn-warning mb-5'>Прочитать больше</button>;
            </a>";
            }
          ?>
        </div>
    <?php require 'blocks/main.php'; ?>
    </div>
</main>
<!--
//$host = 'localhost';
//$db = 'testing';
//$user = 'root';
//$password = '';
//$port = '3306';
//$error ='';
//
//$dsn = 'mysql:host='. $host .';dbname='.$db;
//$pdo = new PDO($dsn, $user, $password);

//$login = 'Alexxx';
//$email = 'qwertyTest@test.ru';
//$name = 'Alexey';
//$pass = 'password';
//
//$sql = 'INSERT INTO users(login, email, name, pass) VALUES(:login, :email, :name, :pass)';
//$query = $pdo->prepare($sql);
//$query->execute(['login'=> $login, 'email'=> $email, 'name'=> $name, 'pass'=> $pass]);
//var_dump($query);
//$id = 7;
//$login = "New Login";
//$email = "AaAa@aAaA.com";
//
//$sql = 'UPDATE `users` SET `login` = :login, `email` = :email WHERE `id` = :id';
//$query = $pdo->prepare($sql);
//$query->execute(['login' => $login, 'email' => $email, 'id' => $id]);

//$id = 15;
//$sql = 'DELETE FROM `users` WHERE `id` = :id';
//$query = $pdo->prepare($sql);
//$query->execute(['id' => $id]);

//$num = 15;
//switch ($num) {
//    case "56":
//        echo '$num= "56"';
//        break;
//    case 5:
//        echo '$num= 5';
//        break;
//    case 4:
//        echo '$num= 4';
//        break;
//    case "5":
//        echo '$num= "5"';
//        break;
//    default:
//        echo 'Error';
//};

$arr_1 = array(0, 4, "some", 1.2, true);
$arr_2 =[5,7];
$arr_1[2]
--!>
<?php require 'blocks/footer.php'; ?>
</body>
</html>
