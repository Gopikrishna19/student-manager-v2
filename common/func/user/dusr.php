<?php 
include("../../config.php");
$query = "SELECT userId FROM st_users WHERE userId = '".$_REQUEST['uname']."'";
$result = mysqli_query($dbc, $query) or die(mysqli_error($dbc));
if(mysqli_fetch_row($result)) {
    $query = "DELETE FROM st_users WHERE userId = '".$_REQUEST['uname']."'";
    mysqli_query($dbc, $query) or die("<span style='color: #844'>".mysqli_error($dbc)."</span>");
    echo "<span style='color: #484'>User ".$_REQUEST['uname']." Deleted Successfully</span>";   
}
else die("<span style='color: #844'>User ".$_REQUEST['uname']." is not Found</span>");
?>