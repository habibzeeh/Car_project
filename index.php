<?php
include 'Header.php';
include 'Header_files.php';
$user = $_SESSION["user"];
if($user->type == "admin")
    include 'home_admin.php';
if($user->type == "user")
    include 'home_user.php';