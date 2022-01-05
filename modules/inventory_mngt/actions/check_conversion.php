<?php

    require_once "../../../connection.php";

    $FromUnit = $_POST['FromUnit'];
    $ToUnit = $_POST['ToUnit'];

    try {
        $checkConversion = $conn -> query("SELECT COUNT(*) FROM tbl_conversion WHERE FromUnit = '$FromUnit' AND ToUnit = '$ToUnit'") -> fetchColumn(0);

        if($checkConversion > 0) echo 'existed';
        else echo 'notexist';
    } catch (Exception $th) {
        echo $th;
    }