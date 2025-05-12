<?php ?>
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
 </head>
 <body class="bg-gray-900 text-white">
    
    
    <!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<div class="min-h-screen bg-cover bg-center" style="background-image: url('img/Gambar\ WhatsApp\ 2025-04-21\ pukul\ 13.30.46_e88c5b9a.jpg');">
    <div class="w-9/10 pt-12 mx-auto text-gray-700 bg-transparent dark-mode:text-gray-200 dark-mode:bg-transparent">
        <div x-data="{ open: true }" class="flex flex-col max-w-[85%] px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between p-4">
            <div href="homepage.php">
                <img alt="FixinMoto logo" class="mx-auto" height="100" src="img/Desain tanpa judul.png" width="100"/>
                
            </div>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row">
            <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">About Us</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Booking</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">Contact</a> 
            <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-red-500 rounded-lg md:mt-0 md:ml-auto hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:shadow-outline" href="login.php">
                <img src="img/Vector.png" alt="User Icon" class="w-6 h-6 rounded-full">
            </a>
            </nav>
        </div>
    </div>
        <div class="absolute flex flex-col justify-center text-white mt-32 w-full" >
            <h1 class="text-4xl md:text-9xl font-bold ml-[10%]">
                Drive Confidently with
            </h1>
            <h2 class="text-5xl md:text-9xl font-bold text-red-600 mt-2 ml-[10%]">
                Chung Bike Shop
            </h2>
            <div class="mt-16 flex space-x-4 ml-[10%]">
                <a href="#" class="bg-red-600 text-white px-6 py-4 rounded-lg hover:bg-red-600">
                    Booking Sekarang!
                </a>
                <a href="#" class="border-2 border-white text-white px-6 py-4 rounded-lg hover:bg-white hover:text-gray-900">
                    Layanan kami
                </a>
            </div>
        </div>
</div>
</div>
  </div>
  <!-- Header -->
  <header class="flex justify-between items-center p-4 bg-gray-800">
   <div class="text-lg font-bold">
    ChungBike Shop
   </div>
   <nav class="space-x-4">
    <a class="hover:text-red-500" href="homepage.php">
     Home
    </a>
    <a class="hover:text-red-500" href="#">
     About
    </a>
    <a class="hover:text-red-500" href="#">
     Layanan servis
    </a>
    <a class="hover:text-red-500" href="#">
     Contact
    </a>
   </nav>
  </header>
  <!-- Hero Section -->
  <section class="text-center py-20 bg-gradient-to-b from-gray-900 to-gray-800">
   <h1 class="text-4xl font-bold">
    Selamat Datang di
   </h1>
   <h2 class="text-5xl font-bold text-red-500">
    ChungBike Shop
   </h2>
   <div class="my-8">
    <img alt="FixinMoto logo" class="mx-auto" height="100" src="https://placehold.co/100x100" width="100"/>
   </div>
   <p class="text-lg max-w-2xl mx-auto">
   Solusi lengkap untuk semua kebutuhan otomotif Anda. Dari perbaikan hingga perawatan, kami siap membantu Anda   </p>
   <div class="mt-8">
    <a class="bg-red-500 text-white px-6 py-2 rounded-full hover:bg-red-600" href="#">
     Mulai 
    </a>
   </div>
  </section>
  <!-- Services Section -->
  <section class="py-20 bg-gray-800">
   <div class="text-center mb-12">
    <h3 class="text-3xl font-bold text-red-500">
     Solusi Otomotif 
    </h3>
    <h4 class="text-4xl font-bold">
    Komprehensif
    </h4>
    <p class="text-lg max-w-2xl mx-auto">
    Dari perbaikan mesin hingga penggantian ban, kami menawarkan berbagai layanan untuk menjaga kendaraan Anda dalam kondisi prima    </p>
   </div>
   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-6xl mx-auto">
    <div class="bg-gray-700 p-6 rounded-lg text-center">
     <img alt="Engine Repair &amp; Maintenance" class="mx-auto mb-4" height="100" src="https://placehold.co/100x100" width="100"/>
     <h5 class="text-xl font-bold">
      Perawatan &amp; Perbaikan Mesin
     </h5>
    </div>
        <!-- <div class="absolute flex flex-col justify-center text-white mt-32 w-full" >
            <h1 class="text-4xl md:text-9xl font-bold ml-[10%]">
                Drive Confidently with
            </h1>
            <h2 class="text-5xl md:text-9xl font-bold text-red-600 mt-2 ml-[10%]">
                Chung Bike Shop
            </h2>
            <div class="mt-16 flex space-x-4 ml-[10%]">
                <a href="#" class="bg-red-600 text-white px-6 py-4 rounded-lg hover:bg-red-600">
                    Appointment Now
                </a>
                <a href="#" class="border-2 border-white text-white px-6 py-4 rounded-lg hover:bg-white hover:text-gray-900">
                    Our Services
                </a>
            </div>
        </div> -->
</div>
</div>
  </div>   
  
  <!-- Bagian 1 - Our Services -->
<section class="bg-[#222222] text-white py-16 px-4">
    <div class="max-w-screen-xl mx-auto flex flex-col gap-12">
  
      <!-- Heading -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div class="flex flex-col gap-2 max-w-2xl">
          <span class="text-base font-medium opacity-50">Layanan Kami</span>
          <h2 class="text-4xl md:text-6xl font-medium leading-tight">
            <span class="text-rose-600">Solusi</span>
            <span class="text-white"> Komprehensif </span>
            <span class="text-rose-600">Motor</span>
          </h2>
        </div>
        <p class="text-lg opacity-50 max-w-sm leading-relaxed">
        Dari perawatan rutin hingga diagnostik tingkat lanjut, kami memenuhi semua kebutuhan sepeda motor Anda.        
      </p>
      </div>
  
      <!-- Cards -->
      <div class="grid gap-8 md:grid-cols-3">
        
        <!-- Card 1 -->
        <div class="relative w-full h-[455px] rounded-2xl overflow-hidden bg-gradient-to-b from-black/0 to-black/80 p-6 flex flex-col justify-between">
          <!-- Optional Background -->
          <!-- <img src="your-image-url.jpg" class="absolute inset-0 w-full h-full object-cover z-0 opacity-20" /> -->
  
          <!-- Content -->
          <div class="z-10 flex flex-col gap-6">
            <div class="text-white text-base font-medium">01</div>
            <div class="w-16 h-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="64" viewBox="0 0 65 64" fill="none">
                    <path d="M43.643 32.0425C42.894 32.4761 41.9975 32.4761 41.2465 32.0425C40.4965 31.6089 40.0483 30.8335 40.0483 29.9673C40.0483 29.4146 39.601 28.9673 39.0483 28.9673H35.4487C34.896 28.9673 34.4487 29.4146 34.4487 29.9673C34.4487 30.8335 34.0004 31.6089 33.2504 32.0425C32.4995 32.4761 31.603 32.4761 30.854 32.0425C30.3764 31.7671 29.7641 31.9292 29.4878 32.4087L27.688 35.5259C27.4116 36.0044 27.5757 36.6157 28.0542 36.8921C28.8042 37.3247 29.2524 38.1011 29.2524 38.9673C29.2524 39.8335 28.8042 40.6099 28.0542 41.0425C27.5756 41.3189 27.4116 41.9302 27.688 42.4087L29.4878 45.5259C29.7641 46.0044 30.3764 46.1675 30.854 45.8921C31.603 45.4595 32.4995 45.4575 33.2504 45.8921C34.0004 46.3257 34.4487 47.1011 34.4487 47.9673C34.4487 48.52 34.896 48.9673 35.4487 48.9673H39.0483C39.601 48.9673 40.0483 48.52 40.0483 47.9673C40.0483 47.1011 40.4965 46.3257 41.2465 45.8921C41.9975 45.4575 42.894 45.4595 43.643 45.8921C44.1186 46.1675 44.7319 46.0044 45.0092 45.5259L46.809 42.4087C47.0854 41.9302 46.9213 41.3189 46.4428 41.0425C45.6928 40.6089 45.2446 39.8335 45.2446 38.9673C45.2446 38.1011 45.6928 37.3257 46.4428 36.8921C46.9213 36.6157 47.0854 36.0044 46.809 35.5259L45.0092 32.4087C44.7319 31.9292 44.1186 31.7671 43.643 32.0425ZM44.6323 42.1782L43.7211 43.7573C42.5707 43.4028 41.3256 43.5366 40.2455 44.1606C39.1664 44.7837 38.4282 45.7944 38.1606 46.9673H36.3364C36.0688 45.7944 35.3305 44.7837 34.2514 44.1606C33.1704 43.5366 31.9243 43.4019 30.7758 43.7573L29.8637 42.1772C30.7465 41.3589 31.2524 40.2144 31.2524 38.9673C31.2524 37.7202 30.7465 36.5757 29.8637 35.7573L30.7758 34.1772C31.9252 34.5327 33.1713 34.3979 34.2514 33.7739C35.3305 33.1509 36.0688 32.1401 36.3364 30.9673H38.1606C38.4282 32.1401 39.1664 33.1509 40.2455 33.7739C41.3256 34.397 42.5707 34.5327 43.7211 34.1772L44.6323 35.7563C43.7504 36.5757 43.2446 37.7202 43.2446 38.9673C43.2446 40.2144 43.7504 41.3589 44.6323 42.1782Z" fill="white"/>
                    <path d="M37.248 34.9673C35.042 34.9673 33.248 36.7612 33.248 38.9673C33.248 41.1733 35.042 42.9673 37.248 42.9673C39.4541 42.9673 41.248 41.1733 41.248 38.9673C41.248 36.7612 39.4541 34.9673 37.248 34.9673ZM37.248 40.9673C36.1455 40.9673 35.248 40.0698 35.248 38.9673C35.248 37.8647 36.1455 36.9673 37.248 36.9673C38.3506 36.9673 39.248 37.8647 39.248 38.9673C39.248 40.0698 38.3506 40.9673 37.248 40.9673Z" fill="white"/>
                    <path d="M54.332 10.9673H52.332C51.782 10.9673 51.332 11.4173 51.332 11.9673V13.9673H49.332V12.9673C49.332 11.3173 47.9821 9.96729 46.332 9.96729H42.052L41.282 7.64727C41.142 7.24725 40.762 6.96729 40.332 6.96729H24.332C23.902 6.96729 23.522 7.24725 23.382 7.64727L22.6121 9.96729H18.332C16.682 9.96729 15.332 11.3173 15.332 12.9673V13.9673H13.332V11.9673C13.332 11.4173 12.882 10.9673 12.332 10.9673H10.332C8.68201 10.9673 7.33203 12.3173 7.33203 13.9673V27.9673C7.33203 29.6172 8.68201 30.9673 10.332 30.9673H12.332C12.882 30.9673 13.332 30.5173 13.332 29.9673V27.9673H15.332V28.9673C15.332 30.6172 16.682 31.9673 18.332 31.9673H22.6121L23.382 34.2873C23.462 34.5373 23.652 34.7273 23.872 34.8373C23.462 36.1473 23.252 37.5273 23.252 38.9673C23.252 46.6873 29.532 52.9673 37.252 52.9673C40.022 52.9673 42.6121 52.1473 44.792 50.7473L50.222 56.1772C51.3509 57.3061 53.2999 57.3294 54.452 56.1772C55.622 55.0073 55.622 53.1073 54.452 51.9373L49.022 46.5073C50.4221 44.3273 51.252 41.7473 51.252 38.9673C51.252 35.9373 50.272 33.1373 48.632 30.8473C49.062 30.3173 49.332 29.6673 49.332 28.9673V27.9673H51.332V29.9673C51.332 30.5173 51.782 30.9673 52.332 30.9673H54.332C55.982 30.9673 57.332 29.6172 57.332 27.9673V13.9673C57.332 12.3173 55.9821 10.9673 54.332 10.9673ZM11.332 28.9673H10.332C9.78204 28.9673 9.33203 28.5173 9.33203 27.9673V13.9673C9.33203 13.4173 9.78204 12.9673 10.332 12.9673H11.332V28.9673ZM15.332 25.9673H13.332V15.9673H15.332V25.9673ZM45.332 11.9673H46.332C46.882 11.9673 47.332 12.4173 47.332 12.9673V28.9673C47.332 29.0573 47.322 29.1473 47.292 29.2372C46.692 28.6172 46.032 28.0573 45.332 27.5573V11.9673ZM19.332 29.9673H18.332C17.782 29.9673 17.332 29.5173 17.332 28.9673V12.9673C17.332 12.4173 17.782 11.9673 18.332 11.9673H19.332V29.9673ZM24.282 30.6473C24.142 30.2473 23.762 29.9673 23.332 29.9673H21.332V11.9673H23.332C23.762 11.9673 24.142 11.6873 24.282 11.2873L25.052 8.96729H39.6121L40.382 11.2873C40.522 11.6873 40.902 11.9673 41.332 11.9673H43.332V26.3773C42.3521 25.8973 41.312 25.5273 40.222 25.2873C40.942 23.9773 41.332 22.4872 41.332 20.9673C41.332 16.0073 37.2921 11.9673 32.332 11.9673C27.372 11.9673 23.332 16.0073 23.332 20.9673C23.332 24.1673 25.062 27.0973 27.762 28.6973C26.6021 29.7673 25.622 31.0273 24.872 32.4372L24.282 30.6473ZM39.332 20.9673C39.332 22.4173 38.8521 23.8273 38.022 25.0073C37.762 24.9872 37.512 24.9673 37.252 24.9673C34.372 24.9673 31.702 25.8373 29.472 27.3273C26.9821 26.2073 25.332 23.7273 25.332 20.9673C25.332 17.1073 28.472 13.9673 32.332 13.9673C36.192 13.9673 39.332 17.1073 39.332 20.9673ZM53.042 53.3573C53.432 53.7372 53.432 54.3773 53.042 54.7573C52.652 55.1473 52.022 55.1473 51.632 54.7573L46.402 49.5273C46.9121 49.0973 47.382 48.6273 47.812 48.1273L53.042 53.3573ZM49.252 38.9673C49.252 45.5873 43.8621 50.9673 37.252 50.9673C30.632 50.9673 25.252 45.5873 25.252 38.9673C25.252 37.3373 25.582 35.7773 26.1721 34.3573V34.3473C27.992 30.0173 32.272 26.9673 37.252 26.9673C43.8621 26.9673 49.252 32.3473 49.252 38.9673ZM51.332 25.9673H49.332V15.9673H51.332V25.9673ZM55.332 27.9673C55.332 28.5173 54.882 28.9673 54.332 28.9673H53.332V12.9673H54.332C54.882 12.9673 55.332 13.4173 55.332 13.9673V27.9673Z" fill="white"/>
                    <path d="M34.625 18.2603L31.332 21.5532L30.0391 20.2603C29.6484 19.8696 29.0156 19.8696 28.625 20.2603C28.2344 20.6509 28.2344 21.2837 28.625 21.6743L30.625 23.6743C30.8203 23.8696 31.0762 23.9673 31.332 23.9673C31.5879 23.9673 31.8437 23.8696 32.0391 23.6743L36.0391 19.6743C36.4297 19.2837 36.4297 18.6509 36.0391 18.2603C35.6484 17.8696 35.0156 17.8696 34.625 18.2603Z" fill="white"/>
                  </svg>
            </div>
            <div class="text-white text-2xl font-medium leading-snug">
              Perawatan & Perbaikan Mesin
            </div>
          </div>
        </div>
  
        <!-- Card 2 -->
        <div class="relative w-full h-[455px] rounded-2xl overflow-hidden bg-gradient-to-b from-black/0 to-black/80 p-6 flex flex-col justify-between">
          <div class="z-10 flex flex-col gap-6">
            <div class="text-white text-base font-medium">02</div>
            <div class="w-16 h-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="64" viewBox="0 0 65 64" fill="none">
                    <path d="M44.11 36.9998C43.5711 36.9998 43.045 37.0597 42.5349 37.1771C42.7379 36.6849 42.7548 36.6355 42.7624 36.6131C42.9352 36.097 42.6608 35.5432 42.1481 35.3606C41.6378 35.1761 41.068 35.4441 40.8746 35.9539C40.7911 36.1731 39.817 38.5022 39.8165 38.5027C39.631 38.9471 39.7887 39.4612 40.1915 39.7249C40.1915 39.7249 42.341 41.1326 42.341 41.1326C42.7992 41.4333 43.4263 41.3004 43.7252 40.844C44.028 40.3821 43.8986 39.762 43.4367 39.4597L42.9453 39.1378C43.3213 39.0478 43.7099 38.9998 44.11 38.9998C46.8668 38.9998 49.11 41.2429 49.11 43.9998C49.11 44.7618 48.9455 45.4853 48.6214 46.1512C48.0636 47.2975 49.856 48.1823 50.4191 47.0276C50.8776 46.0867 51.11 45.0681 51.11 43.9998C51.11 40.1399 47.9699 36.9998 44.11 36.9998Z" fill="white"/>
                    <path d="M48.082 47.9422L45.4893 46.7566C44.9878 46.5276 44.394 46.7483 44.1636 47.2503C43.9341 47.7527 44.1553 48.346 44.6572 48.576L45.2796 48.8604C44.9021 48.9511 44.512 48.9998 44.1104 48.9998C41.3535 48.9998 39.1104 46.7566 39.1104 43.9998C39.1104 43.2376 39.2749 42.5139 39.5991 41.8479C39.8408 41.3513 39.6348 40.7527 39.1382 40.511C38.6396 40.2678 38.0425 40.4754 37.8013 40.9719C37.3428 41.9129 37.1104 42.9314 37.1104 43.9998C37.1104 47.8596 40.2505 50.9998 44.1104 50.9998C44.834 50.9998 45.5321 50.8844 46.2014 50.6731C46.2014 50.6731 46.0635 51.2483 46.0635 51.2484C45.7724 52.466 47.7144 52.9439 48.0088 51.7141L48.6387 49.0847C48.75 48.6199 48.5166 48.1414 48.082 47.9422Z" fill="white"/>
                    <path d="M44.1104 31C43.7728 31 43.4415 31.0253 43.1104 31.0507V16C43.1104 14.3457 41.7647 13 40.1104 13H38.1104V10C38.1104 8.3457 36.7647 7 35.1104 7H29.0098C27.3555 7 26.0098 8.3457 26.0098 10V13H21.0103C20.6871 13 20.4105 13.1857 20.1816 13.4145L17.8887 11.1216C17.4981 10.731 16.8652 10.731 16.4746 11.1216L15.7675 11.8287L13.646 9.70654C12.4761 8.53759 10.5733 8.53711 9.40332 9.70703L7.98926 11.1211C7.42237 11.688 7.11035 12.4414 7.11035 13.2427C7.11035 14.0439 7.42236 14.7974 7.98926 15.3638L10.1104 17.4853L9.40332 18.1924C9.21582 18.3799 9.11035 18.6343 9.11035 18.8994C9.11035 19.1645 9.21582 19.4189 9.40332 19.6064L11.6965 21.8996L11.3032 22.2929C11.1157 22.4804 11.0103 22.7348 11.0103 23V54C11.0103 55.6543 12.356 57 14.0103 57H44.1104C51.2788 57 57.1104 51.1684 57.1104 44C57.1104 36.8315 51.2788 31 44.1104 31ZM9.11035 13.2427C9.11035 12.9756 9.21435 12.7246 9.40332 12.5357L10.8174 11.1216C11.2065 10.731 11.8418 10.7315 12.2319 11.1211L14.353 13.2427L11.5244 16.0713L9.40332 13.9492C9.21436 13.7607 9.11035 13.5098 9.11035 13.2427ZM17.1816 13.2427L18.5957 14.6567L12.939 20.314L11.5244 18.8994L17.1816 13.2427ZM28.0098 10C28.0098 9.44873 28.4585 9 29.0098 9H35.1104C35.6616 9 36.1104 9.44873 36.1104 10V13H28.0098V10ZM14.0103 55C13.459 55 13.0103 54.5513 13.0103 54V23.4141L21.4243 15H40.1104C40.6616 15 41.1104 15.4487 41.1104 16V31.3633C40.4223 31.5267 39.7515 31.7347 39.1104 32.0029V26C39.1104 25.4478 38.6626 25 38.1104 25H16.1104C15.5581 25 15.1104 25.4478 15.1104 26V48C15.1104 48.5522 15.5581 49 16.1104 49H32.1132C33.1544 51.4889 34.9534 53.5777 37.2138 55H14.0103ZM31.161 43H21.1104V31H33.1104V37.1035C32.0185 38.8386 31.3263 40.8444 31.161 43ZM34.1104 29H20.1104C19.5581 29 19.1104 29.4478 19.1104 30V44C19.1104 44.5522 19.5581 45 20.1104 45H31.161C31.2134 45.6833 31.3193 46.3501 31.4737 47H17.1104V27H37.1104V33.0629C36.3923 33.5241 35.7228 34.0516 35.1104 34.6408V30C35.1104 29.4478 34.6626 29 34.1104 29ZM44.1104 55C38.0449 55 33.1104 50.0654 33.1104 44C33.1104 37.9346 38.0449 33 44.1104 33C50.1758 33 55.1104 37.9346 55.1104 44C55.1104 50.0654 50.1758 55 44.1104 55Z" fill="white"/>
                    <path d="M27.9331 33.4316C27.5601 32.8906 26.6607 32.8906 26.2876 33.4316C25.6328 34.3794 24.1104 36.7217 24.1104 38C24.1104 39.6543 25.4561 41 27.1104 41C28.7647 41 30.1104 39.6543 30.1104 38C30.1104 36.7217 28.5879 34.3794 27.9331 33.4316ZM27.1104 39C26.5591 39 26.1104 38.5513 26.1104 38.001C26.1187 37.6953 26.5342 36.8242 27.1104 35.8535C27.686 36.8237 28.1021 37.6948 28.1104 38.001C28.1099 38.5518 27.6616 39 27.1104 39Z" fill="white"/>
                  </svg>
            </div>
            <div class="text-white text-2xl font-medium leading-snug">
              Ganti oli & Filter
            </div>
          </div>
        </div>
  
        <!-- Card 3 -->
        <div class="relative w-full h-[455px] rounded-2xl overflow-hidden bg-gradient-to-b from-black/0 to-black/80 p-6 flex flex-col justify-between">
          <div class="z-10 flex flex-col gap-6">
            <div class="text-white text-base font-medium">03</div>
            <div class="w-16 h-16">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="64" viewBox="0 0 65 64" fill="none">
                    <path d="M30.9287 18.96C22.6577 18.96 15.9287 25.689 15.9287 33.96C15.9287 42.231 22.6577 48.96 30.9287 48.96C39.1997 48.96 45.9287 42.231 45.9287 33.96C45.9287 25.689 39.1997 18.96 30.9287 18.96ZM30.9287 46.96C23.7603 46.96 17.9287 41.1284 17.9287 33.96C17.9287 26.7915 23.7603 20.96 30.9287 20.96C38.0972 20.96 43.9287 26.7915 43.9287 33.96C43.9287 41.1284 38.0972 46.96 30.9287 46.96Z" fill="white"/>
                    <path d="M33.0044 7.04302C32.7256 7.02154 32.4531 7.11675 32.249 7.30669C32.0449 7.49614 31.9287 7.76177 31.9287 8.04009V11.0049C31.5967 10.9907 31.2692 10.96 30.9287 10.96C24.6087 10.96 18.8768 13.5233 14.7154 17.6637C14.7 17.6773 14.6802 17.6821 14.6655 17.6968C14.6508 17.7115 14.646 17.7313 14.6324 17.7467C10.492 21.9081 7.92871 27.64 7.92871 33.96C7.92871 40.28 10.492 46.012 14.6324 50.1733C14.646 50.1887 14.6508 50.2085 14.6655 50.2232C14.6802 50.2379 14.7 50.2427 14.7154 50.2563C18.8768 54.3967 24.6087 56.96 30.9287 56.96C38.1177 56.96 45.3353 53.2648 49.5693 47.4173C52.3921 43.5188 53.9287 38.7731 53.9287 33.96C53.9287 33.6195 53.8981 33.292 53.8839 32.96H56.8486C57.1269 32.96 57.3926 32.8438 57.582 32.6397C57.7715 32.4356 57.8667 32.1617 57.8457 31.8843C56.8447 18.7232 46.1655 8.044 33.0044 7.04302ZM46.4444 48.0616L44.3638 45.981C43.9731 45.5904 43.3403 45.5904 42.9497 45.981C42.5591 46.3716 42.5591 47.0044 42.9497 47.3951L45.0303 49.4757C41.5304 52.6595 36.9636 54.6705 31.9287 54.9093V51.96C31.9287 51.4078 31.481 50.96 30.9287 50.96C30.3765 50.96 29.9287 51.4078 29.9287 51.96V54.9093C24.8938 54.6705 20.327 52.6595 16.8271 49.4757L18.9077 47.3951C19.2983 47.0044 19.2983 46.3716 18.9077 45.981C18.5171 45.5904 17.8843 45.5904 17.4937 45.981L15.413 48.0616C12.2291 44.5617 10.2173 39.9932 9.97663 34.96H12.9287C13.481 34.96 13.9287 34.5123 13.9287 33.96C13.9287 33.4078 13.481 32.96 12.9287 32.96H9.97663C10.2173 27.9268 12.2291 23.3583 15.413 19.8584C15.413 19.8584 17.4861 21.9315 17.4937 21.939C17.8552 22.3005 18.5241 22.3227 18.9077 21.939C19.2983 21.5484 19.2983 20.9156 18.9077 20.525L16.8271 18.4443C20.5589 15.0496 25.4982 12.96 30.9287 12.96C31.2697 12.96 31.5972 12.9894 31.9287 13.005V16.0699C31.9287 16.5792 32.3115 17.0074 32.8179 17.0635C40.6499 17.938 46.9614 24.2491 47.8247 32.0699C47.8809 32.5767 48.3091 32.96 48.8189 32.96H51.8837C51.8993 33.2916 51.9287 33.6191 51.9287 33.96C51.9287 39.3905 49.8392 44.3298 46.4444 48.0616ZM49.6929 30.96C48.4101 22.9268 41.9722 16.4888 33.9287 15.1968V9.14312C45.2583 10.5084 54.3804 19.6304 55.7456 30.96H49.6929Z" fill="white"/>
                    <path d="M45.7782 17.6967C45.3877 18.0872 45.3877 18.7204 45.7782 19.1109C46.1687 19.5014 46.8019 19.5014 47.1924 19.1109C47.583 18.7204 47.583 18.0873 47.1924 17.6967C46.8019 17.3062 46.1687 17.3062 45.7782 17.6967Z" fill="white"/>
                    <path d="M51.9439 27.375C52.4628 27.1861 52.7304 26.6123 52.5415 26.0933C52.3526 25.5744 51.7788 25.3068 51.2598 25.4956C50.7409 25.6845 50.4733 26.2584 50.6621 26.7774C50.851 27.2963 51.4249 27.5639 51.9439 27.375Z" fill="white"/>
                    <path d="M38.7954 12.3472C38.2764 12.1583 37.7026 12.4259 37.5137 12.9449C37.3248 13.4638 37.5924 14.0377 38.1114 14.2265C38.6304 14.4154 39.2042 14.1479 39.393 13.6289C39.5819 13.1099 39.3144 12.5361 38.7954 12.3472Z" fill="white"/>
                    <path d="M30.9287 30.96C29.2744 30.96 27.9287 32.3057 27.9287 33.96C27.9287 35.6143 29.2744 36.96 30.9287 36.96C32.583 36.96 33.9287 35.6143 33.9287 33.96C33.9287 32.3057 32.583 30.96 30.9287 30.96ZM30.9287 34.96C30.3774 34.96 29.9287 34.5112 29.9287 33.96C29.9287 33.4087 30.3774 32.96 30.9287 32.96C31.48 32.96 31.9287 33.4087 31.9287 33.96C31.9287 34.5112 31.48 34.96 30.9287 34.96Z" fill="white"/>
                    <path d="M30.9287 22.96C29.2744 22.96 27.9287 24.3057 27.9287 25.96C27.9287 27.6143 29.2744 28.96 30.9287 28.96C32.583 28.96 33.9287 27.6143 33.9287 25.96C33.9287 24.3057 32.583 22.96 30.9287 22.96ZM30.9287 26.96C30.3774 26.96 29.9287 26.5112 29.9287 25.96C29.9287 25.4087 30.3774 24.96 30.9287 24.96C31.48 24.96 31.9287 25.4087 31.9287 25.96C31.9287 26.5112 31.48 26.96 30.9287 26.96Z" fill="white"/>
                    <path d="M22.9287 30.96C21.2744 30.96 19.9287 32.3057 19.9287 33.96C19.9287 35.6143 21.2744 36.96 22.9287 36.96C24.583 36.96 25.9287 35.6143 25.9287 33.96C25.9287 32.3057 24.583 30.96 22.9287 30.96ZM22.9287 34.96C22.3774 34.96 21.9287 34.5112 21.9287 33.96C21.9287 33.4087 22.3774 32.96 22.9287 32.96C23.48 32.96 23.9287 33.4087 23.9287 33.96C23.9287 34.5112 23.48 34.96 22.9287 34.96Z" fill="white"/>
                    <path d="M30.9287 38.96C29.2744 38.96 27.9287 40.3057 27.9287 41.96C27.9287 43.6143 29.2744 44.96 30.9287 44.96C32.583 44.96 33.9287 43.6143 33.9287 41.96C33.9287 40.3057 32.583 38.96 30.9287 38.96ZM30.9287 42.96C30.3774 42.96 29.9287 42.5112 29.9287 41.96C29.9287 41.4087 30.3774 40.96 30.9287 40.96C31.48 40.96 31.9287 41.4087 31.9287 41.96C31.9287 42.5112 31.48 42.96 30.9287 42.96Z" fill="white"/>
                    <path d="M35.9287 33.96C35.9287 35.6143 37.2744 36.96 38.9287 36.96C40.583 36.96 41.9287 35.6143 41.9287 33.96C41.9287 32.3057 40.583 30.96 38.9287 30.96C37.2744 30.96 35.9287 32.3057 35.9287 33.96ZM39.9287 33.96C39.9287 34.5112 39.48 34.96 38.9287 34.96C38.3774 34.96 37.9287 34.5112 37.9287 33.96C37.9287 33.4087 38.3774 32.96 38.9287 32.96C39.48 32.96 39.9287 33.4087 39.9287 33.96Z" fill="white"/>
                  </svg>
            </div>
            <div class="text-white text-2xl font-medium leading-snug">
              Servis Rem
            </div>
          </div>
        </div>
        
      </div>
  
      <!-- Bawah -->
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mt-12">
        <div class="text-white text-2xl font-medium leading-loose">

        Perbaikan Sepeda Motor Berkualitas yang Dapat Anda Andalkan!
        </div>
        <div class="flex space-x-6 overflow-x-auto md:max-w-2xl">
          <!-- Logos -->
          <svg xmlns="http://www.w3.org/2000/svg" width="89" height="80" viewBox="0 0 89 80" fill="none">
            <g clip-path="url(#clip0_5242_413)">
              <path d="M39.4636 0.754883L87.1935 51.8274V79.2455H64.9195V61.6837L30.2527 24.5887H23.0513V79.2455H0.777344V0.754883H39.4636ZM64.9195 27.9936V0.754883H87.1935V27.9936H64.9195Z" fill="white"/>
            </g>
            <defs>
              <clipPath id="clip0_5242_413">
                <rect width="88" height="80" fill="white" transform="translate(0.777344)"/>
              </clipPath>
            </defs>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="81" height="80" viewBox="0 0 81 80" fill="none">
            <path d="M44.8266 64.2231C44.8984 56.8802 43.0368 50.909 40.6688 50.8858C38.3006 50.8628 36.3227 56.7965 36.251 64.1393C36.1792 71.4821 38.0408 77.4535 40.4088 77.4765C42.777 77.4997 44.7549 71.566 44.8266 64.2231Z" fill="white"/>
            <path d="M31.0927 62.5555C35.1233 56.4173 36.7858 50.3875 34.8063 49.0877C32.8266 47.7878 27.9545 51.7101 23.9241 57.8483C19.8935 63.9865 18.231 70.0161 20.2105 71.3161C22.1902 72.616 27.0622 68.6937 31.0927 62.5555Z" fill="white"/>
            <path d="M20.4243 53.7487C27.1337 50.7644 31.7924 46.591 30.8299 44.4271C29.8675 42.2633 23.6483 42.9286 16.9388 45.913C10.2294 48.8974 5.57068 53.0708 6.53316 55.2346C7.49563 57.3985 13.7149 56.7332 20.4243 53.7487Z" fill="white"/>
            <path d="M30.0245 38.359C30.3848 36.0183 24.7933 33.2153 17.5357 32.0982C10.2779 30.9811 4.10232 31.9731 3.74206 34.3137C3.38181 36.6543 8.97329 39.4572 16.231 40.5743C23.4887 41.6915 29.6643 40.6995 30.0245 38.359Z" fill="white"/>
            <path d="M32.6305 32.7834C34.1988 31.009 31.0097 25.6283 25.5074 20.7655C20.0052 15.9026 14.2734 13.399 12.7051 15.1735C11.1368 16.948 14.3259 22.3287 19.8282 27.1915C25.3305 32.0544 31.0623 34.5579 32.6305 32.7834Z" fill="white"/>
            <path d="M37.8193 29.5246C40.0981 28.8798 40.3245 22.6291 38.3251 15.5634C36.3257 8.49766 32.8576 3.29248 30.5789 3.93729C28.3001 4.58211 28.0737 10.8327 30.0731 17.8985C32.0725 24.9641 35.5406 30.1694 37.8193 29.5246Z" fill="white"/>
            <path d="M51.9109 18.1184C54.0493 11.0935 53.9463 4.83958 51.6807 4.14996C49.4151 3.46033 45.845 8.59611 43.7066 15.6211C41.5683 22.6459 41.6714 28.8999 43.937 29.5895C46.2026 30.2791 49.7727 25.1434 51.9109 18.1184Z" fill="white"/>
            <path d="M61.9795 27.6106C67.5759 22.8562 70.8696 17.539 69.3362 15.7342C67.8029 13.9294 62.0232 16.3206 56.4271 21.0748C50.8307 25.8292 47.5371 31.1465 49.0704 32.9513C50.6037 34.7561 56.3834 32.365 61.9795 27.6106Z" fill="white"/>
            <path d="M65.3085 41.0431C72.5869 40.0693 78.2325 37.3772 77.9184 35.0298C77.6045 32.6826 71.4496 31.5692 64.1712 32.5428C56.893 33.5165 51.2472 36.2087 51.5613 38.556C51.8754 40.9032 58.0301 42.0168 65.3085 41.0431Z" fill="white"/>
            <path d="M74.6978 55.9056C75.7027 53.7612 71.1272 49.4968 64.4779 46.3806C57.8288 43.2644 51.6238 42.4768 50.6189 44.6211C49.6139 46.7656 54.1894 51.03 60.8387 54.1462C67.4878 57.2622 73.6928 58.05 74.6978 55.9056Z" fill="white"/>
            <path d="M60.7116 71.728C62.7164 70.4675 61.173 64.4061 57.2644 58.1896C53.3558 51.9731 48.5618 47.9557 46.557 49.2162C44.5522 50.4767 46.0956 56.5381 50.0042 62.7546C53.9129 68.9711 58.7068 72.9887 60.7116 71.728Z" fill="white"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="147" height="56" viewBox="0 0 147 56" fill="none">
            <g clip-path="url(#clip0_5242_427)">
              <path d="M35.4331 0C29.7314 0 24.2633 2.25876 20.2317 6.27939L7.07399 19.401C3.04231 23.4216 0.777344 28.8747 0.777344 34.5608C0.777344 46.4014 10.4024 56 22.2755 56C27.9771 56 33.4452 53.7411 37.4769 49.7205L46.5781 40.6442C46.5781 40.6441 46.5783 40.6444 46.5781 40.6442L73.096 14.199C75.0215 12.2788 77.6331 11.2 80.3561 11.2C84.9151 11.2 88.7802 14.1632 90.1202 18.2636L98.4892 9.91753C94.6713 3.95424 87.9768 0 80.3561 0C74.6545 0 69.1864 2.25876 65.1547 6.27939L29.5356 41.801C27.6101 43.7213 24.9986 44.8 22.2755 44.8C16.6049 44.8 12.0081 40.2158 12.0081 34.5608C12.0081 31.8451 13.0898 29.2408 15.0153 27.3205L28.1729 14.199C30.0984 12.2788 32.71 11.2 35.4331 11.2C39.9922 11.2 43.8571 14.1633 45.1971 18.2639L53.5663 9.91773C49.7484 3.95435 43.0539 0 35.4331 0Z" fill="white"/>
              <path d="M74.4588 41.801C72.5333 43.7213 69.9218 44.8 67.1987 44.8C62.6403 44.8 58.7756 41.8376 57.4352 37.7378L49.0664 46.0837C52.8845 52.0462 59.5786 56 67.1987 56C72.9003 56 78.3684 53.7411 82.4001 49.7205L118.019 14.199C119.945 12.2788 122.556 11.2 125.279 11.2C130.95 11.2 135.547 15.7842 135.547 21.4392C135.547 24.1549 134.465 26.7592 132.539 28.6795L119.382 41.801C117.456 43.7213 114.845 44.8 112.122 44.8C107.563 44.8 103.698 41.837 102.358 37.7369L93.9891 46.083C97.807 52.046 104.501 56 112.122 56C117.823 56 123.291 53.7411 127.323 49.7205L140.481 36.599C144.512 32.5784 146.777 27.1253 146.777 21.4392C146.777 9.59866 137.153 0 125.279 0C119.578 0 114.11 2.25876 110.078 6.27939L74.4588 41.801Z" fill="white"/>
            </g>
            <defs>
              <clipPath id="clip0_5242_427">
                <rect width="146" height="56" fill="white" transform="translate(0.777344)"/>
              </clipPath>
            </defs>
          </svg>
                </div>
      </div>
  
    </div>
  </section>
  
  <!-- bagian 2 - Why Choose Us -->
<section class="bg-[#222222] text-white py-16 px-4 overflow-hidden">
    <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-center gap-8">
      
      <!-- Konten Kiri -->
      <div class="flex-1 flex flex-col gap-6">
        <div class="flex flex-col gap-4">
          <div class="text-white text-base font-medium opacity-50">Kenapa pilih Kami?</div>
          <h2 class="text-4xl md:text-6xl font-medium leading-tight">
            Perbedaan<span class="text-rose-600">nya</span>
          </h2>
          <p class="text-sm text-white opacity-50 max-w-md leading-relaxed">
          Temukan mengapa Chung Bike Shop adalah pilihan tepercaya bagi ratusan pemilik motor.
          </p>
        </div>
  
        <!-- List Keunggulan -->
        <ul class="flex flex-col gap-4">
          <li class="flex items-start gap-3">
            <div class="w-4 h-4 bg-rose-600 rounded-full mt-1"></div>
            <span class="text-sm opacity-80">Teknisi bersertifikat dan berpengalaman.</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="w-4 h-4 bg-rose-600 rounded-full mt-1"></div>
            <span class="text-sm opacity-80">Harga transparan tanpa biaya tersembunyi.</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="w-4 h-4 bg-rose-600 rounded-full mt-1"></div>
            <span class="text-sm opacity-80">Peralatan diagnostik lengkap dan canggih</span>
          </li>
          <li class="flex items-start gap-3">
            <div class="w-4 h-4 bg-rose-600 rounded-full mt-1"></div>
            <span class="text-sm opacity-80">Layanan cepat dan terpercaya yang dapat Anda percaya.</span>
          </li>
        </ul>
  
        <!-- Tombol -->
        <div class="pt-4">
          <a href="#learn-more" class="inline-block px-8 py-3.5 bg-rose-600 rounded-lg text-white text-sm font-medium hover:bg-rose-700 transition">
            Learn More
          </a>
        </div>
      </div>
  
      <!-- Gambar Kanan -->
      <div class="flex-1 relative w-full max-w-[619px] h-auto">
        <div class="relative">
          <img src="https://placehold.co/619x638" alt="Main Image" class="rounded-2xl w-full object-cover">
          
          <!-- Badge Experience -->
          <div class="absolute -top-10 right-0 bg-rose-600 px-6 py-4 rounded-2xl text-center shadow-lg">
            <div class="text-4xl md:text-6xl font-bold text-white leading-tight">+15</div>
            <div class="text-white text-sm md:text-lg opacity-60">Tahun Pengalaman</div>
          </div>
  
          <!-- Gambar kecil tambahan -->
          <img src="https://placehold.co/244x244" alt="Secondary" class="absolute bottom-[-30px] left-0 w-60 h-60 rounded-2xl border border-white shadow-md">
        </div>
      </div>
  
    </div>
  </section>
  
<!-- Bagian 3 - Special Offers -->
<section class="bg-[#222222] text-white py-28 px-4">
    <div class="max-w-screen-xl mx-auto flex flex-col items-center text-center gap-6">
      <h2 class="text-4xl md:text-5xl font-semibold">Penawaran Spesial untuk Anda</h2>
      <p class="text-base opacity-70 max-w-xl">
      Dapatkan diskon besar untuk layanan premium dengan promosi dan diskon eksklusif kami.
      </p>
      <a href="#promotions" class="mt-4 inline-block px-8 py-3.5 bg-rose-600 rounded-lg text-sm font-medium hover:bg-rose-700 transition">
      Lihat semua promosi      </a>
    </div>
  </section>
  
<!-- Bagian 4 - Service Process -->
<section class="bg-neutral-800 text-white py-28 px-4">
    <div class="max-w-screen-xl mx-auto flex flex-col gap-20">
  
      <!-- Judul -->
      <div class="flex flex-col lg:flex-row items-start gap-10 lg:gap-40">
        <div class="flex-1 flex flex-col gap-4">
          <span class="text-base font-medium opacity-50">Proses Servis</span>
          <h2 class="text-4xl md:text-6xl font-medium leading-tight">
            Apa yang bisa Anda harapkan dari <span class="text-rose-600">Chung BikeShop</span>
          </h2>
        </div>
        <p class="w-full lg:w-80 text-lg opacity-70 leading-relaxed">
        Proses yang lancar dan transparan untuk semua kebutuhan kendaraan Anda.
        </p>
      </div>
  
      <!-- Langkah-langkah & Gambar -->
      <div class="flex flex-col lg:flex-row items-start gap-12">
        <div class="flex-1 flex flex-col gap-10">
  
          <!-- Step 1 -->
          <div class="border-l-2 border-rose-600 pl-6">
            <h3 class="text-2xl md:text-3xl font-semibold text-rose-600">Booking Servis anda</h3>
            <p class="text-base font-medium opacity-70 mt-2">
            Pesan jadwal perbaikan Motor Anda secara online dengan mudah. ​​Pilih waktu yang Anda inginkan dan kembalikan kendaraan Anda ke kondisi terbaik—dengan cepat dan tanpa repot.
            </p>
          </div>
  
          <!-- Step 2 -->
          <div class="pl-6">
            <h3 class="text-2xl md:text-3xl font-semibold">Persetujuan</h3>
            <p class="text-base font-medium opacity-70 mt-2">
            Dapatkan persetujuan cepat untuk perbaikan. Kami akan mengurus sisanya—memastikan proses perbaikan lancar dan efisien.
            </p>
          </div>
  
          <!-- Step 3 -->
          <div class="pl-6">
            <h3 class="text-2xl md:text-3xl font-semibold">check-in <span class="font-medium">& Perbaikan kendaraan</span></h3>
            <p class="text-base font-medium opacity-70 mt-2">
              
          Pemeriksaan kendaraan yang cepat dan mudah. ​​Setelah kami memeriksa kendaraan Anda, kami akan mengonfirmasi servis yang dibutuhkan dan segera memulai agar Anda dapat kembali berkendara.
            </p>
          </div>
  
          <!-- Step 4 -->
          <div class="pl-6">
            <h3 class="text-2xl md:text-3xl font-semibold">Berkendara dengan percaya diri</h3>
            <p class="text-base font-medium opacity-70 mt-2">
            Berkendara dengan percaya diri. Setelah perbaikan oleh ahli kami, kendaraan Anda siap untuk dikendarai dengan aman dan lancar.            </p>
          </div>
        </div>
  
        <!-- Gambar -->
        <div class="flex-1">
          <img src="https://placehold.co/584x640" alt="Process Illustration" class="w-full max-w-md lg:max-w-full rounded-2xl mx-auto">
        </div>
      </div>
  
    </div>
  </section>
  
<!-- Bagian 5 - Testimonials -->
<section class="bg-zinc-800 text-white pt-20 pb-24 px-4">
    <div class="max-w-screen-xl mx-auto flex flex-col gap-12">
      
      <!-- Heading -->
      <div class="flex flex-col gap-4">
        <span class="text-lg font-medium opacity-50">Testimoni</span>
        <div class="flex flex-col lg:flex-row items-start gap-8">
          <h2 class="text-4xl md:text-6xl font-medium leading-tight flex-1">
            Apa kata Customer tentang Chung  <span class="text-rose-600">Bikeshop</span>
          </h2>
          <p class="text-base opacity-70 max-w-xl">
          Baca apa yang dikatakan pelanggan kami yang puas tentang produk dan layanan kami
          </p>
        </div>
      </div>
  
      <!-- Cards -->
      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        
        <!-- Card 1 -->
        <div class="bg-stone-50 text-neutral-800 px-8 py-12 rounded-2xl flex flex-col items-start gap-4">
          <img src="https://placehold.co/116x116" alt="Albert Flores" class="w-28 h-28 rounded-md">
          <h3 class="text-2xl font-medium">Albert Flores</h3>
          <p class="text-base opacity-70 leading-relaxed">
          Selama bertahun-tahun, saya mempercayakan sepeda motor saya kepada Chung Bike Shop, dan mereka tidak pernah mengecewakan saya...
          </p>
          <div class="flex gap-1 mt-2">
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
          </div>
        </div>
  
        <!-- Card 2 -->
        <div class="bg-stone-50 text-neutral-800 px-8 py-12 rounded-2xl flex flex-col items-start gap-4">
          <img src="https://placehold.co/116x116" alt="Robert Fox" class="w-28 h-28 rounded-md">
          <h3 class="text-2xl font-medium">Robert Fox</h3>
          <p class="text-base opacity-70 leading-relaxed">
          Ketika saya tiba-tiba menghadapi masalah dengan sepeda motor saya, Chung Bike Shop berhasil mengatur janji temu bagi saya...
          </p>
          <div class="flex gap-1 mt-2">
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
          </div>
        </div>
  
        <!-- Card 3 -->
        <div class="bg-stone-50 text-neutral-800 px-8 py-12 rounded-2xl flex flex-col items-start gap-4">
          <img src="https://placehold.co/116x116" alt="Eleanor Pena" class="w-28 h-28 rounded-md">
          <h3 class="text-2xl font-medium">Eleanor Pena</h3>
          <p class="text-base opacity-70 leading-relaxed">
          Saya mengalami masalah mendesak dengan kendaraan saya dan beruntung bisa mendapatkan janji temu di hari yang sama...
          </p>
          <div class="flex gap-1 mt-2">
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
            <div class="w-4 h-4 bg-rose-600 rounded-full"></div>
          </div>
        </div>
  
      </div>
  
      <!-- Navigation Arrows -->
      <div class="flex justify-center gap-4 mt-8">
        <button class="w-10 h-10 rotate-180 bg-white text-black rounded-full hover:bg-gray-200">&larr;</button>
        <button class="w-10 h-10 bg-white text-black rounded-full hover:bg-gray-200">&rarr;</button>
      </div>
  
    </div>
  </section>
  
<!-- Bagian 6 - Coverage Area -->
<section class="bg-zinc-800 text-white pt-20 pb-24 px-4">
    <div class="max-w-screen-xl mx-auto flex flex-col gap-12">
  
      <!-- Header -->
      <div class="flex flex-col gap-4">
        <span class="text-lg font-medium opacity-50">Peta Area</span>
        <h2 class="text-4xl md:text-5xl font-medium leading-tight">
          <span class="text-rose-600">Lokasi </span>
          <span> Quality, Convenience, and Expertise</span>
        </h2>
        <p class="text-base opacity-70 max-w-2xl">
          Whether you’re near or far, our expert services are just around the corner.
        </p>
      </div>
  
      <!-- Google Maps Embed -->
      <div class="w-full overflow-hidden rounded-2xl shadow-lg">
        <iframe
  src="https://maps.app.goo.gl/6UnoENdgSfLS1JQeA"
  width="100%"
  height="450"
  style="border:0;"
  allowfullscreen=""
  loading="lazy"
  referrerpolicy="no-referrer-when-downgrade">
</iframe>

      </div>
  
    </div>
  </section>
  
<!-- Footer - Responsive & No Overflow -->
<footer class="bg-zinc-800 text-white px-4 py-20">
    <div class="max-w-screen-xl mx-auto flex flex-col gap-16">
  
      <!-- Konten Utama -->
      <div class="flex flex-col lg:flex-row justify-between gap-12">
        
        <!-- Logo & Kontak -->
        <div class="flex flex-col gap-4 max-w-xs">
          <img class="w-20 h-24" src="https://placehold.co/80x100" alt="Logo" />
          <p class="text-base opacity-50">2464 Royal Ln. Mesa, New Jersey 45463</p>
          <p class="text-base opacity-50">(480) 555-0103</p>
          <p class="text-base opacity-50">hello@ChungBikeShop.com</p>
          <p class="text-base opacity-50">www.ChungBikeShop.com</p>
        </div>
  
        <!-- Jam Operasional -->
        <div class="flex flex-col gap-3">
          <h3 class="text-2xl font-medium">Opening Hours</h3>
          <p class="text-lg opacity-50">Mon–Fri: 08.00 – 20.00</p>
          <p class="text-lg opacity-50">Sat–Sun: 10.00 – 16.00</p>
        </div>
  
        <!-- Quick Links -->
        <div class="flex flex-col gap-4">
          <h3 class="text-2xl font-medium">Quick Links</h3>
          <ul class="text-base opacity-50 space-y-1">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Why with Us</a></li>
            <li><a href="#">Our Services</a></li>
            <li><a href="#">Appointment</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>
  
        <!-- Newsletter -->
        <div class="flex flex-col gap-6 max-w-md">
          <h3 class="text-2xl font-medium">Subscribe to Our Newsletter</h3>
          <p class="text-lg opacity-50">Sign up for our newsletter to receive exclusive promotions, news, and tips straight to your inbox.</p>
          <div class="flex flex-col gap-4 w-full">
            <input type="email" placeholder="Email Address" class="w-full p-3 rounded-lg text-white bg-transparent border border-white opacity-80 placeholder-white" />
            <button class="px-8 py-3 bg-rose-600 rounded-lg hover:bg-rose-700 text-sm font-medium">
              Submit
            </button>
          </div>
        </div>
      </div>
  
      <!-- Garis Bawah & Copyright -->
      <div class="flex flex-col items-center gap-6">
        <div class="w-full h-px bg-white opacity-20"></div>
        <p class="text-lg opacity-50 text-center">
          © 2024 ChungBikeShop. All rights reserved.
        </p>
      </div>
      
    </div>
  </footer>
  
 </body>
</html>
