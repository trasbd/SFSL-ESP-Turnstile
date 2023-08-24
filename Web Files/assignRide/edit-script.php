<?php
if(isset($_GET['mac']) && !empty($_GET['mac'])){
    $editId = $_REQUEST['mac'];
    $query ="SELECT ride, mac FROM mac WHERE mac LIKE '" . $editId . "'";
    $result = sqlsrv_query($conn, $query);
    $editData=sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $fullName= $editData['mac'];
    $courseName= $editData['ride'];
}

?>