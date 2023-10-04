<?php
if(isset($_GET['mac']) && !empty($_GET['mac'])){
    $editId = $_REQUEST['mac'];
    $query ="SELECT ride, mac FROM mac WHERE mac LIKE '" . $editId . "'";
    $result = $conn->query($query);
    $editData= $result->fetch_assoc();
    $fullName= $editData['mac'];
    $courseName= $editData['ride'];
}

?>