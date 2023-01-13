<?php
session_start();
include "../db_conn.php";

$user = $_SESSION['username'];
$data = $_SESSION['data'];

$insertSQL = "INSERT INTO concedii VALUES ('','$user','$data')";
$wasInserted = mysqli_query($conn, $insertSQL);

header("Location: confirmedConcediu.php");
    exit();
?>