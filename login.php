<?php
session_start();
require_once 'controller/user.php';

if (isset($_COOKIE['SPmbti'])) {
    echo "<script>
            document.location.href='user/index.php';
          </script>";
    exit;
}

if (isset($_POST["submit_login"])) {
    if (login($_POST) == 1) {
        $error = true;
    }
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once('navbar/navbar_user.php');
    ?>

    <!--form login-->
    <div class="content d-flex justify-content-center">
        <div class="d-flex align-items-center">
            <div class="box container-sm p-4">
                <div class="text-center mb-2">
                    <h5 class="text-secondary">Welcome, Please Login</h5>
                </div>
                <hr class="mb-3">

                <div class="mb-3">
                    <h4>Login</h4>
                </div>
                <form method="post" action="">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            Username/Password Salah
                        </div>
                    <?php endif; ?>
                    <div class="mb-3 fs-5">
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="mb-4 fs-5">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="mb-5" style="font-size: 13px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="show">
                            <label class="form-check-label" for="show">
                                Show Password
                            </label>
                        </div>
                    </div>

                    <div class="row d-flex align-items-center">
                        <div class="col-sm-4">
                            <button type="submit" name="submit_login" class="btn btn-primary px-4">Login</button>
                        </div>

                        <div class="col-sm-8" style="font-size: 15px;">
                            <div class="d-flex justify-content-end">
                                <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Lupa Password?
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal Forgot Password = Input Email -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel">Masukkan Email</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="sendemail.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="email" class="form-label text-dark">Masukkan email yang
                                        terdaftar</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Pilih</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Forgot Password = Input Email Selesai -->
        </div>
    </div>
    <!--akhir form-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
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