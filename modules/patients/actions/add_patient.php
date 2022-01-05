<?php

    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];
    $PatientType = $_POST['PatientType'];
    $Birthday = $_POST['Birthday'];
    $FirstName = $_POST['FirstName'];
    $MiddleName = $_POST['MiddleName'];
    $Lastname = $_POST['Lastname'];
    $Address = $_POST['Address'];


    try {
        $checkPatient  = $conn -> query("SELECT COUNT(*) FROM tblpatient WHERE Firstname = '$FirstName' AND Middlename = '$MiddleName' AND Lastname = '$Lastname'") -> fetchColumn(0);


        if($checkPatient <= 0){
            $insertPatient = $conn -> prepare("INSERT INTO tblpatient (PatientNumber,FirstName,MiddleName,Lastname,Birthday,PatientType,`Address`) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insertPatient -> execute([$PatientNumber, $FirstName, $MiddleName, $Lastname, $Birthday, $PatientType, $Address]);


            echo "success";
        }
        else echo 'patientexist';
    } catch (Exception $th) {
        echo $th;
    }