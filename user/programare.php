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
        background-color: red;
        margin-left: 13%;
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
    #nextBtn{
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
    #data-programare{
        margin-bottom: 15px;
        margin-top: 15px;
    }
    </style>
    <title>HOME</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <div class="topnav">
        <a href="editPersonalData.php">Informatii personale</a>
        <a href="">Creeaza programare</a>
        <a href="seeProgramare.php">Vizualizare programari</a>
        <a href="stergereProgramare.php">Anuleaza programare</a>
    </div>
    <div class="main-component-2">
        <form id="regForm" action="confirmareProgramare.php">
            <h1>Creeaza o programare aici:</h1>
            <div class="tab">Alege un serviciu:
                <p><input class="box" list="servicii" name="service" id="serviciu">
                    <datalist id="servicii">
                        <?php
                            $query = "SELECT * FROM servicii";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . $row['specialitate'] . '">';
                            }
                            ?>
                    </datalist>
            </div>
            <div class="tab">Alege un doctor:
                <p><input class="box" list="doctori" name="doctor" id="doctor">
                    <datalist id="doctori">
                        <?php 
                    include "getDoctors.php";
                            ?>
                    </datalist>
            </div>
            <div class="tab">Data:
                <input type="date" id="data-programare" name="data" value="" min="" max="" />
            </div>
            <div class="tab">Introduceti mailul pe care veti primi confirmarea:
                <p><input id="email" type="email" placeholder="Email" oninput="this.className = ''" name="email"></p>
            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>

</body>
<script>
var currentTab = 0;
showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
    if(currentTab == 2){
    let date = new Date();
    let year = date.getFullYear();
    let month = (date.getMonth() + 1).toString().padStart(2, '0');
    let day = date.getDate().toString().padStart(2, '0');
    let dateString = `${year}-${month}-${day}`;
    let dateString2 = `${year+1}-${month}-${day}`;
    let input = document.getElementById("data-programare");
    input.value = dateString;
    input.min = dateString;
    input.max = dateString2;
    }
}

function nextPrev(n) {
    console.log(currentTab);
    if (currentTab == 0) {
        var serviciu = document.getElementById("serviciu").value;
        console.log(serviciu);
        var xhr = new XMLHttpRequest();
        var url = "getDoctors.php";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        var data = "serviciu=" + serviciu;
        xhr.send(data);
    };

var x = document.getElementsByClassName("tab");
if (n == 1 && !validateForm()) return false;
x[currentTab].style.display = "none";
currentTab = currentTab + n;
if (currentTab >= x.length) {
    document.getElementById("regForm").submit();
    return false;
}
showTab(currentTab);
}

function validateForm() {
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    var em = document.getElementById("email").value;
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(em) == false && currentTab == 3){
        valid = false;
        alert("Emailul nu este valid, va rugam introduceti alt email !");
    }
    
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}
</script>

</html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>