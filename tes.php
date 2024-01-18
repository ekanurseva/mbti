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

                <div class="contents" style="margin: 75px 0; padding: 10px 40px;">

                    <form method="post" action="">
                        <h4 class="text-center fw-bold" style="color: black;">Seberapa yakin anda mengalami/merasakan
                            gejala di bawah ini.</h4>
                        <div class="row mt-5">
                            <div class="col-6">
                                <h6 class="m-0 fw-medium">
                                    1. Pertanyaan 1
                                </h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" id="1" name="gejala"
                                        required>
                                    <label class="form-check-label" for="1">
                                        Sangat Yakin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0.5" id="2" name="gejala"
                                        required>
                                    <label class="form-check-label" for="2">
                                        Yakin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" id="3" name="gejala"
                                        required>
                                    <label class="form-check-label" for="3">
                                        Cukup Yakin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0.5" id="4" name="gejala"
                                        required>
                                    <label class="form-check-label" for="4">
                                        Kurang Yakin
                                    </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" value="0.5" id="5" name="gejala"
                                        required>
                                    <label class="form-check-label" for="5">
                                        Tidak tahu
                                    </label>
                                </div>
                            </div>

                            <div class="col-6">
                                <h6 class="m-0 fw-medium">
                                    2. Pertanyaan 2
                                </h6>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" id="1" name="gejala"
                                        required>
                                    <label class="form-check-label" for="1">
                                        Sangat Yakin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0.5" id="2" name="gejala"
                                        required>
                                    <label class="form-check-label" for="2">
                                        Yakin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" id="3" name="gejala"
                                        required>
                                    <label class="form-check-label" for="3">
                                        Cukup Yakin
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="0.5" id="4" name="gejala"
                                        required>
                                    <label class="form-check-label" for="4">
                                        Kurang Yakin
                                    </label>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="radio" value="0.5" id="5" name="gejala"
                                        required>
                                    <label class="form-check-label" for="5">
                                        Tidak tahu
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="submit text-center pt-4 btn-long">
                            <a href="../hasil" class="fw-medium btn btn-primary" name="submit_hitung">
                                SUBMIT
                            </a>
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
</body>

</html>