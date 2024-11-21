<?php
include 'layout/header.php';
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Data Booking Destinasi</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
  <div class="content-body">
    <div class="container-fluid">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title">Kelola Data Booking Paket Wisata</h4>
          </div>

          <!-- Form Pencarian -->
          <form method="GET" action="" class="ms-4 me-4">
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="search" placeholder="Cari data" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">

              <select class="form-select" name="month" style="background-color: #f8f9fa;"> <!-- Dropdown bulan -->
                <option value="">Pilih Bulan</option>
                <?php
                $months = [
                  1 => 'Januari',
                  2 => 'Februari',
                  3 => 'Maret',
                  4 => 'April',
                  5 => 'Mei',
                  6 => 'Juni',
                  7 => 'Juli',
                  8 => 'Agustus',
                  9 => 'September',
                  10 => 'Oktober',
                  11 => 'November',
                  12 => 'Desember'
                ];
                foreach ($months as $num => $name) {
                  $selected = (isset($_GET['month']) && $_GET['month'] == $num) ? 'selected' : '';
                  echo "<option value='$num' $selected>$name</option>";
                }
                ?>
              </select>

              <button class="btn btn-primary" type="submit">Cari</button>
              <a href="data_bookingw.php" class="btn btn-secondary " title="Refresh">
                <i class="bi bi-arrow-clockwise"></i>
              </a>
            </div>
          </form>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-responsive-sm ">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Booking</th>
                    <th scope="col">Nama Pengguna</th>
                    <th scope="col">Durasi</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Mobil</th>
                    <th scope="col">Destinasi</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col" class="text-end">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $search = isset($_GET['search']) ? $_GET['search'] : '';
                  $month = isset($_GET['month']) ? $_GET['month'] : '';

                  $sql = "SELECT od.id, od.tgl_book, od.durasi, od.tgl_mulai, od.tgl_keluar, 
                          k.nama AS kendaraan_nama, d.nama AS destinasi_nama, od.total_harga, 
                          u.nama AS user_nama
                          FROM order_destinasis od 
                          LEFT JOIN destinasis d ON od.destinasis_id = d.id 
                          LEFT JOIN kendaraans k ON od.kendaraan = k.id
                          LEFT JOIN multi_users u ON od.nama = u.id";


                  $conditions = [];

                  if (!empty($search)) {
                    $conditions[] = "(od.durasi LIKE '%$search%' OR od.tgl_mulai LIKE '%$search%' 
                                      OR od.tgl_keluar LIKE '%$search%' OR od.total_harga LIKE '%$search%' 
                                      OR k.nama LIKE '%$search%' OR d.nama LIKE '%$search%' 
                                      OR u.nama LIKE '%$search%')";
                  }

                  if (!empty($month)) {
                    $conditions[] = "MONTH(od.tgl_mulai) = '$month'";
                  }

                  if (!empty($conditions)) {
                    $sql .= " WHERE " . implode(" AND ", $conditions);
                  }

                  $result = $koneksi->query($sql);

                  if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . $no++ . "</td>";
                      echo "<td>" . htmlspecialchars($row['tgl_book']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['user_nama']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['durasi']) . " hari</td>";
                      echo "<td>" . htmlspecialchars($row['tgl_mulai']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['tgl_keluar']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['kendaraan_nama']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['destinasi_nama']) . "</td>";
                      echo "<td>" . number_format($row['total_harga'], 2, ',', '.') . "</td>";
                      echo "<td class='text-end'>
                                <span class='d-flex justify-content-end'>
                                    <a href='edit_bookw.php?id=" . htmlspecialchars($row['id']) . "&nama=" . urlencode($row['user_nama']) . "&kendaraan=" . urlencode($row['kendaraan_nama']) . "' class='me-2 btn btn-primary shadow btn-xs sharp' data-bs-toggle='tooltip' data-placement='top' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                                    <a href='hapus_bookdestinasi.php?id=" . htmlspecialchars($row['id']) . "&nama=" . urlencode($row['user_nama']) . "&kendaraan=" . urlencode($row['kendaraan_nama']) . "' class='btn btn-danger shadow btn-xs sharp' data-bs-toggle='tooltip' data-placement='top' title='Hapus'>
                                       <i class='fas fa-times text-white'></i>
                                    </a>
                                </span>
                            </td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='10' class='text-center'>Tidak ada data yang ditemukan.</td></tr>";
                  }

                  $koneksi->close();
                  ?>
                </tbody>
              </table>
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