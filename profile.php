<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
//var_dump($_SESSION['user']['id']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <form id="profile">
        <a href="tracking.php"><?= $_SESSION['user']['email'] ?></a>
        <a href="vendor/logout.php" class="logout">Выход</a>
    </form>

</body>
</html>