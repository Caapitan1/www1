<!doctype html>
<html lang="en">
<head>
    <?php
    $website_title = 'Авторизация на сайте';
    require 'blocks/head.php';
    ?>
</head>
<body>
<?php
require 'blocks/header.php';
?>
<main>
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php
            if($_COOKIE['login'] == ''):
            ?>
            <h4>Форма авторизации</h4>
            <form action="" method="post">
                <label for="login">Логин</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-3" id="errorBlock">S</div>
                <button type="button" id="auth_user" class="btn btn-success mt-3"> Войти
                </button>
            </form>
            <?php
            else:
            ?>
            <h2><?=$_COOKIE['login']?></h2>
            <button class="btn btn-danger" id="exit_btn">Выйти</button>
            <?php
            endif;
            ?>
        </div>
    </div>
</main>
<?php
require 'blocks/footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
        $('#exit_btn').click(function () {
        $.ajax({
            url:'ajax/exit.php',
            type: 'POST',
            cache: 'false',
            data: {},
            dataType: 'html',
            success: function(data) {
                document.location.reload(true);
            }
        });
    });

    $('#auth_user').click(function () {
        var login = $ ('#login').val();
        var pass = $ ('#pass').val();

        $.ajax({
            url:'ajax/auth.php',
            type: 'POST',
            cache: 'false',
            data: {'login' : login, 'pass': pass},
            dataType: 'html',
            success: function(data) {
                if(data == 'Готово') {
                    $('#auth_user').text('Все готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
                }
                else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(data);
                }
            }
        });
    });
</script>
</body>
</html>
