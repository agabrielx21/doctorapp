<?php
session_start();
include "../db_conn.php";
$doctorID = $_POST['doctor'];
$qry = "DELETE FROM programari WHERE id = '$doctorID'";
$result = mysqli_query($conn, $qry);
header("Location: confirmedAnulare.php");
    exit();
?>