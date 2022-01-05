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

        $checkEmployee = $conn -> query("SELECT COUNT(*) FROM tblemployee WHERE EmployeeIDNo = '$EmployeeIDNo'") -> fetchColumn(0);

        if($checkEmployee <= 0){
            $insertEmp = $conn -> prepare("INSERT INTO tblemployee (EmployeeIDNo, `Address`, Position, BasePay, EmployeeType, Lastname, Middlename, `Name`, Birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ");
            $insertEmp -> execute([$EmployeeIDNo, $Address, $Position, $BasePay, $EmployeeType, $Lastname, $Middlename, $Name, $Birthday]);

            echo "success";
        }
        else echo "existed";

    } catch (\Throwable $th) {
        echo $th;
    }