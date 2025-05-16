<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($konek, $_POST['email']);
    $password = mysqli_real_escape_string($konek, $_POST['password']);

    // Ambil data user berdasarkan email
    $query = "SELECT * FROM customer WHERE email = ?";
    $stmt = mysqli_prepare($konek, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verifikasi password
        if (password_verify($password, $row['password'])) {
            $_SESSION['id_customer'] = $row['id_customer'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['status'] = "login";

             header("Location: homepage.php");
            exit;

        } else {
            // Password salah
            header("Location: login.php?pesan=password_salah");
            exit;
        }
    } else {
        // Email tidak ditemukan
        header("Location: login.php?pesan=email_tidak_ditemukan");
        exit;
    }
} else {
    // Akses langsung ke file
    header("Location: login.php");
    exit;
}
