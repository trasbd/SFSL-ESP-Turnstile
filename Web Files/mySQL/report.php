<?php
include("./database.php");

date_default_timezone_set("America/Chicago");

$dateValue = date("Y-m-d");
$dateWant = date("Y/m/d");
$hourEnd = date("H") . ":00";
$hourStart = "11:00";
$rideName = "River King Mine Train";
$attendance = 5000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dateWant = $_POST['inputDate'];
    $hourEnd = $_POST['inputTimeEnd'];
    $hourStart = $_POST['inputTimeStart'];
    $rideName = $_POST['inputRide'];
    $attendance = $_POST['inputAttendance'];

    $dateValue = $dateWant;

} else {

}

//$dateTomorrow = date('Y-m-d', strtotime($dateValue . " +1 day"));

$query = <<<ENDSTR
SELECT
    h1.time,
    capacity.hourlyCap,
    h1.cycles,
    h1.hourly,
    SUM(h2.hourly) AS accu,
    h1.units,
    h1.wait
FROM
    hourly AS h1
JOIN hourly AS h2 ON h1.time >= h2.time
LEFT JOIN capacity ON h1.ride = capacity.ride AND h1.units = capacity.units
WHERE
    h1.ride = '$rideName' AND h2.ride = '$rideName' 
    AND h1.date = '$dateWant' AND h2.date = '$dateWant'
    AND h1.time > '$hourStart' AND h2.time > '$hourStart'
    AND h1.time <= '$hourEnd' AND h2.time <= '$hourEnd'
GROUP BY
    h1.time,
    h1.hourly
ORDER BY
    h1.time;
ENDSTR;

//$options = sqlsrv_query($conn, $query);
$result = $conn->query($query);

$query = <<<ENDSTR
SELECT
    ride
FROM seats
ORDER BY ride;
ENDSTR;

//$options = sqlsrv_query($conn, $query);
$rideNames = $conn->query($query);

$query = <<<ENDSTR
SELECT
    SUM(capacity.hourlyCap) AS totalCap,
    SUM(h1.cycles) AS totalCycles,
    SUM(h1.hourly) AS totalRiders,
    ROUND(AVG(h1.wait),
    0) AS avgWait
FROM
    hourly AS h1
LEFT JOIN capacity ON h1.ride = capacity.ride AND h1.units = capacity.units
WHERE
    h1.ride = '$rideName' AND h1.date = '$dateWant' AND h1.time > '$hourStart' AND h1.time <= '$hourEnd'
ENDSTR;

//$options = sqlsrv_query($conn, $query);
$endOfDayReturn = $conn->query($query);
$eodRow = $endOfDayReturn->fetch_assoc();


?>

<?php include('./header.php'); ?>

<div id="mainContent" class="container">
    <h3>Turnstile Report</h3>
    <br>
    <form method="POST">
        Ride: <select name="inputRide" value="<?php echo $rideName; ?>">
            <?php while ($option = $rideNames->fetch_assoc()) { ?>
                <option <?php if ($rideName == $option['ride'])
                    echo 'selected' ?>>
                    <?php echo $option['ride']; ?>
                </option>
            <?php } ?>
        </select>
        <br><br>
        <input type="date" name="inputDate" value="<?php echo $dateValue; ?>" />
        &nbsp;Park Hours:
        <input type="time" name="inputTimeStart" value="<?php echo $hourStart; ?>" />
        -
        <input type="time" name="inputTimeEnd" value="<?php echo $hourEnd; ?>" />
        <br><br>
        Attendance: <input type="number" name="inputAttendance" min=1 value="<?php echo $attendance; ?>" />
        <input type="submit" value="GO!" />
    </form>
    <br>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr align="center">
                <th>
                    <?php echo date("d/m/Y", strtotime($dateValue)); ?>
                </th>
                <th>Hourly<br>Capacity</th>
                <th>Hourly<br>Cycles</th>
                <th>Hourly<br>Riders</th>
                <th>Accum.<br>Riders</th>
                <th>Units</th>
                <th>Wait<br>(min)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            #while ($option = sqlsrv_fetch_array($options, SQLSRV_FETCH_ASSOC)) {
            while ($option = $result->fetch_assoc()) {

                ?>
                <tr style="text-align:center">
                    <td style="text-align:right;">
                        <?php echo $option['time']; ?>
                    </td>
                    <td>
                        <?php echo $option['hourlyCap']; ?>
                    </td>
                    <td>
                        <?php echo $option['cycles']; ?>
                    </td>
                    <td>
                        <?php echo $option['hourly']; ?>
                    </td>
                    <td>
                        <?php echo $option['accu']; ?>
                    </td>
                    <td>
                        <?php echo $option['units']; ?>
                    </td>
                    <td>
                        <?php echo $option['wait']; ?>
                    </td>
                </tr>
                <?php
            }

            ?>
            <tr>
                <th>Total</th>
                <th>
                    <?php echo $eodRow['totalCap']; ?>
                </th>
                <th>
                    <?php echo $eodRow['totalCycles']; ?>
                </th>
                <th>
                    <?php echo $eodRow['totalRiders']; ?>
                </th>
                <td style="padding-left:1em;text-align:right;" colspan="2">Park Attendance</td>
                <th>
                    <?php echo $attendance; ?>
                </th>
            </tr>
            <tr>
                <th>% Utilization</th>
                <th>
                    <?php if ((float) $eodRow['totalCap'])
                        echo number_format(round(((float) $eodRow['totalRiders'] / (float) $eodRow['totalCap']) * 100, 1), 1); ?>%
                </th>
            </tr>
            <tr>
                <th>Rides / Guest</th>
                <th>
                    <?php echo number_format(round(((float) $eodRow['totalRiders'] / (float) $attendance), 3), 3); ?>
                </th>
            </tr>
        </tbody>
    </table>
    <br>
    
</div>

<br>




<footer class="navbar-inverse">
    <div class="container">
        <!-- <div class="pull-left collapse navbar-collapse"><img src="./Home - EAS_files/header_logo.png"
                        alt="Six Flags Logo" id="footer-logo"></div> -->

    </div>
</footer>