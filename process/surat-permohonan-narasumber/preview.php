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
  <title>Surat Permohonan Narasumber</title>
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
      <tr style="height: 80px;">
        <td colspan="2" style="vertical-align: text-top;">
          <table>
            <tr>
              <td>Nomor</td>
              <td>:</td>
              <td>…………………………………</td>
            </tr>
            <tr>
              <td style="vertical-align: top;">Hal</td>
              <td style="vertical-align: top;">:</td>
              <td><?= $_GET['perihal'] ?></td>
            </tr>
          </table>
        </td>
        <td style="vertical-align: text-top; text-align: right;">
          <?= tgl_indo_garing($_GET['tanggal_pembuatan']) ?>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: text-top; width: 35%; padding-bottom: 3em;">
          Yth. Bapak/Ibu/Sdr <?= $_GET['kepada'] ?>
          <br>
          di <?= $_GET['alamat'] ?>
        </td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3">
          Sehubungan akan diselenggarakan kegiatan <?= $_GET['dalam_rangka'] ?> sebagai narasumber dalam kegiatan tersebut yang akan dilaksanakan pada :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table>
            <tr>
              <td rowspan="4" style="vertical-align: text-top;">1.</td>
              <td style="width: 100px;">Hari, Tanggal</td>
              <td>:</td>
              <td><?= $_GET['hari'] ?>, <?php if ($_GET['tanggal_pelaksanaan'] <> '') {
                                          echo tgl_indo_garing($_GET['tanggal_pelaksanaan']);
                                        } ?></td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td>:</td>
              <td><?= $_GET['waktu'] ?></td>
            </tr>
            <tr>
              <td style="vertical-align: top;">Materi</td>
              <td style="vertical-align: top;">:</td>
              <td><?= $_GET['materi'] ?></td>
            </tr>
            <tr>
              <td style="vertical-align: top;">Tempat</td>
              <td style="vertical-align: top;">:</td>
              <td><?= $_GET['tempat'] ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
          Demikian surat permohonan ini kami sampaikan. Atas kesediaan dan kerjasamanya, disampaikan terima kasih.
        </td>
      </tr>
      <tr>
        <td></td>
        <td style="width: 25%;"></td>
        <td>
          Tulungagung
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