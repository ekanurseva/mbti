<?php
require_once 'controller/main.php';
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid container-sm">
        <a class="navbar-brand" href="index.php">Myers Briggs Type Indicator</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#Tes">
                        Mulai Tes
                    </a>
                </li>
                <li class="nav-item">
                    <?php if (!isset($_COOKIE['SPmbti'])): ?>
                        <a class="nav-link" href="login.php">Login</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Tes -->
<div class="modal fade" id="Tes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="TesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h1 class="modal-title fs-4 text-dark" id="TesLabel">WELCOME</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="tes.php">
                <div class="modal-body">
                    <div class="">
                        <label class="form-label text-dark">Silahkan isi data dibawah ini untuk melanjutkan
                            tes.</label>
                        <?php
                        if (isset($_COOKIE['SPmbti'])):
                            $id_nama_user = dekripsi($_COOKIE['SPmbti']);

                            $nama_user = query("SELECT nama FROM user WHERE iduser = $id_nama_user")[0];
                            ?>
                            <input type="text" class="form-control mt-3" id="nama" name="nama" placeholder="Nama"
                                value="<?= $nama_user['nama']; ?>" readonly>
                        <?php else: ?>
                            <input type="text" class="form-control mt-3" id="nama" name="nama" placeholder="Nama" required>
                        <?php endif; ?>
                        <input type="number" class="form-control mt-3" id="nim" name="nim" placeholder="NIM" required>
                        <select class="form-control mt-3" name="jenis_kelamin" require id="jk">
                            <option hidden selected value="">--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <input type="number" class="form-control mt-3" id="angkatan" name="angkatan"
                            placeholder="Angkatan" required>
                        <input type="text" class="form-control mt-3" id="prodi" name="prodi" placeholder="Prodi"
                            required>
                        <input type="number" class="form-control mt-3" id="umur" name="umur" placeholder="Umur"
                            required>

                    </div>
                </div>
                <hr style="margin-bottom: 25px;">

                <div class="d-grid gap-2 mb-4 px-3">
                    <button class="btn btn-primary" type="submit" name="lanjut">Lanjut Tes</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Kembali</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tes Selesai -->