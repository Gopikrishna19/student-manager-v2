<?php
    session_start();
    if(!isset($_SESSION['st_user_name'])) header("Location: ../");
    switch($_SESSION['st_user_prev']) {
        case "A": header("Location: ../admin"); break;
        case "M": header("Location: ../admin"); break;
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
            <ul id="menu" style="max-width: 450px;">
                <li data-image="attd" data-title="Attendance">Attendance</li>
                <li data-image="marks" data-title="Marks">Marks</li>
                <li data-image="notify" data-title="Notifications">Notifications</li>
                <li class="right" data-image="sets" data-title="Marks">Settings</li>
                <li class="right" data-image="logout" data-title="Log Out">Log Out</li>
                <li class="right" data-image="info" data-title="About">About</li>
            </ul>
        </div>
        <script src="../scripts/functions.js" type="text/javascript"></script>
    </body>
</html>
