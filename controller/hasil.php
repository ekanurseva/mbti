<?php 
    require_once 'main.php';
  
    function cf($data) {
        $data_kepribadian = query("SELECT * FROM tp_kepribadian");

        foreach($data_kepribadian as $dk) {
            $id_kepribadian = $dk['id_kepribadian'];
            $data_gejala = query("SELECT * FROM gejala WHERE id_kepribadian = $id_kepribadian");

            foreach($data_gejala as $dg) {
                ${"cf_he_" . $dg['kode_gejala']} = $dg['nilai_pakar'] * $data[$dg['kode_gejala']];
                ${"cf_he_". $dk['kode_kepribadian']}[] = ${"cf_he_" . $dg['kode_gejala']};

                // echo "Hasil CF [H,E]" . $dg['kode_gejala'] . " yaitu " . $dg['nilai_pakar'] . " * " . $data[$dg['kode_gejala']] . " = " . ${"cf_he_" . $dg['kode_gejala']} . "<br><br>";
            }

            ${"cf_old_" . $dk['kode_kepribadian'] . 0} = ${"cf_he_". $dk['kode_kepribadian']}[0];

            for($i = 1; $i < count(${"cf_he_". $dk['kode_kepribadian']}); $i++) {
                ${"cf_old_" . $dk['kode_kepribadian'] . $i} = ${"cf_old_" . $dk['kode_kepribadian'] . $i - 1} + ${"cf_he_". $dk['kode_kepribadian']}[$i] * (1 - ${"cf_old_" . $dk['kode_kepribadian'] . $i - 1});

                ${"cf_combine_" . $dk['kode_kepribadian']}[] = number_format(${"cf_old_" . $dk['kode_kepribadian'] . $i}, 2);

                // echo "Nilai CF Combine ke " . $i ." " . $dk['kode_kepribadian'] . " yaitu " . ${"cf_old_" . $dk['kode_kepribadian'] . $i - 1} . " + " . ${"cf_he_". $dk['kode_kepribadian']}[$i] . " * (1 - " . ${"cf_old_" . $dk['kode_kepribadian'] . $i - 1} . ") = " . ${"cf_old_" . $dk['kode_kepribadian'] . $i} . "<br><br>" ;
            }

            $hasil_cf[] = max(${"cf_combine_" . $dk['kode_kepribadian']});

            // echo "Hasil nilai CF " . $dk['kepribadian'] . " adalah " . max(${"cf_combine_" . $dk['kode_kepribadian']}) . "%<br><br>";
        }
    }
    function hitung($data) {
        cf($data);
    }
?>