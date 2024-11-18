<?php

require "./connect.php";

extract($_POST);

if (
    isset($_POST['nameSend']) &&
    isset($_POST['emailSend']) &&
    isset($_POST['mobileSend']) &&
    isset($_POST['placeSend'])
) {
    $sql = "INSERT INTO `crud`(name, email, mobile, place) VALUE('$nameSend', '$emailSend', '$mobileSend', '$placeSend')";
    $result = $conn->query($sql);
    
}
