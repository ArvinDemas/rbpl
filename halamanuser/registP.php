<?php 
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap dan sanitasi input
    $nama = mysqli_real_escape_string($konek, $_POST['nama']);
    $email = mysqli_real_escape_string($konek, $_POST['email']);
    $password = mysqli_real_escape_string($konek, $_POST['password']);
    $no_hp = mysqli_real_escape_string($konek, $_POST['no_hp']);

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query INSERT
    $sql = "INSERT INTO customer (nama, email, password, no_hp) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($konek, $sql);
    
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "ssss", $nama, $email, $hashed_password, $no_hp);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php");
        exit;
    } else {
        error_log("Database Error: " . mysqli_error($konek));
        header("Location: register.php?error=1");
        exit;
    }
} else {
    header("Location: register.php");
    exit;
}
?>
