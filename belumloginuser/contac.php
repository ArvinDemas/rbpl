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
  <section class="relative bg-black/60 bg-[url('../image/8.png')] bg-cover bg-center py-20 px-4 md:px-16 flex flex-col items-center gap-20">
  <div class="w-full max-w-screen-xl flex flex-col items-center md:items-start gap-10">
    <div class="w-full flex justify-between items-center gap-8">
    <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-20 h-24" />
<div :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row gap-8 text-white text-sm font-semibold">
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="aboutus.html">About Us</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="appointment.php">Appointment</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="homepage_before_login.html">Home</a>
      </div>
      <a class="flex items-center px-4 py-2 mt-2 text-sm font-semibold text-white bg-red-500 rounded-lg md:mt-0 md:ml-auto hover:bg-red-600 focus:bg-red-600 focus:outline-none focus:shadow-outline" href="../halamanuser/login.php">
          Login
      </a>
    </div>

    <div class="text-left w-full max-w-screen-md space-y-4">
      <h2 class="text-white text-4xl md:text-5xl font-bold leading-tight">Get in Touch with Us</h2>
      <p class="text-white text-sm opacity-80 leading-relaxed">
        We’re here to assist you. Send us a message, and we’ll get back to you with the information you need.
      </p>
    </div>
  </div>
</section>

<!-- Contact Page Section -->
<section class="bg-[#222222] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="w-full max-w-screen-xl grid md:grid-cols-2 gap-12">
    <!-- Contact Form -->
    <form class="flex flex-col space-y-6">
      <div>
        <label class="block text-white text-sm mb-2">Full Name</label>
        <input type="text" class="w-full px-4 py-3 rounded-md bg-[#333333] text-white placeholder-white/60" placeholder="Your Name" disabled />
      </div>
      <div>
        <label class="block text-white text-sm mb-2">Email Address</label>
        <input type="email" class="w-full px-4 py-3 rounded-md bg-[#333333] text-white placeholder-white/60" placeholder="you@example.com" disabled />
      </div>
      <div>
        <label class="block text-white text-sm mb-2">Message</label>
        <textarea class="w-full px-4 py-3 rounded-md bg-[#333333] text-white placeholder-white/60 h-32" placeholder="Write your message here..." disabled></textarea>
      </div>
      <button type="submit" class="self-start bg-[#DB323E] text-white font-medium px-6 py-3 rounded-md hover:bg-[#c4212f] transition" disabled>Send Message</button>
    </form>

    <!-- Contact Info -->
      <div class="flex flex-col gap-6 text-white">
        <h3 class="text-2xl font-semibold">Our Contact</h3>
        <p class="text-sm text-white/80">Whether you need support or want to discuss something with our team, we’re here to help.</p>

        <div class="space-y-4">
          <div class="flex items-center gap-4 bg-[#DB323E] p-4 rounded-md">
          <img src="../image/loc.png" alt="Location" class="w-8 h-8 rounded-full object-cover" />
            <span class="text-sm text-white/90">2464 Royal Ln. Mesa, New Jersey 45463</span>
          </div>
          <div class="flex items-center gap-4 bg-[#DB323E] p-4 rounded-md">
          <img src="../image/call.png" alt="Phone Number" class="w-8 h-8 rounded-full object-cover" />
            <span class="text-sm text-white/90">(480) 555-0103</span>
          </div>
          <div class="flex items-center gap-4 bg-[#DB323E] p-4 rounded-md">
          <img src="../image/mail.png" alt="Email" class="w-8 h-8 rounded-full object-cover" />
            <span class="text-sm text-white/90">hello@ChungBikeShop.com</span>
          </div>
        </div>

        <div>
          <h4 class="text-white text-lg font-semibold mb-2">Follow Us on</h4>
          <div class="flex gap-4">
            <div class="w-10 h-10 bg-[#DB323E] rounded-md flex items-center justify-center">
            <img src="../Image/tw.png" alt="User Icon" class="w-6 h-6"> 
            </div>
            <div class="w-10 h-10 bg-[#DB323E] rounded-md flex items-center justify-center">
            <img src="../Image/ig.png" alt="User Icon" class="w-6 h-6"> 
            </div>
            <div class="w-10 h-10 bg-[#DB323E] rounded-md flex items-center justify-center">
            <img src="../Image/fb.png" alt="User Icon" class="w-6 h-6"> 
            </div>
            <div class="w-10 h-10 bg-[#DB323E] rounded-md flex items-center justify-center">
            <img src="../Image/in.png" alt="User Icon" class="w-6 h-6"> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    
<!-- Footer Section -->
<footer class="bg-[#292929] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="w-full max-w-screen-xl flex flex-col gap-12">
  <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-20 h-24" />
    <div class="grid md:grid-cols-4 gap-10">
      <!-- Address -->
      <div class="text-white text-sm space-y-3">
        <p class="text-white/50">2464 Royal Ln. Mesa, New Jersey 45463</p>
        <p class="text-white/50">(480) 555-0103</p>
        <p class="text-white/50">hello@ChungBikeShop.com</p>
        <p class="text-white/50">www.ChungBikeShop.com</p>
      </div>

      <!-- Opening Hours -->
      <div class="text-white text-sm space-y-3">
        <h4 class="text-lg font-medium">Opening Hours</h4>
        <p class="text-white/50">Mon-Fri : 08.00 - 20.00</p>
        <p class="text-white/50">Sat-Sun: 10.00 - 16.00</p>
      </div>

      <!-- Quick Links -->
      <div class="text-white text-sm space-y-3">
        <h4 class="text-lg font-medium">Quick Links</h4>
        <ul class="text-white/50 space-y-1">
          <li>About Us</li>
          <li>Why with Us</li>
          <li>Our Services</li>
          <li>Appointment</li>
          <li>Blog</li>
          <li>FAQ</li>
        </ul>
      </div>

      <!-- Newsletter -->
      <div class="text-white text-sm space-y-4">
        <h4 class="text-lg font-medium">Subscribe to Our Newsletter</h4>
        <p class="text-white/50">Sign up for our newsletter to receive exclusive promotions, news, and tips straight to your inbox.</p>
        <div class="flex flex-col gap-4">
          <input type="email" placeholder="Email Address" class="px-4 py-3 rounded-lg border border-white/50 bg-transparent text-white placeholder-white/50" />
          <button class="bg-[#DB323E] px-8 py-3 rounded-md text-sm font-medium text-white hover:bg-[#c4212f] transition">Submit</button>
        </div>
      </div>
    </div>

    <div class="w-full border-t border-white/30 pt-8 flex flex-col items-center">
      <p class="text-white/50 text-center text-sm">Copyright © 2024 Chung Bike Shop. All rights reserved.</p>
    </div>
  </div>
</footer>