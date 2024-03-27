<?php

// Array to store sidebar links and their texts
$sidebar_links = array(
    '/mbti/admin/data_admin.php' => 'Manajemen Data Admin',
    '/mbti/tipe_kepribadian' => 'Manajemen Tipe Kepribadian',
    '/mbti/tipe_mbti' => 'Manajemen Tipe MBTI',
    '/mbti/ciri-ciri' => 'Manajemen Ciri Tipe MBTI',
    '/mbti/saran' => 'Manajemen Saran Tipe MBTI',
    '/mbti/gejala' => 'Manajemen Gejala',
    '/mbti/riwayat' => 'Manajemen Riwayat Pengguna'
);
?>

<!-- SIDEBAR -->

<?php
require_once 'controller/main.php';
validasi_admin();
$id_user = dekripsi($_COOKIE['SPmbti']);

$user = query("SELECT * FROM user WHERE iduser = $id_user")[0];
?>

<div class="sidebar" id="side_nav">
    <!-- PROFILE -->
    <div class="content-side">
        <div class="profil pt-4">
            <div class="row d-flex align-items-center">
                <div class="col-sm-4 me-0">
                    <img src="image/<?= $user['foto']; ?>" class="rounded-circle" alt="profil">
                    <a href="profil">
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
        <!-- PROFILE FINISHED -->

        <!-- Menu -->
        <div class="">
            <ul class="list-group list-group-flush pt-4 fw-medium">
                <?php foreach ($sidebar_links as $link => $text): ?>
                    <li class="list-group-item">
                        <a href="<?= $link ?>" class="text-decoration-none d-block" <?php if ($current_page === $link)
                              echo 'style="color:mediumblue;"'; ?>>
                            <span>
                                <?= $text ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <hr class="hr-color">

        <ul class="list-unstyled fw-medium pb-5">
            <li>
                <a class="text-decoration-none btn" id="logout" onclick="confirmLogout();">
                    <i class="bi bi-box-arrow-right fs-5"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menghapus data?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            focusCancel: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke halaman logout atau lakukan proses logout di sini
                Swal.fire('Logout Berhasil', '', 'success');
                window.location.href = '../mbti/logout.php';
            }
        });
    }
</script>