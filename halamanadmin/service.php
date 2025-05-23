<?php
session_start();
include "../halamanuser/koneksi.php";

// Cek apakah admin sudah login
if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

// Proses perubahan status jika ada parameter aksi
if (isset($_GET['id']) && isset($_GET['aksi'])) {
    $id = intval($_GET['id']);
    $aksi = $_GET['aksi'];

    // Validasi aksi yang diizinkan
    $status_baru = '';
    if ($aksi == 'mulai') {
        $status_baru = 'in_progress';
    } elseif ($aksi == 'selesai') {
        $status_baru = 'done';
    }

    if ($status_baru) {
        $stmt = mysqli_prepare($konek, "UPDATE booking SET status = ? WHERE id_booking = ?");
        mysqli_stmt_bind_param($stmt, "si", $status_baru, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // Redirect agar tidak memproses ulang saat refresh
    header("Location: service.php");
    exit;
}

// Ambil data booking dengan status accepted atau in_progress
$query = "SELECT * FROM booking ORDER BY created_at ASC";

$result = mysqli_query($konek, $query);
?>
<html>
 <head>
  <title>
   ChungBike Shop
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
  
<!-- Admin Sidebar -->
<aside class="fixed top-0 left-0 w-[256px] h-full bg-gradient-to-b from-[#DB323E] to-[#DB323E] flex flex-col items-start gap-8">
  <div class="w-full h-16 bg-[#1D0201] flex justify-center items-center">
    <img src="https://placehold.co/143x32" alt="Logo" class="w-[143px] h-8" />
  </div>
  <div class="flex flex-col px-5 py-4 gap-4">
    <div class="flex items-center gap-2">
      <img src="https://placehold.co/40x40" alt="User" class="w-10 h-10 rounded-full" />
      <div class="text-white">
        <p class="text-base font-medium">Tim Cook</p>
        <p class="text-sm font-light">timcook@force.com</p>
      </div>
    </div>
    <nav class="flex flex-col gap-3 mt-6 w-full">
      <a href="#" class="px-9 py-2 text-white text-base font-medium">Report</a>
      <a href="../halamanadmin/request.php" class="px-9 py-2 text-white text-base font-medium">Request</a>
      <a href="#" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium">Service Progres</a>
      <a href="../halamanadmin/inventory.php" class="px-9 py-2 text-white text-base">Inventory</a>
      <a href="#" class="px-9 py-2 text-white text-base">Exit</a>
    </nav>
  </div>
</aside>

<!-- Admin Service Progress Page -->
<section class="min-h-screen ml-[256px] p-4 md:p-8 lg:p-12">
  <!-- Header -->
  <header class="w-full h-20 bg-white flex items-center px-4 shadow-sm">
    <div class="flex items-center gap-4 text-gray-500 font-medium text-base">
      <span>Dashboard</span>
      <span class="text-[#A1A1AA]">/</span>
      <span class="text-[#4658AC]">Service Progres</span>
    </div>
  </header>

  <!-- Title -->
  <h1 class="text-black text-3xl font-semibold mt-8 mb-4">Service Progress</h1>

  <div class="w-full max-w-7xl bg-white rounded-xl p-6 shadow-md">
    <!-- Optional Filter / Search -->
    <div class="flex justify-between items-center mb-6">
      <p class="text-[#27272A] text-base">Tanggal: <?= date("d - m - Y") ?></p>
      <p class="text-[#4763E4] text-sm">Data Booking</p>
    </div>

    <!-- Table -->
<div class="overflow-x-auto">
  <table class="w-full text-sm text-left text-gray-700">
    <thead class="text-xs uppercase text-[#A1A1AA] border-b border-gray-200">
      <tr>
        <th class="px-4 py-3">Nama</th>
        <th class="px-4 py-3">Motor</th>
        <th class="px-4 py-3">Tanggal</th>
        <th class="px-4 py-3">Waktu</th>
        <th class="px-4 py-3">Detail</th>
        <th class="px-4 py-3">Status</th>
        <th class="px-4 py-3 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <tr class="border-b border-gray-100 hover:bg-gray-50">
            <td class="px-4 py-3"><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['motorcycle_brand'] . ' ' . $row['motorcycle_model']) ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['appointment_date']) ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['appointment_time']) ?></td>
            <td class="px-4 py-3">
              <a href="requestedit.php?id=<?= $row['id_booking'] ?>" 
                 class="rounded-md px-2 py-1 bg-blue-100 text-center text-xs text-blue-800 font-semibold hover:underline">
                Detail
              </a>
            </td>
            <td class="px-4 py-3">
              <form action="updatestatus.php" method="POST" class="inline">
  <input type="hidden" name="id_booking" value="<?= $row['id_booking'] ?>">
  <select name="status" onchange="this.form.submit()" class="text-sm px-2 py-1 border rounded">
    <?php
      $statuses = ['accepted', 'rejected', 'in_queue', 'in_progress', 'done'];
      foreach ($statuses as $s) {
        $selected = $row['status'] === $s ? 'selected' : '';
        echo "<option value=\"$s\" $selected>" . ucfirst(str_replace('_', ' ', $s)) . "</option>";
      }
    ?>
  </select>
</form>
            </td>
            <td class="px-4 py-3 text-center space-x-2">
              <?php if ($row['status'] === 'accepted') : ?>
                <a href="?id=<?= $row['id_booking'] ?>&aksi=mulai"
                   class="inline-block bg-yellow-400 text-white text-xs px-3 py-1 rounded hover:bg-yellow-500">
                  Mulai Servis
                </a>
              <?php elseif ($row['status'] === 'in_progress') : ?>
                <a href="?id=<?= $row['id_booking'] ?>&aksi=selesai"
                   class="inline-block bg-green-500 text-white text-xs px-3 py-1 rounded hover:bg-green-600">
                  Tandai Selesai
                </a>
              <?php elseif ($row['status'] === 'done') : ?>
                <a href="create_invoice.php?id=<?= $row['id_booking'] ?>" 
                   class="inline-block bg-green-600 text-white text-xs px-3 py-1 rounded hover:bg-green-700">
                  Membuat Nota
                </a>
              <?php else: ?>
                <button disabled class="px-3 py-1 bg-gray-400 text-white rounded text-xs cursor-not-allowed">Membuat Nota</button>
              <?php endif; ?>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else : ?>
        <tr>
          <td colspan="7" class="text-center text-gray-400 py-6">
            Belum ada booking yang diterima atau sedang berlangsung.
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

</section>
