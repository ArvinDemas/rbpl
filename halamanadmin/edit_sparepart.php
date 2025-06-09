<?php
session_start();
include "../halamanuser/koneksi.php";

// Check if admin is logged in
if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

// Get spare part ID from GET parameter
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID spare part tidak valid.");
}

$id_sparepart = intval($_GET['id']);

// Fetch spare part data
$query = "SELECT id_sparepart, nama_sparepart, kategori, stok, harga, gambar_url FROM sparepart WHERE id_sparepart = ?";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id_sparepart);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$sparepart = mysqli_fetch_assoc($result);

if (!$sparepart) {
    die("Spare part tidak ditemukan.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_sparepart = $_POST['nama_sparepart'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    $gambar_url = $sparepart['gambar_url']; // default to old image

    if (isset($_FILES['gambar']) && $_FILES['gambar']['name']) {
        $file = $_FILES['gambar'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($file['type'], $allowed_types) && $file['error'] === 0) {
            $upload_dir = __DIR__ . '/uploads/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Hapus gambar lama jika bukan default
            $old_image_path = $upload_dir . basename($gambar_url);
            if ($gambar_url && $gambar_url !== 'default.png' && file_exists($old_image_path)) {
                unlink($old_image_path);
            }

            // Simpan gambar baru
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid('sparepart_', true) . '.' . $ext;
            $destination = $upload_dir . $new_filename;

            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $gambar_url = $new_filename; // hanya nama file disimpan
            } else {
                echo "Gagal mengupload gambar.";
            }
        } else {
            echo "Tipe file tidak diizinkan atau terjadi kesalahan saat upload.";
        }
    }

    $update_query = "UPDATE sparepart SET nama_sparepart = ?, kategori = ?, stok = ?, harga = ?, gambar_url = ? WHERE id_sparepart = ?";
    $stmt = mysqli_prepare($konek, $update_query);
    mysqli_stmt_bind_param($stmt, "ssisii", $nama_sparepart, $kategori, $stok, $harga, $gambar_url, $id_sparepart);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: inventory.php");
        exit();
    } else {
        echo "Gagal mengupdate spare part: " . mysqli_error($konek);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Spare Part - ChungBike Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body>
<section class="min-h-screen p-8 bg-[#FAFAFA]">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h2 class="text-2xl font-bold text-[#27272A] mb-4">Edit Spare Part</h2>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Spare Part</label>
                <input type="text" name="nama_sparepart" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm" value="<?= htmlspecialchars($sparepart['nama_sparepart']) ?>" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="Machines & Components" <?= $sparepart['kategori'] == 'Machines & Components' ? 'selected' : '' ?>>Machines & Components</option>
                    <option value="Brake System" <?= $sparepart['kategori'] == 'Brake System' ? 'selected' : '' ?>>Brake System</option>
                    <option value="Electrical System" <?= $sparepart['kategori'] == 'Electrical System' ? 'selected' : '' ?>>Electrical System</option>
                    <option value="Transmission System" <?= $sparepart['kategori'] == 'Transmission System' ? 'selected' : '' ?>>Transmission System</option>
                    <option value="Tires" <?= $sparepart['kategori'] == 'Tires' ? 'selected' : '' ?>>Tires</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" min="0" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm" value="<?= htmlspecialchars($sparepart['stok']) ?>" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                <input type="number" name="harga" min="0" required class="mt-1 block w-full border px-4 py-2 rounded-md text-sm" value="<?= htmlspecialchars($sparepart['harga']) ?>" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" name="gambar" accept="image/*" class="mt-1 block w-full text-sm" />
                <?php if ($sparepart['gambar_url']): ?>
                    <img src="uploads/<?= htmlspecialchars($sparepart['gambar_url']) ?>" alt="Current Image" class="mt-2 w-32 h-32 object-cover rounded" />
                <?php endif; ?>
            </div>
            <div class="flex gap-4 mt-6">
                <a href="inventory.php" class="px-4 py-2 bg-gray-300 rounded-md text-sm">Kembali</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md text-sm">Simpan</button>
            </div>
        </form>
    </div>
</section>
</body>
</html>
