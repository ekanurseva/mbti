<!-- INDEX HASIL -->

<?php
require_once '../controller/hasil.php';

if (isset($_GET['key'])) {
    $nama = dekripsi($_GET['key']);
    $data = query("SELECT * FROM hasil WHERE nama = '$nama' AND id_hasil = (SELECT MAX(id_hasil) FROM hasil WHERE nama = '$nama')")[0];
} elseif (isset($_GET['id'])) {
    $id = dekripsi($_GET['id']);
    $data = query("SELECT * FROM hasil WHERE id_hasil = $id")[0];
} else {
    echo "
        <script>
            document.location.href='../index.php';
        </script>
    ";
}

$hasil_cf = hasil_cf($data);
$hasil_bayes = hasil_bayes($data);
$mbti = query("SELECT * FROM tipe_mbti WHERE nama_mbti = '$hasil_cf'")[0];
$id_mbti = $mbti['id_tpmbti'];

$data_ciri = query("SELECT * FROM ciri_mbti WHERE id_tpmbti = $id_mbti");
$data_saran = query("SELECT * FROM saran_mbti WHERE id_tpmbti = $id_mbti");

$data_kepribadian = query("SELECT * FROM tp_kepribadian");
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
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="content">
        <?php
        require_once('../navbar/navbar_inside.php');
        ?>
        <div class="main-container m-0">
            <div class="d-flex">
                <?php
                if (isset($_COOKIE['SPmbti'])) {
                    require_once('../navbar/sidebar_inside.php');
                }
                ?>
                <div class="contents" style="margin-top: 75px;">
                    <div class="d-flex justify-content-center mb-4">
                        <h3 class="fw-bold">Hasil Tes MBTI</h3>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 p-3">
                                <div class="fw-bold mb-2">
                                    <label for="Nama" class="text-dark">Nama :
                                        <?= $data['nama']; ?>
                                    </label>
                                </div>
                                <div class="fw-bold">
                                    <label for="Nama" class="text-dark">Umur :
                                        <?= $data['umur']; ?> tahun
                                    </label>
                                </div>

                                <div class="box2 mt-4">
                                    <div class="text-dark p-2">
                                        <label for="" class="fw-bold">Ciri-Ciri :</label>
                                        <ul>
                                            <?php foreach ($data_ciri as $dc): ?>
                                                <li>
                                                    <?= $dc['ciri']; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="box2 mt-4">
                                    <div class="text-dark p-2">
                                        <label for="" class="fw-bold">Saran Pengembangan untuk tipe
                                            <b>
                                                <?= $hasil_cf; ?>
                                            </b> :
                                        </label>
                                        <ul>
                                            <?php foreach ($data_saran as $ds): ?>
                                                <li>
                                                    <?= $ds['saran']; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="box2">
                                            <div class="text-center">
                                                <div class="fw-bold">
                                                    <h5 class="fw-bold">Certainty Factor</h5>
                                                </div>
                                                <div class="mt-2 fw-bold">
                                                    <label for="">
                                                        <?= $hasil_cf; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box2 mt-4">
                                            <div class="text-dark">
                                                <ul class="p-2 m-0">
                                                    <?php foreach ($data_kepribadian as $dk):
                                                        $nama_kepribadian = strtolower(str_replace(" ", "_", $dk['kepribadian']));
                                                        $nama_kepribadian .= "_cf";
                                                        ?>
                                                        <li style="list-style: none;">
                                                            <?= $dk['kepribadian']; ?> :
                                                            <?= $data[$nama_kepribadian]; ?>%
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="box2">
                                            <div class="text-center">
                                                <div class="fw-bold">
                                                    <h5 class="fw-bold">Teorema Bayes</h5>
                                                </div>
                                                <div class="mt-2 fw-bold">
                                                    <label for="">
                                                        <?= $hasil_bayes; ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box2 mt-4">
                                            <div class="text-dark">
                                                <ul class="p-2 m-0">
                                                    <?php foreach ($data_kepribadian as $dakep):
                                                        $nama_kepribadian = strtolower(str_replace(" ", "_", $dakep['kepribadian']));
                                                        $nama_kepribadian .= "_bayes";
                                                        ?>
                                                        <li style="list-style: none;">
                                                            <?= $dakep['kepribadian']; ?> :
                                                            <?= $data[$nama_kepribadian]; ?>%
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12">
                                    <div class="box2 mt-4">
                                        <div class="text-dark p-2">
                                            <label for="" class="fw-bold">Kesimpulan :</label>
                                            <div class="p-3">
                                                Berdasarkan gejala kepribadian (pertanyaan), nilai pakar, dan nilai user
                                                yang mungkin sama antara kedua metode yaitu metode certainty factor dan
                                                teorema bayes menunjukan bahwa pengguna memiliki tipe MBTI
                                                <b>
                                                    <?= $hasil_cf; ?>
                                                </b>.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-flex justify-content-end mt-4 mb-5">
                                    <div class="col-sm-3">
                                        <a class="text-decoration-none btn btn-info" href="../print.php?id_hasil=<?= enkripsi($data['id_hasil']); ?>" target="_blank">
                                            <span><i class="bi bi-printer me-2"></i>Print</span>
                                        </a>
                                    </div>

                                        

                                        <div class="col-sm-2" style="font-size: 13px;">
                                            <div class="d-flex justify-content-end">
                                                <a type="button" href="../index.php" class="btn"
                                                    style="background: none; border: solid 1px black;">Selesai</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
</body>

</html>