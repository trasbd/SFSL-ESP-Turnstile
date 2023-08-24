<?php

include("./database.php");

$servername = "localhost";


$date = $time = $ride = $units = $cycles = $hourly = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $date = test_input($_POST["date"]);
    // $time = test_input($_POST["time"]);
    // $ride = test_input($_POST["ride"]);
    // $units = test_input($_POST["units"]);
    // $cycles = test_input($_POST["cycles"]);
    // $hourly = test_input($_POST["hourly"]);

    $date = $_REQUEST['date'];
    $time = $_REQUEST["time"];
    $ride = $_REQUEST["ride"];
    $units = $_REQUEST["units"];
    $cycles = $_REQUEST["cycles"];
    $hourly = $_REQUEST["hourly"];
    $wait = $_REQUEST["wait"];
    $empties = $_REQUEST["empty"];

    // echo implode(", ", array_keys($_REQUEST));
    // echo "<br>";
    // echo implode(", ", $_REQUEST);


    // Create connection
    //$conn = new mysqli($servername, $username, $password, $dbname);
    $conn = OpenConnection();

    // Check connection

    $sql = "INSERT INTO hourly (date, time, ride, units, cycles, empty, hourly, wait)
        VALUES ('" . $date . "', '" . $time . "', '" . $ride . "', '" . $units . "', '" . $cycles . "', '" . $empties . "', '" . $hourly . "', '" . $wait . "')";

    if (sqlsrv_query($conn, $sql) != FALSE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>";
        print_r(sqlsrv_errors(), true);
    }

    sqlsrv_close($conn);

} else {
    echo "No data posted with HTTP POST.";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

