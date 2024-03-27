<?php
session_start();
require_once '../controller/tipe.php';

$tipe_mbti = query("SELECT * FROM tipe_mbti");

// Dapatkan jalur skrip saat ini
$current_page = $_SERVER['REQUEST_URI'];
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
                    <h4 class="text-center">Manajemen Tipe MBTI</h4>
                    <div class="ms-3 mt-5">
                        <a href="../tipe_mbti/input.php">
                            <button class="btn btn-primary">Tambah Tipe MBTI</button>
                        </a>
                    </div>

                    <div class="box2 mx-3 mt-5">
                        <h5 class="text-center fw-bold">Tabel Tipe MBTI</h5>
                        <hr>
                        <div class="tabel mx-2">
                            <table id="example" class="table table-hover text-center">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Kode</th>
                                        <th class="text-center" scope="col">Tipe MBTI</th>
                                        <th class="text-center" scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tipe_mbti as $tm):
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i; ?>
                                            </td>
                                            <td>
                                                <?= $tm['kode']; ?>
                                            </td>
                                            <td>
                                                <?= $tm['nama_mbti']; ?>
                                            </td>
                                            <td>
                                                <a class="text-decoration-none"
                                                    href="edit.php?id=<?= enkripsi($tm['id_tpmbti']); ?>">
                                                    <button class="btn btn-primary"><i
                                                            class="bi bi-pencil-fill"></i></button>
                                                </a>
                                                |
                                                <a class="delete bg-danger" id="delete"
                                                    onclick="deleteTipe(<?= $tm['id_tpmbti']; ?>)">
                                                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });

            function deleteTipe(id) {
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
                            url: '../controller/tipe.php',
                            type: 'POST',
                            data: {
                                action: 'delete',
                                id: id
                            },
                            success: function (response) {
                                // Menampilkan pesan sukses jika data berhasil dihapus 
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Data Tipe MBTI Berhasil Dihapus!',
                                    icon: 'success'
                                }).then((result) => {
                                    /* Read more about isConfirmed, isDenied below */
                                    if (result.isConfirmed) {
                                        window.location.href = 'index.php';
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