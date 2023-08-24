<?php
include("./database.php");

date_default_timezone_set("America/Chicago");

$dateValue = date("Y-m-d");
$dateWant = date("Y/m/d");
$hourWant = date("H");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $dateWant = $_POST['inputDate'];
  $hourWant = substr($_POST['inputTime'], 0, 2);
  $dateValue = $dateWant;

} else {

}

$query = "SELECT ride, cycles, hourly, wait, units FROM hourly WHERE date = '$dateWant' AND time = '$hourWant:00'";
$options = sqlsrv_query($conn, $query);

?>
<!DOCTYPE html>
<html
  class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hourly - Ride Count</title>
  <link href="./bootstrap.css" rel="stylesheet">

  <link href="./css.css" rel="stylesheet">
</head>

<body>
  <div id="wrap">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <ul class="nav navbar-nav navbar-left">



            <li><a href="">Turnstile Report</a></li>
            <li><a href="./hourly.php">Hourly</a></li>
            <li><a href="./assignRide">Assign Clicker</a></li>

          </ul>
        </div>

      </div>

    </nav>
    <div id="mainContent" class="container">
      <h3>Hourly Count</h3>
      <br>
      <form action="./hourly.php" method="POST">
        <input type="date" name="inputDate" value="<?php echo $dateValue; ?>" />
        <input type="time" name="inputTime" value="<?php echo $hourWant; ?>:00" />
        <input type="submit" value="GO!" />
      </form>
      <br>
      <table border="1" cellspacing="0" cellpadding="5">
        <thead>
          <tr align="center">
            <th>Ride</th>
            <th>Units</th>
            <th>Cycles</th>
            <th>Hourly</th>
            <th>Wait</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (true) {
            $sn = 1;
            while ($option = sqlsrv_fetch_array($options, SQLSRV_FETCH_ASSOC)) {

              ?>
              <tr style="text-align:center">
                <td style="padding-right:5em;text-align:left;">
                  <?php echo $option['ride']; ?>
                </td>
                <td>
                  <?php echo $option['units']; ?>
                </td>
                <td>
                  <?php echo $option['cycles']; ?>
                </td>
                <td>
                  <?php echo $option['hourly']; ?>
                </td>
                <td>
                  <?php echo $option['wait']; ?>
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