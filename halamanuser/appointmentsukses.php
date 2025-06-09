<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_customer'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

$id_customer = $_SESSION['id_customer'];

// Ambil data booking terakhir untuk customer
$query = "SELECT * FROM booking WHERE id_customer = ? ORDER BY created_at DESC LIMIT 1";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id_customer);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$booking = mysqli_fetch_assoc($result);

$status = $booking ? $booking['status'] : 'unknown';
$order_id = $booking ? $booking['id_booking'] : 'N/A';
$date = $booking ? $booking['appointment_date'] : '-';
$time = $booking ? $booking['appointment_time'] : '-';

// Ambil data nota jika ada
$nota = null;
if ($order_id !== 'N/A') {
    $nota_query = "SELECT * FROM nota WHERE id_booking = ?";
    $stmt_nota = mysqli_prepare($konek, $nota_query);
    mysqli_stmt_bind_param($stmt_nota, "i", $order_id);
    mysqli_stmt_execute($stmt_nota);
    $nota_result = mysqli_stmt_get_result($stmt_nota);
    $nota = mysqli_fetch_assoc($nota_result);
}
?>

<title>ChungBike Shop</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
</style>

<!-- Appointment Success Section -->
<section class="w-full bg-[#222222] min-h-screen flex flex-col items-center py-20 px-6">
  <div class="text-center mb-12">
    <h2 class="text-white text-3xl font-bold mb-4">Appointment Status</h2>
    <p class="text-[#DB323E] text-lg font-medium">Order ID: <?= htmlspecialchars($order_id); ?></p>
  </div>

  <div class="flex flex-col items-center gap-6">
    <div class="w-16 h-16 rounded-full
      <?= $status === 'confirmed' ? 'bg-green-500' :
          ($status === 'rejected' ? 'bg-red-500' :
          ($status === 'in_queue' ? 'bg-yellow-500' : 'bg-gray-500')); ?>
      flex items-center justify-center">
      <div class="w-8 h-8 bg-white rounded-full"></div>
    </div>

    <div class="text-white text-xl font-semibold">
      <?php
        switch ($status) {
          case 'accepted': echo "Accepted by Admin"; break;
          case 'rejected': echo "Order Rejected"; break;
          case 'in_queue': echo "In Queue"; break;
          case 'in_progress': echo "Being Serviced"; break;
          case 'done': echo "Service Completed"; break;
          default: echo "Awaiting Review";
        }
      ?>
    </div>

    <div class="text-gray-400">Appointment Schedule: <?= htmlspecialchars($date); ?> at <?= htmlspecialchars($time); ?></div>

    <div class="bg-[#DB323E] text-white px-6 py-3 rounded-lg mt-8 hover:bg-[#b8222f] transition">
      <a href="https://wa.me/628123456789">Chat via WhatsApp</a>
    </div>

    <!-- Tampilkan Nota Jika Ada -->
    <?php if ($status === 'done' && $nota): ?>
      <div class="bg-white text-left text-black p-6 rounded-lg shadow-lg mt-12 w-full max-w-xl">
        <h3 class="text-2xl font-bold text-[#DB323E] mb-4">Invoice Tersedia</h3>
        <p class="mb-2"><strong>No. Nota:</strong> <?= htmlspecialchars($nota['nota_id']) ?></p>
        <p class="mb-2"><strong>Tanggal Nota:</strong> <?= date("d M Y", strtotime($nota['tanggal'])) ?></p>
        <p class="mb-4"><strong>Total:</strong> Rp<?= number_format($nota['total'], 0, ',', '.') ?></p>
        <div class="flex gap-4">
          <a href="../halamanadmin/invoice_sukses.php?nota_id=<?= $nota['nota_id'] ?>" 
             target="_blank" 
             class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Lihat Nota</a>
          <a href="../halamanadmin/invoice_sukses.php?nota_id=<?= $nota['nota_id'] ?>&download=1" 
             class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">Download PDF</a>
        </div>
      </div>
    <?php elseif ($status === 'done' && !$nota): ?>
      <div class="text-gray-400 italic mt-12">Nota belum tersedia. Silakan cek kembali nanti.</div>
    <?php endif; ?>

    <div class="mt-12 max-w-2xl text-white text-center">
      <h3 class="text-2xl font-semibold mb-2">Note</h3>
      <p class="text-lg">Please bring your motorcycle to the workshop on the scheduled date and time. Max delay allowed is 30 minutes.</p>
    </div>
    <!-- Tombol kembali -->
<div class="mt-8">
  <a href="../halamanuser/homepage.php" class="inline-block bg-gray-700 text-white px-6 py-3 rounded-lg hover:bg-gray-600 transition">
    ← Kembali ke Homepage
  </a>
</div>
  </div>
</section>

<footer class="bg-[#292929] text-white mt-20 py-12">
  <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
    <div>
      <img src="https://placehold.co/80x100" alt="Logo" class="mb-4">
      <p class="opacity-50">2464 Royal Ln. Mesa, New Jersey 45463</p>
      <p class="opacity-50">(480) 555-0103</p>
      <p class="opacity-50">hello@ChungBikeShop.com</p>
      <p class="opacity-50">www.ChungBikeShop.com</p>
    </div>
    <div>
      <h4 class="font-bold text-lg mb-3">Opening Hours</h4>
      <p class="opacity-50">Mon-Fri: 08.00 - 20.00</p>
      <p class="opacity-50">Sat-Sun: 10.00 - 16.00</p>
    </div>
    <div>
      <h4 class="font-bold text-lg mb-3">Quick Links</h4>
      <p class="opacity-50">About Us<br>Why with Us<br>Our Services<br>Appointment<br>Blog<br>FAQ</p>
    </div>
    <div>
      <h4 class="font-bold text-lg mb-3">Subscribe</h4>
      <p class="opacity-50 mb-2">Receive exclusive promotions and news in your inbox.</p>
      <input type="email" placeholder="Email Address" class="w-full p-2 mb-2 rounded-md bg-[#444] text-white placeholder-gray-400">
      <button class="bg-[#DB323E] px-4 py-2 rounded-md">Submit</button>
    </div>
  </div>
  <div class="text-center text-sm opacity-50 mt-8">Copyright © 2024 ChungBikeShop. All rights reserved.</div>
</footer>
