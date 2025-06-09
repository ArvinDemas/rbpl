<?php
include '../halamanuser/koneksi.php';

$keyword = $_GET['keyword'] ?? '';
$keyword = "%$keyword%";

$sql = "SELECT * FROM sparepart WHERE nama_sparepart LIKE ? OR kategori LIKE ? LIMIT 12";
$stmt = mysqli_prepare($konek, $sql);
mysqli_stmt_bind_param($stmt, 'ss', $keyword, $keyword);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($sparepart = mysqli_fetch_assoc($result)) :
?>
  <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
    <img src="<?= htmlspecialchars($sparepart['gambar_url'] ?: 'https://placehold.co/300x200?text=No+Image') ?>"
         alt="<?= htmlspecialchars($sparepart['nama_sparepart']) ?>"
         class="w-full h-40 object-cover rounded-md mb-3">
    <h2 class="text-base font-semibold text-[#27272A] mb-1"><?= htmlspecialchars($sparepart['nama_sparepart']) ?></h2>
    <p class="text-sm text-gray-500 mb-1">Kategori: <?= htmlspecialchars($sparepart['kategori']) ?></p>
    <p class="text-sm text-gray-700 font-medium mb-1">Stok: <?= (int)$sparepart['stok'] ?></p>
    <p class="text-sm text-[#4763E4] font-bold">Rp<?= number_format($sparepart['harga'], 0, ',', '.') ?></p>
    <div class="mt-3">
      <button type="button"
              class="text-sm bg-green-600 px-3 py-1 rounded text-white hover:bg-green-700"
              onclick="addItemToInvoice(<?= htmlspecialchars($sparepart['id_sparepart']) ?>)">
        Tambah ke Nota
      </button>
    </div>
  </div>
<?php endwhile; ?>
