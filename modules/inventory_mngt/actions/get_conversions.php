<?php

    require_once "../../../connection.php";

    $getConversion = $conn -> query("SELECT 
    a.*,
    (SELECT `Description` FROM tbl_units WHERE UoM = a.FromUnit) as FromDes,
    (SELECT `Description` FROM tbl_units WHERE UoM = a.ToUnit) as ToDes
    FROM tbl_conversion a") -> fetchAll();

    echo json_encode($getConversion);