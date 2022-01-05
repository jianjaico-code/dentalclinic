<?php

    require_once "../../../connection.php";

    $FromUnit = $_POST['FromUnit'];
    $ToUnit = $_POST['ToUnit'];
    $FromValue = $_POST['FromValue'];
    $ToValue = $_POST['ToValue'];

    try {
        $updateConversion = $conn -> prepare("UPDATE tbl_conversion SET FromValue = ?, ToValue = ? WHERE FromUnit = ? AND ToUnit = ?");
        $updateConversion -> execute([$FromValue, $ToValue, $FromUnit, $ToUnit]);

        echo "success";
    } catch (Exception $th) {
        echo $th;
    }