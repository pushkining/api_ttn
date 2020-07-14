<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->

</head>

<body>
    <!-- <div class="container ">
    <form class="form-signin">
    <div class="form-group">
    
        <input type="text" class="form-control input-group mr-5" id="exampleInputEmail1" >
        <button type="submit" class="btn btn-primary">Get status TTN</button>
    </div>-->

    <a href="profile.php" id="back_profile" class="btn_tracking" role="button">Вернуться</a>
    <div class="container ">
        <h2>Получение трекинга ТТН</h2>
        <form action="vendor/model.php" method="post" id="tracking">
            <input type="text" name="ttn" id="ttn_input">
            <i class="auth__error_hide">Неверный формат ТТН</i>
            <button type="submit" onclick="getResponse()"class="btn_tracking">Получить инфу ТТН</button>

        </form>
    </div>

    <div class="posts">
        <ul>

        </ul>
    </div>
    <div class="history">
        <ul class="ttn_history">
            <?php 
                require_once 'vendor/connect.php';
                $idCurrent = $_SESSION['user']['id'];
                $query = "SELECT * FROM documents WHERE user_id = $idCurrent";
                
                if ($result = mysqli_query($connect, $query)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>" . $row['ttn'] . "</li>";
                    }
                }
            ?>
        </ul>
    </div>
    

</body>

</html>
<script src="assets/js/main.js"></script>