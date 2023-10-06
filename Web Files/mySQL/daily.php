<?php
include("./database.php");

date_default_timezone_set("America/Chicago");

$dateValue = date("Y-m-d");
$dateWant = date("Y/m/d");
$hourEnd = date("H") . ":00";
$hourStart = "11:00";
$attendance = 5000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dateWant = $_POST['inputDate'];
  $hourEnd = $_POST['inputTimeEnd'];
  $hourStart = $_POST['inputTimeStart'];
  $attendance = $_POST['inputAttendance'];

  $dateValue = $dateWant;

} else {

}

$dateTomorrow = date('Y-m-d', strtotime($dateValue . " +1 day"));

$query = <<<ENDSTR
SELECT
    tcpu.ride,
    SUM(tcpu.unitTotal) AS totalHourly,
    SUM(tcpu.dailyCap) AS totalCap,
    SUM(tcpu.unitCycles) AS totalCycles,
    ROUND(
        SUM(tcpu.unitTotal) / SUM(tcpu.dailyCap) * 100,
        1
    ) AS "PU",
    ROUND(SUM(tcpu.unitTotal) / $attendance,
    3) AS "RPG"
FROM
    (
    SELECT
        hourly.ride,
        hourly.`units`,
        capacity.hourlyCap,
        SUM(hourly.hourly) AS unitTotal, # Im doing this so it grabs everything all at once
        SUM(hourly.cycles) AS unitCycles,
        COUNT(hourly.units) * capacity.hourlyCap AS 'dailyCap'
    FROM
        `hourly`
    LEFT JOIN capacity ON hourly.ride = capacity.ride AND hourly.units = capacity.units
    WHERE
        hourly.date >= '$dateValue' AND hourly.date < '$dateTomorrow' AND hourly.time > '$hourStart' AND hourly.time <= '$hourEnd'
    GROUP BY
        hourly.units,
        hourly.ride
) AS tcpu
GROUP BY
    tcpu.ride
ORDER BY
    tcpu.ride ASC;
ENDSTR;

//$options = sqlsrv_query($conn, $query);
$result = $conn->query($query);

?>

<?php include('./header.php'); ?>

<div id="mainContent" class="container">
  <h3>Daily Report</h3>
  <br>
  <form method="POST">
    <input type="date" name="inputDate" value="<?php echo $dateValue; ?>" />
    &nbsp;Park Hours:
    <input type="time" name="inputTimeStart" value="<?php echo $hourStart; ?>" />
    -
    <input type="time" name="inputTimeEnd" value="<?php echo $hourEnd; ?>" />

    &nbsp;Attendance: <input type="number" name="inputAttendance" min=1 value="<?php echo $attendance; ?>" />
    <input type="submit" value="GO!" />
  </form>
  <br>
  <table border="1" cellspacing="0" cellpadding="5">
    <thead>
      <tr align="center">
        <th>Ride</th>

        <th>Total Riders</th>
        <th>Total Cycles</th>
        <th>% Utilization</th>
        <th>Rides / Guest</th>
        <th>Total Capacity</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (true) {
        $sn = 1;
        #while ($option = sqlsrv_fetch_array($options, SQLSRV_FETCH_ASSOC)) {
        while ($option = $result->fetch_assoc()) {

          ?>
          <tr style="text-align:center">
            <td style="padding-right:5em;text-align:left;">
              <?php echo $option['ride']; ?>
            </td>
            <td>
              <?php echo $option['totalHourly']; ?>
            </td>
            <td>
              <?php echo $option['totalCycles']; ?>
            </td>
            <td>
              <?php echo $option['PU']; ?> %
            </td>
            <td>
              <?php echo $option['RPG']; ?>
            </td>
            <td>
              <?php echo $option['totalCap']; ?>
            </td>
          </tr>
          <?php
          $sn++;
        }
      }
      ?>
    </tbody>
  </table>

</div>

<br>




<footer class="navbar-inverse">
  <div class="container">
    <!-- <div class="pull-left collapse navbar-collapse"><img src="./Home - EAS_files/header_logo.png"
                        alt="Six Flags Logo" id="footer-logo"></div> -->

  </div>
</footer>