<?php

    require_once "../../../connection.php";

    $EmployeeIDNo = $_POST['EmployeeIDNo'];
    $Name = $_POST['Name'];
    $Middlename = $_POST['Middlename'];
    $Lastname = $_POST['Lastname'];
    $EmployeeType = $_POST['EmployeeType'];
    $BasePay = $_POST['BasePay'];
    $Position = $_POST['Position'];
    $Address = $_POST['Address'];
    $Birthday = $_POST['Birthday'];

    try {
        $updateEmp = $conn -> prepare("UPDATE tblemployee SET `Name` = ?, Middlename = ?, Lastname = ?, EmployeeType = ?, BasePay = ?, Position = ?, `Address` = ?, Birthday = ? WHERE EmployeeIDNo = ?");
        $updateEmp -> execute([$Name, $Middlename, $Lastname, $EmployeeType, $BasePay, $Position, $Address, $Birthday, $EmployeeIDNo]);
        
        echo "success";

    } catch (\Throwable $th) {
        echo $th;
    }