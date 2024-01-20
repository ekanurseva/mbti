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

                ${"cf_combine_" . $dk['kode_kepribadian']}[] = ${"cf_old_" . $dk['kode_kepribadian'] . $i};

                // echo "Nilai CF Combine ke " . $i ." " . $dk['kode_kepribadian'] . " yaitu " . ${"cf_old_" . $dk['kode_kepribadian'] . $i - 1} . " + " . ${"cf_he_". $dk['kode_kepribadian']}[$i] . " * (1 - " . ${"cf_old_" . $dk['kode_kepribadian'] . $i - 1} . ") = " . ${"cf_old_" . $dk['kode_kepribadian'] . $i} . "<br><br>" ;
            }

            $hasil = number_format(max(${"cf_combine_" . $dk['kode_kepribadian']}) * 100, 2);
            $hasil_cf[] = $hasil;

            // echo "Hasil nilai CF " . $dk['kepribadian'] . " adalah " . $hasil . "%<br><br>";
        }
    }

    function bayes($data) {
        $data_kepribadian = query("SELECT * FROM tp_kepribadian");

        foreach($data_kepribadian as $dk) {
            $id_kepribadian = $dk['id_kepribadian'];
            $data_gejala = query("SELECT * FROM gejala WHERE id_kepribadian = $id_kepribadian");

            ${"sigma_h_" . $dk['kode_kepribadian']} = 0;

            foreach($data_gejala as $dg) {
                ${"sigma_h_" . $dk['kode_kepribadian']} += $dg['nilai_pakar'];
            }

            // echo "Hasil sigma H dari kepribadian " . $dk['kode_kepribadian'] . " adalah " . ${"sigma_h_" . $dk['kode_kepribadian']} . "<br><br>";

            ${"sigma_p_e_h_dikali_p_h_" . $dk['kode_kepribadian']} = 0;

            foreach($data_gejala as $dagej) {
                ${"p_h_" . $dagej['kode_gejala']} = $dagej['nilai_pakar'] / ${"sigma_h_" . $dk['kode_kepribadian']};

                // echo "Hasil P[H]" . $dagej['kode_gejala'] . " yaitu " . $dagej['nilai_pakar'] . " / " . ${"sigma_h_" . $dk['kode_kepribadian']} . " = " . ${"p_h_" . $dagej['kode_gejala']} . "<br><br>";

                ${"sigma_p_e_h_dikali_p_h_" . $dk['kode_kepribadian']} += $data[$dagej['kode_gejala']] * ${"p_h_" . $dagej['kode_gejala']};

                // echo "Hasil P[E|H]" . $dagej['kode_gejala'] . " * P[H]" . $dagej['kode_gejala'] . " yaitu " . $data[$dagej['kode_gejala']] . " * " . ${"p_h_" . $dagej['kode_gejala']} . " = " . $data[$dagej['kode_gejala']] * ${"p_h_" . $dagej['kode_gejala']} . "<br><br>";
            }

            // echo "Hasil sigma P[E|H] * P[H]" . $dk['kode_kepribadian'] . " yaitu " . ${"sigma_p_e_h_dikali_p_h_" . $dk['kode_kepribadian']} . "<br><br>";

            foreach($data_gejala as $dala) {
                ${"p_h_e_" . $dala['kode_gejala']} = ($data[$dala['kode_gejala']] * ${"p_h_" . $dala['kode_gejala']}) / ${"sigma_p_e_h_dikali_p_h_" . $dk['kode_kepribadian']};

                // echo "Hasil P[H|E]" . $dala['kode_gejala'] . " yaitu (" . $data[$dala['kode_gejala']] . " * " . ${"p_h_" . $dala['kode_gejala']} . ") / " . ${"sigma_p_e_h_dikali_p_h_" . $dk['kode_kepribadian']} . " = " . ${"p_h_e_" . $dala['kode_gejala']} . "<br><br>";
            }

            ${"sigma_bayes_" . $dk['kode_kepribadian']} = 0;
            foreach($data_gejala as $tala) {
                ${"bayes_" . $tala['kode_gejala']} = ${"p_h_e_" . $tala['kode_gejala']} * $tala['nilai_pakar'];

                // echo "Hasil bayes " . $tala['kode_gejala'] . " yaitu " . ${"p_h_e_" . $tala['kode_gejala']} . " * " . $tala['nilai_pakar'] . " = " . ${"bayes_" . $tala['kode_gejala']} . "<br><br>";

                ${"sigma_bayes_" . $dk['kode_kepribadian']} += ${"bayes_" . $tala['kode_gejala']};
            }

            // ${"sigma_bayes_" . $dk['kode_kepribadian']} *= 100;

            // echo "Hasil sigma bayes ". $dk['kode_kepribadian'] . " adalah " . ${"sigma_bayes_" . $dk['kode_kepribadian']} . "%<br><br>";
            
        }
        
    }

    function hitung($data) {
        cf($data);
        bayes($data);
    }
?>