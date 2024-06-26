<?php
require_once 'controller/hasil.php';

$relasi = query("SELECT relasi FROM gejala GROUP BY relasi");

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
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="content">
        <?php
        require_once('navbar/navbar.php');
        ?>
        <div class="main-container m-0">
            <div class="d-flex">

                <?php
                if (isset($_COOKIE['SPmbti'])) {
                    require_once('navbar/sidebar.php');
                }
                ?>
                <div class="contents" style="margin: 75px 0; padding: 10px 40px;">

                    <form method="post" action="">
                        <input type="hidden" name="nama" value="<?= $_GET['nama']; ?>">
                        <input type="hidden" name="nim" value="<?= $_GET['nim']; ?>">
                        <input type="hidden" name="jk" value="<?= $_GET['jenis_kelamin']; ?>">
                        <input type="hidden" name="angkatan" value="<?= $_GET['angkatan']; ?>">
                        <input type="hidden" name="prodi" value="<?= $_GET['prodi']; ?>">
                        <input type="hidden" name="umur" value="<?= $_GET['umur']; ?>">
                        <h4 class="text-center fw-bold" style="color: black;">Seberapa yakin
                            <?= $_GET['nama']; ?> (
                            <?= $_GET['umur']; ?> tahun) mengalami/merasakan
                            gejala di bawah ini.
                        </h4>
                        <div class="row mt-5">
                            <?php
                            $i = 1;
                            foreach ($relasi as $rel):
                                $relasi_now = $rel['relasi'];
                                $pertanyaan = query("SELECT * FROM gejala WHERE relasi = '$relasi_now'");

                                if (count($pertanyaan) == 2):
                                    ?>
                                            <div class="col-6">
                                                <h6 class="m-0 fw-medium">
                                                    <div class="row">
                                                        <div class="col-sm-1 me-0" style="width: 7%;">
                                                            <?= $i; ?>.
                                                        </div>
                                                        <div class="col-sm-11 ms-0 p-0">
                                                            <?= $pertanyaan[0]['gejala']; ?>
                                                        </div>
                                                    </div>
                                                </h6>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="1" id="<?= $pertanyaan[0]['kode_gejala']; ?>_1" name="<?= $pertanyaan[0]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[0]['kode_gejala']; ?>_1">
                                                        Sangat Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.8" id="<?= $pertanyaan[0]['kode_gejala']; ?>_2" name="<?= $pertanyaan[0]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[0]['kode_gejala']; ?>_2">
                                                        Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.6" id="<?= $pertanyaan[0]['kode_gejala']; ?>_3" name="<?= $pertanyaan[0]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[0]['kode_gejala']; ?>_3">
                                                        Cukup Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.4" id="<?= $pertanyaan[0]['kode_gejala']; ?>_4" name="<?= $pertanyaan[0]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[0]['kode_gejala']; ?>_4">
                                                        Kurang Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check mb-4">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.2" id="<?= $pertanyaan[0]['kode_gejala']; ?>_5" name="<?= $pertanyaan[0]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[0]['kode_gejala']; ?>_5">
                                                        Tidak tahu
                                                    </label>
                                                </div>
                                        
                                            </div>
                                    
                                            <div class="col-6">
                                                <h6 class="m-0 fw-medium">
                                                    <div class="row">
                                                        <div class="col-sm-11 ms-0 p-0">
                                                            <?= $pertanyaan[1]['gejala']; ?>
                                                        </div>
                                                    </div>
                                                </h6>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="1" id="<?= $pertanyaan[1]['kode_gejala']; ?>_1" name="<?= $pertanyaan[1]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[1]['kode_gejala']; ?>_1">
                                                        Sangat Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.8" id="<?= $pertanyaan[1]['kode_gejala']; ?>_2" name="<?= $pertanyaan[1]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[1]['kode_gejala']; ?>_2">
                                                        Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.6" id="<?= $pertanyaan[1]['kode_gejala']; ?>_3" name="<?= $pertanyaan[1]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[1]['kode_gejala']; ?>_3">
                                                        Cukup Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.4" id="<?= $pertanyaan[1]['kode_gejala']; ?>_4" name="<?= $pertanyaan[1]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[1]['kode_gejala']; ?>_4">
                                                        Kurang Yakin
                                                    </label>
                                                </div>
                                                <div class="form-check mb-4">
                                                    <input class="form-check-input ms-1 me-2" style="border: solid 1px black;" type="radio"
                                                        value="0.2" id="<?= $pertanyaan[1]['kode_gejala']; ?>_5" name="<?= $pertanyaan[1]['kode_gejala']; ?>"
                                                        required>
                                                    <label class="form-check-label" for="<?= $pertanyaan[1]['kode_gejala']; ?>_5">
                                                        Tidak tahu
                                                    </label>
                                                </div>
                                        
                                            </div>
                                        <hr>
                                    <?php
                                    $i++;
                                endif;
                            endforeach;
                            ?>
                        </div>

                        <div class="submit text-center pt-4 btn-long">
                            <button type="submit" class="fw-medium btn btn-primary" name="submit">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
                </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous">
                </script>
            <script>
                <?php foreach ($relasi as $item) {
                    $relasi_now = $item['relasi'];
                    $pertanyaan = query("SELECT * FROM gejala WHERE relasi = '$relasi_now'");

                    if (count($pertanyaan) == 2) {
                        echo "
                            const " . $pertanyaan[0]['kode_gejala'] . " = document.getElementsByName('" . $pertanyaan[0]['kode_gejala'] . "')
                            const " . $pertanyaan[1]['kode_gejala'] . " = document.getElementsByName('" . $pertanyaan[1]['kode_gejala'] . "')
        
                            " . $pertanyaan[0]['kode_gejala'] . ".forEach(element => {
                                element.addEventListener('change', function(event) {
                                    if (event.target.value == '1') {
                                        " . $pertanyaan[1]['kode_gejala'] . ".forEach(radio => {
                                            radio.checked = (radio.value === '0.2');
                                        });
                                    } else if(event.target.value == '0.8') {
                                        " . $pertanyaan[1]['kode_gejala'] . ".forEach(radio => {
                                            radio.checked = (radio.value === '0.4');
                                        });
                                    } else if(event.target.value == '0.4') {
                                        " . $pertanyaan[1]['kode_gejala'] . ".forEach(radio => {
                                            radio.checked = (radio.value === '0.8');
                                        });
                                    } else if(event.target.value == '0.2') {
                                        " . $pertanyaan[1]['kode_gejala'] . ".forEach(radio => {
                                            radio.checked = (radio.value === '1');
                                        });
                                    } else {
                                        " . $pertanyaan[1]['kode_gejala'] . ".forEach(radio => {
                                            radio.checked = (radio.value === '0.6');
                                        });
                                    }
                                });
                            });
        
                            " . $pertanyaan[1]['kode_gejala'] . ".forEach(items => {
                                items.addEventListener('change', function(event) {
                                    if (event.target.value == '1') {
                                        " . $pertanyaan[0]['kode_gejala'] . ".forEach(radios => {
                                            radios.checked = (radios.value === '0.2');
                                        });
                                    } else if(event.target.value == '0.8') {
                                        " . $pertanyaan[0]['kode_gejala'] . ".forEach(radios => {
                                            radios.checked = (radios.value === '0.4');
                                        });
                                    } else if(event.target.value == '0.4') {
                                        " . $pertanyaan[0]['kode_gejala'] . ".forEach(radios => {
                                            radios.checked = (radios.value === '0.8');
                                        });
                                    } else if(event.target.value == '0.2') {
                                        " . $pertanyaan[0]['kode_gejala'] . ".forEach(radios => {
                                            radios.checked = (radios.value === '1');
                                        });
                                    } else {
                                        " . $pertanyaan[0]['kode_gejala'] . ".forEach(radios => {
                                            radios.checked = (radios.value === '0.6');
                                        });
                                    }
                                });
                            });
                        ";
                    }
                } ?>

            </script>   
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    if (hitung($_POST) > 0) {
        echo "
                <script>
                  document.location.href='hasil/index.php?key= . " . enkripsi($_POST['nama']) . "';
                </script>
            ";
    } else {
        echo "
                <script>
                  document.location.href='index.php';
                </script>
            ";
    }

    hitung($_POST);
}
?>