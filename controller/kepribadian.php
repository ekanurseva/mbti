<?php 
    require_once 'main.php';

    function kode() {
        $query = "SELECT * FROM penyakit";
        $kode = "";

        $jumlah = jumlah_data($query);

        if($jumlah == 0) {
            $kode = "P1";
        } else {
            for($i = 1; $i <= $jumlah; $i++) { 
                $totalP = jumlah_data("SELECT * FROM penyakit WHERE kode_penyakit = 'P{$i}'");

                if ($totalP == 0) {
                    $kode = "P{$i}";
                    break;
                } else {
                    $angka = $jumlah + 1;
                    $kode = "P{$angka}";
                }
            };
        }

        return $kode;
    }
?>