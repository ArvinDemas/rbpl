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
      <a href="../halamanadmin/request.php" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium">Report</a>
      <a href="request.php" class="px-9 py-2 text-white text-base font-medium">Request</a>
      <a href="#" class="px-9 py-2 text-white text-base">Service Progres</a>
      <a href="#" class="px-9 py-2 text-white text-base">Inventory</a>
      <a href="#" class="px-9 py-2 text-white text-base">Exit</a>
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
  <div class="mt-8 flex flex-col gap-6">
    <div class="w-full max-w-6xl bg-white rounded-xl p-6 mx-auto">
      <div class="w-full p-3 border border-[#4763E480] rounded-lg flex justify-center items-center gap-28 bg-white">
        <button class="w-3 h-6 rotate-180 bg-black"></button>
        <p class="text-sm text-[#27272A]">2025</p>
        <button class="w-3 h-6 bg-black"></button>
      </div>
      <div class="w-full p-3 mt-6 border border-[#4763E480] rounded-lg flex justify-center items-center gap-28 bg-white">
        <button class="w-3 h-6 rotate-180 bg-black"></button>
        <p class="text-sm text-[#27272A]">January</p>
        <button class="w-3 h-6 bg-black"></button>
      </div>
    </div>
  </div>

  <!-- Total Service and Income Boxes -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8 max-w-6xl mx-auto">
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="flex justify-center items-center gap-2 mb-4">
        <span class="text-base text-[#27272A]">Total Service</span>
      </div>
      <div class="bg-white px-5 py-3 border border-[#4763E480] rounded-lg text-sm text-[#0C0C0D] text-center">100</div>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6 relative">
      <div class="flex justify-center items-center gap-2 mb-4">
        <span class="text-base text-[#27272A]">In Come</span>
      </div>
      <div class="bg-white px-5 py-3 border border-[#4763E480] rounded-lg text-sm text-[#0C0C0D] text-center">10.000.000</div>
    </div>
  </div>

  <!-- Left and Right Report Cards -->
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 max-w-6xl mx-auto">
    <div class="bg-white rounded-xl p-8 shadow-md flex flex-col gap-6">
      <!-- ...left card content... -->
    </div>

    <div class="bg-white rounded-xl p-8 shadow-md flex flex-col gap-6">
      <!-- ...right card content... -->
    </div>
  </div>
</section>