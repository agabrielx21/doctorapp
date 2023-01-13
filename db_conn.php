<?php
    $server = "eu-cdbr-west-03.cleardb.net";
    $username = "be943c7025d720";
    $password = "48557520";
    $db_name = "heroku_93e1d9110798538";
    $conn = mysqli_connect($server,$username, $password, $db_name);

    if(!$conn){
        echo "Connection Failed!";
    }