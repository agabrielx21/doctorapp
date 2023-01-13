<?php
session_start();
include "../db_conn.php";
$user = $_SESSION['username'];
$n = $_POST['nume'];
$e = $_POST['email'];
$m = $_POST['mesaj'];
$cm = $m . "<br>" . "trimis de userul " . $user . " cu numele " . $n . " si mailul  " . $e;
$email = "alex.gabriel340@gmail.com";
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://be.trustifi.com/api/i/v1/email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"recipients\":[{\"email\":\"$email\"}],\"title\":\"Feedback\",\"html\":\"$cm\"}",
    CURLOPT_HTTPHEADER => array(
        "x-trustifi-key: fff6f433574e6bc05aef39be5e194318906ff7c49a94bd48 ",
        "x-trustifi-secret: b94ab05aa45495caf6e0923f89e33267",
        "content-type: application/json"
    )
)
);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}

header("Location: ../home.php?error=Feedbackul a fost trimis !");
exit();
?>