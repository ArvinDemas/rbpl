<?php 
session_start();

session_unset();
session_destroy();

header("location: homepage_before_login.html");