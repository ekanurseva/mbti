<?php
require_once 'vendor/autoload.php'; // Lokasi file autoload composer
require_once 'controller/hasil.php';

$data = null;
$hasil = null;
$data_relasi = null;

if (isset($_GET['key'])) {
    $nama = dekripsi($_GET['key']);
    $data = query("SELECT * FROM hasil WHERE nama = '$nama' AND id_hasil = (SELECT MAX(id_hasil) FROM hasil WHERE nama = '$nama')")[0];
} elseif (isset($_GET['id'])) {
    $id = dekripsi($_GET['id']);
    $data = query("SELECT * FROM hasil WHERE id_hasil = $id")[0];
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
                <h3 style="text-align: center;">EKA NURSEVA S (23 Tahun)</h3>
                <h4 style="text-align: center;">19:07:26 | 22 January 2024</h4>

    <h4 style="margin: 0;">Ciri-Ciri:</h4>
        <ul>
            <li>Ciri 1</li>
            <li>Ciri 2</li>
        </ul>

            <table>
                <tr>
                    <th>Perhitungan Certainty Factor: INTJ</th>
                    <th>Perhitungan Teorema Bayes: INTJ</th>
                </tr>

                <tr>
                    <td>Introvert: 64%</td> 
                    <td>Introvert: 23%</td> 
                </tr>
            </table>



    <h4>Penjabaran Hasil :</h4>
        <table>
            <tr>
                <th>Kesimpulan</th>
            </tr>
            <tr>
                <td>
                Berdasarkan gejala kepribadian (pertanyaan), nilai pakar, dan nilai user yang mungkin sama antara kedua metode yaitu metode certainty factor dan teorema bayes menunjukan bahwa pengguna memiliki tipe MBTI <b>INTJ</b> .
                </td>
            </tr>";
        </table>

<br>

        <table>
            <tr>
                <th>Saran Pengembangan untuk tipe INTJ :</th>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>
                            Belajarlah untuk mengungkapkan emosi dan perasaan anda.
                        </li>
                    </ul>
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