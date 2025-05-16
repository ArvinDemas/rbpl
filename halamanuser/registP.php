<?php 
session_start();
include "koneksi.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values and sanitize them
    $nama = mysqli_real_escape_string($connect, $_POST['Nama']);
    $email = mysqli_real_escape_string($connect, $_POST['Email']);
    $password = mysqli_real_escape_string($connect, $_POST['Password']);
    $no_hp = mysqli_real_escape_string($connect, $_POST['No_HP']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $sql = "INSERT INTO customer (Nama, Email, Password, NO_HP) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssss", $nama, $email, $hashed_password, $no_hp);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        header("location:login.php");
        exit;
    } else {
        // Log the error for debugging
        error_log("Database error: " . mysqli_error($connect));
        header("location:login.php?error=4");
        exit;  
    }

}


