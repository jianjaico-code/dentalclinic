<?php

    require_once "../../../connection.php";

    $PatientNumber = $_POST['PatientNumber'];
    $Description = $_POST['Description'];
    $Remarks = $_POST['Remarks'];
    $Dentist = $_POST['Dentist'];
    $DateExamined = date("Y-m-d");

    try {
        $checkExam = $conn -> query("SELECT COUNT(*) FROM tbldental_examination_summary WHERE DateExamined = '$DateExamined' AND PatientNumber = '$PatientNumber'") -> fetchColumn(0);

        if($checkExam <= 0){
            $insertMedicalSummary = $conn -> prepare("INSERT INTO tbldental_examination_summary (PatientNumber, DateExamined, Description, Remarks, Dentist) VALUES (?, ?, ?, ?, ?)");
            $insertMedicalSummary -> execute([$PatientNumber, $DateExamined, $Description, $Remarks, $Dentist]);

            echo "success";
        }
        else echo 'dateExisted';
    } catch (\Throwable $th) {
        echo $th;
    }