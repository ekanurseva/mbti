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

    $max_cf = max_cf($data);
    $max_bayes = max_bayes($data);

    $tanggal = $data['tanggal_tes'];
    $waktu = cari_tanggal($tanggal, 'H:i:s || d F Y');
    $tgl = cari_tanggal($tanggal, 'd F Y');
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
                        padding: 3px;
                        text-align: center;
                        vertical-align: middle;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    p {
                        margin: 1.5px;
                        text-align: justify; 
                        text-indent: 0.55in;
                    }
                    li {
                        text-align: left;
                        padding: 0;
                        padding: 0;
                        margin: 0;
                        left: 0;
                    }
                    header{
                        padding-top: 0;
                        padding-bottom: 15px;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
            <header>
                <h3 style="margin: 0; color: red;">UNIVERSITAS MUHAMMADIYAH CIREBON</h3>
                <h5 style="margin: 0; color: blue;">FAKULTAS TEKNIK</h5>
                <h6 style="margin: 0; font-size: 9px">Kampus 1 : Jl. Tuparev No 70 Cirebon 45153 Telp. +62-231-209608, +62-231-204276, Fax +62-231-209608, +62-231-209617 Email : ft@umc.ac.id Website : www.umc.ac.id <br/> Kampus 2 dan 3 : Jl. Fatahillah – Watubelah – Cirebon, Email : rektorat@umc.ac.id Website : www.umc.ac.id
                </h6>
                <hr>
            </header>

                <h2 style="text-align: center; margin: 0">LAPORAN HASIL TES MBTI</h2>
                <h3 style="text-align: center; margin: 0">';
$html .= $data['nama'] . ' (' . $data['umur'] . ' Tahun)
                </h3>
                <h4 style="text-align: center; margin: 0">' . $waktu . '</h4>

    <h4 style="margin: 0;">Ciri-Ciri:</h4>
        <ul style="margin: 0;">';
foreach ($data_ciri as $daci) {
    $html .= '<li>' . $daci['ciri'] . '</li>';
}
;

$html .= '</ul>

            <table>
                <tr>
                    <th>Perhitungan Certainty Factor: ' . $hasil_cf . '</th>
                    <th>Perhitungan Teorema Bayes: ' . $hasil_bayes . '</th>
                </tr>

                <tr>
                    <td>';
foreach ($data_kepribadian as $dk) {
    $nama_kepribadian = strtolower(str_replace(" ", "_", $dk['kepribadian']));
    $nama_kepribadian .= "_cf";

    // Periksa apakah tipe kepribadian ini sama dengan tipe kepribadian dengan nilai tertinggi CF
    if (is_numeric(array_search($dk['id_kepribadian'], $max_cf))) {
        $html .= '<p><strong>' . $dk['kepribadian'] . ': ' . $data[$nama_kepribadian] . '%</strong></p>';
    } else {
        $html .= '<p>' . $dk['kepribadian'] . ': ' . $data[$nama_kepribadian] . '%</p>';
    }
}
$html .= '</td> <td>';

foreach ($data_kepribadian as $dk) {
    $nama_kepribadian = strtolower(str_replace(" ", "_", $dk['kepribadian']));
    $nama_kepribadian .= "_bayes";

    // Periksa apakah tipe kepribadian ini sama dengan tipe kepribadian dengan nilai tertinggi Bayes
    if (is_numeric(array_search($dk['id_kepribadian'], $max_bayes))) {
        $html .= '<p><strong>' . $dk['kepribadian'] . ': ' . $data[$nama_kepribadian] . '%</strong></p>';
    } else {
        $html .= '<p>' . $dk['kepribadian'] . ': ' . $data[$nama_kepribadian] . '%</p>';
    }
}
$html .= '</td>';

$html .= '</tr>
            </table>



    <h4 style="margin-bottom: 0;">Penjabaran Hasil :</h4>
        <table>
            <tr>
                <th>Kesimpulan</th>
            </tr>
            <tr>
                <td>
                Berdasarkan gejala kepribadian (pertanyaan), nilai pakar, dan nilai user yang mungkin sama antara kedua metode yaitu metode certainty factor dan teorema bayes menunjukan bahwa pengguna memiliki tipe MBTI <b>' . $hasil_cf . '</b> .
                </td>
            </tr>";
        </table>

<br>

        <table>
            <tr>
                <th>Saran Pengembangan untuk tipe ' . $hasil_cf . ' :</th>
            </tr>
            <tr>
                <td>
                    <ul>';
foreach ($data_saran as $daran) {
    $html .= '<li>' . $daran['saran'] . '</li>';
}
;

$html .= '</ul>
                </td>
            </tr>";
        </table>';

$html .= '<div style="margin-top: 20px; margin-left: 430px;">
                        <h4 style="margin: 0; font-weight: medium;">Cirebon, ' . $tgl . '</h4>
                        <h4 style="margin: 0;">Dekan Teknik,</h4><br><br>
                        <h4 style="margin: 0;">Nuri Kartini, M.T., IPM., AER</h4>
                        <h4 style="margin: 0; font-weight: medium;">NIDN: 0423047203</h4>
                    </div>
        </body>
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