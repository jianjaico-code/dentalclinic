<?php
    $servername = "remotemysql.com";
    $username = "teoTZBUNg4";
    $password = "PTs0jYL7Cm";
    
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=teoTZBUNg4;charset=utf8mb4", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        
        }
?>