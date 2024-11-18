<?php

require "./connect.php";

extract($_POST);

if (isset($_POST['deleteSend'])) {

    $unique = $_POST['deleteSend'];
    $sql = "DELETE FROM `crud` WHERE id = '$unique'";
    $result = $conn->query($sql);
}