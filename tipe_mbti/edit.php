<?php 
    session_start();
    require_once '../controller/tipe.php';

    $skala = query("SELECT DISTINCT skala FROM tp_kepribadian");

    $id = dekripsi($_GET['id']);
    $data = query("SELECT * FROM tipe_mbti WHERE id_tpmbti = $id")[0];
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
        require_once('../navbar/navbar.php');
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

                    <form method="post" action="">
                        <input type="hidden" name="id_tpmbti" value="<?= $data['id_tpmbti']; ?>">
                        <div class="mb-3 mt-5 row ms-5">
                            <label for="inputName" class="col-sm-3 me-0 col-form-label">Kode</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;" id="inputName"
                                    name="kode" value="<?= $data['kode']; ?>" disabled>
                            </div>
                        </div>

                        <?php 
                            foreach($skala as $s) :
                                $nilai = $s['skala'];
                        ?>
                            <input type="hidden" name="old_<?= $nilai; ?>" value="<?= $data["skala_" . $nilai]; ?>">
                            <div class="mb-4 mt-2 row ms-5">
                                <label for="inputEmail" class="col-sm-3 me-0 col-form-label">Tipe Kepribadian Skala <?= $nilai; ?></label>
                                <div class="col-sm-6">
                                    <select class="boxc form-control" style="border-color: black;" name="skala_<?= $nilai;?>"
                                        require>
                                        <option hidden selected value="">--Pilih Gejala--</option>
                                        <?php
                                            $kepribadian = query("SELECT * FROM tp_kepribadian WHERE skala = $nilai");
                                            foreach ($kepribadian as $kep):
                                                ?>
                                                <option value="<?php echo $kep['id_kepribadian'] ?>" <?= $kep['id_kepribadian'] == $data['skala_' . $nilai] ? 'selected' : '' ?>><?php echo $kep['kepribadian'] ?> (<?= $kep['inisial']; ?>)
                                                </option>
                                                <?php
                                            endforeach
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <div class="row justify-content-end">
                            <div class="col-sm-2 me-0">
                                <a href="../tipe_mbti" class="btn btn-secondary">Kembali
                                </a>
                            </div>
                            <div class="col-sm-2 ms-0 p-0">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
</body>

</html>

<?php 
  if(isset($_POST['submit'])) {
    if (update($_POST) > 0) {
      $_SESSION["berhasil"] = "Data Tipe MBTI Berhasil Diubah!";

      echo "
          <script>
            document.location.href='index.php';
          </script>
      ";
    } else {
        echo "<script>
                Swal.fire(
                    'Gagal!',
                    'Data Tipe MBTI Gagal Diubah',
                    'error'
                )
            </script>";
        exit();
    }
  }
?>