<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$_SESSION['doctor'] = $_GET['doctor'];
$_SESSION['serviciu'] = $_GET['service'];
$_SESSION['email'] = $_GET['email'];
$qry = "SELECT * FROM users WHERE username = '$user'";
$result = mysqli_query($conn, $qry);
$row = mysqli_fetch_assoc($result);
$query = "SELECT * FROM servicii";
$rezultat = mysqli_query($conn, $query);
$roww = mysqli_fetch_assoc($rezultat);

if (isset($_SESSION['username'])) {
    ?>
<!DOCTYPE html>
<html>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<head>
    <style>
    .topnav {
        background-color: white;
        overflow: hidden;
        color: black;
        border-radius: 9px;
        width: 60%;
        margin-left: 22.5%;
        font-family: Raleway;
        font-weight: 800;
    }

    .topnav a {
        width: 20%;
        float: left;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    .topnav a.active {
        background-color: #04AA6D;
        color: white;
    }

    .main-component-2 {
        height: auto;
        background-color: white;
        border-radius: 12px;
        width: 60%;
        margin-left: 22.5%;
        margin-top: -5.15%;
    }

    .second-component {
        padding-bottom: 1%;
    }

    .hello-header {
        padding-top: 4%;
        margin-left: -21%;
    }

    h2,
    h3,
    h4,
    h5 {
        margin-left: -21%;
    }

    .logout-container {
        width: 20%;
        height: 20%;
        background-image: linear-gradient(to right, #82CD47 0%, #54B435 51%, #379237 100%);
        margin-left: -17%;
        text-align: center;
        border-radius: 6px;
        color: white;
        margin-bottom: 2%;
        margin-top: 5%;
        font-family: 'Bree Serif', serif;
         font-size: 16px;
    }

    a:link {
        text-decoration: none;
    }


    a:visited {
        text-decoration: none;
        color: black;
    }


    a:hover {
        text-decoration: none;
    }


    a:active {
        text-decoration: none;
    }


    .personal-information {
        width: 60%;
        height: 25%;
        margin-left: -17%;
        display: flex;
        gap: 5%;
    }

    .buttons {
        width: 45%;
        text-align: center;
        border-radius: 6px;
        background-color: #8a93ff;
        font-size: 1.3rem;
    }

    .row {
        text-align: left;
        display: block;
    }

    body {
        background-color: #f1f1f1;
    }

    #regForm {
        background-color: #ffffff;
        margin: 100px auto;
        font-family: Raleway;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    h1 {
        text-align: center;
    }

    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    button {
        background-color: #04AA6D;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.8;
    }

    #prevBtn {
        background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

    #doctor option {
        overflow: scroll;
    }
    </style>
    <title>HOME</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <div class="topnav">
        <a href="editPersonalData.php">Informatii personale</a>
        <a href="programare.php">Creeaza programare</a>
        <a href="seeProgramare.php">Vizualizare programari</a>
        <a href="stergereProgramare.php">Anuleaza programare</a>
    </div>
    <div class="main-component-2">
        <form id="regForm" action="confirmed.php">
            <h1>Confirmare programare</h1>
            <div class="personal-information">
                    <div class="row">
                        <p>Doctor : </p>
                        <p>Sectie : </p>
                        <p>Data : </p>
                        <p>Pret : </p>
                        <p>Email: </p>
                    </div>
                    <div class="row">
                        <p><?php  echo $_GET['doctor']?></p>
                        <p><?php  echo $_GET['service']?></p>
                        <p><?php $_SESSION['data'] = $_GET['data']; echo $_GET['data']?></p>
                        <p>
                            <?php 
                            $qry = "SELECT * FROM servicii WHERE specialitate = '$_GET[service]'";
                            $result = mysqli_query($conn, $qry);
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['pret'] = $row['pret'];
                            echo $row['pret']
                            ?>
                        </p>
                        <p><?php echo $_GET['email']?></p>
                    </div>
                </div>
                <div class="logout-container"><a class="redirect" href="confirmedInProgress.php">Submit</a> </div>
        </form>
    </div>

</body>

</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>