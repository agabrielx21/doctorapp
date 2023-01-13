<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$qry = "SELECT * FROM concedii WHERE doctor = '$user'";
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
        </style>
        <title>Vizualizare programari</title>
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
            <div class="second-component">
                <h1 class="hello-header">Vizualizare concedii</h1>
                <div class="personal-information">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        echo '<table>';
                        echo '  <tr>';
                        echo '    <th>Data</th>';
                        echo '  </tr>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $row['data'] . '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else
                        echo '<p>Ne pare rau, momentan nu aveti zile libere efectuate !</p>';

                    ?>
                    </table>

                </div>
                <div class="logout-container"><a class="redirect" href="../doctor.php">Home</a> </div>
            </div>

    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>