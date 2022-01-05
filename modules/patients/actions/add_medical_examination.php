<?php

    require_once "../../../connection.php";
    
    
    $PatientNumber = $_POST['PatientNumber'];
    $BloodType = $_POST['BloodType'];
    $allergies = $_POST['allergies'];
    $asthma = $_POST['asthma'];
    $kidneyInfection = $_POST['kidneyInfection'];
    $UTI = $_POST['UTI'];
    $heartDisease = $_POST['heartDisease'];
    $others = $_POST['others'];
    $MedFever = $_POST['MedFever'];
    $MedCough = $_POST['MedCough'];
    $MedStomachAche = $_POST['MedStomachAche'];
    $MedColds = $_POST['MedColds'];
    $OtherIllness = $_POST['OtherIllness'];
    $Maintenance = $_POST['Maintenance'];
    $Complains = $_POST['Complains'];
    $DateExamined = date("Y-m-d");

    try {
        
        $checkExam = $conn -> query("SELECT COUNT(*) FROM tblmedical_examination_summary WHERE DateExamined = '$DateExamined' AND PatientNumber = '$PatientNumber'") -> fetchColumn(0);


        if($checkExam <= 0){
            $insertMedicalSummary = $conn -> prepare("INSERT INTO tblmedical_examination_summary (PatientNumber, DateExamined) VALUES (?, ?)");
            $insertMedicalSummary -> execute([$PatientNumber, $DateExamined]);

            $MedicalExamID = $conn -> lastInsertId();

            $insertDetails = $conn -> prepare("INSERT INTO tblmedical_examination_details (MedicalExamID,BloodType,allergies,asthma,kidneyInfection,UTI,heartDisease,`others`,MedFever,MedCough,MedStomachAche,MedColds,OtherIllness,Maintenance,Complains) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $insertDetails -> execute([$MedicalExamID, $BloodType, $allergies, $asthma, $kidneyInfection, $UTI, $heartDisease, $others, $MedFever, $MedCough, $MedStomachAche, $MedColds, $OtherIllness, $Maintenance, $Complains]);

            echo 'success';
        }
        else echo 'dateExisted';

    } catch (\Throwable $th) {
        echo $th;
    }