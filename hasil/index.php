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
                        <h3>Hasil Tes MBTI</h3>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 p-3">
                                <div class="fw-bold mb-2">
                                    <label for="Nama" class="text-dark">Nama : Orang</label>
                                </div>
                                <div class="fw-bold">
                                    <label for="Nama" class="text-dark">Umur : 10 tahun</label>
                                </div>

                                <div class="box2 mt-4">
                                    <div class="text-dark p-2">
                                        <label for="" class="fw-bold">Ciri-Ciri :</label>
                                        <ul>
                                            <li>
                                                avsdyuad
                                            </li>
                                            <li>
                                                avsdyuad
                                            </li>
                                            <li>
                                                avsdyuad
                                            </li>
                                            <li>
                                                avsdyuad
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="box2 mt-4">
                                    <div class="text-dark p-2">
                                        <label for="" class="fw-bold">Saran Pengembangan :</label>
                                        <ul>
                                            <li>
                                                avsdyuad
                                            </li>
                                            <li>
                                                avsdyuad
                                            </li>
                                            <li>
                                                avsdyuad
                                            </li>
                                            <li>
                                                avsdyuad
                                            </li>
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
                                                    <label for="">INTJ</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box2 mt-4">
                                            <div class="text-dark">
                                                <ul class="p-2 m-0">
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
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
                                                    <label for="">INTJ</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="box2 mt-4">
                                            <div class="text-dark">
                                                <ul class="p-2 m-0">
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
                                                    <li style="list-style: none;">Introvert : 90.76%</li>
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
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate
                                                numquam minima eaque incidunt impedit modi explicabo alias nesciunt
                                                ipsa, eligendi rem ut! Nostrum voluptate odio iusto rem corrupti vero
                                                excepturi!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row d-flex justify-content-end mt-4 mb-5">
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-secondary">Print</button>
                                        </div>

                                        <div class="col-sm-2" style="font-size: 13px;">
                                            <div class="d-flex justify-content-end">
                                                <a type="button" href="../home" class="btn"
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