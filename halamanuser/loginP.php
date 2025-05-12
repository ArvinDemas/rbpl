<?php 
session_start();
include "koneksi.php";

$email = $_POST['Email'];
$password = $_POST['Password'];

$loginSukses = false;
$role = '';
$userData = null;

// Fungsi untuk cek login dari tabel tertentu
function cekLogin($connect, $table, $email, $password) {
    $sql = "SELECT * FROM $table WHERE Email = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($row['Password'] === $password) { // NOTE: sebaiknya hash password
            return $row;
        }
    }
    return null;
}

// Cek di admin
$userData = cekLogin($connect, 'admin', $email, $password);
if ($userData) {
    $loginSukses = true;
    $role = 'admin';
}

// Jika belum berhasil, cek di customer
if (!$loginSukses) {
    $userData = cekLogin($connect, 'customer', $email, $password);
    if ($userData) {
        $loginSukses = true;
        $role = 'customer';
    }
}

// Jika belum berhasil, cek di mekanik
if (!$loginSukses) {
    $userData = cekLogin($connect, 'mekanik', $email, $password);
    if ($userData) {
        $loginSukses = true;
        $role = 'mekanik';
    }
}

if ($loginSukses) {
    $_SESSION['Email'] = $email;
    $_SESSION['role'] = $role;
    echo "Login berhasil sebagai $role";
    // header("Location: dashboard_$role.php");
} else {
    echo "Email atau password salah!";
}

$connect->close();
?>
