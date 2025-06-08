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
  <!-- Appointment Header Section -->
<section class="w-full bg-black/60 bg-[url('../image/8.png')] bg-cover bg-center py-20 px-4 md:px-16 flex flex-col items-center gap-24 relative">
  <div class="w-full max-w-screen-xl flex flex-col md:flex-row items-center justify-between gap-8 absolute left-1/2 -translate-x-1/2 top-6">
    <div class="w-20 h-24">
      <img src="../image/desain tanpa judul.png" alt="Logo" class="w-full h-full object-cover" />
    </div>
<nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row">
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="aboutus.html">About Us</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="homepage_before_login.html">Home</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="contac.php">Contact</a>
      </nav>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row">
                    <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-red-500 rounded-lg md:mt-0 md:ml-auto hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:shadow-outline" href="../halamanuser/login.php">
                    Login
                  </a>
                </nav>
  </div>

  <div class="w-full max-w-screen-xl flex flex-col items-center justify-center text-center mt-32">
    <h1 class="text-white text-4xl md:text-5xl font-semibold leading-tight">
      <span class="text-[#DB323E]">Schedule</span>
      <span class="text-white"> Your Auto Repair </span>
      <span class="text-[#DB323E]">Appointment Today!</span>
    </h1>
    <p class="text-white/70 text-sm max-w-2xl mt-4">
      Chung Bike Shop offers fast, reliable auto repair and roadside assistance, bringing expert service directly to you—whenever and wherever you need it. From quick fixes to major repairs, we’ve got you covered.
    </p>
  </div>
</section>
<!-- Appointment Form Section -->
<section class="w-full bg-[#222222] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="w-full max-w-screen-xl bg-[#222222] p-6 md:p-10 rounded-xl flex flex-col gap-8">
    <h2 class="text-white text-2xl font-semibold">Personal Information</h2>
    <div class="flex flex-col gap-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="First Name" disabled/>
        <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Last Name" disabled/>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Email" disabled/>
        <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Phone Number" disabled/>
      </div>
    </div>
    <h2 class="text-white text-2xl font-semibold">Motorcycle Information</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Motorcycle Brand"disabled />
      <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Motorcycle Model" disabled/>
      <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Motorcycle Year" disabled/>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="License Plate" disabled/>
      <input class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="VIN (Optional)" disabled/>
    </div>
    <h2 class="text-white text-2xl font-semibold">Appointment Details</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <input type="date" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" disabled/>
      <input type="time" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" disabled/>
    </div>
    <h2 class="text-white text-2xl font-semibold" >Service Details</h2>
    <select class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" disabled>
      <option disabled selected >Select Service Category</option>
    </select>
    <textarea rows="6" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Service Details " disabled></textarea>
    <button class="bg-[#DB323E] text-white px-8 py-3 rounded-md hover:bg-[#c4212f] transition w-fit self-center" disabled>Make an Appointment</button>
  </div>
</section>
<!-- FAQ Section -->
<section class="w-full bg-[#222222] py-20 px-4 md:px-16 flex flex-col items-center gap-20">
  <div class="w-full max-w-screen-xl flex flex-col items-center gap-20">
    <div class="flex flex-col items-start gap-6 w-full">
      <h2 class="text-white text-5xl font-medium leading-[72px]">Frequently asked questions</h2>
      <p class="text-white/50 text-lg leading-[26px]">
        Frequently asked questions ordered by popularity. Remember that if the visitor has not committed to the call to action, they may still have questions (doubts) that can be answered.
      </p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 w-full">
      <img src="../image/9.png" alt="FAQ Visual" class="w-[600px] h-[503px] rounded-xl object-cover" />
    <div class="flex flex-col w-full">
        <details class="border-t border-[#EBEBEB] py-5">
          <summary class="flex justify-between items-center gap-6 cursor-pointer text-white text-lg font-medium list-none">
            What services do you offer?
            <div class="w-8 h-8 rotate-180 bg-[#EBEBEB] border border-[#EBEBEB]"></div>
          </summary>
          <p class="pt-4 pb-6 text-white/50 text-base font-normal leading-6">
            We provide a wide range of services, including oil changes, brake repair, engine diagnostics, and more. Check our <span class="font-bold">Services Needed</span> section for details.
          </p>
        </details>

        <details class="border-t border-[#EBEBEB] py-5">
          <summary class="flex justify-between items-center gap-6 cursor-pointer text-white text-lg font-medium list-none">
            Do you use original parts for repairs?
            <div class="w-8 h-8 rotate-180 bg-[#EBEBEB] border border-[#EBEBEB]"></div>
          </summary>
          <p class="pt-4 pb-6 text-white/50 text-base font-normal leading-6">
            Yes, we use original parts to ensure the quality and longevity of repairs.
          </p>
        </details>

        <details class="border-t border-[#EBEBEB] py-5">
          <summary class="flex justify-between items-center gap-6 cursor-pointer text-white text-lg font-medium list-none">
            How long does a typical service take?
            <div class="w-8 h-8 rotate-180 bg-[#EBEBEB] border border-[#EBEBEB]"></div>
          </summary>
          <p class="pt-4 pb-6 text-white/50 text-base font-normal leading-6">
            A typical service usually takes between 1 to 3 hours depending on the type of repair or maintenance.
          </p>
        </details>

        <details class="border-t border-[#EBEBEB] py-5">
          <summary class="flex justify-between items-center gap-6 cursor-pointer text-white text-lg font-medium list-none">
            Can I drop off my car and pick it up later?
            <div class="w-8 h-8 rotate-180 bg-[#EBEBEB] border border-[#EBEBEB]"></div>
          </summary>
          <p class="pt-4 pb-6 text-white/50 text-base font-normal leading-6">
            Yes, you can drop off your vehicle and pick it up at a later time convenient for you.
          </p>
        </details>

        <details class="border-t border-[#EBEBEB] py-5">
          <summary class="flex justify-between items-center gap-6 cursor-pointer text-white text-lg font-medium list-none">
            What forms of payment do you accept?
            <div class="w-8 h-8 rotate-180 bg-[#EBEBEB] border border-[#EBEBEB]"></div>
          </summary>
          <p class="pt-4 pb-6 text-white/50 text-base font-normal leading-6">
            We accept cash, credit cards, and mobile payments.
          </p>
        </details>
      </div>
    </div>
  </div>
</section>
<!-- Footer Section -->
<footer class="w-full bg-[#292929] py-20 px-4 md:px-16 flex flex-col items-center gap-20">
  <div class="w-full max-w-screen-xl flex flex-col gap-14">
    <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-20 h-24" />
    <div class="flex flex-col md:flex-row justify-between items-start w-full gap-10">
      <div class="flex flex-col gap-4 text-white text-base font-normal opacity-50">
        <p>2464 Royal Ln. Mesa, New Jersey 45463</p>
        <p>(480) 555-0103</p>
        <p>hello@ChungBikeShop.com</p>
        <p>www.ChungBikeShop.com</p>
        <div class="flex gap-2">
          <div class="w-4 h-4 bg-[#DB323E]"></div>
          <div class="w-4 h-4 bg-[#DB323E]"></div>
          <div class="w-[6.6px] h-[9.45px] bg-[#292929]"></div>
          <div class="w-[3.33px] h-[3.33px] bg-[#DB323E]"></div>
          <div class="w-4 h-4 bg-[#DB323E]"></div>
          <div class="w-4 h-4 bg-[#DB323E]"></div>
        </div>
      </div>

      <div class="flex flex-col gap-6">
        <h3 class="text-white text-2xl font-medium">Opening Hours</h3>
        <p class="text-white text-lg font-normal opacity-50">Mon-Fri : 08.00 - 20.00</p>
        <p class="text-white text-lg font-normal opacity-50">Sat-Sun: 10.00 - 16.00</p>
      </div>

      <div class="flex flex-col gap-8">
        <h3 class="text-white text-2xl font-medium">Quick Links</h3>
        <p class="text-white text-base font-normal opacity-50 leading-6">About Us<br>Why with Us<br>Our Services<br>Appointment<br>Blog<br>FAQ</p>
      </div>

      <div class="flex flex-col gap-6">
        <h3 class="text-white text-2xl font-medium">Subscribe to Our Newsletter</h3>
        <p class="text-white text-lg font-normal opacity-50">Sign up for our newsletter to receive exclusive promotions, news, and tips straight to your inbox.</p>
        <div class="flex flex-col gap-5 w-[365px]">
          <div class="border border-white opacity-50 rounded-lg px-4 py-2 text-white">Email Address</div>
          <button class="px-8 py-3 bg-[#DB323E] rounded-lg text-white text-sm font-medium shadow-md">Submit</button>
        </div>
      </div>
    </div>
    <div class="w-full flex flex-col items-center gap-8">
      <div class="w-full h-px bg-white/50"></div>
      <p class="text-white text-lg font-normal opacity-50">Copyright © 2024 ChungBikeShope. All rights reserved.</p>
    </div>
  </div>
</footer>
