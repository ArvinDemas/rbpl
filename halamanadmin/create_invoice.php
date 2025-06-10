<?php
session_start();
include "../halamanuser/koneksi.php";

// Cek apakah admin sudah login
if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}



if (!isset($_GET['id'])) {
  echo "ID booking tidak ditemukan.";
  exit;
}

$id_booking = intval($_GET['id']);
$query = "SELECT * FROM booking WHERE id_booking = ?";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id_booking);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$booking = mysqli_fetch_assoc($result);

if (!$booking) {
  echo "Data booking tidak ditemukan.";
  exit;
}

$order_id = $booking['id_booking'];
$service_name = $booking['service_category'];
// Logika harga yang benar
if ($service_name === 'Servis Ringan') {
    $price = 250000;
} elseif ($service_name === 'Servis Berat') {
    $price = 1000000;
} else {
    $price = 0; // Jika ada layanan lain
}
$qty = 1;
$total = $price * $qty;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Invoice</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#FAFAFA]">
<div class="min-h-screen flex">
<?php
$admin_name = '';
$admin_email = '';
$admin_image = '../image/vector.png';

$id_admin = $_SESSION['id_admin'];
$admin_query = mysqli_prepare($konek, "SELECT nama, email, gambar FROM admin WHERE id_admin = ?");
mysqli_stmt_bind_param($admin_query, "i", $id_admin);
mysqli_stmt_execute($admin_query);
mysqli_stmt_bind_result($admin_query, $admin_name, $admin_email, $admin_image_db);
mysqli_stmt_fetch($admin_query);
mysqli_stmt_close($admin_query);

if (!empty($admin_image_db)) {
    $admin_image = "../image/" . $admin_image_db;
}
?>

<aside class="fixed top-0 left-0 w-[256px] h-full bg-gradient-to-b from-[#DB323E] to-[#DB323E] flex flex-col items-start gap-8">
  <div class="w-full h-16 bg-[#1D0201] flex justify-center items-center">
    <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-17 h-16" />
  </div>
  <div class="flex flex-col px-5 py-4 gap-4">
    <div class="flex items-center gap-2">
      <img src="<?= htmlspecialchars($admin_image) ?>" alt="User" class="w-16 h-16 rounded-full object-cover" />
      <div class="text-white">
        <p class="text-base font-medium"><a href="myprofile.php" class="hover:underline"><?= htmlspecialchars($admin_name) ?></a></p>
        <p class="text-sm font-light"><?= htmlspecialchars($admin_email) ?></p>
      </div>
    </div>
    <nav class="flex flex-col gap-3 mt-6 w-full">
      <a href="report.php" class="px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Report</a>
      <a href="request.php" class="px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Request</a>
      <a href="service.php" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Service Progress</a>
      <a href="inventory.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Inventory</a>
      <a href="logout.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Exit</a>
    </nav>
  </div>
</aside>

<main class="min-h-screen p-10 ml-[256px] flex-1">
  <div class="w-full">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-semibold text-gray-700">Order ID: <?= htmlspecialchars($order_id) ?></h1>
    </div>

    <div class="bg-white p-6 rounded-xl shadow mb-6 w-full">
      <div class="flex justify-between mb-4">
        <h2 class="text-xl font-medium"><?= htmlspecialchars($service_name) ?></h2>
        <div class="text-right">
          <p class="text-lg font-semibold text-gray-800">IDR<?= number_format($price, 0, ',', '.') ?></p>
          <p class="text-sm text-gray-500">Qty: <?= $qty ?></p>
        </div>
      </div>
      <hr>
      <div class="mt-4 flex justify-between">
        <p class="text-lg font-medium text-gray-600">Total</p>
        <p id="grand_total_display" class="text-lg font-bold text-gray-900">IDR<?= number_format($total, 0, ',', '.') ?></p>
      </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Cari & Tambah Sparepart</h2>
      <div class="mb-4">
        <input type="text" id="search_sparepart" placeholder="Ketik nama sparepart..." class="w-full px-4 py-2 border border-gray-300 rounded-md">
      </div>
      <div id="result_sparepart" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6"></div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow mb-6">
      <h2 class="text-xl font-semibold mb-4">Item dalam Nota</h2>
      <table class="w-full text-sm text-left">
        <thead class="border-b">
          <tr>
            <th class="py-2">Nama</th>
            <th class="py-2">Kategori</th>
            <th class="py-2">Harga</th>
            <th class="py-2">Qty</th>
            <th class="py-2">Subtotal</th>
          </tr>
        </thead>
        <tbody id="invoice_items">
          <tr>
            <td><?= htmlspecialchars($service_name) ?></td>
            <td>Jasa</td>
            <td><?= number_format($price, 0, ',', '.') ?></td>
            <td>1</td>
            <td class="item-subtotal" data-subtotal="<?= $total ?>"><?= number_format($total, 0, ',', '.') ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <form action="submit_invoice.php" method="POST" onsubmit="return confirm('Yakin membuat nota ini?')">
      <input type="hidden" name="items" id="items_json">
<input type="hidden" name="id_booking" value="<?= $order_id ?>">
<input type="hidden" id="total_hidden" name="total" value="<?= $price ?>">
      <button type="submit" class="bg-[#DB323E] text-white px-6 py-3 rounded hover:bg-[#c4212f]">Create Receipt</button>
    </form>
  </main>
</div>

<script>
let invoiceItems = [
  {
    id_sparepart: <?= ($service_name === 'Servis Ringan') ? 0 : (($service_name === 'Servis Berat') ? -1 : null) ?>,
    qty: 1,
    subtotal: <?= $total ?>
  }
];

$(document).ready(function() {
  $('#items_json').val(JSON.stringify(invoiceItems));

  $('#search_sparepart').on('input', function() {
    const keyword = $(this).val();
    if (keyword.length > 1) {
      $.ajax({
        url: 'search_sparepart_list.php',
        method: 'GET',
        data: { keyword },
        success: function(response) {
          $('#result_sparepart').html(response);
        }
      });
    } else {
      $('#result_sparepart').html('');
    }
  });
});

function addItemToInvoice(id) {
  $.ajax({
    url: 'get_sparepart_detail.php',
    method: 'GET',
    data: { id },
    dataType: 'json',
    success: function(data) {
      invoiceItems.push({
        id_sparepart: data.id_sparepart,
        qty: 1,
        subtotal: data.harga,
        nama_sparepart: data.nama_sparepart,
        kategori: data.kategori
      });

      const newRow = `
        <tr>
          <td>${data.nama_sparepart}</td>
          <td>${data.kategori}</td>
          <td>${formatRupiah(data.harga)}</td>
          <td>1</td>
          <td class="item-subtotal" data-subtotal="${data.harga}">${formatRupiah(data.harga)}</td>
        </tr>`;

      $('#invoice_items').append(newRow);
      updateTotal();
    }
  });
}

function updateTotal() {
  let total = 0;
  $('.item-subtotal').each(function() {
    total += parseInt($(this).data('subtotal'));
  });

  $('#grand_total_display').text('IDR' + formatRupiah(total));
  $('#total_hidden').val(total);
  $('#items_json').val(JSON.stringify(invoiceItems));
}

function formatRupiah(num) {
  return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}


</script>

</body>
</html>