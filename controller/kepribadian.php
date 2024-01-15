<?php 
    require_once 'main.php';

    function kode() {
        $query = "SELECT * FROM tp_kepribadian";
        $kode = "";

        $jumlah = jumlah_data($query);

        if($jumlah == 0) {
            $kode = "TK1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $totalP = jumlah_data("SELECT * FROM tp_kepribadian WHERE kode_kepribadian = 'TK{$i}'");

                if ($totalP == 0) {
                    $kode = "TK{$i}";
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = "TK{$angka}";
                }
            };
        }

        return $kode;
    }

    function create($data) {
        global $conn;

        $kode_kepribadian = htmlspecialchars($data['kode_kepribadian']);
        $kepribadian = htmlspecialchars($data['kepribadian']);
        $inisial = strtoupper(htmlspecialchars($data['inisial']));
        $skala = htmlspecialchars($data['skala']);
        $deskripsi = htmlspecialchars($data['deskripsi']);

        if($kepribadian == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tipe kepribadian tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } else {
            $result = mysqli_query($conn, "SELECT kepribadian FROM tp_kepribadian WHERE kepribadian = '$kepribadian'");

            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Tipe kepribadian sudah ada',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        if($inisial == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Inisial tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } else {
            $result = mysqli_query($conn, "SELECT inisial FROM tp_kepribadian WHERE inisial = '$inisial'");

            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Inisial sudah ada',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        if($skala == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Skala tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } else {
            $cari_jumlah = jumlah_data("SELECT * FROM tp_kepribadian WHERE skala = '$skala'");

            if($cari_jumlah == 2) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Skala " . $skala . " sudah terisi 2 data',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        if($deskripsi == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Deskripsi tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "INSERT INTO tp_kepribadian
                    VALUES
                    (NULL, '$kode_kepribadian', '$kepribadian', '$inisial', '$skala', '$deskripsi')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;
        $id = $data['id_kepribadian'];
        $oldkepribadian = htmlspecialchars($data['oldkepribadian']);
        $oldinisial = htmlspecialchars($data['oldinisial']);
        $oldskala = htmlspecialchars($data['oldskala']);

        $kepribadian = htmlspecialchars($data['kepribadian']);
        $inisial = strtoupper(htmlspecialchars($data['inisial']));
        $skala = htmlspecialchars($data['skala']);
        $deskripsi = htmlspecialchars($data['deskripsi']);

        if($kepribadian == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tipe kepribadian tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif($kepribadian != $oldkepribadian) {
            $result = mysqli_query($conn, "SELECT kepribadian FROM tp_kepribadian WHERE kepribadian = '$kepribadian'");

            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Tipe kepribadian sudah ada',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        if($inisial == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Inisial tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif($inisial != $oldinisial) {
            $result = mysqli_query($conn, "SELECT inisial FROM tp_kepribadian WHERE inisial = '$inisial'");

            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Inisial sudah ada',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        if($skala == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Skala tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif($skala != $oldskala) {
            $cari_jumlah = jumlah_data("SELECT * FROM tp_kepribadian WHERE skala = '$skala'");

            if($cari_jumlah == 2) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Skala " . $skala . " sudah terisi 2 data',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        if($deskripsi == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Deskripsi tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "UPDATE tp_kepribadian SET 
                    kepribadian = '$kepribadian',
                    inisial = '$inisial',
                    skala = '$skala',
                    deskripsi = '$deskripsi'
                  WHERE id_kepribadian = '$id'
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM tp_kepribadian WHERE id_kepribadian = $id");

        $deleted = true;

        return $deleted;
    }

    // Mengecek apakah ada permintaan penghapusan data
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        // Mengambil nilai parameter id dari data POST
        $id = $_POST['id'];

        // Memanggil fungsi delete untuk menghapus data
        $status = delete($id);

        // Mengirimkan respons ke JavaScript
        if ($status) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
?>