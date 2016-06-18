<?php
    session_start();
    if(!isset($_SESSION['st_user_name'])) header("Location: ../");
    switch($_SESSION['st_user_prev']) {
        case "U": header("Location: ../student"); break;        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../styles/domstyle.css">
        <link rel="stylesheet" type="text/css" href="../styles/cusstyle.css">
        <link rel="stylesheet" type="text/css" href="../styles/pagstyle.css">        
        <script src="../scripts/jquery.js" type="text/javascript"></script>        
        <script src="../scripts/scripts.js" type="text/javascript"></script>
        <title><?php echo $_SESSION['st_user_disp']; ?> | Attendance & Marks Portal</title>
    </head>
    <body>
        <noscript>
            <meta content="0;../no_js" http-equiv="refresh">
        </noscript>
        <div id="content">
            <ul id="menu" <?php if($_SESSION['st_user_prev']=="M") echo 'style="max-width: 450px;"' ?> >
                <?php if($_SESSION['st_user_prev']=="A") { ?>
                <li data-image="user" data-func="user" data-level="0">Users</li>
                <li data-image="dept" data-func="dept" data-level="0">Departments</li>
                <?php } ?>
                <li data-image="subject">Subjects</li>
                <li data-image="attd">Attendance</li>
                <li data-image="marks">Marks</li>
                <?php if($_SESSION['st_user_prev']=="A") { ?>
                <li data-image="notify" data-title="Notifications">Notifications</li>
                <?php } ?>
                <li class="right" data-image="logout" data-func="logout" data-level="0">Log Out</li>
                <li class="right" data-image="sets" data-func="sets" data-level="0">Settings</li>
                <li class="right" data-image="info" data-func="info" data-level="0">About</li>
                <li class="right" data-image="call" data-func="call" data-level="0">Contact</li>
            </ul>
        </div>
        <script src="../scripts/functions.js" type="text/javascript"></script>
    </body>
</html>
