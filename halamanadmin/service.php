<?php
session_start();
include "../halamanuser/koneksi.php";

if (!isset($_SESSION['id_admin']) && !isset($_SESSION['id_mekanik'])) {
    header("Location: ../halamanuser/login.php");
    exit;
}
$selected_date = $_GET['date'] ?? '';
$selected_date = trim($selected_date);

// Validasi format tanggal YYYY-MM-DD
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $selected_date)) {
    $selected_date = date('Y-m-d'); // default ke hari ini
}

// Validasi & fallback
if (!$selected_date || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $selected_date)) {
    $selected_date = date('Y-m-d');          // default : hari ini
}

$admin_name = '';
$admin_email = '';
$admin_image = '../image/vector.png';

// Fetch admin or mechanic details from database
if (isset($_SESSION['id_admin'])) {
    $id_admin = $_SESSION['id_admin'];
    $admin_query = mysqli_prepare($konek, "SELECT nama, email, gambar FROM admin WHERE id_admin = ?");
    mysqli_stmt_bind_param($admin_query, "i", $id_admin);
    mysqli_stmt_execute($admin_query);
    mysqli_stmt_bind_result($admin_query, $admin_name, $admin_email, $admin_image_db);
    mysqli_stmt_fetch($admin_query);
    mysqli_stmt_close($admin_query);

    if (empty($admin_image_db)) {
        $admin_image = "../image/vector.png";
    } else {
        $admin_image = "../image/" . $admin_image_db; // Adjust path as needed
    }
} elseif (isset($_SESSION['id_mekanik'])) {
    $id_mekanik = $_SESSION['id_mekanik'];
    $mekanik_query = mysqli_prepare($konek, "SELECT nama, email, gambar FROM mekanik WHERE id_mekanik = ?");
    mysqli_stmt_bind_param($mekanik_query, "i", $id_mekanik);
    mysqli_stmt_execute($mekanik_query);
    mysqli_stmt_bind_result($mekanik_query, $admin_name, $admin_email, $admin_image_db);
    mysqli_stmt_fetch($mekanik_query);
    mysqli_stmt_close($mekanik_query);

    if (empty($admin_image_db)) {
        $admin_image = "../image/vector.png";
    } else {
        $admin_image = "../image/" . $admin_image_db; // Adjust path as needed
    }
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

/* --- DATA BOOKING --- */
$selected_date = $_GET['date'] ?? date('Y-m-d'); // default: hari ini

$query = "SELECT * FROM booking 
          
          wHERE appointment_date = ?
          ORDER BY created_at ASC";

$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "s", $selected_date);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);



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
    <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-17 h-16" />
  </div>
  <div class="flex flex-col px-5 py-4 gap-4">
  <div class="flex items-center gap-2">
<img src="<?= htmlspecialchars($admin_image) ?>" alt="User" class="w-16 h-16 rounded-full object-cover" />
    <div class="text-white">
<?php if (isset($_SESSION['id_mekanik'])): ?>
<p class="text-base font-medium"><a href="myprofile_mekanik.php" class="hover:underline"><?= htmlspecialchars($admin_name) ?></a></p>
<?php else: ?>
<p class="text-base font-medium"><a href="myprofile.php" class="hover:underline"><?= htmlspecialchars($admin_name) ?></a></p>
<?php endif; ?>
      <p class="text-sm font-light"><?= htmlspecialchars($admin_email) ?></p>
    </div>
  </div>
<nav class="flex flex-col gap-3 mt-6 w-full">
<?php if (isset($_SESSION['id_admin'])): ?>
  <a href="report.php" class="px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Report</a>
  <a href="request.php" class="px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Request</a>
<?php endif; ?>
  <a href="service.php" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Service Progress</a>
  <a href="inventory.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Inventory</a>
  <a href="logout.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Exit</a>
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
    <!-- Filter Tanggal -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
  <form method="GET" class="flex items-center gap-2">
      <label for="date" class="text-sm text-gray-700">Tampilkan tanggal:</label>
      <input type="date" id="date" name="date"
             value="<?= htmlspecialchars($selected_date) ?>"
             class="border px-2 py-1 rounded text-sm">
      <button type="submit"
              class="bg-[#4763E4] text-white text-sm px-3 py-1 rounded hover:bg-blue-600">
          Tampilkan
      </button>
  </form>

  <p class="text-[#4763E4] text-sm">Data Booking (<?= date('d-m-Y', strtotime($selected_date)) ?>)</p>
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
<?php if (isset($_SESSION['id_admin'])): ?>
        <th class="px-4 py-3 text-center">Aksi</th>
<?php endif; ?>
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
<?php if (isset($_SESSION['id_admin'])): ?>
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
  <?php
    // Cek apakah sudah ada nota
    $nota_query = "SELECT nota_id FROM nota WHERE id_booking = ?";
    $stmt_nota = mysqli_prepare($konek, $nota_query);
    mysqli_stmt_bind_param($stmt_nota, "i", $row['id_booking']);
    mysqli_stmt_execute($stmt_nota);
    $nota_result = mysqli_stmt_get_result($stmt_nota);
    $nota = mysqli_fetch_assoc($nota_result);
    mysqli_stmt_close($stmt_nota);
  ?>

  <?php if ($nota) : ?>
    <!-- Jika nota sudah ada -->
    <a href="invoice_sukses.php?nota_id=<?= $nota['nota_id'] ?>" 
       class="inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded hover:bg-blue-700">
      Lihat Nota
    </a>
  <?php else : ?>
    <!-- Jika belum ada nota -->
    <a href="create_invoice.php?id=<?= $row['id_booking'] ?>" 
       class="inline-block bg-green-600 text-white text-xs px-3 py-1 rounded hover:bg-green-700">
      Membuat Nota
    </a>
  <?php endif; ?>
<?php else: ?>
                <button disabled class="px-3 py-1 bg-gray-400 text-white rounded text-xs cursor-not-allowed">Membuat Nota</button>
              <?php endif; ?>
            </td>
<?php endif; ?>
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
