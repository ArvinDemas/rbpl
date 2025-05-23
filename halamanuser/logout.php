<?php 
session_start();

session_unset();
session_destroy();

header("location: ../belumloginuser/homepage_before_login.html");