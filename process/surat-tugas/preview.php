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
  <title>Surat Izin Kegiatan</title>
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
          <b>SURAT IZIN KEGIATAN</b> <br />
          NOMOR :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Yang bertanda tangan dibawah ini :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table>
            <tr>
              <td style="width: 150px;">Nama</td>
              <td>:</td>
              <td><?= $_GET['nama_guru'] ?></td>
            </tr>
            <tr>
              <td>NIP</td>
              <td>:</td>
              <td><?= $_GET['nip'] ?></td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>:</td>
              <td><?= $_GET['jabatan'] ?></td>
            </tr>
            <tr>
              <td>Unit Kerja</td>
              <td>:</td>
              <td><?= $_GET['unit_kerja'] ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="padding-top: 20px;">
          Berdasarkan dari surat <?= $_GET['surat_dari'] ?> , Nomor : <?= $_GET['no_surat_dari'] ?> , Tanggal : <?= tgl_indo_garing($_GET['tgl_surat_dari']) ?> , Perihal : <?= $_GET['perihal_surat_dari'] ?> , maka dengan ini memberikan Izin untuk mengadakan kegiatan, pada :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table>
            <tr>
              <td style="width: 150px;">Hari</td>
              <td colspan="2">: <?= $_GET['hari'] ?></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td colspan="2">: <?php if ($_GET['tanggal_pelaksanaan'] <> '') {
                                  echo tgl_indo_garing($_GET['tanggal_pelaksanaan']);
                                } ?></td>
            </tr>
            <tr>
              <td>Waktu</td>
              <td colspan="2">: <?= $_GET['waktu'] ?></td>
            </tr>
            <tr>
              <td>Tempat</td>
              <td colspan="2">: <?= $_GET['tempat'] ?></td>
            </tr>
            <tr>
              <td>Kegiatan</td>
              <td colspan="2">: <?= $_GET['keterangan'] ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
          Demikian surat izin ini dibuat untuk dipergunakan sebagaimana mestinya.
        </td>
      </tr>
      <tr>
        <td></td>
        <td style="width: 60%;"></td>
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