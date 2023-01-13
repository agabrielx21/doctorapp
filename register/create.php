<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="../style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap');

    body {
        background-image: linear-gradient(to right, #2e7db8, #8847ad);
        font-family: 'Bree Serif', serif;

    }

    .main-component {
        width: 20%;
        height: 400px;
        margin-left: 40%;
        margin-top: 10%;
        background-color: white;
        border-radius: 12px;
    }

    .second-component {
        width: 100%;
        height: 100%;
        margin-left: 25%;
        margin-right: 25%;
        display: block;

    }

    .header {
        padding-top: 55px;
        margin-left: 15%;
        font-family: 'Bree Serif', serif;
    }

    .line {
        color: gray;
        height: 1px;
        width: 80%;
        margin-left: -15%;
    }

    .submit-register {
        margin-top: 15%;
        width: 80%;
        margin-left: -15%;
        background-color: #2691d9;
        border: none;
        font-size: 1rem;
        border-radius: 20px;
        color: white;
        height: 8%;
        font-family: 'Bree Serif', serif;
        cursor: pointer;
    }

    .back-login {
      margin-top: 4%;
        width: 80%;
        margin-left: -15%;
        background-color: #2691d9;
        border: none;
        font-size: 1rem;
        border-radius: 20px;
        color: white;
        height: 9%;
        font-family: 'Bree Serif', serif;
        cursor: pointer;
    }

    .inp1 {
        margin-top: 10%;
        height: 10%;
        width: 65%;
        margin-left: -7%;
        border: 2px solid black;
    }

    .inp1::placeholder {
        font-family: 'Bree Serif', serif;
        color: black;
        font-size: 1rem;
    }

    .inp2 {
        margin-top: 10%;
        height: 10%;
        width: 65%;
        margin-left: -7%;
        border: 2px solid black;
    }

    .inp2::placeholder {
        font-family: 'Bree Serif', serif;
        color: black;
        font-size: 1rem;
    }
    a:visited{
      color:white;
      text-decoration: none;
    }
    a{
      color:white;
      text-decoration: none;
    }
    .error{
        font-size: 16px;
        color: black;
        padding-right: 122px;
        padding-top: 10px;
    }
    </style>
</head>

<body>
    <?php ?>

    <form action="register.php" method="POST">
        <div class="main-component">
            <?php if(isset($_GET['error'])) {
            ?>
            <p class="error">
                <?php echo $_GET['error'];?>
            </p>
            <?php } ?>
            <div class="second-component">
                <h2 class="header-register">Create your account</h2>
                <input class="input-register" type="text" name="uname" placeholder="Enter Username"><br>
                <input class="input-register" type="password" name="pass" placeholder="Enter Password"><br>
                <button class="submit-register" type="submit">Register</button>
                <button class="back-login" id="submit-form-2"><a href="../home.php">Back to login</a></button>  
                <?php if(isset($_GET['error_register'])) {
            ?>
                <p class="error">
                    <?php echo $_GET['error_register'];?>
                </p>
                <?php } ?>
            </div>
        </div>
    </form>
    <?php ?>

</body>
</html>