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
            <button type="submit" class="btn_tracking">Получить инфу ТТН</button>

        </form>
    </div>

    <div class="posts">
        <ul>
            <?php
                $curl = curl_init();
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.novaposhta.ua/v2.0/json/",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 0,
                  CURLOPT_FOLLOWLOCATION => true,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS =>"\r\n\r\n{\r\n    \"apiKey\": \"43d8a08687be071848b65df4d2b25607\",\r\n    \"modelName\": \"TrackingDocument\",\r\n    \"calledMethod\": \"getStatusDocuments\",\r\n    \"methodProperties\": {\r\n        \"Documents\": [\r\n            {\r\n                \"DocumentNumber\": \"20450222820982\",\r\n                \"Phone\":\"0980918794\"\r\n            }\r\n        ]\r\n    }\r\n    \r\n}",
                  CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Cookie: PHPSESSID=ee8986256b573cf2c0450d2aaed138d2; YIICSRFTOKEN=1e124333177720c7c71caa4a6de8784a17aab424s%3A88%3A%22YnNFWXkzflNpaDBHS0lIN0JyV3pqcVRIWnhQeklIS3RsPICtF2vemWelL6JTyTcp5gqjU1w5Qt-P6QcmkxCd-g%3D%3D%22%3B"
                  ),
                ));                
                $response = curl_exec($curl);               
                curl_close($curl);
                
                echo $response;
                // echo $arr['SenderAddress'];
                // echo $arr['RecipientAddress']
            ?>
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
                        echo "<li>" . "<a href=\"#\">" . $row['ttn'] . "</a>" . "</li>";
                    }
                }
            ?>
        </ul>
    </div>
    

</body>

</html>
<!-- script src="assets/js/main.js"></script> -->