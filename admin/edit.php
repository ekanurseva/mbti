<?php
session_start();
require_once '../controller/user.php';

$id = dekripsi($_GET['id']);
$data = query("SELECT * FROM user WHERE iduser = $id")[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pakar Tes Kepribadian MBTI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <div class="content">
        <?php
        require_once('../navbar/navbar_inside.php');
        ?>
        <div class="main-container m-0">
            <div class="d-flex">

                <!-- sidebar -->
                <?php
                require_once('../navbar/sidebar_inside.php');
                ?>
                <!-- sidebar selesai -->

                <div class="contents" style="margin: 75px 0; padding: 10px 40px;">
                    <h4 class="text-center">Manajemen Data Admin</h4>

                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="iduser" value="<?= $data['iduser']; ?>">
                        <input type="hidden" name="oldpassword" value="<?= $data['password']; ?>">
                        <input type="hidden" name="oldusername" value="<?= $data['username']; ?>">
                        <input type="hidden" name="oldemail" value="<?= $data['email']; ?>">
                        <input type="hidden" name="oldfoto" value="<?= $data['foto']; ?>">

                        <div class="mb-3 mt-5 row ms-5">
                            <label for="inputName" class="col-sm-3 me-0 col-form-label">Nama :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;" id="inputName"
                                    value="<?= $data['nama']; ?>" name="nama">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputEmail" class="col-sm-3 me-0 col-form-label">Email :</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" style="border: 1px solid black;"
                                    id="inputEmail" name="email" value="<?= $data['email']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputUsername" class="col-sm-3 me-0 col-form-label">Username :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;"
                                    id="inputUsername" name="username" value="<?= $data['username']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputPassword" class="col-sm-3 me-0 col-form-label">Password :</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" style="border: 1px solid black;"
                                    id="inputPassword" name="password" value="<?= $data['password']; ?>">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputKPassword" class="col-sm-3 me-0 col-form-label">Konfirmasi Password
                                :</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" style="border: 1px solid black;"
                                    id="inputKPassword" name="password2" value="<?= $data['password']; ?>">
                            </div>
                        </div>
                        <div class="mb-4 mt-2 row ms-5">
                            <label for="profil" class="col-form-label">Foto Profil</label>
                            <div class="col-sm-3">
                                <img src="../image/<?= $data['foto']; ?>" class="img-preview" style="width: 70px;">
                                <?php if ($data['foto'] != 'default.png'): ?>
                                    <a class="btn btn-sm btn-outline-danger" id="delete"
                                        onclick="hapusFoto(<?= $data['iduser']; ?>)">Hapus Foto</a>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" style="border: 1px solid black;" id="profil"
                                        name="foto" onchange="previewImg()">
                                </div>
                                <label for="foto" class="foto">*kosongkan jika tidak ingin mengganti foto</label>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-2 me-0">
                                <a href="../admin/data_admin.php" class="btn btn-secondary">Kembali
                                </a>
                            </div>
                            <div class="col-sm-2 ms-0 p-0">
                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script>
            function previewImg() {
                const profil = document.querySelector('#profil');
                const imgPreview = document.querySelector('.img-preview');

                const fileProfil = new FileReader();
                fileProfil.readAsDataURL(profil.files[0]);

                fileProfil.onload = function (e) {
                    imgPreview.src = e.target.result;
                }
            }

            function hapusFoto(id) {
                // Menampilkan Sweet Alert dengan tombol Yes dan No
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus foto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
                        $.ajax({
                            url: '../controller/user.php',
                            type: 'POST',
                            data: {
                                action: 'hapus_foto',
                                id: id
                            },
                            success: function (response) {
                                // Menampilkan pesan sukses jika data berhasil dihapus 
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Foto Profil Berhasil Dihapus!',
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        document.location.href = 'data_admin.php';
                                    }
                                })
                            },
                            error: function (xhr, status, error) {
                                // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Terjadi kesalahan dalam menghapus data: ' + error,
                                    icon: 'error'
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        // Menampilkan pesan jika tombol No diklik
                        Swal.fire('Batal', 'Penghapusan data dibatalkan', 'info');
                    }
                });
            }
        </script>
</body>

</html>

<?php
if (isset($_POST['update'])) {
    if (update($_POST) > 0) {

        $_SESSION["berhasil"] = "Data Pengguna Berhasil Diubah!";

        echo "
              <script>
                document.location.href='../admin/data_admin.php';
              </script>
          ";
    } else {
        echo "<script>
                Swal.fire(
                    'Gagal!',
                    'Data Pengguna Gagal Diubah',
                    'error'
                )
            </script>";
        exit();
    }
}
?>