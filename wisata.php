<?php
include 'layout/header.php';
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Kendaraan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Kelola Data Paket Wisata</h4>
                        <div class="d-flex">
                            <form action="" method="GET" class="d-flex me-2">
                                <div class="input-group">
                                <input type="text" name="search" placeholder="Cari nama paket..." value="<?php echo htmlspecialchars($search); ?>" class="form-control" style="width: 200px;">
                                <button type="submit" class="btn btn-primary ">Cari</button>
                                <a href="wisata.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-clockwise"></i> 
                            </a>
                            </div>
                            </form>
                            <!-- Tombol Refresh -->
                            
                            <a href="tambah_wisata.php" class="ms-2">
                                <button type="button" class="btn btn-info">
                                    <span class="btn-icon-start text-info"><i class="fa fa-plus color-info"></i></span>
                                    Tambah Data
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-responsive-sm" style="table-layout:fixed; width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%;">No</th>
                                        <th scope="col" style="width: 20%;">Paket Wisata</th>
                                        <th scope="col" style="width: 20%; text-align:center;">Nama</th>
                                        <th scope="col" style="width: 30%; text-align:center;" class="description-coloumn">Deskripsi</th>
                                        <th scope="col" style="width: 15%; text-align:center;">Harga</th>
                                        <th scope="col" style="text-align:center;" class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT id, gambar, nama, deskripsi, harga FROM destinasis";
                                    if (!empty($search)) {
                                        $sql .= " WHERE nama LIKE '%$search%'";
                                    }
                                    $result = $koneksi->query($sql);

                                    if ($result->num_rows > 0) {
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td style='width: 5%;'>" . $no++ . "</td>"; 
                                            echo "<td style='width: 15%;'><img src='" . htmlspecialchars($row['gambar']) . "' alt='Paket Wisata' width='100'></td>"; 
                                            echo "<td style='width: 20%;'>" . htmlspecialchars($row['nama']) . "</td>";
                                            echo "<td style='width: 25%; white-space: normal; overflow: visible; word-wrap: break-word;'>" . htmlspecialchars($row['deskripsi']) . "</td>";
                                            echo "<td style='width: 15%;'>Rp. " . number_format($row['harga'], 2, ',', '.') . " /pack</td>";
                                            echo "<td style='width: 15%;' class='text-end'>
                                                <span class='d-flex justify-content-end'>
                                                    <a href='edit_wisata.php?id=$row[id]' class='me-2 btn btn-primary shadow btn-xs sharp' data-bs-toggle='tooltip' data-placement='top' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                                                    <a href='hapus_wisata.php?id=$row[id]' class='btn btn-danger shadow btn-xs sharp' data-bs-toggle='tooltip' data-placement='top' title='Hapus'><i class='fas fa-times text-white'></i></a>
                                                </span>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data yang ditemukan.</td></tr>";
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

    <!-- Bootstrap dan JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>

<?php
include 'layout/footer.php';
?>
