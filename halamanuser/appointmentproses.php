<?php
session_start();
include "koneksi.php";

// Pastikan user login
if (!isset($_SESSION['id_customer'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

$id_customer = $_SESSION['id_customer'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_customer = $_SESSION['id_customer'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];
    $brand = $_POST['motorcycle_brand'];
    $model = $_POST['motorcycle_model'];
    $year = $_POST['motorcycle_year'];
    $plate = $_POST['license_plate'];
    $vin = !empty($_POST['vin']) ? $_POST['vin'] : NULL;
    $date = $_POST['appointment_date'];
    $time = $_POST['appointment_time'];
    $category = $_POST['service_category'];
    $details = $_POST['service_details'];

    $sql = "INSERT INTO booking 
        (id_customer, first_name, last_name, email, phone_number, motorcycle_brand, motorcycle_model, motorcycle_year, license_plate, vin, appointment_date, appointment_time, service_category, service_details) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($konek, $sql);
    mysqli_stmt_bind_param($stmt, "isssssssssssss", $id_customer, $first_name, $last_name, $email, $phone, $brand, $model, $year, $plate, $vin, $date, $time, $category, $details);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: appointmentsukses.php?pesan=appointment_berhasil");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($konek);
    }
}
?>
<!-- Animation for success redirect -->
<script>
  if (window.location.search.includes("success")) {
    const circle = document.createElement('div');
    circle.style.width = '0px';
    circle.style.height = '0px';
    circle.style.borderRadius = '50%';
    circle.style.background = 'linear-gradient(180deg, #FF0532 0%, #E537A0 100%)';
    circle.style.position = 'fixed';
    circle.style.top = '50%';
    circle.style.left = '50%';
    circle.style.transform = 'translate(-50%, -50%)';
    circle.style.zIndex = '9999';
    document.body.appendChild(circle);

    let size = 0;
    const animation = setInterval(() => {
      size += 40;
      circle.style.width = `${size}px`;
      circle.style.height = `${size}px`;

      if (size >= 1200) {
        clearInterval(animation);
        window.location.href = "../halamanuserappointmentsukses.php";
      }
    }, 20);
  }
</script>