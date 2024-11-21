<?php
session_start();

include 'layout/header_user.php';
include 'koneksi.php';

if (!isset($_SESSION['id'])) {
    echo "User ID is not set in session!";
    exit();
}

$id = $_SESSION['id'];

$query_user = mysqli_query($koneksi, "SELECT id, nama FROM multi_users WHERE id='$id'");

if (mysqli_num_rows($query_user) > 0) {
    $row_user = mysqli_fetch_assoc($query_user);
    $id_user = $row_user['id'];
    $nama_user = $row_user['nama'];
} else {
    echo "User not found!";
    exit();
}
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-titles">
                    <div class="d-flex align-items-center">
                        <h2 class="heading">Riwayat Booking</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            // Gabungkan data kendaraan dan destinasi dalam satu query menggunakan UNION
            $result_booking = mysqli_query($koneksi, "
                SELECT k.gambar as gambar, k.harga as harga, k.nama as nama, ok.tgl_mulai as tgl_mulai, ok.tgl_keluar as tgl_keluar, ok.total_harga as total_harga, ok.durasi as durasi, ok.tgl_book as tgl_book
                FROM order_kendaraan as ok
                JOIN kendaraans as k ON ok.kendaraan_id = k.id
                WHERE ok.user = $id_user

                UNION ALL

                SELECT d.gambar as gambar, NULL as harga, d.nama as nama, od.tgl_mulai as tgl_mulai, od.tgl_keluar as tgl_keluar, od.total_harga as total_harga, od.durasi as durasi, od.tgl_book as tgl_book
                FROM order_destinasis as od
                JOIN destinasis as d ON od.destinasis_id = d.id
                WHERE od.nama = $id_user

                ORDER BY tgl_book DESC;
            ");

            if (!$result_booking) {
                die('Query Error: ' . mysqli_error($koneksi));
            }

            // Menampilkan hasil gabungan data kendaraan dan destinasi
            while ($row = mysqli_fetch_assoc($result_booking)) {
            ?>
                <div class="col-xl-12 mb-4">
                    <div class="card d-flex flex-row" style="width: 100%;">
                        <div class="new-arrivals-img-contnent p-3">
                            <img class="img-fluid" src="<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>" style="max-height: 150px; max-width: 200px; width: auto; height: auto;">
                        </div>
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrival-content">
                                    <h4><?= $row['nama'] ?></h4>
                                </div>
                                <div class="product-date text-start">
                                    <small>Durasi: <?= $row['durasi'] ?> hari</small>
                                </div>
                                <div class="product-date text-start">
                                    <small>Tanggal Mulai: <?= date('d M Y', strtotime($row['tgl_mulai'])) ?></small><br>
                                    <small>Tanggal Selesai: <?= date('d M Y', strtotime($row['tgl_keluar'])) ?></small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div class="price me-2">
                                        Total Harga: <strong>Rp.<?= number_format($row['total_harga'], 0, ',', '.'); ?></strong>
                                    </div>
                                    <div class="tgl-book">
                                        Tgl Booking: <strong><?= date('d M Y', strtotime($row['tgl_book'])) ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php
include 'layout/footer.php';
?>
