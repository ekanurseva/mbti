<?php
require_once 'vendor/autoload.php'; // Lokasi file autoload composer
require_once 'controller/hasil.php';

use Dompdf\Dompdf;

if (isset($_POST['option'])) {
    $option = $_POST['option'];

    // Query database berdasarkan opsi yang dipilih
    if ($option == "I") {
        $riwayat = query("SELECT * FROM hasil WHERE introvert_cf > extrovert_cf");
    } else if ($option == "E") {
        $riwayat = query("SELECT * FROM hasil WHERE introvert_cf < extrovert_cf");
    } else {
        $riwayat = query("SELECT * FROM hasil");
    }

    $riwayat = query("SELECT * FROM hasil");
    $tgll = date('d F Y');
    $tgl = cari_tanggal($tgll, 'd F Y');

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

                <h2 style="text-align: center;">LAPORAN HASIL TES MBTI</h2>

            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Tanggal Tes</th>
                    <th>Tipe MBTI (CF)</th>
                    <th>Tipe MBTI (Bayes)</th>
                </tr>';
    $i = 1;
    foreach ($riwayat as $h) {
        $idhasil = $h['id_hasil'];

        $cf = hasil_cf($h);
        $bayes = hasil_bayes($h);
        $tanggal = $h['tanggal_tes'];
        $waktu = cari_tanggal($tanggal, 'H:i:s || d F Y');

        $html .= '<tr>
                <td>' . $i . '</td>
                <td>' . $h['nama'] . '</td>
                <td>' . $h['nim'] . '</td>
                <td>' . $h['prodi'] . '</td>
                <td>' . $h['angkatan'] . '</td>
                <td>' . $waktu . '</td>
                <td> ' . $cf . '</td>
                <td> ' . $bayes . '</td>
            </tr>';
        $i++;
    }
    $html .= '
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

    // Ambil output PDF dan tutup output buffer
    $pdfData = $dompdf->output();

    // Tampilkan pratinjau PDF di browser
    echo base64_encode($pdfData);

}
?>