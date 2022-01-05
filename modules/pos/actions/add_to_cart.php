<?php

    require_once "../../../connection.php";

    $InvoiceNumber = $_POST['InvoiceNumber'];
    $MaterialID = $_POST['MaterialID'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];

    try {

        $checkSOH = $conn -> query("SELECT soh FROM tblmaterials WHERE MaterialID = '$MaterialID'") -> fetchColumn(0);


        $checkInvoiceMat = $conn -> query("SELECT * FROM tblcart WHERE InvoiceNumber = '$InvoiceNumber' AND MaterialID = '$MaterialID'") -> fetch();

        $cartQty = ($checkInvoiceMat) ? $checkInvoiceMat['Quantity'] + 1 : $Quantity;

        if($checkSOH < $cartQty){
            echo "qtyReached";

            return false;
        }

        if(!$checkInvoiceMat){
            $insertToCart = $conn -> prepare("INSERT INTO tblcart (InvoiceNumber, MaterialID, Quantity, Price, FinalAmount) VALUES (?, ?, ?, ?, ?)");
            $insertToCart -> execute([$InvoiceNumber, $MaterialID, $Quantity, $Price, ($Price * $Quantity)]);

            echo "success";
        }
        else{
            $updateCart = $conn -> prepare("UPDATE tblcart SET Quantity = ?, FinalAmount = ? WHERE InvoiceNumber = ? AND MaterialID = ?");
            $updateCart -> execute([($checkInvoiceMat['Quantity'] + $Quantity), (($checkInvoiceMat['Quantity'] + $Quantity) * $Price), $InvoiceNumber, $MaterialID]);

            echo "success";
        }

    } catch (Exception $th) {
        echo $th;
    }