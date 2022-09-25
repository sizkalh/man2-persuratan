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

// echo tgl_indo_garing("01/08/2022");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT DISPEN</title>
    <style>
        #table_siswa,
        #table_siswa td,
        #table_siswa th {
            border: 1px solid;
            padding: 10px;
        }

        #table_siswa {
            border-collapse: collapse;
            width: 100%;
            margin: 30px 0 30px 0;
        }
    </style>
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
                    <b>SURAT DISPENSASI</b> <br>
                    NOMOR :
                </td>
            </tr>
            <tr>
                <td colspan="2">Yang bertanda tangan dibawah ini,</td>
            </tr>
            <tr>
                <td>Nama</td>
                <!-- semua GET dari inputan form -->
                <td colspan="2">: </td>
            </tr>
            <tr>
                <td>NIP</td>
                <td colspan="2">: </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td colspan="2">: </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 20px;">
                    Dengan ini memberikan dispensasi kepada siswa MAN 2 Tulungagung yang namanya tercantum dibawah ini :
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <table id="table_siswa">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Keterangan</th>
                        </tr>
                        <tr>
                            <td>qw</td>
                            <td>dsada</td>
                            <td>dsadasd</td>
                            <td>dadsdasd</td>
                        </tr>
                        <tr>
                            <td>dasdad</td>
                            <td>wewe</td>
                            <td>ewew</td>
                            <td>ewewe</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    Untuk tidak mengikuti Kegiatan Belajar Mengajar (KBM) seperti biasa dikarenakan ....... , pada :
                </td>
            </tr>
            <tr>
                <td>Hari</td>
                <td colspan="2">: </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td colspan="2">:

                </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td colspan="2">: </td>
            </tr>
            <tr>
                <td>Tempat</td>
                <td colspan="2">: </td>
            </tr>
            <tr>
                <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
                    Demikian, atas kehadiran dan kesediaannya, disampaikan terima kasih.
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 50%;"></td>
                <td style="text-align: center;">
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