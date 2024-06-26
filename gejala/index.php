<?php
session_start();
require_once '../controller/gejala.php';

$gejala = query("SELECT * FROM gejala ORDER BY CAST(SUBSTRING(kode_gejala, 2) AS UNSIGNED)");
$skala  = query("SELECT skala FROM tp_kepribadian GROUP BY skala ORDER BY skala ASC");

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
                    <h4 class="text-center">Manajemen Data Gejala</h4>
                    <div class="ms-3 mt-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saran">Tambah Data Gejala</button>
                    </div>

                    <div class="tabel mt-4 mx-3">
                        <table id="example" class="table table-hover text-center">
                            <thead>
                                <tr class="table-secondary">
                                    <th class="text-center" scope="col">NO</th>
                                    <th class="text-center" scope="col">TIPE KEPRIBADIAN</th>
                                    <th class="text-center" scope="col">KODE GEJALA</th>
                                    <th class="text-center" scope="col">GEJALA</th>
                                    <th class="text-center" scope="col">NILAI PAKAR</th>
                                    <th class="text-center" scope="col" style="width: 130px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($gejala as $g):
                                    $id_kepribadian = $g['id_kepribadian'];
                                    $kepribadian = query("SELECT kepribadian FROM tp_kepribadian WHERE id_kepribadian = $id_kepribadian")[0];
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $i; ?>
                                        </td>
                                        <td>
                                            <?= $kepribadian['kepribadian']; ?>
                                        </td>
                                        <td>
                                            <?= $g['kode_gejala']; ?>
                                        </td>
                                        <td>
                                            <?= $g['gejala']; ?>
                                        </td>
                                        <td>
                                            <?= $g['nilai_pakar']; ?>
                                        </td>
                                        <td>
                                            <a class="text-decoration-none"
                                                href="edit.php?id=<?= enkripsi($g['id_gejala']); ?>">
                                                <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i></button>
                                            </a>
                                            |
                                            <a class="delete bg-danger" id="delete"
                                                onclick="confirmDelete(<?= $g['relasi']; ?>)">
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

                        <div class="modal fade" id="saran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="ciriLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="ciriLabel">Pilih Tipe MBTI</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="input.php">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="kriteria" class="form-label">Pilih skala kepribadian MBTI</label>

                                                <div class="">
                                                    <select id="kriteria" class="form-select"
                                                        style="border: 1px solid black;" aria-label="Default select example"
                                                        name="skala">
                                                        <?php 
                                                            foreach ($skala as $item): 
                                                                $scale = $item['skala'];
                                                                $cari_kepribadian = query("SELECT * FROM tp_kepribadian WHERE skala = '$scale'");

                                                                $kata = [];
                                                                foreach($cari_kepribadian as $search) {
                                                                    $kata[] = $search['kepribadian'];
                                                                }
                                                        ?>
                                                            <option value="<?= $scale; ?>">
                                                                <?= $scale; ?> (<?= implode(' | ', $kata); ?>)
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Pilih</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script> -->
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });

            function confirmDelete(id) {
                // Menampilkan Sweet Alert dengan tombol Yes dan No
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus data? Seluruh data gejala yang terkai dengan data ini akan ikut terhapus',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    focusCancel: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
                        $.ajax({
                            url: '../controller/gejala.php',
                            type: 'POST',
                            data: {
                                action: 'delete',
                                id: id
                            },
                            success: function (response) {
                                // Menampilkan pesan sukses jika data berhasil dihapus 
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Data Gejala Berhasil Dihapus!',
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