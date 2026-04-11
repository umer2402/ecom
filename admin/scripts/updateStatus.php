<?php
include "../db.php";

$tableName = $_GET['tableName'];
$recCol = $_GET['recCol'];
$recId = $_GET['recId'];
$colName = $_GET['colName'];
$calValue = $_GET['calValue'];
$returnPage = $_GET['returnPage'];


    // Validate table and column names to prevent SQL injection
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName) || 
        !preg_match('/^[a-zA-Z0-9_]+$/', $recCol) || 
        !preg_match('/^[a-zA-Z0-9_]+$/', $colName)) {
        throw new Exception("Invalid table or column name");
    }

    // Prepare and execute the SQL query
    $stmt = $con->prepare("UPDATE `$tableName` SET `$colName` = ? WHERE `$recCol` = ?");
    $stmt->bind_param("ss", $calValue, $recId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("location: ../index.php?" . $returnPage);
    } else {
        echo "No rows updated.";
    }

    $stmt->close();


$con->close();
?>
