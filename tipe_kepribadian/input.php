<?php 
    session_start();
    require_once '../controller/kepribadian.php';
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
                    <h4 class="text-center">Manajemen Tipe Kepribadian</h4>

                    <form method="post" action="">
                        <div class="mb-3 mt-5 row ms-5">
                            <label for="inputName" class="col-sm-3 me-0 col-form-label">Kode</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;" id="inputName"
                                    name="kode_kepribadian" readonly value="<?= kode(); ?>">
                            </div>
                        </div>

                        <div class="mb-4 mt-2 row ms-5">
                            <label for="inputEmail" class="col-sm-3 me-0 col-form-label">Tipe Kepribadian</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;" id="inputEmail"
                                name="kepribadian">
                            </div>
                        </div>

                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputName" class="col-sm-3 me-0 col-form-label">Inisial</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;" id="inputName"
                                    name="inisial">
                            </div>
                        </div>
                        <div class="mb-4 mt-2 row ms-5">
                            <label for="skala" class="col-sm-3 me-0 col-form-label">Skala</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" style="border: 1px solid black;" id="skala"
                                    name="skala">
                            </div>
                        </div>

                        <div class="mb-4 mt-2 row ms-5">
                            <label for="deskripsi" class="col-sm-3 me-0 col-form-label">Deskripsi</label>
                            <div class="col-sm-6">
                                <textarea type="text" style="border-color: black;" class="form-control"
                                        id="deskripsi" name="deskripsi" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-2 me-0">
                                <a href="../tipe_kepribadian" class="btn btn-secondary">Kembali
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
    if (create($_POST) > 0) {
        
        create_field($_POST);

        $skala = $_POST['skala'];
        $jumlah = jumlah_data("SELECT * FROM tp_kepribadian WHERE skala = $skala");

        if($jumlah == 1) {
            create_mbti_field($_POST);
            update_all_mbti();
        }

        $_SESSION["berhasil"] = "Data Tipe Kepribadian Berhasil Ditambahkan!";

        echo "
            <script>
                document.location.href='index.php';
            </script>
        ";
    } else {
        echo "<script>
                Swal.fire(
                    'Gagal!',
                    'Data Tipe Kepribadian Gagal Ditambahkan',
                    'error'
                )
            </script>";
        exit();
    }
  }
?>