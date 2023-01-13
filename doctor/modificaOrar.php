<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
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
        height: 10%;
        background-color: green;
        margin-left: 40%;
        text-align: center;
        border-radius: 6px;
        color: white;
        margin-bottom: 2%;
        margin-top: 5%;

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
        margin-left: -21%;
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

    input.invalid {
        background-color: #ffdddd;
    }

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
        border-radius: 6px;
    }

    #nextBtn {
        background-image: linear-gradient(to right, #82CD47 0%, #54B435 51%, #379237 100%);
        border-radius: 6px;
    }

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
        <a href="verificaProgramari.php">Verifica programari</a>
        <a href="anuleazaProgramari.php">Anuleaza programare</a>
        <a href="verificaOrar.php">Verifica zile libere</a>
        <a href="modificaOrar.php">Adauga zile libere</a>
    </div>
    <div class="main-component-2">
        <form id="regForm" action="confirmareConcediu.php">
            <h1>Adauga zile libere</h1>
            <input type="date" id="data-concediu" name="data" value="" min="" max="" />
            <div class="logout-container">
                <input type="submit" value="Next" id="s-input">
            </div>
    </div>

    </form>
    </div>
    <script>
    let date = new Date();
    let year = date.getFullYear();
    let month = (date.getMonth() + 1).toString().padStart(2, '0');
    let day = date.getDate().toString().padStart(2, '0');
    let dateString = `${year}-${month}-${day}`;
    let dateString2 = `${year+1}-${month}-${day}`;
    let input = document.getElementById("data-concediu");
    input.value = dateString;
    input.min = dateString;
    input.max = dateString2;
    </script>
</body>

</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>