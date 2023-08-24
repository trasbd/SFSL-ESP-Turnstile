<?php

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
    $conn = OpenConnection();

    // Check connection

    $sql = "select seats, mac.ride from seats, mac where seats.ride LIKE mac.ride AND mac.mac LIKE '" . $esp_mac . "';";



    $seats = sqlsrv_fetch_array(sqlsrv_query($conn, $sql), SQLSRV_FETCH_ASSOC);

    if (!empty($seats['seats'])) {

        echo $seats['seats'];
        echo "<br>";
        echo $seats['ride'];
    } else {
        echo "1<br>";
        echo $esp_mac;
    }

    sqlsrv_close($conn);

} else {
    echo "1<br>";
    echo $esp_mac;
}

