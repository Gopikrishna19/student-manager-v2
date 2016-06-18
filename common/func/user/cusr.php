<?php    
    include("../../config.php");
    $query = "SELECT userId FROM st_users WHERE userId = '".$_REQUEST['uname']."'";
    if(!mysqli_fetch_row(mysqli_query($dbc, $query))) {
        $query = "INSERT INTO st_users VALUES('".$_REQUEST['uname']."','".md5("password")."','"
        .$_REQUEST["perm"]."',0,'".($_REQUEST['perm'] == "M" ? "Teacher" : "Student")."')" or die("Error");
        mysqli_query($dbc, $query) or die("<span style='color: #844'>".mysqli_error($dbc)."</span>");
        echo "<span style='color: #484'>User ".$_REQUEST['uname']." Created Successfully</span>";   
    }
    else die("<span style='color: #844'>User ".$_REQUEST['uname']." is already there: Entering a new instant is skipped</span>");
?>