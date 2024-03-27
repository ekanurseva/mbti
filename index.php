<?php
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
                <!-- sidebar -->
                <?php
                if (isset($_COOKIE['SPmbti'])) {
                    require_once('navbar/sidebar.php');
                }
                ?>
                <!-- sidebar selesai -->
                <div class="contents" style="margin-top: 70px;">
                    <div class="d-flex justify-content-center">
                        <img style="width: 800px;" src="image/1.jpg" alt="Logo MBTI">
                    </div>
                    <!-- about -->
                    <section id="about">
                        <div class="container">
                            <div class="row text-center mb-3">
                                <div class="col">
                                    <h2>About</h2>
                                </div>
                            </div>
                            <div class="fs-5 mx-4" style="margin-bottom: 100px;">
                                <p style="text-align : justify">
                                    MBTI atau Myers Briggs Type Indicator merupakan salah satu metode dalam mengetahui
                                    kepribadian manusia dalam melihat dunia dan membuat keputusan. MBTI dikembangkan
                                    oleh Katharine Cook Briggs dan putrinya Isabel Briggs Myers berdasarkan teori
                                    kepribadian dari Carl Gustav Jung yang menduga bahwa manusia mengalami dunia dengan
                                    menggunakan empat ungsi psikologis utama yaitu sensasi, intuisi, perasaan dan
                                    pemikiran.</p>
                            </div>
                        </div>
                    </section>
                    <!-- akhir about-->



                    <!-- Footer -->
                    <footer class="text-white text-center p-3" style="background: #7ebeeab0;">
                        <img src="image/UMC.png" alt="UMC" style="width: 80px;">
                        <p class="fw-bold">Universitas Muhammadiyah Cirebon <br /> Fakultas Teknik</p>
                        <p class="head-about">Created with <i class="bi bi-suit-heart-fill text-danger"></i> by <a
                                href="" class="text-white fw-bold about">Rury Afriliani
                            </a></p>
                    </footer>
                    <!-- Akhir Footer -->
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
</body>

</html>