<?php
session_start();
include "../halamanuser/koneksi.php";

if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}
// Ambil kategori unik
$kategori_query = mysqli_query($konek, "SELECT DISTINCT kategori FROM sparepart");
$kategori_array = [];
while ($row = mysqli_fetch_assoc($kategori_query)) {
    $kategori_array[] = $row['kategori'];
}

// Filter berdasarkan kategori jika ada
$filter_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$query = "SELECT * FROM sparepart WHERE 1";
if ($filter_kategori) {
    $query .= " AND kategori = '" . mysqli_real_escape_string($konek, $filter_kategori) . "'";
}
if ($search) {
    $query .= " AND nama_sparepart LIKE '%" . mysqli_real_escape_string($konek, $search) . "%'";
}

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
      <a href="../halamanadmin/report.php" class="px-9 py-2 text-white text-base font-medium">Report</a>
      <a href="../halamanadmin/request.php" class="px-9 py-2 text-white text-base font-medium">Request</a>
      <a href="../halamanadmin/service.php" class="px-9 py-2 text-white text-base font-medium">Service Progres</a>
      <a href="#" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium">Inventory</a>
      <a href="../halamanuser/logout.php" class="px-9 py-2 text-white text-base">Exit</a>
    </nav>
  </div>
</aside>

<section class="min-h-screen ml-[256px] p-4 md:p-8 lg:p-12 bg-[#FAFAFA]">
  <header class="w-full h-20 bg-white flex items-center px-4 shadow-sm">
    <div class="flex items-center gap-4 text-gray-500 font-medium text-base">
      <span>Dashboard</span>
      <span class="text-[#A1A1AA]">/</span>
      <span class="text-[#4658AC]">Inventory</span>
    </div>
  </header>

  <div class="flex justify-between items-center mt-8 mb-6">
    <h1 class="text-black text-3xl font-semibold">Spare Part Inventory</h1>
    <a href="tambahinventory.php" class="bg-[#4763E4] text-white px-4 py-2 rounded-md text-sm">+ Tambah Sparepart</a>
  </div>

  <!-- Filter dan Search -->
  <div class="mb-6 flex flex-wrap gap-4 items-center">
    <form method="GET" class="flex-1 flex gap-2">
      <input type="text" name="search" placeholder="Cari spare part..." value="<?= htmlspecialchars($search) ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md text-sm" />
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm">Search</button>
    </form>

  
    <!-- Filter kategori -->
    <div class="flex flex-wrap gap-2">
      <a href="inventory.php" class="px-3 py-1 border rounded <?= $filter_kategori == '' ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' ?>">Semua</a>
      <?php foreach ($kategori_array as $kat): ?>
        <a href="?kategori=<?= urlencode($kat) ?>" class="px-3 py-1 border rounded <?= $filter_kategori == $kat ? 'bg-blue-600 text-white' : 'bg-white text-gray-700' ?>">
          <?= htmlspecialchars($kat) ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Produk Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php while ($sparepart = mysqli_fetch_assoc($result)): ?>
      <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
        <img src="<?= $sparepart['gambar_url'] ?: 'https://placehold.co/300x200?text=No+Image' ?>" alt="<?= $sparepart['nama_sparepart'] ?>" class="w-full h-40 object-cover rounded-md mb-3">
        <h2 class="text-base font-semibold text-[#27272A] mb-1"><?= htmlspecialchars($sparepart['nama_sparepart']) ?></h2>
        <p class="text-sm text-gray-500 mb-1">Kategori: <?= htmlspecialchars($sparepart['kategori']) ?></p>
        <p class="text-sm text-gray-700 font-medium mb-1">Stok: <?= $sparepart['stok'] ?></p>
        <p class="text-sm text-[#4763E4] font-bold">Rp<?= number_format($sparepart['harga'], 0, ',', '.') ?></p>
        <div class="mt-3 flex gap-2">
          <a href="edit_sparepart.php?id=<?= $sparepart['id_sparepart'] ?>" class="text-sm bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</a>
          <a href="hapus_sparepart.php?id=<?= $sparepart['id_sparepart'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="text-sm bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Hapus</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</section>