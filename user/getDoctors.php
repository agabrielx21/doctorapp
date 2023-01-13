<?php
include "../db_conn.php";
if (isset($_POST['serviciu'])) {
    $serviciu = $_POST['serviciu'];
    $query = "SELECT * FROM doctor WHERE specializare = '$serviciu'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['nume'] . '">';
    }
}
else{
    $query = "SELECT * FROM doctor";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['nume'] . '">';
    }
}
?>