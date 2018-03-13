<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <title>Загрузка тестов</title>
    <style>
        form {
            text-align: left;
            width: 30%;
            margin: 5% auto;
        }

        input {
            display: block;
            margin-bottom: 10px;
        }

        a {
            margin-left: 35%;
            font-size: 26px;
        }
    </style>
</head>
<body>
<form action="" enctype="multipart/form-data" method="post">
    <p>Загрузите файл в формате json:</p>
    <input type="file" name="testfile">
    <input type="submit" value="Загрузить тест" name="submit">
</form>

<a href="list.php">Перейти к тестам</a><br>


<?php
if (isset($_FILES['testfile'])) {
    if (is_uploaded_file($_FILES['testfile']['tmp_name'])) {
        $uploaddir = 'tests/';
        $uploadfile = $uploaddir . basename($_FILES['testfile']['name']);
        if (end(explode('.' , $_FILES['testfile']['name'])) !== 'json') {
            echo 'Принимаются файлы только в формате json!';
            exit;
        }
        if ($_FILES['testfile']['error'] === UPLOAD_ERR_OK && move_uploaded_file($_FILES['testfile']['tmp_name'] , $uploadfile)) {
            echo "<h3>Файл успешно загружен на сервер</h3>";
        } else {
            echo "<h3>Ошибка! Не удалось загрузить файл</h3>";
            exit;
        }
    }
}
?>
</body>
</html>
