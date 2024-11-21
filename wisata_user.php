<?php
include 'layout/header_user.php';
include 'koneksi.php';

// Cek apakah ada keyword pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Modifikasi query untuk menambahkan fitur pencarian
$query = "SELECT * FROM destinasis";
if ($search) {
    $query .= " WHERE nama LIKE '%$search%'"; // Filter pencarian berdasarkan nama
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <!-- <div class="col-lg-12 d-flex justify-content-between align-items-center mb-3"> -->
                    <!-- Form Pencarian -->
                    <form action="" method="GET" class="d-flex mb-3" >
                        <input type="text" name="search" class="form-control me-2 "  placeholder="Cari Destinasi..." value="<?= htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a href="wisata_user.php" class="btn btn-secondary ms-2">
                        <i class="bi bi-arrow-clockwise"></i>
                        </a> 
                    </form>
                <!-- </div> -->
            </div>

            <div class="row">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="new-arrival-product mb-4">
                                        <div class="new-arrivals-img-contnent">
                                            <img class="img-fluid" src="<?= $row['gambar']; ?>" alt="Gambar Produk">
                                        </div>
                                        <div class="new-arrival-content position-relative">
                                            <h4><a href="#"><?= $row['nama']; ?></a></h4>
                                            <p>Harga/pack: <span class="price">Rp.<?= number_format($row['harga'], 2); ?></span></p>

                                            <div class="d-flex justify-content-start mt-3">
                                                <a href="detail_wisata.php?id=<?= $row['id']; ?>" class="btn btn-secondary me-2">Detail</a>
                                                <a href="booking_destinasi.php?harga=<?= $row['harga'] ?>&nama=<?= $row['nama'] ?>" class="btn btn-primary">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-center">Paket Wisata tidak ditemukan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap dan JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'layout/footer.php';
?>