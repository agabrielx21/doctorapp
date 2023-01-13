<?php
session_start();
include "../../db_conn.php";

$nume = $_GET['nume'];


$stmt = mysqli_prepare($conn, "SELECT * FROM inventar where nume_item=?");
mysqli_stmt_bind_param($stmt,"s", $nume);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $deleteSQL = "DELETE FROM inventar WHERE nume_item=?";
    $stmt = mysqli_prepare($conn, $deleteSQL);
    mysqli_stmt_bind_param($stmt, "s", $nume);
    mysqli_stmt_execute($stmt);
    header("Location: confirmedStergere.php");
    exit();
} else {
    header("Location: ../../admin.php?error=Itemul nu se afla in inventar !");
    exit();
}


?>