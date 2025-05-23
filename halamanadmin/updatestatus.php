<?php
session_start();
include "../halamanuser/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_booking = intval($_POST['id_booking']);
    $status = $_POST['status'];

    // Validasi agar tidak sembarangan
    $allowed_statuses = ['accepted', 'rejected', 'in_queue','in_queue', 'in_progress', 'done'];

    if (in_array($status, $allowed_statuses)) {
        $stmt = mysqli_prepare($konek, "UPDATE booking SET status = ? WHERE id_booking = ?");
        mysqli_stmt_bind_param($stmt, "si", $status, $id_booking);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

header("Location: service.php");
exit;
