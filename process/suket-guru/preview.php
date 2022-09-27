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
  <title>SURAT KETERANGAN</title>
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
          <b>SURAT KETERANGAN</b> <br>
          NOMOR :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Yang bertanda tangan di bawah ini :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table>
            <tr>
              <td style="width: 170px;">Nama</td>
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
        <td colspan="3">
          Dengan ini menerangkan,
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table>
            <tr>
              <td style="width: 170px;">Nama</td>
              <td>:</td>
              <td><?= $_GET['nama_karyawan'] ?></td>
            </tr>
            <tr>
              <td style="width: 150px;">NIP</td>
              <td>:</td>
              <td><?= $_GET['nip_karyawan'] ?></td>
            </tr>
            <tr>
              <td>Tempat, Tanggal Lahir</td>
              <td>:</td>
              <td><?= $_GET['tempat_lahir'] ?>, <?= tgl_indo($_GET['tgl_lahir']) ?></td>
            </tr>
            <tr>
              <td>Pangkat / Glongan</td>
              <td>:</td>
              <td><?= $_GET['golongan_karyawan'] ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td><?= $_GET['alamat'] ?></td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>:</td>
              <td><?= $_GET['jabatan_karyawan'] ?></td>
            </tr>
            <tr>
              <td>Masa Kerja</td>
              <td>:</td>
              <td><?= $_GET['masa_kerja'] ?></td>
            </tr>
          </table>
        </td>
      </tr>
      <tr style="height: 50px;">
        <td colspan="3">
          Adalah benar-benar Guru Pegawai Negeri Sipil (PNS) di Madrasah Aliyah Negeri 2 Tulungagung.
        </td>
      </tr>
      <tr style="height: 50px; vertical-align: text-top;">
        <td colspan="3">
          Demikian surat keterang ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
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