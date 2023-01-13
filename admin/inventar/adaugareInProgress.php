<?php
session_start();
include "../../db_conn.php";

$nume = $_SESSION['nume'];
$stoc = $_SESSION['stoc'];
$data = $_SESSION['data'];
$v = '';

$stmt = mysqli_prepare($conn, "SELECT * FROM inventar where nume_item=?");
mysqli_stmt_bind_param($stmt,"s", $nume);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
    $insertSQL = "INSERT INTO inventar VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertSQL);
    mysqli_stmt_bind_param($stmt, "ssss", $v, $nume, $stoc, $data);
    mysqli_stmt_execute($stmt);
    header("Location: confirmedAdaugare.php");
    exit();
} else {
    header("Location: ../../admin.php?error=Itemul este deja in inventar, utilizati modificarea stocului !");
    exit();
}


?>