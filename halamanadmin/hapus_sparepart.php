<?php
session_start();
include "../halamanuser/koneksi.php";

// Check if admin or mechanic is logged in
if (!isset($_SESSION['id_admin']) && !isset($_SESSION['id_mekanik'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

// Check if sparepart ID is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID spare part tidak valid.");
}

$id_sparepart = intval($_GET['id']);

// Fetch sparepart data to get image URL
$query = "SELECT gambar_url, nama_sparepart FROM sparepart WHERE id_sparepart = ?";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id_sparepart);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$sparepart = mysqli_fetch_assoc($result);

if (!$sparepart) {
    die("Spare part tidak ditemukan.");
}

// Delete sparepart image file if exists and not default
if ($sparepart['gambar_url'] && $sparepart['gambar_url'] !== 'default.png' && file_exists($sparepart['gambar_url'])) {
    unlink($sparepart['gambar_url']);
}

// Delete sparepart from database
$delete_query = "DELETE FROM sparepart WHERE id_sparepart = ?";
$stmt = mysqli_prepare($konek, $delete_query);
mysqli_stmt_bind_param($stmt, "i", $id_sparepart);

if (mysqli_stmt_execute($stmt)) {
    // Notification insertion removed due to missing notifications table
    // $user_id = isset($_SESSION['id_admin']) ? $_SESSION['id_admin'] : $_SESSION['id_mekanik'];
    // $user_type = isset($_SESSION['id_admin']) ? 'admin' : 'mekanik';
    // $message = "Spare part '" . $sparepart['nama_sparepart'] . "' telah dihapus oleh " . $user_type . " dengan ID " . $user_id . ".";

    // $notif_query = "INSERT INTO notifications (user_id, user_type, message, created_at) VALUES (?, ?, ?, NOW())";
    // $notif_stmt = mysqli_prepare($konek, $notif_query);
    // mysqli_stmt_bind_param($notif_stmt, "iss", $user_id, $user_type, $message);
    // mysqli_stmt_execute($notif_stmt);

    header("Location: inventory.php?msg=Sparepart berhasil dihapus");
    exit();
} else {
    die("Gagal menghapus spare part: " . mysqli_error($konek));
}
?>
