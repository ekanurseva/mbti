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
                    <h4 class="text-center">Manajemen Tipe MBTI</h4>
                    <div class="ms-5 mt-5">
                        <div class="row">
                            <div class="col-sm-2">
                                <a href="../tipe_mbti/input.php">
                                    <button class="btn btn-primary">Tambah Tipe MBTI</button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ciri">
                                    Tambah Ciri-Ciri
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saran">
                                    Tambah Saran Pengembangan
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="box2 mx-5 mt-5">
                        <h5 class="text-center fw-bold">Tabel Tipe MBTI</h5>
                        <hr>
                        <div class="tabel mx-2">
                            <table id="example" class="table table-hover text-center">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center" scope="col">Kode</th>
                                        <th class="text-center" scope="col">Tipe MBTI</th>
                                        <th class="text-center" scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            T1
                                        </td>
                                        <td>
                                            ESTP
                                        </td>
                                        <td>
                                            <a class="text-decoration-none" href="../edit.php?id=<?= $id_enkrip; ?>">
                                                <button class="btn btn-primary"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                            </a>
                                            |
                                            <a class="delete bg-danger" id="delete"
                                                onclick="confirmDelete(<?= $d['iduser']; ?>)">
                                                <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="box2 mx-5 mt-5">
                        <h5 class="text-center fw-bold">Tabel Ciri-Ciri Tipe MBTI</h5>
                        <hr>
                        <div class="tabel mx-2">
                            <table id="example" class="table table-hover text-center">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center" scope="col">Tipe MBTI</th>
                                        <th class="text-center" scope="col">Ciri-Ciri</th>
                                        <th class="text-center" scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            ESTP
                                        </td>
                                        <td>
                                            Blablabla
                                        </td>
                                        <td>
                                            <a class="text-decoration-none"
                                                href="../edit_ciri.php?id=<?= $id_enkrip; ?>">
                                                <button class="btn btn-primary"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                            </a>
                                            |
                                            <a class="delete bg-danger" id="delete"
                                                onclick="confirmDelete(<?= $d['iduser']; ?>)">
                                                <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="box2 mx-5 mt-5">
                        <h5 class="text-center fw-bold">Tabel Saran Pengembangan Tipe MBTI</h5>
                        <hr>
                        <div class="tabel mx-2">
                            <table id="example" class="table table-hover text-center">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center" scope="col">Tipe MBTI</th>
                                        <th class="text-center" scope="col">Saran Pengembangan</th>
                                        <th class="text-center" scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            ESTP
                                        </td>
                                        <td>
                                            Sarannn
                                        </td>
                                        <td>
                                            <a class="text-decoration-none"
                                                href="../edit_saran.php?id=<?= $id_enkrip; ?>">
                                                <button class="btn btn-primary"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                            </a>
                                            |
                                            <a class="delete bg-danger" id="delete"
                                                onclick="confirmDelete(<?= $d['iduser']; ?>)">
                                                <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!-- Modal Input Ciri-Ciri = Pilih Tipe MBTI -->
                    <div class="modal fade" id="saran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="ciriLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ciriLabel">Pilih Tipe MBTI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="input_ciri.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kriteria" class="form-label">Pilih tipe MBTI untuk menambahkan
                                                ciri-ciri tipe MBTI</label>

                                            <div class="">
                                                <select id="kriteria" class="form-select"
                                                    style="border: 1px solid black;" aria-label="Default select example"
                                                    name="kriteria">
                                                    <?php foreach ($krit as $ink): ?>
                                                        <option value="<?= $ink['idkriteria']; ?>">
                                                            <?= $ink['kode_kriteria']; ?> - <?= $ink['nama_kriteria']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Pilih</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Input Ciri-Ciri = Pilih Tipe MBTI Selesai -->

                    <!-- Modal Input Saran = Pilih Tipe MBTI -->
                    <div class="modal fade" id="ciri" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="ciriLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="ciriLabel">Pilih Tipe MBTI</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form action="input_saran.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="kriteria" class="form-label">Pilih tipe MBTI untuk menambahkan
                                                saran pengembangan tipe MBTI</label>

                                            <div class="">
                                                <select id="kriteria" class="form-select"
                                                    style="border: 1px solid black;" aria-label="Default select example"
                                                    name="kriteria">
                                                    <?php foreach ($krit as $ink): ?>
                                                        <option value="<?= $ink['idkriteria']; ?>">
                                                            <?= $ink['kode_kriteria']; ?> - <?= $ink['nama_kriteria']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Pilih</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Input Saran = Pilih Tipe MBTI Selesai -->
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#example').DataTable();
            });
        </script>
</body>

</html>