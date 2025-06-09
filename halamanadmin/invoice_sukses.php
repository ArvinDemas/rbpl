<?php
session_start();
include '../halamanuser/koneksi.php';

if (!isset($_SESSION['id_admin'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

if (!isset($_GET['nota_id'])) {
    echo "ID Nota tidak ditemukan.";
    exit;
}

$nota_id = intval($_GET['nota_id']);

// Ambil data nota + customer
$query = "
    SELECT n.*, b.first_name, b.last_name, b.appointment_date
    FROM nota n
    JOIN booking b ON n.id_booking = b.id_booking
    WHERE n.nota_id = ?
";
$stmt = mysqli_prepare($konek, $query);
mysqli_stmt_bind_param($stmt, "i", $nota_id);
mysqli_stmt_execute($stmt);
$nota_result = mysqli_stmt_get_result($stmt);
$nota = mysqli_fetch_assoc($nota_result);

if (!$nota) {
    echo "Data nota tidak ditemukan.";
    exit;
}

// Ambil item jasa & sparepart dari nota_item
$item_query = "
    SELECT ni.*, s.nama_sparepart, s.kategori
    FROM nota_item ni
    LEFT JOIN sparepart s ON ni.id_sparepart = s.id_sparepart
    WHERE ni.nota_id = ?
";
$stmt_items = mysqli_prepare($konek, $item_query);
mysqli_stmt_bind_param($stmt_items, "i", $nota_id);
mysqli_stmt_execute($stmt_items);
$items_result = mysqli_stmt_get_result($stmt_items);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div id="invoice" class="max-w-[595px] w-full min-h-[842px] p-8 bg-white flex flex-col gap-6 overflow-visible shadow rounded-md text-[10px] font-['Inter'] text-black">
        
        <!-- Header -->
        <div class="flex justify-between items-center">
            <div class="text-3xl font-bold">Invoice</div>
            <div class="text-zinc-500 text-3xl">No. <?= htmlspecialchars($nota['nota_id']) ?></div>
        </div>

        <!-- Dates -->
        <div class="flex justify-between">
            <div>
                <p class="font-semibold">Issued</p>
                <p><?= date("d M, Y", strtotime($nota['tanggal'])) ?></p>
            </div>
            <div>
                <p class="font-semibold">Service Date</p>
                <p><?= date("d M, Y", strtotime($nota['appointment_date'])) ?></p>
            </div>
        </div>

        <!-- Address -->
        <div class="flex justify-between gap-4">
            <div>
                <p class="font-semibold">From</p>
                <p>
                    ChungBike Shop<br/>
                    Jl. Mekanik No.1<br/>
                    Yogyakarta
                </p>
            </div>
            <div>
                <p class="font-semibold">To</p>
                <p>
                    <?= htmlspecialchars($nota['first_name'] . ' ' . $nota['last_name']) ?><br/>
                    [Alamat Customer]<br/>
                    [Kontak Customer]
                </p>
            </div>
        </div>

        <!-- Items -->
        <div>
            <div class="flex font-semibold border-b border-black py-1">
                <div class="w-1/2">Item</div>
                <div class="w-1/6">Harga</div>
                <div class="w-1/6">Qty</div>
                <div class="w-1/6 text-right">Subtotal</div>
            </div>

            <?php while ($item = mysqli_fetch_assoc($items_result)) : ?>
                <div class="flex border-b border-gray-200 py-1">
                    <div class="w-1/2">
                        <?php if ($item['tipe_item'] === 'jasa'): ?>
                            <?= htmlspecialchars($item['nama_jasa']) ?><br/>
                            <span class="text-zinc-500">Jasa</span>
                        <?php else: ?>
                            <?= htmlspecialchars($item['nama_sparepart']) ?><br/>
                            <span class="text-zinc-500"><?= htmlspecialchars($item['kategori']) ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="w-1/6">Rp<?= number_format($item['subtotal'] / $item['qty'], 0, ',', '.') ?></div>
                    <div class="w-1/6"><?= $item['qty'] ?></div>
                    <div class="w-1/6 text-right">Rp<?= number_format($item['subtotal'], 0, ',', '.') ?></div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Total -->
        <div class="border-t border-black pt-2 mt-auto flex justify-between font-semibold">
            <div>Total</div>
            <div class="text-right">Rp<?= number_format($nota['total'], 0, ',', '.') ?></div>
        </div>

        <!-- Notes -->
        <div class="text-xs text-gray-500 mt-4 leading-tight">
            <p>Pembayaran dilakukan melalui transfer bank ke rekening ChungBike.</p>
            <p>Terima kasih atas kepercayaan Anda!</p>
        </div>
    

   <!-- Tombol aksi -->
        <div id="actions" class="flex gap-4 mt-2">
            <a href="create_invoice.php?id=<?= $nota['id_booking'] ?>" class="text-blue-600 underline text-[10px]">← Kembali ke Booking</a>
            <button onclick="printInvoice()" class="bg-green-600 text-white px-3 py-1 rounded text-xs hover:bg-green-700">Cetak Invoice</button>
            <button onclick="downloadPDF()" class="bg-blue-600 text-white px-3 py-1 rounded text-xs hover:bg-blue-700">Download PDF</button>
        </div>
    </div>

    <!-- JS Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        function printInvoice() {
            window.print();
        }

        function downloadPDF() {
            const actions = document.getElementById('actions');
            const invoiceElement = document.getElementById('invoice');

            // Sembunyikan tombol saat proses download
            actions.style.display = 'none';

            // Delay sedikit agar DOM sempat di-render ulang tanpa tombol
            setTimeout(() => {
                const opt = {
                    margin: [0.5, 0.5, 0.5, 0.5],
                    filename: 'Invoice_<?= $nota["nota_id"] ?>.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: {
                        scale: 2,
                        useCORS: true
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                html2pdf().set(opt).from(invoiceElement).save().then(() => {
                    // Tampilkan kembali tombol setelah selesai
                    actions.style.display = 'flex';
                });
            }, 300);
        }
    </script>
</body>
</html>
