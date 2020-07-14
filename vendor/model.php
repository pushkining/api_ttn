<?php
require_once '../vendor/connect.php';
require_once '../profile.php';
$idCurrent = $_SESSION['user']['id'];

$ttn = $_POST["ttn"];
var_dump($ttn);
var_dump($idCurrent);

mysqli_query($connect, "INSERT INTO `documents` (`ttn`,`user_id`) VALUES ('$ttn','$idCurrent')");
header('Location: /tracking.php');



// $curl = curl_init();
// curl_setopt_array($curl, array(
// CURLOPT_URL => "https://api.novaposhta.ua/v2.0/json/",
// CURLOPT_RETURNTRANSFER => True,
// CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// CURLOPT_CUSTOMREQUEST => "POST",
// CURLOPT_POSTFIELDS => "{\r\n\"apiKey\": \"43d8a08687be071848b65df4d2b25607\",\r\n\"modelName\": \"TrackingDocument\",\r\n\"calledMethod\": \"getStatusDocuments\",\r\n\"methodProperties\": {\"Documents\":[{\"DocumentNumber\":\"20400048799000\",}]}\r\n}",
// CURLOPT_HTTPHEADER => array("content-type: application/json",),
// ));
// $response = curl_exec($curl);
// $err = curl_error($curl);
// curl_close($curl);
// if ($err) {
// echo "cURL Error #:" . $err;
// } else {
// echo $response;
// }
?>

