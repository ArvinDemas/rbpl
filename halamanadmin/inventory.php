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
      <a href="#" class="px-9 py-2 text-white text-base font-medium">Request</a>
      <a href="#" class="px-9 py-2 text-white text-base font-medium">Service Progres</a>
      <a href="#" class="bg-[#DB323E] rounded-md px-9 py-2 text-white text-base font-medium">Inventory</a>
      <a href="#" class="px-9 py-2 text-white text-base">Exit</a>
    </nav>
  </div>
</aside>

<!-- Admin Inventory Page -->
<section class="min-h-screen ml-[256px] p-4 md:p-8 lg:p-12 bg-[#FAFAFA]">
  <header class="w-full h-20 bg-white flex items-center px-4 shadow-sm">
    <div class="flex items-center gap-4 text-gray-500 font-medium text-base">
      <span>Dashboard</span>
      <span class="text-[#A1A1AA]">/</span>
      <span class="text-[#4658AC]">Inventory</span>
    </div>
  </header>

  <h1 class="text-black text-3xl font-semibold mt-8">Spare Part</h1>

  <div class="mt-6 w-full max-w-6xl mx-auto bg-white rounded-xl p-6 shadow-md">
    <div class="flex justify-between items-center mb-4">
      <p class="text-[#27272A] text-lg font-medium">List Spare Part</p>
      <button class="bg-[#4763E4] text-white px-4 py-2 rounded-md text-sm">Add</button>
    </div>

    <div class="flex items-center gap-4 mb-6">
      <input type="text" placeholder="Search Spare Part" class="flex-1 px-4 py-2 border border-[#4763E4]/50 rounded-md text-sm text-[#A1A1AA]" />
    </div>

    <div class="grid grid-cols-3 font-medium text-[#A1A1AA] text-sm border-b pb-3 mb-3">
      <span>Category</span>
      <span>Detail</span>
      <span>Delete</span>
    </div>

    <!-- Inventory List Rows -->
    <div class="flex flex-col gap-4">
      <div class="grid grid-cols-3 items-center text-sm text-[#27272A]">
        <span>Machines & Components</span>
        <button class="text-xs bg-blue-100 rounded-md px-3 py-1">...</button>
        <button class="text-xs text-red-500">Delete</button>
      </div>
      <div class="grid grid-cols-3 items-center text-sm text-[#27272A]">
        <span>Brake System</span>
        <button class="text-xs bg-blue-100 rounded-md px-3 py-1">...</button>
        <button class="text-xs text-red-500">Delete</button>
      </div>
      <div class="grid grid-cols-3 items-center text-sm text-[#27272A]">
        <span>Electrical System</span>
        <button class="text-xs bg-blue-100 rounded-md px-3 py-1">...</button>
        <button class="text-xs text-red-500">Delete</button>
      </div>
      <div class="grid grid-cols-3 items-center text-sm text-[#27272A]">
        <span>Transmission System</span>
        <button class="text-xs bg-blue-100 rounded-md px-3 py-1">...</button>
        <button class="text-xs text-red-500">Delete</button>
      </div>
      <div class="grid grid-cols-3 items-center text-sm text-[#27272A]">
        <span>Tires</span>
        <button class="text-xs bg-blue-100 rounded-md px-3 py-1">...</button>
        <button class="text-xs text-red-500">Delete</button>
      </div>
    </div>
  </div>
</section>
