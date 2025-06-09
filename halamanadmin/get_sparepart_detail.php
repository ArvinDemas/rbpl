<?php
include '../halamanuser/koneksi.php';

if (!isset($_GET['id'])) {
  http_response_code(400);
  echo json_encode(['error' => 'ID sparepart tidak diberikan']);
  exit;
}

$id = intval($_GET['id']);

// Ambil data sparepart
$query = "SELECT * FROM sparepart WHERE id_sparepart = ?";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
  // Cek stok masih tersedia
  if ($row['stok'] > 0) {
    // Kurangi stok
    $update = "UPDATE sparepart SET stok = stok - 1 WHERE id_sparepart = ?";
    $stmt_update = mysqli_prepare($konek, $update);
    mysqli_stmt_bind_param($stmt_update, "i", $id);
    mysqli_stmt_execute($stmt_update);

    // Kembalikan data JSON
    echo json_encode([
      'id_sparepart' => $row['id_sparepart'],
      'nama_sparepart' => $row['nama_sparepart'],
      'kategori' => $row['kategori'],
      'harga' => $row['harga'],
      'stok' => $row['stok'] - 1, // stok baru
      'gambar_url' => $row['gambar_url']
    ]);
  } else {
    http_response_code(403);
    echo json_encode(['error' => 'Stok habis']);
  }
} else {
  http_response_code(404);
  echo json_encode(['error' => 'Sparepart tidak ditemukan']);
}
?>
