<?php
include("../database.php");
include("fetch-script.php");
?>
<!DOCTYPE html>
<html
  class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assign Clicker - Ride Count</title>
  <link href="../bootstrap.css" rel="stylesheet">

  <link href="../css.css" rel="stylesheet">
</head>

<body>
  <div id="wrap">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <ul class="nav navbar-nav navbar-left">



            <li><a href="">Turnstile Report</a></li>
            <li><a href="../hourly.php">Hourly</a></li>
            <li><a href="../assignRide">Assign Clicker</a></li>

          </ul>
        </div>

      </div>

    </nav>
    <div id="mainContent" class="container">
      <h3>Change Ride ESP Assignment</h3>
      <br>
      <table border="1" cellspacing="0" cellpadding="5" width="40%">
        <thead>
          <tr>
            <th>ESP MAC Address</th>
            <th>Ride</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (true) {
            $sn = 1;
            while ($option = $result->fetch_assoc()) {

              ?>
              <tr>
                <td>
                  <?php echo $option['mac']; ?>
                </td>
                <td>
                  <?php echo $option['ride']; ?>
                </td>
                <td><a href="edit-form.php?mac=<?php echo $option['mac']; ?>">Edit</a></td>
              </tr>
              <?php
              $sn++;
            }
          }
          ?>
        </tbody>
      </table>

    </div>




    <footer class="navbar-inverse">
      <div class="container">
        <!-- <div class="pull-left collapse navbar-collapse"><img src="./Home - EAS_files/header_logo.png"
                        alt="Six Flags Logo" id="footer-logo"></div> -->

      </div>
    </footer>