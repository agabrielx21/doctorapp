<?php
session_start();
include "../db_conn.php";

$user = $_SESSION['username'];
$utd = $_GET['uname'];
$specializare = $_GET['specializare'];
$role = "DOCTOR";

$stmt = mysqli_prepare($conn, "SELECT * FROM users where username=?");
mysqli_stmt_bind_param($stmt,"s", $utd);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['nume'] . " " . $row['prenume'];
    $stmt = mysqli_prepare($conn, "INSERT INTO doctor VALUES(?, ?, ?)");
    mysqli_stmt_bind_param($stmt,"sss", $name, $utd, $specializare);
    mysqli_stmt_execute($stmt);
    $stmt = mysqli_prepare($conn, "UPDATE users SET role=? WHERE username=?");
    mysqli_stmt_bind_param($stmt,"ss", $role, $utd);
    mysqli_stmt_execute($stmt);
    
    
    header("Location: ../admin.php");
    exit();
}

else header("Location: ../admin.php?error=Username not found.");
    exit();
?>