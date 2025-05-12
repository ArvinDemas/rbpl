<?php 
session_start();
include "koneksi.php";

$uname = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO user (username, password) VALUES ('$uname', '$password')";
$result = mysqli_query($connect, $sql);

if ($result) {
    header("location:index.php");
    exit;
} else {
    header("location:index.php?error=4");
    exit;  
}
