<?php 


    require_once "../../../connection.php";

    $EmployeeID = $_POST['EmployeeID'];

    try {
        
        $getUser = $conn -> query("SELECT * FROM tbluseraccount WHERE EmployeeID = '$EmployeeID'") -> fetch();

        echo json_encode($getUser);

    } catch (\Throwable $th) {
        echo $th;
    }