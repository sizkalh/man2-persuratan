<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function tgl_indo_garing($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

// echo tgl_indo_garing("01/08/2022");

include_once("../../config/database.php");
$id = $_GET['id'];
$query_surat = mysqli_query($koneksi, 'SELECT * FROM tbl_surat JOIN tbl_surat_kuasa ON tbl_surat_kuasa.id_surat = tbl_surat.id WHERE tbl_surat.id = "' . $id . '"');
while ($data = mysqli_fetch_array($query_surat)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Surat Kuasa</title>
    </head>

    <body style="width: 50%; margin: 0 auto;">
        <div>
            <table>
                <tr>
                    <td colspan="3">
                        <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding-bottom: 40px;">
                        <b>SURAT KUASA</b> <br />
                        NOMOR : <?= $data['no_surat'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Yang bertanda tangan dibawah ini :
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td colspan="2">: <?= $data['pemberi_kuasa'] ?></td>
                </tr>
                <tr>
                    <td>NIP</td>
                    <td colspan="2">: <?= $data['nip'] ?></td>
                </tr>
                <tr>
                    <td>Pangkat / Gol.Ruang</td>
                    <td colspan="2">: <?= $data['pangkat'] ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td colspan="2">: <?= $data['jabatan_pemberi_kuasa'] ?></td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td colspan="2">: <?= $data['instansi'] ?></td>
                </tr>
                <tr>
                    <td colspan="3"><br /></td>
                </tr>
                <tr>
                    <td colspan="3">
                        Dengan ini memberi kuasa kepada :
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td colspan="2">: <?= $data['penerima_kuasa'] ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td colspan="2">: <?= $data['tempat_lahir'] ?>, <?= tgl_indo_garing($data['tanggal_lahir']) ?></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td colspan="2">: <?= $data['jabatan_penerima_kuasa'] ?></td>
                </tr>
                <tr>
                    <td>Sebagai tanggung jawab untuk</td>
                    <td colspan="2">: <?= $data['ket'] ?></td>
                </tr>
                <tr>
                    <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
                        Demikian permohonan ini kami sampaikan, atas kerjasamanya, kami sampaikan terima kasih.
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="width: 35%;"></td>
                    <td style="text-align: center;">
                        Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
                        <br />
                        Kepala Madrasah,
                        <br />
                        <br>
                        <br>
                        <br>
                        <br />
                        <u>Drs. Muhamad Dopir, M.Pd.I.</u><br>
                        NIP. 196212061990032001
                    </td>
                </tr>
            </table>
        </div>

        
    </body>

    </html>

<?php } ?>