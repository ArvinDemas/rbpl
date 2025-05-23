<?php
session_start();
include "../halamanuser/koneksi.php";

// Cek session admin
if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

if (!isset($_GET['id'])) {
  echo "ID booking tidak diberikan.";
  exit;
}

$id_booking = intval($_GET['id']);

$query = "SELECT * FROM booking WHERE id_booking = ?";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $id_booking);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
  $booking = $row;
} else {
  echo "Data booking tidak ditemukan.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Booking - ChungBike Shop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function confirmEdit() {
      return confirm("Apakah Anda yakin ingin mengubah data ini?");
    }
  </script>
</head>
<body class="bg-[#222222] text-white">
  <section class="w-full py-20 px-4 md:px-16 flex flex-col items-center">
    <form action="updateappointment.php?id=<?= $booking['id_booking'] ?>" method="POST" onsubmit="return confirmEdit();" class="w-full max-w-screen-xl bg-[#222222] p-6 md:p-10 rounded-xl flex flex-col gap-8">
      <input type="hidden" name="id_booking" value="<?= $booking['id_booking'] ?>">
      <h2 class="text-2xl font-semibold">Personal Information</h2>
      <div class="flex flex-col gap-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <input name="first_name" value="<?= htmlspecialchars($booking['first_name']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="First Name" required />
          <input name="last_name" value="<?= htmlspecialchars($booking['last_name']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Last Name" required />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <input name="email" type="email" value="<?= htmlspecialchars($booking['email']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Email" required />
          <input name="phone_number" type="tel" value="<?= htmlspecialchars($booking['phone_number']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Phone Number" required />
        </div>
      </div>

      <h2 class="text-2xl font-semibold">Motorcycle Information</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <input name="motorcycle_brand" value="<?= htmlspecialchars($booking['motorcycle_brand']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Motorcycle Brand" required />
        <input name="motorcycle_model" value="<?= htmlspecialchars($booking['motorcycle_model']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Motorcycle Model" required />
        <input name="motorcycle_year" value="<?= htmlspecialchars($booking['motorcycle_year']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="Motorcycle Year" required />
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <input name="license_plate" value="<?= htmlspecialchars($booking['license_plate']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="License Plate" required />
        <input name="vin" value="<?= htmlspecialchars($booking['vin']) ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" placeholder="VIN (Optional)" />
      </div>

      <h2 class="text-2xl font-semibold">Appointment Details</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <input name="appointment_date" type="date" value="<?= $booking['appointment_date'] ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" required />
        <input name="appointment_time" type="time" value="<?= $booking['appointment_time'] ?>" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" required />
      </div>

      <h2 class="text-2xl font-semibold">Service Details</h2>
      <select name="service_category" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" required>
        <option disabled value="">Select Service Category</option>
        <option value="Oil Change" <?= $booking['service_category'] == 'Oil Change' ? 'selected' : '' ?>>Oil Change</option>
        <option value="Brake Inspection" <?= $booking['service_category'] == 'Brake Inspection' ? 'selected' : '' ?>>Brake Inspection</option>
        <option value="Engine Tune-Up" <?= $booking['service_category'] == 'Engine Tune-Up' ? 'selected' : '' ?>>Engine Tune-Up</option>
      </select>
      <textarea name="service_details" rows="6" class="p-4 rounded-md border border-[#EBEBEB] text-sm text-[#575757] w-full" required><?= htmlspecialchars($booking['service_details']) ?></textarea>
      <button type="submit" class="bg-[#DB323E] text-white px-8 py-3 rounded-md hover:bg-[#c4212f] transition w-fit self-center">Update Appointment</button>
    </form>
  </section>
</body>
</html>