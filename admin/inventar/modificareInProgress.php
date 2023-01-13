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

if (mysqli_num_rows($result) == 1) {
    $updateSQL = "UPDATE inventar SET stoc=?, ultima_modificare_de_stoc=? WHERE nume_item=?";
    $stmt = mysqli_prepare($conn, $updateSQL);
    mysqli_stmt_bind_param($stmt, "sss", $stoc, $data, $nume);
    mysqli_stmt_execute($stmt);
    header("Location: confirmedModificare.php");
    exit();
} else {
    header("Location: ../../admin.php?error=Itemul nu este in inventar!");
    exit();
}


?>