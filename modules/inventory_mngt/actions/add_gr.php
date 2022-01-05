<?php

    require_once "../../../connection.php";

    $MaterialID = $_POST['MaterialID'];
    $Cost = $_POST['Cost'];
    $Quantity = $_POST['Quantity'];
    $EmployeeID = $_POST['EmployeeID'];
    $AccountingType = 'GR';
    $FinalAmount = ($Quantity * $Cost);
    $today = date('YmdHis');
    // $UoM = $_POST['UoM'];
    $ControlNumber = ("GR".($today));

    try {
        $getCount = $conn -> query("SELECT COUNT(*) FROM fs_inv") -> fetchColumn(0);

        
        //$UOMforSelling  = $conn -> query("SELECT uomforselling FROM tblmaterials WHERE MaterialID = '$MaterialID'") -> fetchColumn(0);

        //$checkConversion = $conn -> query("SELECT ToValue, conversionID, ToUnit FROM tbl_conversion WHERE FromUnit = '$UoM' AND ToUnit = '$UOMforSelling'") -> fetch();

        $insertGR = $conn -> prepare("INSERT INTO fs_inv (Quantity,Cost,FinalAmount,AccountingType,EmployeeID,MaterialID,ControlNumber) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $insertGR -> execute([$Quantity, $Cost, $FinalAmount, $AccountingType, $EmployeeID, $MaterialID, $ControlNumber]);

        $soh = $conn -> query("SELECT soh FROM tblmaterials WHERE MaterialID = '$MaterialID'") -> fetchColumn(0);
        
        $updateSoh = $conn -> prepare("UPDATE tblmaterials SET soh = ? WHERE MaterialID = ?");
        $updateSoh -> execute([($soh + $Quantity), $MaterialID]);
    


        echo "success";
    } catch (PDOException $th) {
        echo $th;
    }