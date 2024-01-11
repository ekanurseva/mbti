<?php
session_start();
require_once '../controller/user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../style.css">
    <title>Sistem Pakar Tes Kepribadian MBTI</title>
</head>

<body>

    <div class="content">
        <?php
        require_once('../navbar/navbar_admin.php');
        ?>
        <div class="main-container m-0">
            <div class="d-flex">

                <!-- sidebar -->
                <?php
                require_once('../navbar/sidebar.php');
                ?>
                <!-- sidebar selesai -->

                <div class="contents" style="margin: 75px 0; padding: 10px 40px;">
                    <h4 class="text-center">Manajemen Data Admin</h4>

                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3 mt-5 row ms-5">
                            <label for="inputName" class="col-sm-3 me-0 col-form-label">Nama :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;" id="inputName"
                                    name="nama">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputEmail" class="col-sm-3 me-0 col-form-label">Email :</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" style="border: 1px solid black;"
                                    id="inputEmail" name="email">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputUsername" class="col-sm-3 me-0 col-form-label">Username :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="border: 1px solid black;"
                                    id="inputUsername" name="username">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputPassword" class="col-sm-3 me-0 col-form-label">Password :</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" style="border: 1px solid black;"
                                    id="inputPassword" name="password">
                            </div>
                        </div>
                        <div class="mb-3 mt-2 row ms-5">
                            <label for="inputKPassword" class="col-sm-3 me-0 col-form-label">Konfirmasi Password
                                :</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" style="border: 1px solid black;"
                                    id="inputKPassword" name="password2">
                            </div>
                        </div>
                        <div class="mb-4 mt-2 row ms-5">
                            <label for="profil" class="col-form-label">Foto Profil</label>
                            <div class="col-sm-3">
                                <img src="../image/default.png" class="img-preview" style="width: 70px;">
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" style="border: 1px solid black;" id="profil"
                                        name="foto">
                                </div>
                                <label for="profil" class="foto">*kosongkan jika tidak ingin mengganti foto</label>
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-2 me-0">
                                <a href="../admin/data_admin.php" class="btn btn-secondary">Kembali
                                </a>
                            </div>
                            <div class="col-sm-2 ms-0 p-0">
                                <button type="submit" class="btn btn-primary" name="register">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

<?php
if (isset($_POST['register'])) {
    if (register_admin($_POST) > 0) {
        $_SESSION["berhasil"] = "Data Admin Berhasil Diinput!";
        echo "
            <script>
              document.location.href='../admin/data_admin.php';
            </script>
        ";
    } else {
        echo "
          <script>
              Swal.fire(
                'Gagal!',
                'Data Admin Gagal Diinput!',
                'error'
            )
          </script>
      ";
    }
}
?>