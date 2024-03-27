<?php
require_once '../controller/hasil.php';

$riwayat = query("SELECT * FROM hasil ORDER BY nama");

// Dapatkan jalur skrip saat ini
$current_page = $_SERVER['REQUEST_URI'];

if (isset($_GET['cek_riwayat'])) {
    if ($_GET['cek_riwayat'] == "I") {
        $riwayat = query("SELECT * FROM hasil WHERE introvert_cf > extrovert_cf");
    } else if ($_GET['cek_riwayat'] == "E") {
        $riwayat = query("SELECT * FROM hasil WHERE introvert_cf < extrovert_cf");
    }
} else {
    $riwayat = query("SELECT * FROM hasil ORDER BY nama");
}

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
                    <h4 class="text-center">Manajemen Riwayat Pengguna</h4>

                    <div class="row mt-5">
                        <div class="col-8">
                            <form action="" method="get" id="searchForm">
                                <div class="input-group">
                                    <select class="form-select" aria-label="Default select example"
                                        style="border: solid black 1px" name="cek_riwayat">
                                        <option hidden selected>Pilih Hasil Diagnosis</option>
                                        <option value="All">All Data</option>
                                        <option value="I">Introvert</option>
                                        <option value="E">Extrovert</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col-4">
                            <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                data-bs-target="#cetak">
                                Cetak Laporan
                            </button>
                        </div>
                    </div>

                    <div class="tabel mt-4 mx-3">
                        <table id="example" class="table table-hover text-center">
                            <thead>
                                <tr class="table-secondary">
                                    <th class="text-center" scope="col">NO</th>
                                    <th class="text-center" scope="col">NAMA</th>
                                    <th class="text-center" scope="col">TIPE MBTI</th>
                                    <th class="text-center" scope="col">TANGGAL</th>
                                    <th class="text-center" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($riwayat as $r):
                                    $id_riwayat = $r['id_hasil'];

                                    $cf = hasil_cf($r);
                                    $bayes = hasil_bayes($r);

                                    $tanggal = $r['tanggal_tes'];
                                    $waktu = date('H.i.s || d F Y', strtotime($tanggal));
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $i; ?>
                                        </td>
                                        <td>
                                            <?= $r['nama']; ?>
                                        </td>
                                        <td>
                                            <?= $cf; ?> (CF) |
                                            <?= $bayes; ?> (Bayes)
                                        </td>
                                        <td>
                                            <?= $waktu; ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="../hasil/index.php?id=<?= enkripsi($id_riwayat); ?>">
                                                DETAIL
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

            <!-- Modal Cetak -->
            <div class="modal fade modal-dialog-scrollable" id="cetak" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Tipe Kepribadian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="selectForm">
                            <div class="modal-body">
                                <p>Pilih Laporan Tipe Kepribadian Yang Ingin di Cetak</p>
                                <select id="selectOption" name="option" class="form-select"
                                    aria-label="Default select example" style="border: 1px solid black;">
                                    <option value="All">Semua Data</option>
                                    <option value="I">Introvert</option>
                                    <option value="E">Extrovert</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Pilih</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Cetak selesai -->


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

            $(document).ready(function () {
                $('select[name="cek_riwayat"]').on('change', function () {
                    $('#searchForm').submit();
                });
            });


            document.getElementById('selectForm').addEventListener('submit', function (event) {
                event.preventDefault();
                var selectedOption = document.getElementById('selectOption').value;

                // Kirim permintaan Ajax ke server
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../cetak.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        // Tangani respons dari server
                        var pdfData = xhr.responseText;
                        // Tampilkan dokumen PDF kepada pengguna
                        var pdfWindow = window.open('', '_blank');
                        pdfWindow.document.write('<embed width="100%" height="100%" src="data:application/pdf;base64,' + pdfData + '" type="application/pdf" />');
                    }
                };
                xhr.send('option=' + selectedOption);
            });

        </script>
</body>

</html>