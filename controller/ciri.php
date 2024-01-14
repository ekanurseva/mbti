<?php 
    require_once 'main.php';

    function create($data) {
        global $conn;

        $ciri = htmlspecialchars($data['ciri']);
        $id_tpmbti = htmlspecialchars($data['id_tpmbti']);

        if($ciri == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Ciri tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "INSERT INTO ciri_mbti
                    VALUES
                    (NULL, '$id_tpmbti', '$ciri')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function update($data) {
        global $conn;

        $ciri = htmlspecialchars($data['ciri']);
        $id = htmlspecialchars($data['id_ciri']);

        if($ciri == "") {
            echo "<script>
                    Swal.fire(
                        'Gagal!',
                        'Ciri tidak boleh kosong',
                        'error'
                    )
                  </script>";
            exit();
        }

        $query = "UPDATE ciri_mbti SET 
                    ciri = '$ciri'
                  WHERE id_ciri = '$id'
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function delete($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM ciri_mbti WHERE id_ciri = $id");

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