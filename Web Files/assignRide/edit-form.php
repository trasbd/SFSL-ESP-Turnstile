<?php
include("../database.php");
include("edit-script.php");
include("update-script.php");

?>
<!DOCTYPE html>
<html
    class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <form action="" method="post">
                <input readonly type="text" name="fullName" value="<?php echo $fullName; ?>">
                <select name="courseName">
                    <option value="None">None</option>
                    <?php
                    $query = "SELECT ride FROM seats";
                    $result = sqlsrv_query($conn, $query);
                    while ($optionData = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                        $option = $optionData['ride'];
                        ?>
                        <?php
                        if (!empty($courseName) && $courseName == $option) {
                            ?>
                            <option value="<?php echo $option; ?>" selected><?php echo $option; ?> </option>
                            <?php
                            continue;
                        } ?>
                        <option value="<?php echo $option; ?>"><?php echo $option; ?> </option>
                        <?php

                    }
                    ?>
                </select>
                <input type="submit" name="update">
            </form>
        </div>

        <footer class="navbar-inverse">
            <div class="container">
                <!-- <div class="pull-left collapse navbar-collapse"><img src="./Home - EAS_files/header_logo.png"
                        alt="Six Flags Logo" id="footer-logo"></div> -->

            </div>
        </footer>