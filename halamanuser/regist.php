<div style="width: 100%; min-height: 100vh; display: flex; justify-content: center; align-items: center; background: white; overflow: auto;"> <!-- Mengubah height menjadi min-height dan overflow menjadi auto -->
  <div style="display: flex; flex-direction: column; align-items: center; gap: 40px;">
    
    <!-- Logo dan Judul -->
    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
      <img style="width: 200px;" src="../image/Desain tanpa judul.png" alt="Logo" />
      <div style="color: black; font-size: 20px; font-family: Inter; font-weight: 500;">Register your Account</div>
    </div>

    <!-- Form Register -->
    <form action="registP.php" method="post" style="display: flex; flex-direction: column; gap: 16px;">
      
      <!-- Input Nama -->
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="color: black; font-size: 16px; font-family: Inter;">Nama</label>
        <input name="nama" type="text" placeholder="Nama Anda"
               style="width: 520px; padding: 16px; border-radius: 12px; border: 1px solid #5C73DB; font-size: 14px; color: black;" required />
      </div>

      <!-- Input Email -->
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="color: black; font-size: 16px; font-family: Inter;">Email</label>
        <input name="email" type="email" placeholder="example@gmail.com"
               style="width: 520px; padding: 16px; border-radius: 12px; border: 1px solid #E4E4E7; font-size: 14px; color: black;" required />
      </div>

      <!-- Input Password -->
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="color: black; font-size: 16px; font-family: Inter;">Password</label>
        <input name="password" type="password" placeholder="***************"
               style="width: 520px; padding: 16px; border-radius: 12px; border: 1px solid #E4E4E7; font-size: 14px; color: black;" required />
      </div>

      <!-- Input No-HP -->
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="color: black; font-size: 16px; font-family: Inter;">No HP</label>
        <input name="no_hp" type="tel" placeholder="08**********"
               style="width: 520px; padding: 16px; border-radius: 12px; border: 1px solid #E4E4E7; font-size: 14px; color: black;" required />
      </div>

      <!-- Tombol Register -->
      <button type="submit"
              style="width: 520px; height: 48px; background: #DB323E; color: white; font-size: 18px; font-family: Inter; border: none; border-radius: 12px; cursor: pointer;">
        Register
      </button>

      <!-- Link login -->
      <div style="text-align: center; font-size: 16px; font-family: Inter;">
        Sudah Punya Akun?
        <a href="login.php" style="color: #5C73DB ; text-decoration: none;">Login</a>
      </div>
    </form>
  </div>
</div>
