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
      <a href="#" class="px-9 py-2 text-white text-base font-medium">Report</a>
      <a href="#" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium">Request</a>
      <a href="#" class="px-9 py-2 text-white text-base">Service Progres</a>
      <a href="#" class="px-9 py-2 text-white text-base">Inventory</a>
      <a href="#" class="px-9 py-2 text-white text-base">Exit</a>
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
      <div class="grid grid-cols-6 items-center gap-4 text-sm">
        <p class="text-[#222222]">Basic Maintenance</p>
        <p class="text-[#27272A]">Jane Cooper</p>
        <p class="text-[#27272A]">25/02 - 13:00</p>
        <p class="text-[#27272A]">08112233445566</p>
        <div class="rounded-md px-2 py-1 bg-blue-100 text-center text-xs">...</div>
        <div class="flex gap-2">
          <button class="px-3 py-1 border border-[#5C73DB] text-[#5C73DB] rounded-md text-xs font-medium">Accept</button>
          <button class="px-3 py-1 bg-[#DC2626] text-white rounded-md text-xs font-medium">Reject</button>
        </div>
      </div>
      <div class="h-px bg-[#F4F4F5]"></div>
      <!-- Repeat other requests similarly -->
    </div>
  </div>

  <!-- Pagination and Footer Bar -->
  <div class="w-full max-w-6xl mx-auto mt-6 flex flex-col gap-4">
    <div class="w-full bg-white rounded-b-xl py-4 px-6 border-t border-[#FAFAFA] flex justify-between items-center">
      <p class="text-[#A1A1AA] text-base">100 utilisateurs</p>
      <div class="flex border border-[#E4E4E7] rounded-lg overflow-hidden">
        <button class="px-3 py-2 border-r border-[#D4D4D8] text-[#71717A]">&lt;</button>
        <button class="px-4 py-2 bg-[#4763E4] text-white">1</button>
        <button class="px-4 py-2 border-l border-[#D4D4D8]">2</button>
        <button class="px-4 py-2 border-l border-[#D4D4D8]">3</button>
        <button class="px-4 py-2 border-l border-[#D4D4D8]">...</button>
        <button class="px-4 py-2 border-l border-[#D4D4D8]">8</button>
        <button class="px-4 py-2 border-l border-[#D4D4D8]">9</button>
        <button class="px-4 py-2 border-l border-[#D4D4D8]">10</button>
        <button class="px-3 py-2 border-l border-[#D4D4D8] text-[#71717A]">&gt;</button>
      </div>
    </div>
  </div>
</section>