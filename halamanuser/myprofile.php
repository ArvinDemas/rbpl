<?php
session_start();
include "koneksi.php";

// Check if customer is logged in
if (!isset($_SESSION['id_customer'])) {
    header("Location: login.php");
    exit;
}

$id_customer = $_SESSION['id_customer'];

// Handle profile update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update profile data
    if (isset($_POST['update_profile'])) {
        $nama = mysqli_real_escape_string($konek, $_POST['nama']);
        $email = mysqli_real_escape_string($konek, $_POST['email']);
        $no_telp = mysqli_real_escape_string($konek, $_POST['no_hp']);

        $update_query = "UPDATE customer SET nama = ?, email = ?, no_hp = ? WHERE id_customer = ?";
        $stmt = mysqli_prepare($konek, $update_query);
        mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $no_telp, $id_customer);
        mysqli_stmt_execute($stmt);

        // Update session variables
        $_SESSION['nama'] = $nama;
        $_SESSION['email'] = $email;
        $_SESSION['update_success'] = "Profile updated successfully.";

        header("Location: myprofile.php");
        exit;
    }

    if (isset($_POST['upload_picture']) && isset($_FILES['profile_picture'])) {
        $file = $_FILES['profile_picture'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($file['type'], $allowed_types) && $file['error'] === 0) {
            // Directory to store uploaded images
            $upload_dir = __DIR__ . '/../image/';

            // Create upload directory if not exists
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Fetch current image filename from DB
            $query = "SELECT gambar FROM customer WHERE id_customer = ?";
            $stmt = mysqli_prepare($konek, $query);
            mysqli_stmt_bind_param($stmt, "i", $id_customer);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
            $old_image = $row['gambar'];

            // Delete old image file if exists and not default
            if ($old_image && file_exists($upload_dir . $old_image)) {
                unlink($upload_dir . $old_image);
            }

            // Generate unique filename
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $new_filename = uniqid('profile_', true) . '.' . $ext;

            // Move uploaded file to upload directory
            $destination = $upload_dir . $new_filename;
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                // Update DB with new filename
                $update_img_query = "UPDATE customer SET gambar = ? WHERE id_customer = ?";
                $stmt = mysqli_prepare($konek, $update_img_query);
                mysqli_stmt_bind_param($stmt, "si", $new_filename, $id_customer);
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['upload_success'] = "Profile picture uploaded successfully.";
                    header("Location: myprofile.php");
                    exit;
                } else {
                    $upload_error = "Failed to update image in database: " . mysqli_stmt_error($stmt);
                }
            } else {
                $upload_error = "Failed to move uploaded file.";
            }
        } else {
            $upload_error = "Invalid file type or error uploading file.";
        }
    }

    if (isset($_POST['delete_picture'])) {
        // Directory to store uploaded images
        $upload_dir = __DIR__ . '/../image/';

        // Fetch current image filename from DB
        $query = "SELECT gambar FROM customer WHERE id_customer = ?";
        $stmt = mysqli_prepare($konek, $query);
        mysqli_stmt_bind_param($stmt, "i", $id_customer);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        $old_image = $row['gambar'];

        // // Delete old image file if exists and not default
        // if ($old_image && file_exists($upload_dir . $old_image)) {
        //     unlink($upload_dir . $old_image);
        // }

        // // Update DB to remove image filename
        // $update_img_query = "UPDATE customer SET gambar = NULL WHERE id_customer = ?";
        // $stmt = mysqli_prepare($konek, $update_img_query);
        // mysqli_stmt_bind_param($stmt, "i", $id_customer);
        // if (mysqli_stmt_execute($stmt)) {
        //     $_SESSION['delete_success'] = "Profile picture deleted successfully.";
        //     header("Location: myprofile.php");
        //     exit;
        // } else {
        //     $upload_error = "Failed to delete image in database: " . mysqli_stmt_error($stmt);
        // }
    }
}

// Fetch customer data
$query = "SELECT nama, email, no_hp, gambar FROM customer WHERE id_customer = ?";
$stmt = mysqli_prepare($konek, $query);
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($konek));
}
mysqli_stmt_bind_param($stmt, "i", $id_customer);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$customer = mysqli_fetch_assoc($result);

if (!empty($customer['gambar'])) {
    $profile_image = '../image/' . htmlspecialchars($customer['gambar']);
} else {
    $profile_image = '../image/Desain tanpa judul.png';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Profile - ChungBike Shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body>
<section class="w-full bg-black py-6 px-4 md:px-16 flex flex-col items-center relative">
  <div class="w-full max-w-screen-xl flex flex-col md:flex-row items-center justify-between gap-8">
    <div class="w-20 h-24">
      <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-full h-full object-cover" />
    </div>
<nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row">
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="aboutus.html">About Us</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="homepage.php">Home</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold text-white bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="contac.php">Contact</a>
      </nav>
    <a class="bg-[#DB323E] text-white px-8 py-3 rounded-md hover:bg-[#c4212f] transition" href="logout.php">
      logout
    </a>
  </div>
</section>

<!-- Profile Content -->
<section class="w-full bg-[#222222] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="max-w-screen-xl w-full flex flex-col lg:flex-row items-start justify-center gap-24">
    <div class="flex flex-col items-center gap-10">
      <img src="../image/Desain tanpa judul.png" alt="Logo" class="w-48 h-12 object-contain" />
      <h2 class="text-white text-xl font-medium">My Profile</h2>

      <form method="post" action="myprofile.php" class="flex flex-col items-start gap-6" enctype="multipart/form-data">
        <div class="space-y-3 w-[520px]">
          <label class="text-white text-sm" for="nama">Name</label>
          <input id="nama" name="nama" type="text" value="<?php echo htmlspecialchars($customer['nama']); ?>" class="w-full px-4 py-3 border border-white rounded-lg text-white text-sm bg-transparent" required />
        </div>
        <div class="space-y-3 w-[520px]">
          <label class="text-white text-sm" for="email">Email</label>
          <input id="email" name="email" type="email" value="<?php echo htmlspecialchars($customer['email']); ?>" class="w-full px-4 py-3 border border-white rounded-lg text-white text-sm bg-transparent" required />
        </div>
        <div class="space-y-3 w-[520px]">
          <label class="text-white text-sm" for="no_hp">No Telp</label>
          <input id="no_hp" name="no_hp" type="text" value="<?php echo htmlspecialchars($customer['no_hp']); ?>" class="w-full px-4 py-3 border border-white rounded-lg text-white text-sm bg-transparent" required />
        </div>
        <button type="submit" name="update_profile" class="w-[520px] bg-[#DB323E] text-white py-3 rounded-lg text-base hover:bg-[#c4212f] transition">Update Profile</button>
      </form>
    </div>

    <div class="flex flex-col items-center gap-6">
      <div class="w-64 h-64 bg-white rounded-full overflow-hidden">
        <img src="<?php echo $profile_image; ?>" alt="Profile Picture" class="w-full h-full object-cover" />
      </div>
      <form method="post" action="myprofile.php" enctype="multipart/form-data" class="flex flex-col items-center gap-4 w-[214px]" id="uploadForm">
        <input type="file" name="profile_picture" accept="image/*" required id="profilePictureInput" class="hidden" />
        <input type="hidden" name="upload_picture" value="1" />
        <button type="button" id="uploadButton" class="w-full bg-[#DB323E] text-white py-3 rounded-lg text-base hover:bg-[#c4212f] transition">Upload Picture</button>
      </form>
      <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
          document.getElementById('profilePictureInput').click();
        });
        document.getElementById('profilePictureInput').addEventListener('change', function() {
          if(this.files.length > 0) {
            document.getElementById('uploadForm').submit();
          }
        });
      </script>
      <!-- <form method="post" action="myprofile.php" class="w-[214px]">
        <button type="submit" name="delete_picture" class="w-full bg-gray-600 text-white py-3 rounded-lg text-base hover:bg-gray-700 transition">delete picture</button>
      </form> -->
      <?php if (!empty($upload_error)): ?>
        <p class="text-red-500 mt-2"><?php echo htmlspecialchars($upload_error); ?></p>
      <?php endif; ?>

<?php if (!empty($_SESSION['upload_success'])): ?>
  <div id="uploadSuccessNotification" class="fixed top-20 right-4 bg-green-600 text-white px-6 py-3 rounded shadow-lg z-50">
    <?php 
      echo htmlspecialchars($_SESSION['upload_success']); 
      unset($_SESSION['upload_success']);
    ?>
  </div>
<?php endif; ?>

<!-- <?php if (!empty($_SESSION['delete_success'])): ?>
  <div id="deleteSuccessNotification" class="fixed top-32 right-4 bg-green-600 text-white px-6 py-3 rounded shadow-lg z-50">
    <?php 
      echo htmlspecialchars($_SESSION['delete_success']); 
      unset($_SESSION['delete_success']);
    ?>
  </div>
<?php endif; ?> -->

<script>
  // Auto-hide notifications after 3 seconds
  window.addEventListener('DOMContentLoaded', (event) => {
    const uploadNotif = document.getElementById('uploadSuccessNotification');
    if (uploadNotif) {
      setTimeout(() => {
        uploadNotif.style.display = 'none';
      }, 3000);
    }
    const deleteNotif = document.getElementById('deleteSuccessNotification');
    if (deleteNotif) {
      setTimeout(() => {
        deleteNotif.style.display = 'none';
      }, 3000);
    }
  });
</script>
    </div>
  </div>
</section>

<?php if (!empty($_SESSION['update_success'])): ?>
  <div class="fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded shadow-lg z-50">
    <?php 
      echo htmlspecialchars($_SESSION['update_success']); 
      unset($_SESSION['update_success']);
    ?>
  </div>
<?php endif; ?>

<?php if (!empty($_SESSION['upload_success'])): ?>
  <div class="fixed top-20 right-4 bg-green-600 text-white px-6 py-3 rounded shadow-lg z-50">
    <?php 
      echo htmlspecialchars($_SESSION['upload_success']); 
      unset($_SESSION['upload_success']);
    ?>
  </div>
<?php endif; ?>

<!-- Footer Section -->
<footer class="bg-[#292929] py-20 px-4 md:px-16 flex flex-col items-center">
  <div class="w-full max-w-screen-xl flex flex-col gap-12">
    <div class="grid md:grid-cols-4 gap-10">
      <!-- Address -->
      <div class="text-white text-sm space-y-3">
        <img src="../image/Desain tanpa judul.png" alt="Footer Logo" class="w-20 h-24" />
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


</script>
</body>
</html>