<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../styles/domstyle.css">
        <link rel="stylesheet" type="text/css" href="../styles/cusstyle.css">
        <link rel="stylesheet" type="text/css" href="../styles/logstyle.css">
        <script src="../scripts/jquery.js" type="text/javascript"></script>
        <script src="../scripts/scripts.js" type="text/javascript"></script>
        <title>Home | Attendance & Marks Portal</title>
    </head>
    <body>
        <noscript>
            <meta content="0;../no_js" http-equiv="refresh">
        </noscript>
        <div id="content">
            <form>
                <div style="margin-top: 50px; text-align: center">
                    <div id="logo"></div>
                    <h1>Shri Angalamman College of Engineering and Technology</h1>
                    <h2>Attendance & Marks Portal</h2>
                </div>
                <fieldset>
                    <table>
                        <tr>
                            <td style="width: 80px">User Name:
                            </td>
                            <td><input type="text" class="text" id="uname"></td>
                        </tr>
                        <tr>
                            <td style="width: 80px">Password:
                            </td>
                            <td><input type="password" class="text" id="upass"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Log In" class="btn"></td>
                        </tr>
                    </table>
                    <div id="ajax-result" style="display: none; color: #F80; text-align: center"></div>
                </fieldset>
            </form>
            <script>
                $(function () {                    
                    $("#uname").focus();
                    $("form").submit(function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "login.php",
                            data: { "uname": $("#uname").val(), "upass": $("#upass").val() },
                            success: function (e) {
                                $("#uname").focus();
                                $("div#ajax-result").html(e);
                                $("div#ajax-result").slideDown(250);
                                setTimeout(function () { $("div#ajax-result").slideUp(250); }, 3000);
                            }
                        })
                    })
                });
            </script>
        </div>
    </body>
</html>
