<?php
session_start();
require_once '../controller/user.php';

$data = query("SELECT * FROM user");
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
                    <div class="ms-5 mt-3">
                        <a href="../admin/input.php">
                            <button class="btn btn-primary">Tambah Data</button>
                        </a>
                    </div>

                    <div class="tabel mt-4 mx-5">
                        <table id="example" class="table table-hover text-center">
                            <thead>
                                <tr class="table-secondary">
                                    <th class="text-center" scope="col">NAMA</th>
                                    <th class="text-center" scope="col">USERNAME</th>
                                    <th class="text-center" scope="col">EMAIL</th>
                                    <th class="text-center" scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $d):
                                    $id_enkrip = enkripsi($d['iduser']);
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $d['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $d['username']; ?>
                                        </td>
                                        <td>
                                            <?= $d['email']; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="../admin/edit.php?id=<?= $id_enkrip; ?>">Edit</a> | <a
                                                class="btn btn-danger" id="delete"
                                                onclick="confirmDelete(<?= $d['iduser']; ?>)">Delete</a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });

            function confirmDelete(id) {
                // Menampilkan Sweet Alert dengan tombol Yes dan No
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
                        // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
                        $.ajax({
                            url: '../controller/user.php',
                            type: 'POST',
                            data: {
                                action: 'delete',
                                id: id
                            },
                            success: function (response) {
                                // Menampilkan pesan sukses jika data berhasil dihapus 
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Data User Berhasil Dihapus!',
                                    confirmButtonText: 'Ok',
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        document.location.href = '../admin/data_admin.php';
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
if (isset($_SESSION["berhasil"])) {
    $pesan = $_SESSION["berhasil"];

    echo "
              <script>
                Swal.fire(
                  'Berhasil!',
                  '$pesan',
                  'success'
                )
              </script>
          ";
    $_SESSION = [];
    session_unset();
    session_destroy();


} elseif (isset($_SESSION['gagal'])) {
    $pesan = $_SESSION["gagal"];

    echo "
            <script>
                Swal.fire(
                    'Gagal!',
                    '$pesan',
                    'error'
                )
            </script>
        ";
    $_SESSION = [];
    session_unset();
    session_destroy();

}
?>