<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$qry = "SELECT * FROM programari WHERE pacient = '$user'";
$result = mysqli_query($conn, $qry);
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
                background-image: linear-gradient(to right, #a1c4fd 0%, #c2e9fb 51%, #a1c4fd 100%);
                margin-left: 13%;
                text-align: center;
                border-radius: 6px;
                color: white;
                margin-bottom: 2%;
                margin-top: 5%;
            
            }
            input{
                background-image: linear-gradient(to right, #EC255A 0%, #E0144C 51%, #9A1663 100%);
                border: none;
                font-family: 'Bree Serif', serif;
                font-size: 17px;
            }
            input:hover{
                cursor: pointer;
            }

            .container{
                width: 20%;
                height: 10%;
                background-image: linear-gradient(to right, #EC255A 0%, #E0144C 51%, #9A1663 100%);
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

            .redirect {
                padding-bottom: 15px;
            }

            .personal-information {
                width: 60%;
                height: 25%;
                margin-left: -21%;
                display: block;
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

            table {
                font-family: Raleway;
                border-collapse: collapse;
                width: 100%;
            }

            td,
            th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p {
                margin-left: -21%;
            }
        </style>
        <title>Vizualizare programari</title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>

    <body>
        <div class="topnav">
            <a href="editPersonalData.php">Informatii personale</a>
            <a href="programare.php">Creeaza programare</a>
            <a href="seeProgramare.php">Vizualizare programari</a>
            <a href="">Anuleaza programare</a>
        </div>
        <div class="main-component-2">
            <div class="second-component">
                <h1 class="hello-header">Selectati programarea pe care doriti sa o stergeti</h1>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    echo '<form method="post" action="stergereInProgress.php">';
                    echo '  <div class="personal-information">';

                    while ($row = mysqli_fetch_assoc($result)) {
                        $val = $row['id'];
                        echo '<input type="radio" id="html" name="doctor" value="' . $val . '">';
                        echo '<label for="html">' . "Programarea la doctorul " . $row['doctor'] . ", la data " . $row['data'] . '</label>.<br>';
                    }
                    echo '  </div>';
                    echo '<div class="container"><input type="submit" value="Stergere Programare"></div>';
                    echo '</form>';
                } else {
                    echo '<p>Ne pare rau, momentan nu ati efectuat nicio programare !</p>';
                }
                ?>
                <div class="logout-container"><a class="redirect" href="../home.php">Home</a>
                </div>
            </div>
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