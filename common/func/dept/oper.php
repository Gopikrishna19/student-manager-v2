<?php
    include("../../config.php");
    switch($_REQUEST['oper']){
        case "I": $query = "SELECT * FROM st_departments WHERE dCode = '".$_REQUEST['code']."'";
                  $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc)." 1");
                  if($row = mysqli_fetch_row($result))  echo "Code Already Exists: ".$_REQUEST['code']." - ".$_REQUEST['name'];
                  else {
                      $query = "INSERT INTO st_departments VALUES('".$_REQUEST['code']."','".$_REQUEST['name']."')";
                      $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                      echo "Successfully Inserted: ".$_REQUEST['code']." - ".$_REQUEST['name'];
                  }
                  break;
        case "U": $query = "SELECT * FROM st_departments WHERE dCode = '".$_REQUEST['code']."' AND dName = '".$_REQUEST['name']."'";
                  $result = mysqli_query($dbc, $query) or die(mysqli_error($dbc)." 1");
                  if($row = mysqli_fetch_row($result))  echo "Department Already Exists: ".$_REQUEST['code']." - ".$_REQUEST['name'];
                  else {
                      $query = "UPDATE st_departments SET dCode = '".$_REQUEST['code']."', dName = '".$_REQUEST['name']."' ".
                      "WHERE dCode = '".$_REQUEST['ocode']."' AND dName = '".$_REQUEST['oname']."'";
                      mysqli_query($dbc, $query) or die(mysqli_error($dbc)." 2");
                      echo "Successfully Updated: ".$_REQUEST['code']." - ".$_REQUEST['name'];
                  }                  
                  break;
        case "D": $query = "DELETE FROM st_departments WHERE dCode = '".$_REQUEST['code']."' AND dName = '".$_REQUEST['name']."'";
                  mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                  echo "Successfully Deleted: ".$_REQUEST['code']." - ".$_REQUEST['name'];
                  break;
        case "A": $query = "DELETE FROM st_departments";
                  mysqli_query($dbc, $query) or die(mysqli_error($dbc));
                  echo "Successfully Deleted All";
    }
?>