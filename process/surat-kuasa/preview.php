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
  <title>Surat Kuasa</title>
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
          <b>SURAT KUASA</b> <br />
          NOMOR :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Yang bertanda tangan dibawah ini :
        </td>
      </tr>
      <tr>
        <td style="width: 30%;">Nama</td>
        <td colspan="2">: <?= $_GET['pemberi_kuasa'] ?></td>
      </tr>
      <tr>
        <td>NIP</td>
        <td colspan="2">: <?= $_GET['nip'] ?></td>
      </tr>
      <tr>
        <td>Pangkat / Gol.Ruang</td>
        <td colspan="2">: <?= $_GET['pangkat'] ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td colspan="2">: <?= $_GET['jabatan_pemberi_kuasa'] ?></td>
      </tr>
      <tr>
        <td>Instansi</td>
        <td colspan="2">: <?= $_GET['instansi'] ?></td>
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
        <td colspan="2">: <?= $_GET['penerima_kuasa'] ?></td>
      </tr>
      <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td colspan="2">: <?= $_GET['tempat_lahir'] ?>, <?= tgl_indo_garing($_GET['tanggal_lahir']) ?></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td colspan="2">: <?= $_GET['jabatan_penerima_kuasa'] ?></td>
      </tr>
      <tr>
        <td>Sebagai tanggung jawab untuk</td>
        <td colspan="2">: <?= $_GET['ket'] ?></td>
      </tr>
      <tr>
        <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
          Demikian permohonan ini kami sampaikan, atas kerjasamanya, kami sampaikan terima kasih.
        </td>
      </tr>
      <tr>
        <td></td>
        <td style="width: 35%;"></td>
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