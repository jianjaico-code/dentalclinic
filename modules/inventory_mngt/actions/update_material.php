<?php

    require_once "../../../connection.php";

    $MaterialID = $_POST['MaterialID'];
    $MaterialDescription = $_POST['MaterialDescription'];
    $price = $_POST['price'];
    $maxstock = $_POST['maxstock'];
    $uom = $_POST['uom'];

    try {
        $updateMaterial = $conn -> prepare("UPDATE tblmaterials SET MaterialDescription = ?, price = ?, maxstock = ?, uomforselling = ? WHERE MaterialID = ?");
        $updateMaterial -> execute([$MaterialDescription, $price, $maxstock, $uom, $MaterialID]);

        echo "success";
    } catch (PDOException $th) {
        echo $th;
    }