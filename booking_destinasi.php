<?php
session_start();
include 'layout/header_user.php';
include 'koneksi.php';

$destinasi = isset($_GET['nama']) ? $_GET['nama'] : '';

$harga_per_hari = isset($_GET['harga']) ? (float)$_GET['harga'] : 0;

$user = isset($_SESSION['nama']) ? $_SESSION['nama'] : '';

if (empty($user)) {
    header("Location: login.php?error=not_logged_in");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Booking Paket Wisata</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function updateTotal() {
            var durasi = parseInt(document.getElementById("durasi").value) || 0;
            var hargaPerHari = <?= json_encode($harga_per_hari) ?>;
            var totalHarga = durasi * hargaPerHari;
            document.getElementById("total_harga").value = totalHarga.toFixed(2);

            console.log("Durasi:", durasi);
            console.log("Harga Per Hari:", hargaPerHari);
            console.log("Total Harga:", totalHarga);
        }

        function updateTglKeluar() {
            var tglMulai = document.getElementById("tgl_mulai").value;
            var durasi = parseInt(document.getElementById("durasi").value) || 0;

            if (tglMulai && durasi > 0) {
                var tglMulaiDate = new Date(tglMulai);
                tglMulaiDate.setDate(tglMulaiDate.getDate() + durasi -1);

                var year = tglMulaiDate.getFullYear();
                var month = ('0' + (tglMulaiDate.getMonth() + 1)).slice(-2);
                var day = ('0' + tglMulaiDate.getDate()).slice(-2);
                var tglKeluar = year + '-' + month + '-' + day;

                document.getElementById("tgl_keluar").value = tglKeluar;

                console.log("Tanggal Mulai:", tglMulai);
                console.log("Durasi:", durasi);
                console.log("Tanggal Keluar:", tglKeluar);
            }
        }

        function setMinDate() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById("tgl_mulai").setAttribute("min", today);
        }

        window.onload = function() {
            setMinDate();

            document.getElementById("durasi").addEventListener("input", function() {
                updateTotal();
                updateTglKeluar();
            });
            document.getElementById("tgl_mulai").addEventListener("change", updateTglKeluar);

            var durasi = document.getElementById("durasi").value;
            var tglMulai = document.getElementById("tgl_mulai").value;
            if (durasi && tglMulai) {
                updateTotal();
                updateTglKeluar();
            }
        }
    </script>
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-titles">
                        <div class="d-flex align-items-center">
                            <h2 class="heading">Form Booking Paket Wisata</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Booking -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="books_destinasis.php" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user); ?>" placeholder="Masukkan Nama" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="durasi" class="form-label">Durasi (hari)</label>
                                        <input type="number" class="form-control" id="durasi" name="durasi" placeholder="Masukkan Durasi" required onchange="updateTotal(); updateTglKeluar();">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required onchange="updateTglKeluar();">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="tgl_keluar" class="form-label">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar" required readonly>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="kendaraan" class="form-label">Kendaraan</label>
                                    <select name="kendaraan" class="form-control">
                                        <?php
                                        include "koneksi.php";
                                        $query = mysqli_query($koneksi, "SELECT * FROM kendaraans");
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            echo "<option value='" . $data['id'] . "'>" . $data['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="destinasi" class="form-label">destinasi</label>
                                    <input type="text" class="form-control" id="destinasi" name="destinasi" value="<?= htmlspecialchars($destinasi); ?>" required readonly>
                                </div>

                                <div class="mb-3">
                                    <label for="total_harga" class="form-label">Total Harga (Rp.)</label>
                                    <input type="number" step="0.01" class="form-control" id="total_harga" name="total_harga" value="<?= htmlspecialchars($total_harga); ?>" required readonly>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit Booking</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'layout/footer.php';
?>