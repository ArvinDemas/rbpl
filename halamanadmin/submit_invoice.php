<?php
session_start();
include '../halamanuser/koneksi.php';

if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_booking = intval($_POST['id_booking']);
    $total = intval($_POST['total']);
    $items = json_decode($_POST['items'], true);

    // Simpan nota
    $query_nota = "INSERT INTO nota (id_booking, total, tanggal) VALUES (?, ?, NOW())";
    $stmt_nota = mysqli_prepare($konek, $query_nota);
    mysqli_stmt_bind_param($stmt_nota, "ii", $id_booking, $total);
    mysqli_stmt_execute($stmt_nota);
    $nota_id = mysqli_insert_id($konek);

    // Simpan sparepart ke nota_item (hanya id_sparepart != 0)
    foreach ($items as $item) {
    // Ambil nilai dari array item
    $id_sparepart = isset($item['id_sparepart']) ? $item['id_sparepart'] : null;
    $qty = $item['qty'];
    $subtotal = $item['subtotal'];

    // Tentukan tipe item dan nama jasa (jika berlaku)
    if ($id_sparepart === 0) {
        $tipe_item = 'jasa';
        $nama_jasa = 'Servis Ringan';
        $id_sparepart = null;
    } elseif ($id_sparepart === -1) {
        $tipe_item = 'jasa';
        $nama_jasa = 'Servis Berat';
        $id_sparepart = null;
    } else {
        $tipe_item = 'sparepart';
        $nama_jasa = null;
    }

    // Siapkan dan jalankan query insert
    $stmt_item = mysqli_prepare($konek, "
        INSERT INTO nota_item (nota_id, id_sparepart, qty, subtotal, tipe_item, nama_jasa)
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    mysqli_stmt_bind_param($stmt_item, "iiidss", $nota_id, $id_sparepart, $qty, $subtotal, $tipe_item, $nama_jasa);
    mysqli_stmt_execute($stmt_item);
}

    

    // Update status booking
    mysqli_query($konek, "UPDATE booking SET status = 'done' WHERE id_booking = $id_booking");

    header("Location: invoice_sukses.php?nota_id=$nota_id");
    exit;
}
?>