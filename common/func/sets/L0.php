<?php session_start(); ?>
<div id="overlay-page-content">
    <div class="title">Settings</div>
    <ul class="submenu">
        <?php //if($_SESSION["st_user_prev"]!="A") { ?>
        <li data-image="rename" data-func="sets" data-level="1" data-hash="ren">Change Display Name</li>
        <?php //} ?>
        <li data-image="repass" data-func="sets" data-level="1" data-hash="rep">Change Password</li>
        <?php if($_SESSION["st_user_prev"]=="A") { ?>
        <li data-image="refresh" data-func="sets" data-level="1" data-hash="res">Reset All</li>
        <?php } ?>
    </ul>
</div>