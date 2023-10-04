<?php
ob_start();
include("./database.php");

/* $servername = "localhost";

// REPLACE with your Database name
$dbname = "turnstile";
// REPLACE with Database user
$username = "espLogin";
// REPLACE with Database user password
$password = "espLogin1"; */


$esp_mac = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $esp_mac = $_REQUEST['mac'];


    // echo implode(", ", array_keys($_REQUEST));
    // echo "<br>";
    // echo implode(", ", $_REQUEST);


    // Create connection
    //$conn = new mysqli($servername, $username, $password, $dbname);
    //$conn = OpenConnection();

    // Check connection

    $sql = "select seats, mac.ride from seats, mac where seats.ride LIKE mac.ride AND mac.mac LIKE '" . $esp_mac . "';";

    $result = $conn->query($sql);

    $seats = $result->fetch_assoc();
    ob_end_clean();
    if (!empty($seats['seats'])) {

        echo $seats['seats'];
        echo "<br>";
        echo $seats['ride'];
    } else {
        echo "1<br>";
        echo $esp_mac;
    }

    

} else {
    echo "1<br>";
    echo $esp_mac;
}

