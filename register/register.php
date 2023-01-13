<?php
session_start();
include "../db_conn.php";

if (isset($_POST['uname']) && isset($_POST['pass'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
}
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);
   

if(empty($uname)){
    header("Location: create.php?error_register=Username is required!");
    exit();
} else if(empty($pass)){
    header("Location: create.php?error_register=Password is required!");
    exit();
}

$sql = "SELECT * FROM users WHERE username = '$uname'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) === 0){
    $hashedPassword = hash('md5', $pass);
    $insertSQL = "INSERT INTO users (username,password,role) VALUES ('$uname', '$hashedPassword', 'USER')";
    $wasInserted = mysqli_query($conn, $insertSQL);

    if($wasInserted){
        header("Location: ../index.php?error_register=Registration successful!");
        exit();
    } else {
        header("Location: create.php?error_register=Bad luck! Try again");
        exit();
    }
} else {
    header("Location: create.php?error_register=An account with this username already exists!");
    exit();
}

?>