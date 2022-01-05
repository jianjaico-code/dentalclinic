<?php

    session_start();

    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];

    try {
        $getUser = $conn -> prepare("SELECT * FROM tblpatient WHERE PatientNumber = ?");
        $getUser -> execute([$PatientNumber]);
        $getUser = $getUser -> fetch();

        if($getUser){
            $_SESSION["username"] = $PatientNumber;
            $_SESSION["password"] = $PatientNumber;
            $_SESSION["valid"] = true;
            $_SESSION["Patient"] = true;

            
            
            echo $getUser['PatientID'];
        }
        else echo 'error';
    } catch (\Throwable $th) {
        echo $th;
    }