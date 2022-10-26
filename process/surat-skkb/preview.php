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
  <title>Surat Keterangan Kelakuan Baik</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
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
          <b>SURAT KETERANGAN KELAKUAN BAIK</b> <br />
          NOMOR :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Yang bertanda tangan dibawah ini Kepala Madrasah Aliyah Negeri 2 Tulungagung menerangkan dengan sebenarnya bahwa:
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table>
            <tr>
              <td style="width: 100px;">Nama</td>
              <td>:</td>
              <td><?= $_GET['nama'] ?></td>
            </tr>
            <tr>
              <td>TTL</td>
              <td>:</td>
              <td><?= $_GET['tempat_lahir'] ?>, <?= tgl_indo($_GET['tgl_lahir']) ?></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td><?= $_GET['kelas'] ?></td>
            </tr>
            <tr>
              <td>NIS</td>
              <td>:</td>
              <td><?= $_GET['nis'] ?></td>
            </tr>
            <tr>
              <td>NISN</td>
              <td>:</td>
              <td><?= $_GET['nisn'] ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?= $_GET['alamat'] ?></td>
            </tr>
            <tr>
              <td style="vertical-align: text-top;">Keterangan</td>
              <td style="vertical-align: text-top;">:</td>
              <td>Yang Bersangkutan Benar-Benar Siswa Madrasah
                Aliyah Negeri 2 Tulungagung Tahun Pelajaran <?= $_GET['tahun_ajaran'] ?>
                dan selama di MAN 2 Tulungagung menunjukan <strong>BERKELAKUAN BAIK</strong>.</td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
          Demikian surat keterangan kelakuan baik ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
        </td>
      </tr>
      <tr>
        <td></td>
        <td style="width: 55%;"></td>
        <td>
          Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
          <br />
          Kepala Madrasah,
          <br /><br /><br /><br /><br /><br />
          Muhamad Dopir<br>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>