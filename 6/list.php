<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <title>Список загруженных тестов</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            text-transform: capitalize;
            background: #8fffb2;
            border-collapse: collapse;
            margin: auto;
        }
        td {
            border: 5px dashed #0a6d5e;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <h1>Список тестов</h1>
    <table>
<?php
    $files = array_diff(scandir('tests/' ), Array( ".", ".." ));
    $counter = 1;
if (!empty($files)) {
    foreach ($files as $file) {
        if ('json' === end(explode('.', $file))) {
            $test = pathinfo($file)['filename'];
            echo '<tr><td>' . $counter . '</td><td><a href="test.php?name=' . $test . '">' . $test . '</a></td></tr>';
            $counter++;
        }
    }
} else {
    echo '<tr><td>Ни один файл не загружен!</td></tr>';
}
?>
    </table>
</body>
</html>