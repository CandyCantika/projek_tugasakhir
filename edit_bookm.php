<?php
session_start();
include 'layout/header.php';
include 'koneksi.php';

if (!isset($_SESSION['id'])) {
    echo "User ID is not set in session!";
    exit();
}

$id_order = $_GET['id'];

$query = mysqli_query($koneksi, "
        SELECT k.nama AS kendaraan_nama, ok.tgl_mulai AS tgl_mulai,ok.tgl_keluar AS tgl_keluar, 
        ok.total_harga AS total_harga, ok.durasi AS durasi, k.harga AS harga,u.nama AS user_nama  
        FROM order_kendaraan AS ok JOIN kendaraans AS k ON ok.kendaraan_id = k.id  JOIN 
        multi_users AS u ON ok.user = u.id WHERE ok.id = '$id_order'
");

if (!$query) {
    die('Query Error: ' . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($query);
if (!$data) {
    echo "Order not found!";
    exit();
}

$rate_per_day = (float)str_replace(',', '', $data['harga']);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order Mobil</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-titles">
                        <h2 class="heading">Edit Order Mobil</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="update_bookingm.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $id_order; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($data['user_nama']); ?>" readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="durasi" class="form-label">Durasi (hari)</label>
                                        <input type="number" class="form-control" id="durasi" name="durasi" value="<?php echo htmlspecialchars($data['durasi']); ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?php echo htmlspecialchars($data['tgl_mulai']); ?>" required readonly>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tgl_keluar" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" value="<?php echo htmlspecialchars($data['tgl_keluar']); ?>" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kendaraan" class="form-label">Kendaraan</label>
                                    <input type="text" class="form-control" id="kendaraan" name="kendaraan" value="<?php echo htmlspecialchars($data['kendaraan_nama']); ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="rate_per_day" class="form-label">Rate per Day (Rp.)</label>
                                    <input type="number" class="form-control" id="rate_per_day" name="rate_per_day" value="<?php echo htmlspecialchars($rate_per_day); ?>" readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="total_harga" class="form-label">Total Harga (Rp.)</label>
                                    <input type="number" step="0.01" class="form-control" id="total_harga" name="total_harga" readonly>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Update Booking</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            const ratePerDay = <?php echo $rate_per_day; ?>;
            const initialDuration = <?php echo htmlspecialchars($data['durasi']); ?>;

            $('#total_harga').val(initialDuration * ratePerDay);

            function updateTotal() {
                const tglMulai = new Date($('#tgl_mulai').val());
                const tglKeluar = new Date($('#tgl_keluar').val());

                if (tglKeluar >= tglMulai) {
                    //hitung durasi
                    const duration = Math.ceil((tglKeluar - tglMulai) / (1000 * 60 * 60 * 24)) + 1;
                    $('#durasi').val(duration);
                    $('#total_harga').val(duration * ratePerDay);
                } else {
                    $('#durasi').val(initialDuration);
                    $('#total_harga').val(initialDuration * ratePerDay);
                }
            }

            $('#tgl_keluar').on('change', updateTotal);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'layout/footer.php';
?>