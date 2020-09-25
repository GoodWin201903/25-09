<?php

require_once 'db.php';

$name = $_POST['name'];
$description = md5($_POST['description']);
$price = $_POST['price'];
$category = $_POST['category_id'];

$stmt = $pdo->query('SELECT * FROM `products`');
$products = $stmt->fetchAll();
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Product</title>
</head>
<body>
<header>
    <h1>Товары</h1>
</header>
<table>
    <tr>
        <th>Строка</th>
        <th>Наименование</th>
        <th>Описание</th>
        <th>Цена</th>
        <th>Категория</th>
    </tr>
    <?php
    foreach ($products as $x) {
        echo '<tr>';
            echo '<td>'.$x['id'].'</td>';
            echo '<td>'.$x['name'].'</td>';
            echo '<td>'.$x['description'].'</td>';
            echo '<td>'.$x['price'].'</td>';
            echo '<td>'.$x['category_id'].'</td>';
        echo '</tr>';
    }?>



    <?php
    $stmt = $pdo ->query( 'SELECT `id`, `name`, `price` FROM `products`');
    while ($result = $stmt->fetch()) {
        echo '<tr>' .
            "<td>{$result['id']}</td>" .
            "<td>{$result['name']}</td>" .
            "<td>{$result['description']}</td>" .
            "<td>{$result['price']} ₽</td>" .
            "<td>{$result['category_id']}</td>" .
            "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
            '</tr>';
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
        //удаляем строку из таблицы
        $stmt = $pdo->query("DELETE FROM `products` WHERE `ID` = {$_GET['del_id']}");
        if ($sql) {
            echo "<p>Товар удален.</p>";
        } else {
            echo("Не нашел");
        }
    }
    ?>
    <th><input type="submit" name="btn_submit_register" value="Редактировать"></th>
</table>
</body>
</html>
