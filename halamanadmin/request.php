<?php
session_start();
include "../halamanuser/koneksi.php";

if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}


$result = mysqli_query($konek, "SELECT * FROM booking ORDER BY created_at DESC");
?>

<html>
<head>
  <title>ChungBike Shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>body { font-family: 'Roboto', sans-serif; }</style>
</head>
<body>

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
      <a href="#" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium">Request</a>
      <a href="#" class="px-9 py-2 text-white text-base">Service Progress</a>
      <a href="#" class="px-9 py-2 text-white text-base">Inventory</a>
      <a href="logout.php" class="px-9 py-2 text-white text-base">Exit</a>
    </nav>
  </div>
</aside>

<!-- Admin Request Page -->
<section class="min-h-screen ml-[256px] p-4 md:p-8 lg:p-12 bg-[#FAFAFA]">
  <header class="w-full h-20 bg-white flex items-center px-4 shadow-sm">
    <div class="flex items-center gap-4 text-gray-500 font-medium text-base">
      <span>Dashboard</span>
      <span class="text-[#A1A1AA]">/</span>
      <span class="text-[#4658AC]">Request</span>
    </div>
  </header>

  <h1 class="text-black text-3xl font-semibold mt-8">Service Request</h1>

  <div class="mt-8 w-full max-w-6xl mx-auto bg-white rounded-xl p-6 shadow-md">
    <div class="grid grid-cols-6 font-medium text-[#A1A1AA] text-sm mb-6">
      <span>Categories</span>
      <span>Name</span>
      <span class="text-[#575757]">Date & Time</span>
      <span>Phone Number</span>
      <span>Detail</span>
      <span class="text-center">Actions</span>
    </div>
    <div class="flex flex-col gap-6">
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <div class="grid grid-cols-6 items-center gap-4 text-sm">
          <p class="text-[#222222]"><?= htmlspecialchars($row['service_category']) ?></p>
          <p class="text-[#27272A]"><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></p>
          <p class="text-[#27272A]"><?= htmlspecialchars($row['appointment_date']) ?> - <?= htmlspecialchars($row['appointment_time']) ?></p>
          <p class="text-[#27272A]"><?= htmlspecialchars($row['phone_number']) ?></p>
          <div class="rounded-md px-2 py-1 bg-blue-100 text-center text-xs"><?= htmlspecialchars($row['id_booking']) ?> <a href="../halamanadmin/requestedit.php" class="px-9 py-2 text-white text-base">Service Progress</a></div>
          <div class="flex gap-2">
            <form method="POST" action="update_status.php">
              
              <button name="status" value="accepted" class="px-3 py-1 border border-[#5C73DB] text-[#5C73DB] rounded-md text-xs font-medium">Accept</button>
              <button name="status" value="rejected" class="px-3 py-1 bg-[#DC2626] text-white rounded-md text-xs font-medium">Reject</button>
            </form>
          </div>
        </div>
        <div class="h-px bg-[#F4F4F5]"></div>
      <?php endwhile; ?>
    </div>
  </div>

  <!-- Pagination and Footer Bar -->
  <div class="w-full max-w-6xl mx-auto mt-6 flex flex-col gap-4">
    <div class="w-full bg-white rounded-b-xl py-4 px-6 border-t border-[#FAFAFA] flex justify-between items-center">
      <p class="text-[#A1A1AA] text-base">Total Booking: <?= mysqli_num_rows($result) ?></p>
      <!-- Pagination bisa ditambahkan di sini -->
    </div>
  </div>
</section>

</body>
</html>
