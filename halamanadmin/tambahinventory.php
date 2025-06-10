<?php
session_start();
include "../halamanuser/koneksi.php";

if (!isset($_SESSION['id_admin']) && !isset($_SESSION['id_mekanik'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

// Simpan data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_sparepart = $_POST['nama_sparepart'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    
    // Proses upload gambar
    $gambar_url = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['name']) {
        $file = $_FILES['gambar'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($file['type'], $allowed_types) && $file['error'] === 0) {
            $upload_dir = __DIR__ . '/uploads/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Generate unique filename
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid('sparepart_', true) . '.' . $ext;
            $destination = $upload_dir . $new_filename;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $gambar_url = $new_filename; // store only filename
            } else {
                echo "Gagal mengupload gambar.";
            }
        } else {
            echo "Tipe file tidak diizinkan atau terjadi kesalahan saat upload.";
        }
    }

    $query = "INSERT INTO sparepart (nama_sparepart, kategori, stok, harga, gambar_url)
              VALUES ('$nama_sparepart', '$kategori', '$stok', '$harga', '$gambar_url')";
    
    if (mysqli_query($konek, $query)) {
        header("Location: inventory.php");
        exit();
    } else {
        echo "Gagal menambahkan spare part: " . mysqli_error($konek);
    }
}
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
<section class="min-h-screen p-8 bg-[#FAFAFA]">
  <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h2 class="text-2xl font-bold text-[#27272A] mb-4">Tambah Spare Part</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nama Spare Part</label>
        <input type="text" name="nama_sparepart" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Kategori</label>
        <select name="kategori" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm">
          <option value="">-- Pilih Kategori --</option>
          <option value="Machines & Components">Machines & Components</option>
          <option value="Brake System">Brake System</option>
          <option value="Electrical System">Electrical System</option>
          <option value="Transmission System">Transmission System</option>
          <option value="Tires">Tires</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Stok</label>
        <input type="number" name="stok" min="0" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
        <input type="number" name="harga" min="0" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm" />
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Gambar</label>
        <input type="file" name="gambar" accept="image/*" class="mt-1 block w-full text-sm" />
      </div>
      <div class="flex gap-4 mt-6">
        <a href="inventory.php" class="px-4 py-2 bg-gray-300 rounded-md text-sm">Kembali</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Simpan</button>
      </div>
    </form>
  </div>
</section>
