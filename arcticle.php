<?php
if($_COOKIE['login'] == '') {
    header('Location: /reg.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    $website_title = 'Добавление статьи';
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
            <h4>Добавление статьи</h4>
            <form method="post" class="form">
                <label for="title">Заголовок статьи</label>
                <input type="text" name="title" id="title" class="form-control">

                <label for="intro">Интро статьи</label>
               <textarea name="intro" id="intro" class="form-control"></textarea>

                <label for="text">Текст статьи</label>
                <textarea name="text" id="text" class="form-control"></textarea>

                <div class="alert alert-danger mt-3" id="errorBlock">s</div>
                <button type="button" id="article_send" class="btn btn-success mt-3"> Добавить</button>
            </form>
        </div>
    </div>
</main>
<?php
require 'blocks/footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $('#article_send').click(function () {
        var title = $ ('#title').val();
        var intro = $ ('#intro').val();
        var text = $ ('#text').val();


        $.ajax({
            url:'ajax/add_article.php',
            type: 'POST',
            cache: 'false',
            data: {'title' : title, 'intro' : intro, 'text': text},
            dataType: 'html',
            success: function(data) {
                if(data == 'Готово') {
                    $('#article_send').text('Все готово');
                    $('#errorBlock').hide();
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
