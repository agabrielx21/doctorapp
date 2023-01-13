<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$qry = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($result);

if (isset($_POST["nume"]))
{
    $nume = $_POST["nume"];
    if ($nume != "") {
        $sql = "UPDATE users SET nume='$nume' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["prenume"]))
{
    $prenume = $_POST["prenume"];
    if ($prenume != "") {
        $sql = "UPDATE users SET prenume='$prenume' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["cnp"]))
{
    $cnp = $_POST["cnp"];
    if ($cnp != "") {
        $sql = "UPDATE users SET cnp='$cnp' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["sex"]))
{
    $sex = $_POST["sex"];
    if ($sex != "") {
        $sql = "UPDATE users SET sex='$sex' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["varsta"]))
{
    $varsta = $_POST["varsta"];
    if ($varsta != "") {
        $sql = "UPDATE users SET varsta='$varsta' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["inaltime"]))
{
    $inaltime = $_POST["inaltime"];
    if ($inaltime != "") {
        $sql = "UPDATE users SET inaltime='$inaltime' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}


if (isset($_POST["greutate"]))
{
    $greutate = $_POST["greutate"];
    if ($greutate != "") {
        $sql = "UPDATE users SET greutate='$greutate' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["numar_telefon"]))
{
    $numar_telefon = $_POST["numar_telefon"];
    if ($numar_telefon != "") {
        $sql = "UPDATE users SET numar_telefon='$numar_telefon' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}


if (isset($_POST["persoana_ct"]))
{
    $persoana_ct = $_POST["persoana_ct"];
    if ($persoana_ct != "") {
        $sql = "UPDATE users SET persoana_ct='$persoana_ct' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}

if (isset($_POST["nr_ct"]))
{
    $nr_ct = $_POST["nr_ct"];
    if ($nr_ct != "") {
        $sql = "UPDATE users SET nr_ct='$nr_ct' WHERE username='$user'";
        mysqli_query($conn, $sql);
    }
}


header("Location: editUserInformation.php");
    exit();
?>