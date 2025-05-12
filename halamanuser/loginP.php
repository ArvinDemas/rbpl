<?php 
session_start();
include "koneksi.php";

    $uname = $_POST['username'];
    $password = $_POST['password'];
    

       // Cek di tabel admin terlebih dahulu
$sqlAdmin = "SELECT * FROM admin WHERE username = ?";
$stmt = $conn->prepare($sqlAdmin);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$loginSukses = false;
$role = '';

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if ($row['password'] === $password) {
        $loginSukses = true;
        $role = 'admin';
    }
} else {
    // Jika tidak ditemukan di admin, cek di user
    $sqlUser = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sqlUser);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($row['password'] === $password) {
            $loginSukses = true;
            $role = 'user';
        }
    }
}

if ($loginSukses) {
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
    echo "Login berhasil sebagai $role";
    // header("Location: dashboard_$role.php");
} else {
    echo "Username atau password salah!";
}

$conn->close();
?>