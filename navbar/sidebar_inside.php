<!-- SIDEBAR_SIDE -->

<?php
require_once '../controller/main.php';
validasi_admin();
$id_user = dekripsi($_COOKIE['SPmbti']);

$user = query("SELECT * FROM user WHERE iduser = $id_user")[0];
?>

<div class="sidebar" id="side_nav">
    <!--PROFIL-->
    <div class="content-side">
        <div class="profil pt-4">
            <div class="row d-flex align-items-center">
                <div class="col-sm-4 me-0">
                    <img src="../image/<?= $user['foto']; ?>" class="rounded-circle" alt="profi">
                    <a href="../profil">
                        <button class="rounded-circle"><i class="bi bi-pencil-fill"></i></button>
                    </a>
                </div>
                <div class="col-sm-8 p-0 m-0">
                    <h6 class="fw-bold">
                        <?= $user['nama']; ?>
                    </h6>
                </div>
            </div>

        </div>
        <!--PROFIL SELESAI-->

        <!-- menu -->
        <div class="">
            <ul class="list-group list-group-flush pt-4 fw-medium">
                <li class="list-group-item">
                    <a href="../admin/data_admin.php" class="text-decoration-none d-block">
                        <span>Manajemen Data Admin</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../tipe_kepribadian" class="text-decoration-none d-block">
                        <span>Manajemen Tipe Kepribadian</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../tipe_mbti" class="text-decoration-none d-block">
                        <span>Manajemen Tipe MBTI</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../ciri-ciri" class="text-decoration-none d-block">
                        <span>Manajemen Ciri Tipe MBTI</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../saran" class="text-decoration-none d-block">
                        <span>Manajemen Saran Tipe MBTI</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../gejala" class="text-decoration-none d-block">
                        <span>Manajemen Gejala</span>
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="../riwayat" class="text-decoration-none d-block">
                        <span>Manajemen Riwayat Pengguna</span>
                    </a>
                </li>
            </ul>
        </div>
        <hr class="hr-color">

        <ul class="list-unstyled fw-medium pb-5">
            <li>
                <a href="../logout.php" class="text-decoration-none d-block">
                    <i class="bi bi-box-arrow-right fs-5"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>