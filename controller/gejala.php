<?php 
    require_once 'main.php';

    function kode() {
        $query = "SELECT * FROM gejala";
        $kode = "";

        $jumlah = jumlah_data($query);

        if($jumlah == 0) {
            $kode = "G1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $totalP = jumlah_data("SELECT * FROM gejala WHERE kode_gejala = 'G{$i}'");

                if ($totalP == 0) {
                    $kode = "G{$i}";
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = "G{$angka}";
                }
            };
        }

        return $kode;
    }

    function relasi() {
        $query = "SELECT * FROM gejala";
        $kode = "";

        $jumlah = jumlah_data($query);

        if($jumlah == 0) {
            $kode = "1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $totalP = jumlah_data("SELECT * FROM gejala WHERE relasi = '$i'");

                if ($totalP == 0) {
                    $kode = $i;
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = $angka;
                }
            };
        }

        return $kode;
    }

    function create($data) {
        global $conn;
        $relasi = htmlspecialchars($data['relasi']);
        $berhasil = 0;

        for($i = 0; $i < count($data['id_kepribadian']); $i++) {
            try {
                $id_kepribadian = htmlspecialchars($data['id_kepribadian'][$i]);
                $kode_gejala = htmlspecialchars($data['kode_gejala'][$i]);
                $gejala = htmlspecialchars($data['gejala'][$i]);
                $nilai_pakar = htmlspecialchars($data['nilai_pakar'][$i]);
        
                if($id_kepribadian == "") {
                    echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Tipe kepribadian tidak boleh kosong',
                                'error'
                            )
                          </script>";
                    exit();
                }
        
                if($gejala == "") {
                    echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Gejala tidak boleh kosong',
                                'error'
                            )
                          </script>";
                    exit();
                }
        
                if($nilai_pakar == "") {
                    echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Nilai pakar tidak boleh kosong',
                                'error'
                            )
                          </script>";
                    exit();
                } elseif($nilai_pakar < 0 || $nilai_pakar > 1) {
                    echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Nilai pakar tidak sesuai, harus berada antara 0 dan 1',
                                'error'
                            )
                          </script>";
                    exit();
                }
        
                $query = "INSERT INTO gejala
                            VALUES
                            (NULL, '$id_kepribadian', '$kode_gejala', '$gejala', '$nilai_pakar', '$relasi')";
                mysqli_query($conn, $query);

                $berhasil++;
            } catch (\Throwable $th) {
                echo "<script>
                            Swal.fire(
                                'Gagal!',
                                '" . $th ."',
                                'error'
                            )
                          </script>";
                    exit();
            }
        }

        return $berhasil;
    }

    function update($data) {
        global $conn;

        $id = htmlspecialchars($data['id_gejala']);
        $id_kepribadian = htmlspecialchars($data['id_kepribadian']);
        $gejala = htmlspecialchars($data['gejala']);
        $nilai_pakar = htmlspecialchars($data['nilai_pakar']);

        if($id_kepribadian == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tipe kepribadian tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($gejala == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Gejala tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        if($nilai_pakar == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nilai pakar tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        } elseif($nilai_pakar < 0 || $nilai_pakar > 1) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Nilai pakar tidak sesuai, harus berada antara 0 dan 1',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "UPDATE gejala SET 
                    id_kepribadian = '$id_kepribadian',
                    gejala = '$gejala',
                    nilai_pakar = '$nilai_pakar'
                  WHERE id_gejala = '$id'
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM gejala WHERE relasi = $id");

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