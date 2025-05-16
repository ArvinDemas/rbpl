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
  <section class="w-full bg-black py-20 px-4 md:px-16 flex flex-col items-center relative">
  <div class="w-full max-w-screen-xl flex flex-col md:flex-row items-center justify-between gap-8">
    <div class="w-20 h-24">
      <img src="https://placehold.co/80x100" alt="Logo" class="w-full h-full object-cover" />
    </div>
    <nav class="flex gap-8 text-white text-sm font-semibold">
      <a href="aboutus.html" class="hover:text-[#DB323E] transition">About Us</a>
      <a href="homepage.php" class="hover:text-[#DB323E] transition">Home</a>
      <a href="contac.php" class="hover:text-[#DB323E] transition">Contact</a>
    </nav>
    <a class="bg-[#DB323E] text-white px-8 py-3 rounded-md hover:bg-[#c4212f] transition" href="logout.php">
      logout
      </a>
  </div>

  <!-- Profile Content -->
<section class="w-full bg-[#222222] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="max-w-screen-xl w-full flex flex-col lg:flex-row items-start justify-center gap-24">
    <div class="flex flex-col items-center gap-10">
      <img src="https://placehold.co/200x45" alt="Logo" class="w-48 h-12 object-contain" />
      <h2 class="text-white text-xl font-medium">My Profile</h2>

      <div class="flex flex-col items-start gap-6">
        <div class="space-y-3">
          <label class="text-white text-sm">Name</label>
          <div class="w-[520px] px-4 py-3 border border-white rounded-lg text-white text-sm">Stevent kaze</div>
        </div>
        <div class="space-y-3">
          <label class="text-white text-sm">Email</label>
          <div class="w-[520px] px-4 py-3 border border-white rounded-lg text-white text-sm">force@adresseemail.com</div>
        </div>
        <div class="space-y-3">
          <label class="text-white text-sm">No Telp</label>
          <div class="w-[520px] px-4 py-3 border border-white rounded-lg text-white text-sm">(+237) 696 88 77 55</div>
        </div>
        <button class="w-[520px] bg-[#DB323E] text-white py-3 rounded-lg text-base hover:bg-[#c4212f] transition">Edit Account</button>
      </div>
    </div>

    <div class="flex flex-col items-center gap-6">
      <div class="w-64 h-64 bg-white rounded-full overflow-hidden"></div>
      <button class="w-[214px] bg-[#DB323E] text-white py-3 rounded-lg text-base hover:bg-[#c4212f] transition">Select Picture</button>
    </div>
  </div>
</section>
    <!-- Footer Section -->
<footer class="bg-[#292929] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="w-full max-w-screen-xl flex flex-col gap-12">
    <div class="grid md:grid-cols-4 gap-10">
      <!-- Address -->
      <div class="text-white text-sm space-y-3">
        <img src="https://placehold.co/80x100" alt="Footer Logo" class="w-20 h-24" />
        <p class="text-white/50">2464 Royal Ln. Mesa, New Jersey 45463</p>
        <p class="text-white/50">(480) 555-0103</p>
        <p class="text-white/50">hello@ChungBikeShop.com</p>
        <p class="text-white/50">www.ChungBikeShop.com</p>
        <div class="flex gap-1">
          <div class="w-4 h-4 bg-[#DB323E]"></div>
          <div class="w-4 h-4 bg-[#DB323E]"></div>
          <div class="w-[6.6px] h-[9.45px] bg-[#292929]"></div>
          <div class="w-[3.33px] h-[3.33px] bg-[#DB323E]"></div>
          <div class="w-4 h-4 bg-[#DB323E]"></div>
          <div class="w-4 h-4 bg-[#DB323E]"></div>
        </div>
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
      <p class="text-white/50 text-center text-sm">Copyright © 2024 ChungBikeShope. All rights reserved.</p>
    </div>
  </div>
</footer>

</body>
</html>