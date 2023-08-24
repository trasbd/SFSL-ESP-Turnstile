<?php 

/// update data
if(isset($_POST['update']) && !empty($_GET['mac'])){

    $fullName = $_POST['fullName'];
    $courseName = $_POST['courseName'];
    $editId = $_GET['mac'];

    if(!empty($courseName)){
      $query = "UPDATE mac 

      SET mac ='$fullName', 
       ride ='$courseName' 
                WHERE mac LIKE '$editId'";
      $result = sqlsrv_query($conn, $query);
      if($result){
        header("location:index.php");
      } 
    }
  }

?>