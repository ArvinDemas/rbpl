<?php
session_start();
include "../halamanuser/koneksi.php";

// Cek session admin
if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

// Ambil ID dari URL
if (!isset($_GET['id'])) {
  echo "ID tidak ditemukan";
  exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM booking WHERE id = ?";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$booking = mysqli_fetch_assoc($result);

if (!$booking) {
  echo "Data tidak ditemukan";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Booking - ChungBike Shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
  </style>
</head>
<body class="bg-[#FAFAFA] text-[#222]">
  <div class="p-10 max-w-5xl mx-auto">
    <div class="mb-6">
      <h1 class="text-2xl font-bold mb-2">Detail Booking</h1>
      <a href="request.php" class="text-blue-600 hover:underline">&larr; Kembali ke Request</a>
    </div>

    <div class="bg-white rounded-lg shadow p-6 space-y-6">
      <h2 class="text-xl font-semibold">Personal Information</h2>
      <div class="grid grid-cols-2 gap-4">
        <p><strong>Nama:</strong> <?= htmlspecialchars($booking['first_name'] . ' ' . $booking['last_name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($booking['email']) ?></p>
        <p><strong>No. Telepon:</strong> <?= htmlspecialchars($booking['phone_number']) ?></p>
      </div>

      <h2 class="text-xl font-semibold mt-6">Motorcycle Information</h2>
      <div class="grid grid-cols-2 gap-4">
        <p><strong>Merk:</strong> <?= htmlspecialchars($booking['motorcycle_brand']) ?></p>
        <p><strong>Model:</strong> <?= htmlspecialchars($booking['motorcycle_model']) ?></p>
        <p><strong>Tahun:</strong> <?= htmlspecialchars($booking['motorcycle_year']) ?></p>
        <p><strong>Plat Nomor:</strong> <?= htmlspecialchars($booking['license_plate']) ?></p>
        <p><strong>VIN:</strong> <?= htmlspecialchars($booking['vin'] ?: '-') ?></p>
      </div>

      <h2 class="text-xl font-semibold mt-6">Appointment Details</h2>
      <div class="grid grid-cols-2 gap-4">
        <p><strong>Tanggal:</strong> <?= htmlspecialchars($booking['appointment_date']) ?></p>
        <p><strong>Waktu:</strong> <?= htmlspecialchars($booking['appointment_time']) ?></p>
      </div>

      <h2 class="text-xl font-semibold mt-6">Service Details</h2>
      <p><strong>Kategori:</strong> <?= htmlspecialchars($booking['service_category']) ?></p>
      <p><strong>Detail:</strong> <?= nl2br(htmlspecialchars($booking['service_details'])) ?></p>
    </div>
  </div>
</body>
</html>
