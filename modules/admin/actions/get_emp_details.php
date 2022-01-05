<?php

    require_once "../../../connection.php";


    $EmployeeID = $_POST['EmployeeID'];

    try {
        
        $getEmp = $conn -> query("SELECT * FROM tblemployee WHERE EmployeeID = '$EmployeeID'") -> fetch();

        echo json_encode($getEmp);

    } catch (\Throwable $th) {
        echo $th;
    }