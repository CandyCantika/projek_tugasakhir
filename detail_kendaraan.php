<?php
include 'layout/header_user.php';
include 'koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$query = "SELECT * FROM kendaraans WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$kendaraan = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kendaraan</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
  <div class="content-body">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="page-titles">
            <div class="d-flex align-items-center">
              <h2 class="heading">Detail Kendaraan</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body d-flex">
              <img src="<?= $kendaraan['gambar']; ?>" class="img-fluid img-fluid-rounded me-3" alt="Gambar Kendaraan" style="width: 250px; height: auto;">

              <div class="flex-grow-1">
                <h3><?= $kendaraan['nama']; ?></h3>
                
                <div class="d-table mb-2">
                  <p class="price float-start d-block">Rp.<?= number_format($kendaraan['harga'], 2); ?></p>
                </div>

                <p class="text-content"><?= $kendaraan['plat']; ?></p>

                <p class="text-content"><?= $kendaraan['deskripsi']; ?></p>

                <a href="booking_kendaraan.php?harga=<?= $kendaraan['harga'] ?>&nama=<?= $kendaraan['nama'] ?>" class="btn btn-primary mb-2">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'layout/footer.php';
?>
