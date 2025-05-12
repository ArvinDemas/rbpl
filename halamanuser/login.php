
<div style="width: 100%; height: 100vh; display: flex; justify-content: center; align-items: center; background: white; overflow: hidden;">
  <div style="display: flex; flex-direction: column; align-items: center; gap: 40px;">
    
    <!-- Logo dan Judul -->
    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
      <img style="width: 200px;" src="../img/Desain tanpa judul.png" alt="Logo" />
      <div style="color: black; font-size: 20px; font-family: Inter; font-weight: 500;">Please Log In to Continue</div>
    </div>

    <!-- Form Login -->
    <div style="display: flex; flex-direction: column; gap: 16px;">
      <form action="loginP.php" method="post">
        
      <!-- Input Email -->
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="color: black; font-size: 16px; font-family: Inter;">Email</label>
        <input type="email" placeholder="example@gmail.com"
               style="width: 520px; padding: 16px; border-radius: 12px; border: 1px solid #5C73DB; font-size: 14px; color: #9FA6B2;" />
      </div>

      <!-- Input Password -->
      <div style="display: flex; flex-direction: column; gap: 8px;">
        <label style="color: black; font-size: 16px; font-family: Inter;">Password</label>
        <input type="password" placeholder="***************"
               style="width: 520px; padding: 16px; border-radius: 12px; border: 1px solid #E4E4E7; font-size: 14px; color: #9FA6B2;" />
      </div>

      <!-- Lupa Password -->
      <div style="text-align: center; color: black; font-size: 16px; font-family: Inter;">Forget Password?</div>

      <!-- Tombol Login -->
      <button style="width: 520px; height: 48px; background: #DB323E; color: white; font-size: 18px; font-family: Inter; border: none; border-radius: 12px; cursor: pointer;">
        Log In
      </button>

      <!-- Link Register -->
      <div style="text-align: center; font-size: 16px; font-family: Inter;">
        Don’t have an account?
        <a href="#" style="color: #5C73DB; text-decoration: underline;">Create Account</a>
      </div>   
    </form>
    </div>
  </div>
</div>
