<?php

    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];
    $PatientType = $_POST['PatientType'];
    $FirstName = $_POST['FirstName'];
    $MiddleName = $_POST['MiddleName'];
    $Lastname = $_POST['Lastname'];
    $Birthday = $_POST['Birthday'];
    $Address = $_POST['Address'];

    try {
        $updateDetails = $conn -> prepare("UPDATE tblpatient SET PatientType = ?, FirstName = ?, MiddleName = ?, Lastname = ?, Birthday = ?, Address = ? WHERE PatientNumber = ? ");
        $updateDetails -> execute([$PatientType, $FirstName, $MiddleName, $Lastname, $Birthday, $Address, $PatientNumber]);

        echo "success";
    } catch (\Throwable $th) {
        echo $th;
    }