<?php
require_once 'vendor/autoload.php'; // Lokasi file autoload composer
require_once 'controller/hasil.php';

$data = null;
$hasil = null;
$data_relasi = null;

if (isset($_GET['id_hasil'])) {
    $id = dekripsi($_GET['id_hasil']);
    $data = query("SELECT * FROM hasil WHERE id_hasil = $id")[0];

    $hasil_cf = hasil_cf($data);
    $hasil_bayes = hasil_bayes($data);
    $mbti = query("SELECT * FROM tipe_mbti WHERE nama_mbti = '$hasil_cf'")[0];
    $id_mbti = $mbti['id_tpmbti'];

    $data_ciri = query("SELECT * FROM ciri_mbti WHERE id_tpmbti = $id_mbti");
    $data_saran = query("SELECT * FROM saran_mbti WHERE id_tpmbti = $id_mbti");

    $data_kepribadian = query("SELECT * FROM tp_kepribadian");

    $tanggal = $data['tanggal_tes'];
    $waktu = date('H.i.s | d F Y', strtotime($tanggal));
} else {
    echo "
        <script>
            document.location.href='index.php';
        </script>
    ";
}

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Masukkan kode HTML dan CSS yang ingin Anda konversi ke PDF
$html = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Hasil Tes</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th, td {
                        border: 1px solid black;
                        padding: 8px;
                        text-align: center;
                    vertical-align: middle;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    p {
                        text-align: justify; 
                        text-indent: 0.5in;
                    }
                    li {
                        text-align: left;
                        padding: 0;
                        padding: 0;
                        margin: 0;
                        left: 0;
                    }
                </style>
            </head>
            <body>
                <h1 style="text-align: center;">LAPORAN HASIL TES MBTI</h1>
                <h3 style="text-align: center;">'; $html .= $data['nama'] . ' (' . $data['umur'] . ' Tahun)</h3>
                <h4 style="text-align: center;">' . $waktu . '</h4>

    <h4 style="margin: 0;">Ciri-Ciri:</h4>
        <ul>';
        foreach ($data_ciri as $daci) {
            $html .= '<li>' . $daci['ciri'] . '</li>';
        };
            
        $html .= '</ul>

            <table>
                <tr>
                    <th>Perhitungan Certainty Factor: ' . $hasil_cf . '</th>
                    <th>Perhitungan Teorema Bayes: ' . $hasil_bayes . '</th>
                </tr>

                <tr>
                    <td>';
                foreach ($data_kepribadian as $dk){
                    $nama_kepribadian = strtolower(str_replace(" ", "_", $dk['kepribadian']));
                    $nama_kepribadian .= "_cf";

                    $html .= '<p>' . $dk['kepribadian'] . ': ' . $data[$nama_kepribadian] . '%</p>'; 
                }
                    $html .= '</td> <td>';
                    
                foreach ($data_kepribadian as $dk){
                    $nama_kepribadian = strtolower(str_replace(" ", "_", $dk['kepribadian']));
                    $nama_kepribadian .= "_bayes";
    
                    $html .= '<p>' . $dk['kepribadian'] . ': ' . $data[$nama_kepribadian] . '%</p>'; 
                }
                    $html .= '</td>';
                    
                $html .= '</tr>
            </table>



    <h4>Penjabaran Hasil :</h4>
        <table>
            <tr>
                <th>Kesimpulan</th>
            </tr>
            <tr>
                <td>
                Berdasarkan gejala kepribadian (pertanyaan), nilai pakar, dan nilai user yang mungkin sama antara kedua metode yaitu metode certainty factor dan teorema bayes menunjukan bahwa pengguna memiliki tipe MBTI <b>' . $hasil_bayes . '</b> .
                </td>
            </tr>";
        </table>

<br>

        <table>
            <tr>
                <th>Saran Pengembangan untuk tipe ' . $hasil_bayes . ' :</th>
            </tr>
            <tr>
                <td>
                    <ul>';
                    foreach ($data_saran as $daran) {
                        $html .= '<li>' . $daran['saran'] . '</li>';
                    };

                    $html .= '</ul>
                </td>
            </tr>";
        </table>';

$html .= '</body>
            </html>';

$dompdf->loadHtml($html);

// Render HTML ke PDF
$dompdf->render();

// Ambil output PDF
$output = $dompdf->output();

// Konversi output PDF menjadi data URI
$pdfDataUri = 'data:application/pdf;base64,' . base64_encode($output);

// Tampilkan pratinjau PDF di browser
echo '<embed src="' . $pdfDataUri . '" type="application/pdf" width="100%" height="100%">';

?>