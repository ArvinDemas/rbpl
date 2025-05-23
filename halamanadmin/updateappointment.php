<?php
session_start();
include "../halamanuser/koneksi.php";

// Cek jika tidak ada ID booking di URL
if (!isset($_GET['id'])) {
    echo "ID booking tidak ditemukan.";
    exit;
}

$id_booking = intval($_GET['id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $brand = $_POST['motorcycle_brand'];
    $model = $_POST['motorcycle_model'];
    $year = $_POST['motorcycle_year'];
    $plate = $_POST['license_plate'];
    $vin = $_POST['vin'];
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $category = $_POST['service_category'];
    $details = $_POST['service_details'];

    $sql = "UPDATE booking SET
        first_name = ?, last_name = ?, email = ?, phone_number = ?,
        motorcycle_brand = ?, motorcycle_model = ?, motorcycle_year = ?,
        license_plate = ?, vin = ?, appointment_date = ?, appointment_time = ?,
        service_category = ?, service_details = ?
        WHERE id_booking = ?";

    $stmt = mysqli_prepare($konek, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssssssi", 
        $first_name, $last_name, $email, $phone, $brand, $model, $year,
        $plate, $vin, $date, $time, $category, $details, $id_booking
    );

    if (mysqli_stmt_execute($stmt)) {
        // Berhasil update, redirect ke halaman request
        header("Location: request.php?pesan=update_berhasil");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($konek);
    }
} else {
    echo "Akses tidak sah.";
}
?>
