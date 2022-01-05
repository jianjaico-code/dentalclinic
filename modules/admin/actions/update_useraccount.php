<?php

    require_once "../../../connection.php";

    $EmployeeID = $_POST['EmployeeID'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];


    try {
        
        $getUser = $conn -> query("SELECT * FROM tbluseraccount WHERE EmployeeID = '$EmployeeID'") -> fetch();

        if($getUser){
            if($UserName != $getUser['UserName']){
                $getUserName = $conn -> query("SELECT COUNT(*) FROM tbluseraccount WHERE UserName = '$UserName'") -> fetch();
    
                if($getUserName > 0){
                    echo 'existed';
    
                    return false;
    
                    exit();
                }
            }
        }
        
        
        if(!$getUser){
            $insertUser = $conn -> prepare("INSERT INTO tbluseraccount (EmployeeID, UserName, `Password`, UserType) VALUES (?, ?, ?, ?)");
            $insertUser -> execute([$EmployeeID, $UserName, $Password, 'Administrator']);

            echo "success";
        }
        else{
            $updateUser = $conn -> prepare("UPDATE tbluseraccount SET UserName = ?, `Password` = ? WHERE EmployeeID = ?");
            $updateUser -> execute([$UserName, $Password, $EmployeeID]);

            echo "success";
        }
        
        
        



    } catch (\Throwable $th) {
        echo $th;
    }