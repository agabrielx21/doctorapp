
<?php 
session_start(); 
include "db_conn.php";

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

if (empty($uname)) {

    header("Location: index.php?error_login=Username is required");
    exit();
    
}else if(empty($pass)){

    header("Location: index.php?error_login=Password is required");
    exit();
}
$pass = hash("md5", $pass);
$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $uname && $row['password'] === $pass) {
        echo "Logged in!";
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        if($row['role'] === 'ADMIN'){
            header("Location: admin.php");
            exit();}
        else if($row['role'] === 'DOCTOR'){
                header("Location: doctor.php");
                exit();}
        else header("Location: home.php");
        exit();
    }else{
            header("Location: index.php?error_login=Incorrect username");
            exit();
    }
}
else{
    header("Location: index.php?error_login=Incorrect password");
    exit();
}