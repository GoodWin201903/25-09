<?php
require_once 'db.php';

$name = $_POST['name'];
$password = md5($_POST['password']);

$stmt = $pdo->query('INSERT INTO `users`(`name`,`password`) VALUES (
                                                                            "' . $name . '",  
                                                                            "' . $password . '"                                                                
                                                                            )');
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
    <h1>Регистрация</h1>
</header>
<nav>

</nav>
<article class="form">
    <form class="group" method="post">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name">
        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password">
        </div>
        <div class="btn-wrapper">
            <input type="submit" name="btn_submit_register" value="Зарегистрироваться">
        </div>

    </form>
</article>
<footer>
</footer>

</body>
</html>