<?php
session_start();
include "../halamanuser/koneksi.php";

if (!isset($_SESSION['id_admin']) && !isset($_SESSION['id_mekanik'])) {
    header("Location: ../halamanuser/login.php");
    exit;
}

// Fetch admin details from database
$id_admin = $_SESSION['id_admin'];
$admin_query = mysqli_prepare($konek, "SELECT nama, email, gambar FROM admin WHERE id_admin = ?");
mysqli_stmt_bind_param($admin_query, "i", $id_admin);
mysqli_stmt_execute($admin_query);
mysqli_stmt_bind_result($admin_query, $admin_name, $admin_email, $admin_image);
mysqli_stmt_fetch($admin_query);
mysqli_stmt_close($admin_query);

// Set default image if none
if (empty($admin_image)) {
    $admin_image = "../image/vector.png";
} else {
    $admin_image = "../image/" . $admin_image; // Adjust path as needed
}

// Get year and month from GET parameters or default to current
$selected_year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');
$selected_month = isset($_GET['month']) ? intval($_GET['month']) : date('m');

// Query to count bookings with status 'done' filtered by selected year and month
$total_done_services = 0;
$count_query = mysqli_prepare($konek, "SELECT COUNT(*) FROM booking WHERE status = 'done' AND YEAR(appointment_date) = ? AND MONTH(appointment_date) = ?");
if ($count_query) {
    mysqli_stmt_bind_param($count_query, "ii", $selected_year, $selected_month);
    mysqli_stmt_execute($count_query);
    mysqli_stmt_bind_result($count_query, $total_done_services);
    mysqli_stmt_fetch($count_query);
    mysqli_stmt_close($count_query);
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
<!-- Admin Sidebar -->
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
  <a href="report.php" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Report</a>
  <a href="request.php" class="px-9 py-2 text-white text-base font-medium hover:bg-[#A1232B] hover:rounded-md">Request</a>
  <a href="service.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Service Progress</a>
  <a href="inventory.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Inventory</a>
  <a href="logout.php" class="px-9 py-2 text-white text-base hover:bg-[#A1232B] hover:rounded-md">Exit</a>
</nav>
  </div>
</aside>

<!-- Admin Report Page -->
<section class="min-h-screen ml-[256px] p-4 md:p-8 lg:p-12 bg-[#FAFAFA]">
  <header class="w-full h-20 bg-white flex items-center px-4 shadow-sm">
    <div class="flex items-center gap-4 text-gray-500 font-medium text-base">
      <span>Dashboard</span>
      <span class="text-[#A1A1AA]">/</span>
      <span class="text-[#4658AC]">Report</span>
    </div>
  </header>

  <!-- Report Title -->
  <h1 class="text-black text-3xl font-semibold mt-8">Report</h1>

  <!-- Year and Month Selector -->
  <form id="date-form" method="GET" action="report.php">
    <div class="mt-8 flex flex-col gap-6">
      <div class="w-full max-w-6xl bg-white rounded-xl p-6 mx-auto">
        <div class="w-full p-3 border border-[#4763E480] rounded-lg flex justify-center bg-white relative max-w-6xl mx-auto h-12">
          <div class="inline-flex items-center gap-2">
            <button type="button" id="year-prev" class="text-gray-700 hover:text-gray-900"><i class="fas fa-chevron-left"></i></button>
            <p id="year-display" class="text-sm text-[#27272A] select-none"><?= $selected_year ?></p>
            <button type="button" id="year-next" class="text-gray-700 hover:text-gray-900"><i class="fas fa-chevron-right"></i></button>
          </div>
          <input type="hidden" name="year" id="year-input" value="<?= $selected_year ?>">
        </div>
        <div class="w-full p-3 mt-6 border border-[#4763E480] rounded-lg flex justify-center bg-white relative max-w-6xl mx-auto h-12">
          <div class="inline-flex items-center gap-2">
            <button type="button" id="month-prev" class="text-gray-700 hover:text-gray-900"><i class="fas fa-chevron-left"></i></button>
            <p id="month-display" class="text-sm text-[#27272A] select-none"><?= date('F', mktime(0, 0, 0, $selected_month, 10)) ?></p>
            <button type="button" id="month-next" class="text-gray-700 hover:text-gray-900"><i class="fas fa-chevron-right"></i></button>
          </div>
          <input type="hidden" name="month" id="month-input" value="<?= $selected_month ?>">
        </div>
      </div>
    </div>
  </form>

  <!-- Total Service and Income Boxes -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 max-w-6xl mx-auto">
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="flex justify-center items-center gap-2 mb-4">
        <span class="text-base text-[#27272A]">Total Service</span>
      </div>
      <div class="bg-white px-5 py-3 border border-[#4763E480] rounded-lg text-sm text-[#0C0C0D] text-center"><?= $total_done_services ?></div>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="flex justify-center items-center gap-2 mb-4">
        <span class="text-base text-[#27272A]">In Come</span>
      </div>
      <div class="bg-white px-5 py-3 border border-[#4763E480] rounded-lg text-sm text-[#0C0C0D] text-center">10.000.000</div>
    </div>
  </div>


  <script>
    const yearDisplay = document.getElementById('year-display');
    const monthDisplay = document.getElementById('month-display');
    const yearPrev = document.getElementById('year-prev');
    const yearNext = document.getElementById('year-next');
    const monthPrev = document.getElementById('month-prev');
    const monthNext = document.getElementById('month-next');
    const yearInput = document.getElementById('year-input');
    const monthInput = document.getElementById('month-input');
    const dateForm = document.getElementById('date-form');

    let currentYear = parseInt(yearDisplay.textContent);
    let currentMonthIndex = new Date(Date.parse(monthDisplay.textContent +" 1, 2020")).getMonth();

    const monthNames = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];

    function updateFormAndDisplay() {
      yearDisplay.textContent = currentYear;
      monthDisplay.textContent = monthNames[currentMonthIndex];
      yearInput.value = currentYear;
      monthInput.value = currentMonthIndex + 1;
    }

    yearPrev.addEventListener('click', () => {
      currentYear--;
      updateFormAndDisplay();
      dateForm.submit();
    });

    yearNext.addEventListener('click', () => {
      currentYear++;
      updateFormAndDisplay();
      dateForm.submit();
    });

    monthPrev.addEventListener('click', () => {
      currentMonthIndex = (currentMonthIndex - 1 + 12) % 12;
      updateFormAndDisplay();
      dateForm.submit();
    });

    monthNext.addEventListener('click', () => {
      currentMonthIndex = (currentMonthIndex + 1) % 12;
      updateFormAndDisplay();
      dateForm.submit();
    });
  </script>
</section>
