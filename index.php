<!DOCTYPE html>
<html>
<style>
.submit {
    cursor: pointer;
    padding-top: 2px;
}

.create {
    margin-top: 4%;
    width: 80%;
    margin-left: -15%;
    background-color: #2691d9;
    border: none;
    font-size: 1rem;
    border-radius: 20px;
    color: white;
    height: 8%;
    font-family: 'Bree Serif', serif;
    text-align: center;
    padding-top: 6px;
    cursor: pointer;
    text-decoration: none;
}

a {
    text-decoration: none;
}

a:visited {
    color: white;
    text-decoration: none;
}

.input-register{
    margin-top: 10%;
    height: 6%;
    width: 80%;
    margin-left: -15%;
    border: 2px solid black;
  }
.input-register::placeholder{

    color: black;
    font-size: 0.76rem;
}
.error{
                
                
            }
</style>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <form action="login.php" method="post">
        <div class="main-component">
            <div class="second-component">
                <h2 class="header">LOGIN</h2>
                <input class="input-register" type="text" name="uname" placeholder="Enter Username"><br>
                <input class="input-register" type="password" name="pass" placeholder="Enter Password"><br>
                <button class="submit" type="submit">Login</button>
                <div class="create"><a href="register\create.php">Create Account</a></div>
                <?php if(isset($_GET['error_login'])) {
            ?>
            <p class="error">
                <?php echo $_GET['error_login'];?>
            </p>
        <?php } ?>
            </div>
        </div>
    </form>

</body>

</html>