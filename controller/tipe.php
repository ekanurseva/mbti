<?php 
    require_once '../controller/main.php';

    function kode() {
        $query = "SELECT * FROM tipe_mbti";
        $kode = "";

        $jumlah = jumlah_data($query);

        if($jumlah == 0) {
            $kode = "T1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $totalP = jumlah_data("SELECT * FROM tipe_mbti WHERE kode = 'T{$i}'");

                if ($totalP == 0) {
                    $kode = "T{$i}";
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = "T{$angka}";
                }
            };
        }

        return $kode;
    }

    function create($data) {
        global $conn;

        $kode = htmlspecialchars($data['kode']);
        $skala = query("SELECT DISTINCT skala FROM tp_kepribadian");
        $mbti = "";

        foreach($skala as $ska) {
            $id_kepribadian = $data["skala_" . $ska['skala']];
            
            if($id_kepribadian == "") {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Tipe kepribadian dengan skala " . $ska['skala'] . " tidak boleh kosong',
                            'error'
                        )
                      </script>";
                exit();
            } 

            $kepribadian = query("SELECT inisial FROM tp_kepribadian WHERE id_kepribadian = $id_kepribadian")[0];

            $mbti .= $kepribadian['inisial'];
            $hasil[] = $id_kepribadian; 
        }

        // for($i = 0; $i < count($skala); $i++) {
        //     $cek .= "skala_" . $skala[$i]['skala'] . " = '" . $data["skala_" . $skala[$i]['skala']] . "'";

        //     if($i < count($skala) - 1){
        //         $cek .= " AND ";
        //     }
        // }
    
        // $result = mysqli_query($conn, $cek);

        $result = mysqli_query($conn, "SELECT * FROM tipe_mbti WHERE nama_mbti = '$mbti'");

        if (mysqli_fetch_assoc($result)) {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Tipe MBTI sudah ada',
                        'error'
                    )
                </script>";
            exit();
        }

        $value = implode(", ", $hasil);

        $query = "INSERT INTO tipe_mbti
                    VALUES
                    (NULL, '$kode', '$mbti', ";

        $query .= $value . ")";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;

        $id = $data['id_tpmbti'];
        $skala = query("SELECT DISTINCT skala FROM tp_kepribadian");
        $mbti = "";
        $beda = 0;

        foreach($skala as $ska) {
            $id_kepribadian = $data["skala_" . $ska['skala']];
            $old_skala = $data["old_" . $ska['skala']];

            if($id_kepribadian != $old_skala) {
                $beda++;
                if($id_kepribadian == "") {
                    echo "<script>
                            Swal.fire(
                                'Gagal!',
                                'Tipe kepribadian dengan skala " . $ska['skala'] . " tidak boleh kosong',
                                'error'
                            )
                          </script>";
                    exit();
                } 
            }
            

            $kepribadian = query("SELECT inisial FROM tp_kepribadian WHERE id_kepribadian = $id_kepribadian")[0];

            $mbti .= $kepribadian['inisial'];
            $hasil[] = $id_kepribadian; 
        }

        if($beda > 0) {
            $result = mysqli_query($conn, "SELECT * FROM tipe_mbti WHERE nama_mbti = '$mbti'");
    
            if (mysqli_fetch_assoc($result)) {
                echo "<script>
                        Swal.fire(
                            'Gagal!',
                            'Tipe MBTI sudah ada',
                            'error'
                        )
                    </script>";
                exit();
            }
        }

        $query = "UPDATE tipe_mbti SET nama_mbti = '$mbti', ";

        for($i = 0; $i < count($skala); $i++) {
            $query .= "skala_" . $skala[$i]['skala'] . " = '" . $data["skala_" . $skala[$i]['skala']] . "'";

            if($i < count($skala) - 1){
                $query .= ", ";
            }
        }

        $query .= " WHERE id_tpmbti = '$id'";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM tipe_mbti WHERE id_tpmbti = $id");

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