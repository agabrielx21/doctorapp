<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['role']=="DOCTOR") {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            .topnav {
                background-color: white;
                overflow: hidden;
                color: black;
                border-radius: 9px;
                width: 60%;
                margin-left: 22.5%;

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
                background-color: red;
                margin-left: 13%;
                text-align: center;
                border-radius: 6px;
                color: white;
                margin-bottom: 2%;
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
        </style>
        <title>HOME</title>
        <link rel="stylesheet" href="CSS/style.css">
    </head>

    <body>
        <div class="topnav">
            <a href="doctor/verificaProgramari.php">Verifica programari</a>
            <a href="doctor/anuleazaProgramari.php">Anuleaza programare</a>
            <a href="doctor/verificaOrar.php">Verifica zile libere</a>
            <a href="doctor/modificaOrar.php">Adauga zile libere</a>
        </div>
        <div class="main-component-2">
            <div class="second-component">
                <h1 class="hello-header">Hello, <?php echo $_SESSION['username']; ?></h1>
                <h2>Your current role is <?php echo $_SESSION['role']; ?></h2>
                <h5>What do you want to do today?</h5>
                <div class="logout-container"><a class="redirect" href="logout.php">Logout</a> </div>
            </div>
            <?php if(isset($_GET['error'])) {
            ?>
            <p class="error">
                <?php echo $_GET['error'];?>
            </p>
        <?php } ?>
        </div>

    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>