<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <title>Тест</title>
    <style>
        fieldset {
            color: #f3faff;
            background: #9493c8;
            border: 5px dashed rebeccapurple;
            width: 40%;
            margin: 0 auto 20px;
        }

        input[type="radio"] {
            margin-left: 15px;
        }

        input[type="submit"] {
            color: #f3faff;
            background: #9493c8;
            margin-left: 30%;
            width: 40%;
            border: 5px dashed rebeccapurple;
            font: bold 26px/30px Bitter;
        }

        p {
            color: rebeccapurple;
            margin-left: 30%;
            font-size: 26px;
        }
    </style>
</head>
<body>
<form method="post">
    <?php
    if (!empty($_GET["name"])) {
        $test = json_decode(file_get_contents('./tests/' . $_GET["name"] . '.json'));
        foreach ($test->questions as $question) {
            echo '<fieldset>';
            echo '<h3>' . $question->question . '</h3>';
            foreach ($question->choices as $key => $choice) {
                echo '<input  type="radio" value="' . $key . '" name="' . $question->id . '"><label>' . $choice . '</label>';
            }
            echo '</fieldset>';
        }
    }
    ?>
    <input type="submit" value="Принять ответы">
</form>
</body>
</html>
<?php
if ($_POST) {
    $counter = 0;
    foreach ($_POST as $number => $answer) {
        foreach ($test->questions as $question) {
            if ($answer === $question->correct && $number === $question->id) {
                $counter++;
            }
        }
    }
    echo '<p>Количество правильных ответов: ' . $counter . '</p>';
}
?>