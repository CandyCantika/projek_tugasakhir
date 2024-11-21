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
    <title>Kelola Data User</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Kelola Data Users</h4>
                    </div>

                    <!-- Form Pencarian -->
                    <form method="GET" action="" class="ms-4 me-4">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" placeholder="Cari data" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                            <button class="btn btn-primary" type="submit">Cari</button>
                            <a href="user.php" class="btn btn-secondary " title="Refresh">
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
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col" class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                                    $sql = "SELECT id, nama, email, password, tlpn, alamat FROM multi_users";

                                    if (!empty($search)) {
                                        $sql .= " WHERE nama LIKE '%$search%' OR email LIKE '%$search%' OR tlpn LIKE '%$search%' OR alamat LIKE '%$search%'";
                                    }

                                    $result = $koneksi->query($sql);

                                    if ($result->num_rows > 0) {
                                        $no = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['tlpn']) . "</td>";
                                            echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                                            echo "<td class='text-end'>
                                                <span class='d-flex justify-content-end'>
                                                    <a href='#' onclick='confirmDelete(" . $row['id'] . ")' class='btn btn-danger shadow btn-xs sharp' data-bs-toggle='tooltip' data-placement='top' title='Hapus'><i class='fas fa-times text-white'></i></a>
                                                </span>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>Tidak ada data yang ditemukan.</td></tr>";
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

    <script type="text/javascript">
        function confirmDelete(id_user) {
            var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (confirmation) {
                window.location.href = "hapus_user.php?id=" + id_user;
            }
        }
    </script>
</body>

</html>

<?php
include 'layout/footer.php';
?>