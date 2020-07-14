<?php

    session_start();
    require_once 'connect.php';

    
    $login = $_POST['login'];
    $email = $_POST['email'];

        
        mysqli_query($connect, "INSERT INTO `users` (`login`, `email`) VALUES ('$login', '$email')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../index.php');

?>
