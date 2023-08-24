<?php
include("./secrets.php");
$hostName = "localhost";
$userName = $DB_USER;
$password = $DB_PASS;
$databaseName = $DB_NAME;

$conn = OpenConnection();

function OpenConnection()
{
    global $hostName, $userName, $password, $databaseName;


    $serverName = "tcp:$hostName,1433";
    $connectionOptions = array(
        "Database" => $databaseName,
        "Uid" => $userName,
        "PWD" => $password
    );
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if ($conn == false)
        die(print_r(sqlsrv_errors(), true));

    return $conn;
}

?>