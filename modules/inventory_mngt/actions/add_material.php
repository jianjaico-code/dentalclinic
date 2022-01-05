<?php 

    require_once "../../../connection.php";

    $MaterialCode = $_POST['MaterialCode'];
    $Desc = $_POST['Desc'];
    $Price = $_POST['Price'];
    $maxstock = $_POST['maxstock'];
    // $uom = $_POST['uom'];

    try {

        $checkInventory = $conn -> query("SELECT COUNT(*) FROM tblmaterials WHERE MaterialCode = '$MaterialCode'") -> fetchColumn(0);

        if($checkInventory <= 0){
            $insertMaterial = $conn -> prepare("INSERT INTO tblmaterials (MaterialCode, MaterialDescription, price, maxstock) VALUES ( ?, ?, ?, ?)");
            $insertMaterial -> execute([$MaterialCode, $Desc, $Price, $maxstock]);

            echo "success";
        }
        else echo "matexisted";

        
    } catch (PDOException $th) {
        echo $th;
    }