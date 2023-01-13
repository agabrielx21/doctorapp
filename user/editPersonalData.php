<?php
session_start();

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

            h2,h3,h4,h5 {
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
            .personal-information{
                width: 60%;
                height: 25%;
                margin-left: -3%;
                display: flex;
                justify-content: space-around;
            }
            .buttons{
                width: 45%;
                text-align: center;
                border-radius: 6px;
                background-image: linear-gradient(to right, #f6d365 0%, #fda085 51%, #f6d365 100%);
                font-size: 1.3rem;
            }
        </style>
        <title>HOME</title>
        <link rel="stylesheet" href="../CSS/style.css">
    </head>

    <body>
        <div class="topnav">
            <a href="../home.php">Informatii personale</a>
            <a href="programare.php">Creeaza programare</a>
            <a href="seeProgramare.php">Vizualizare programari</a>
            <a href="stergereProgramare.php">Anuleaza programare</a>
        </div>
        <div class="main-component-2">
            <div class="second-component">
                <h1 class="hello-header">Informatii personale </h1>
                <div class="personal-information">
                    <div class="buttons"><a class="redirect" href="seeUserInformation.php">Vizualizare</a>
                    </div>
                    <div class="buttons"><a class="redirect" href="editUserInformation.php">Editare</a>
                    </div>    
                
            </div>
            <div class="logout-container"><a class="redirect" href="../home.php">Home</a> </div>
        </div>

    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>