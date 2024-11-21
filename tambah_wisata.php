<?php
include 'layout/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Paket Wisata</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="needs-validation" novalidate action="simpan_wisata.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="paket">Paket Wisata
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="file" name="paket" id="paket" accept=".jpg, .jpeg, .png" required>
                                                    <div class="invalid-feedback">
                                                        Masukkan Gambar Paket Wisata!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="nama">Nama <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Paket Wisata" required>
                                                    <div class="invalid-feedback">
                                                        Tambahkan Nama!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <textarea  class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Paket Wisata" rows="5" cols="50"  required></textarea>
                                                    <div class="invalid-feedback">
                                                        Tambahkan Deskripsi!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-lg-4 col-form-label" for="harga">Harga/pax
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="number" step="0.01" class="form-control" name="harga" id="harga" placeholder="Harga/pax" required>
                                                    <div class="invalid-feedback">
                                                        Tambahkan harga!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-lg-8 ms-auto">
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include 'layout/footer.php';
                ?>
            </div>
        </div>
    </div>
</body>

</html>