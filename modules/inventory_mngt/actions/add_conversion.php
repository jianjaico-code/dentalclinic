<?php

    require_once "../../../connection.php";

    $FromUnit = $_POST['FromUnit'];
    $ToUnit = $_POST['ToUnit'];
    $FromValue = $_POST['FromValue'];
    $ToValue = $_POST['ToValue'];


    try {
        $insertConversion = $conn -> prepare("INSERT INTO tbl_conversion (FromUnit, ToUnit, FromValue, ToValue) VALUES (?, ?, ?, ?)");
        $insertConversion -> execute([$FromUnit, $ToUnit, $FromValue, $ToValue]);

        echo "success";
    } catch (Exception $th) {
        echo $th;
    }