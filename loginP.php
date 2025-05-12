<?php 
session_start();
include "koneksi.php";

    $uname = $_POST['username'];
    $password = $_POST['password'];
    

        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$password'";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            if ($row["username"] == $uname && $row["password"] == $password) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["password"] = $row["password"];
                header("location:home.php");
                exit;
            }else {
                header("location:index.php?error=");
                exit;  
             }
            }
    


