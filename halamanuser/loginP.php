<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($konek, $_POST['email']);
    $password = mysqli_real_escape_string($konek, $_POST['password']);

    // === CEK ADMIN === (tanpa hashing)
    $query = "SELECT * FROM admin WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($konek, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = 'admin';
        header("Location: ../halamanadmin/report.php");
        exit;
    }

    // === CEK MEKANIK === (tanpa hashing)
    $query = "SELECT * FROM mekanik WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($konek, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['id_mekanik'] = $row['id_mekanik'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['spesialis'] = $row['spesialis'];
        $_SESSION['role'] = 'mekanik';
        header("Location: ../halamanadmin/myprofile_mekanik.php");
        exit;
    }

    // === CEK CUSTOMER === (dengan password_hash)
    $query = "SELECT * FROM customer WHERE email = ?";
    $stmt = mysqli_prepare($konek, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['id_customer'] = $row['id_customer'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = 'customer';
            header("Location: homepage.php");
            exit;
        } else {
            header("Location: login.php?pesan=password_salah");
            exit;
        }
    }

    // Jika tidak cocok semua
    header("Location: login.php?pesan=gagal");
    exit;
} else {
    header("Location: login.php");
    exit;
}
