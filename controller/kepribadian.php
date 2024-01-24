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

    function create_field($data) {
        global $conn;
        $kode = htmlspecialchars($data['kepribadian']);
        $kode_kecil = strtolower(str_replace(" ", "_", $kode));
        $cf = $kode_kecil . "_cf";
        $bayes = $kode_kecil . "_bayes";

        mysqli_query($conn, "ALTER TABLE hasil ADD $cf DOUBLE DEFAULT 0, ADD $bayes DOUBLE DEFAULT 0");

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

    function update_field($data) {
        global $conn;

        $oldkepribadian = htmlspecialchars($data['oldkepribadian']);
        $kode = htmlspecialchars($data['kepribadian']);
        
        if($kode != $oldkepribadian) {
            $kode_kecil = strtolower(str_replace(" ", "_", $kode));
            $oldkode_kecil = strtolower(str_replace(" ", "_", $oldkepribadian));
            $cf_old = $oldkode_kecil . "_cf";
            $bayes_old = $oldkode_kecil . "_bayes";
            $cf = $kode_kecil . "_cf";
            $bayes = $kode_kecil . "_bayes";

            mysqli_query($conn, "ALTER TABLE hasil CHANGE $cf_old $cf DOUBLE DEFAULT 0, CHANGE $bayes_old $bayes DOUBLE DEFAULT 0");
        }
    }

    function update_all_mbti() {
        global $conn;

        $data_mbti = query("SELECT * FROM tipe_mbti");
        $skala = query("SELECT DISTINCT skala FROM tp_kepribadian");

        foreach($data_mbti as $dm) {
            $id_mbti = $dm['id_tpmbti'];
            $mbti = "";
            foreach($skala as $ska) {
                $cari = $dm["skala_" . $ska['skala']] ;

                $cari_data = query("SELECT inisial FROM tp_kepribadian WHERE id_kepribadian = '$cari'")[0];

                $mbti .= $cari_data['inisial'];
            }

            $query = "UPDATE tipe_mbti SET 
                    nama_mbti = '$mbti'
                  WHERE id_tpmbti = '$id_mbti'
                ";
            mysqli_query($conn, $query);
        }
    }

    function update_mbti($data) {
        global $conn;

        $id = $data['id_kepribadian'];
        $skala = "skala_" . $data['skala'];

        $data_mbti = query("SELECT * FROM tipe_mbti WHERE $skala = $id");

        $data_skala = query("SELECT DISTINCT skala FROM tp_kepribadian");

        foreach($data_mbti as $dm) {
            $id_mbti = $dm['id_tpmbti'];
            $mbti = "";
            foreach($data_skala as $ska) {
                $cari = $dm["skala_" . $ska['skala']] ;

                $cari_data = query("SELECT inisial FROM tp_kepribadian WHERE id_kepribadian = '$cari'")[0];

                $mbti .= $cari_data['inisial'];
            }

            $query = "UPDATE tipe_mbti SET 
                    nama_mbti = '$mbti'
                  WHERE id_tpmbti = '$id_mbti'
                ";
            mysqli_query($conn, $query);
        }
    }

    function delete($id)
    {
        global $conn;
        $data = query("SELECT * FROM tp_kepribadian WHERE id_kepribadian = $id")[0];
        
        $kode_kecil = strtolower(str_replace(" ", "_", $data['kepribadian']));
        $cf = $kode_kecil . "_cf";
        $bayes = $kode_kecil . "_bayes";
        
        $skala = $data['skala'];
        $jumlah = jumlah_data("SELECT * FROM tp_kepribadian WHERE skala = $skala");
        $params = "skala_" . $skala;

        if($jumlah == 2) {
            $query = "UPDATE tipe_mbti SET 
                    $params = null
                WHERE $params = '$id'
                ";
            mysqli_query($conn, $query);
        } elseif($jumlah == 1) {
            $fk = "fk_mbti_" . $skala;
            
            mysqli_query($conn, "ALTER TABLE tipe_mbti DROP FOREIGN KEY $fk");
            mysqli_query($conn, "ALTER TABLE tipe_mbti DROP COLUMN $params");
        }

        mysqli_query($conn, "ALTER TABLE hasil DROP COLUMN $cf, DROP COLUMN $bayes");
        mysqli_query($conn, "DELETE FROM tp_kepribadian WHERE id_kepribadian = $id");
        
        update_all_mbti();

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
 
    function create_mbti_field($data) {
        global $conn;

        $skala = htmlspecialchars($data['skala']);
        $data_kepribadian = query("SELECT * FROM tp_kepribadian WHERE skala = $skala")[0];
        $id_skala = $data_kepribadian['id_kepribadian'];
        $nama = "skala_" . $skala;
        $fk = "fk_mbti_" . $skala;

        mysqli_query($conn, "ALTER TABLE tipe_mbti ADD $nama INT(11) DEFAULT $id_skala"); 
        mysqli_query($conn, "ALTER TABLE tipe_mbti ADD CONSTRAINT $fk FOREIGN KEY ($nama) REFERENCES tp_kepribadian(id_kepribadian) ON UPDATE CASCADE ON DELETE CASCADE");
    }
?>