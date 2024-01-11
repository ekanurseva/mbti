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
                    <h4 class="text-center">Manajemen Data Rule</h4>
                    <div class="ms-5 mt-3">
                        <a href="../rule/input.php">
                            <button class="btn btn-primary">Tambah Data Rule</button>
                        </a>
                    </div>

                    <div class="tabel mt-4 mx-5">
                        <table id="example" class="table table-hover text-center">
                            <thead>
                                <tr class="table-secondary">
                                    <th class="text-center" scope="col">KODE GEJALA</th>
                                    <th class="text-center" scope="col">BOBOT PAKAR</th>
                                    <th class="text-center" scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        G1
                                    </td>
                                    <td>
                                        0.7
                                    </td>
                                    <td>
                                        <a class="text-decoration-none" href="../edit.php?id=<?= $id_enkrip; ?>">
                                            <button class="btn btn-primary"><i class="bi bi-pencil-fill"></i></button>
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