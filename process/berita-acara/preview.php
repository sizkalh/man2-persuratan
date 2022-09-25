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
    $pecahkan = explode('/', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  $pecahkan[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[2];
}

function bulan_indo($tanggal)
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
    $pecahkan = explode('/', $tanggal);
    return $bulan[(int)$pecahkan[1]];
}

// echo tgl_indo_garing("01/08/2022");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BERITA ACARA</title>
</head>

<body>
    <div style="width: 50%; margin: 0 auto;">
        <table>
            <tr>
                <td colspan="3">
                    <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; padding-bottom: 40px;">
                    <b>BERITA ACARA</b> <br>
                    NOMOR :
                </td>
            </tr>
            <tr>
                <td colspan="3">Pada hari ini, <?= $_GET['hari'] ?>, tanggal <?= substr($_GET['tgl_pelaksanaan'], 0, 2) ?>, bulan <?= bulan_indo($_GET['tgl_pelaksanaan']) ?>, tahun <?= substr($_GET['tgl_pelaksanaan'], 6, 10) ?>, kami masing-masing:</td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Nama</td>
                <td>: <?= $_GET['nama_pertama'] ?>
                <td>
            </tr>
            <tr>
                <td></td>
                <td>NIP</td>
                <td>: <?= $_GET['nip_pertama'] ?>
                <td>
            </tr>
            <tr>
                <td></td>
                <td>Jabatan</td>
                <td>: <?= $_GET['jabatan_pertama'] ?>
                <td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Selanjutnya disebut Pihak Pertama, dan</td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Nama</td>
                <td>: <?= $_GET['nama_kedua'] ?>
                <td>
            </tr>
            <tr>
                <td></td>
                <td>NIP</td>
                <td>: <?= $_GET['nip_kedua'] ?>
                <td>
            </tr>
            <tr>
                <td></td>
                <td>Jabatan</td>
                <td>: <?= $_GET['jabatan_kedua'] ?></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Selanjutnya disebut Pihak Kedua, telah melaksanakan:</td>
            </tr>
            <tr>
                <td colspan="3">
                    <?= $_GET['perihal'] ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
                    Demikian Berita acara ini dibuat dengan sesungguhnya berdasarkan
                </td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="2">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center;">
                                Pihak Kedua,
                                <br /><br /><br /><br /><br /><br />
                                <?= $_GET['nama_kedua'] ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="text-align: center;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: center;">
                                Pihak Pertama,
                                <br /><br /><br /><br /><br /><br />
                                <?= $_GET['nama_pertama'] ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="text-align: center; padding-top: 3em;" colspan="3">
                    Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
                    <br />
                    Kepala Madrasah,
                    <br /><br /><br /><br /><br /><br />
                    Mohamad Dopir
                </td>
            </tr>
        </table>
    </div>
</body>

</html>