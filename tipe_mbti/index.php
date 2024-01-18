<?php
session_start();
require_once '../controller/tipe.php';

$tipe_mbti = query("SELECT * FROM tipe_mbti");
$ciri = query("SELECT * FROM ciri_mbti ORDER BY id_tpmbti ASC");
$saran = query("SELECT * FROM saran_mbti ORDER BY id_tpmbti ASC");
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
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="../tipe_mbti/input.php">
                                    <button class="btn btn-primary">Tambah Tipe MBTI</button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ciri">
                                    Tambah Ciri-Ciri
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saran">
                                    Tambah Saran Pengembangan
                                </button>
                            </div>

                        </div>
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


                    <div class="box2 mx-3 mt-5">
                        <h5 class="text-center fw-bold">Tabel Ciri-Ciri Tipe MBTI</h5>
                        <hr>
                        <div class="tabel mx-2">
                            <table id="example2" class="table table-hover text-center">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Tipe MBTI</th>
                                        <th class="text-center" scope="col">Ciri-Ciri</th>
                                        <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $j = 1; foreach ($ciri as $ci):
                                        $idmbti = $ci['id_tpmbti'];
                                        $nama_mbti = query("SELECT * FROM tipe_mbti WHERE id_tpmbti = $idmbti")[0];
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $j; ?>
                                            </td>
                                            <td>
                                                <?= $nama_mbti['nama_mbti']; ?>
                                            </td>
                                            <td>
                                                <?= $ci['ciri']; ?>
                                            </td>
                                            <td>
                                                <a class="text-decoration-none"
                                                    href="edit_ciri.php?id=<?= enkripsi($ci['id_ciri']); ?>">
                                                    <button class="btn btn-primary"><i
                                                            class="bi bi-pencil-fill"></i></button>
                                                </a>
                                                |
                                                <a class="delete bg-danger" id="delete"
                                                    onclick="deleteCiri(<?= $ci['id_ciri']; ?>)">
                                                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $j++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="box2 mx-3 mt-5">
                        <h5 class="text-center fw-bold">Tabel Saran Pengembangan Tipe MBTI</h5>
                        <hr>
                        <div class="tabel mx-2">
                            <table id="example3" class="table table-hover text-center">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Tipe MBTI</th>
                                        <th class="text-center" scope="col">Saran Pengembangan</th>
                                        <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $k = 1; foreach ($saran as $sar):
                                        $idmbti = $sar['id_tpmbti'];
                                        $nama_mbti = query("SELECT * FROM tipe_mbti WHERE id_tpmbti = $idmbti")[0];
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $k; ?>
                                            </td>
                                            <td>
                                                <?= $nama_mbti['nama_mbti']; ?>
                                            </td>
                                            <td>
                                                <?= $sar['saran']; ?>
                                            </td>
                                            <td>
                                                <a class="text-decoration-none"
                                                    href="edit_saran.php?id=<?= enkripsi($sar['id_saran']); ?>">
                                                    <button class="btn btn-primary"><i
                                                            class="bi bi-pencil-fill"></i></button>
                                                </a>
                                                |
                                                <a class="delete bg-danger" id="delete"
                                                    onclick="deleteSaran(<?= $sar['id_saran']; ?>)">
                                                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $k++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Modal Input Ciri-Ciri = Pilih Tipe MBTI -->
                    <div class="modal fade" id="ciri" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="ciriLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ciriLabel">Pilih Tipe MBTI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="input_ciri.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kriteria" class="form-label">Pilih tipe MBTI untuk menambahkan
                                                ciri-ciri tipe MBTI</label>

                                            <div class="">
                                                <select id="kriteria" class="form-select"
                                                    style="border: 1px solid black;" aria-label="Default select example"
                                                    name="id_tpmbti">
                                                    <?php foreach ($tipe_mbti as $tim): ?>
                                                        <option value="<?= $tim['id_tpmbti']; ?>">
                                                            <?= $tim['nama_mbti']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="submit_ciri" class="btn btn-primary">Pilih</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Input Ciri-Ciri = Pilih Tipe MBTI Selesai -->

                    <!-- Modal Input Saran = Pilih Tipe MBTI -->
                    <div class="modal fade" id="saran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="ciriLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ciriLabel">Pilih Tipe MBTI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="input_saran.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kriteria" class="form-label">Pilih tipe MBTI untuk menambahkan
                                                saran pengembangan tipe MBTI</label>

                                            <div class="">
                                                <select id="kriteria" class="form-select"
                                                    style="border: 1px solid black;" aria-label="Default select example"
                                                    name="id_tpmbti">
                                                    <?php foreach ($tipe_mbti as $timb): ?>
                                                        <option value="<?= $timb['id_tpmbti']; ?>">
                                                            <?= $timb['nama_mbti']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="submit_saran" class="btn btn-primary">Pilih</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Input Saran = Pilih Tipe MBTI Selesai -->
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
            $(document).ready(function () {
                $('#example2').DataTable();
            });
            $(document).ready(function () {
                $('#example3').DataTable();
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

            function deleteCiri(id) {
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
                            url: '../controller/ciri.php',
                            type: 'POST',
                            data: {
                                action: 'delete',
                                id: id
                            },
                            success: function (response) {
                                // Menampilkan pesan sukses jika data berhasil dihapus 
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Data Ciri-Ciri MBTI Berhasil Dihapus!',
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

            function deleteSaran(id) {
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
                            url: '../controller/saran.php',
                            type: 'POST',
                            data: {
                                action: 'delete',
                                id: id
                            },
                            success: function (response) {
                                // Menampilkan pesan sukses jika data berhasil dihapus 
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Data Saran MBTI Berhasil Dihapus!',
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