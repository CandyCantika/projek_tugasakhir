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
                        <h4 class="card-title">Tambah Data Mobil</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="needs-validation" novalidate action="simpan_kendaraan.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="kendaraan">Jenis Mobil
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" name="kendaraan" id="kendaraan" accept=".jpg, .jpeg, .png" required>
                                                <div class="invalid-feedback">
                                                    Pilih gambar Mobil!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="deskripsi">Nama <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mobil" required>
                                                <div class="invalid-feedback">
                                                    Tambahkan Nama!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="deskripsi">Plat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="plat" id="plat" placeholder="Plat Mobil" required>
                                                <div class="invalid-feedback">
                                                    Tambahkan Plat!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="deskripsi">Deskripsi <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi kendaraan" rows="5" cols="50" required></textarea>
                                                <div class="invalid-feedback">
                                                    Tambahkan Deskripsi!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="harga">Harga/hari
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" step="0.01" class="form-control" name="harga" id="harga" placeholder="Harga per hari" required>
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
