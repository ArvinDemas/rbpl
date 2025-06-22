<?php 
session_start();

session_unset();
session_destroy();

// Redirect to hosted landing page
header("location: https://rbpl10.xyz/");
