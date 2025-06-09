<?php
session_start();

if (!isset($_SESSION['invoice_items'])) {
    $_SESSION['invoice_items'] = [];
}

$jasa = [
    'tipe' => 'jasa',
    'id_sparepart' => null,
    'qty' => 1,
    'subtotal' => intval($_POST['harga']),
    'nama_jasa' => $_POST['nama_jasa']
];

$_SESSION['invoice_items'][] = $jasa;
echo 'success';
?>
