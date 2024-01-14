<?php 
    require_once 'main.php';

    function create($data) {
        global $conn;

        $saran = htmlspecialchars($data['saran']);
        $id_tpmbti = htmlspecialchars($data['id_tpmbti']);

        if($saran == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Saran tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "INSERT INTO saran_mbti
                    VALUES
                    (NULL, '$id_tpmbti', '$saran')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;

        $saran = htmlspecialchars($data['saran']);
        $id = htmlspecialchars($data['id_saran']);

        if($saran == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Saran tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "UPDATE saran_mbti SET 
                    saran = '$saran'
                  WHERE id_saran = '$id'
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM saran_mbti WHERE id_saran = $id");

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