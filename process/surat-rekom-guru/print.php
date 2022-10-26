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

  return  $pecahkan[2] . '/' . $pecahkan[1] . '/' . $pecahkan[0];
}

// echo tgl_indo_garing("01/08/2022");
include_once("../../config/database.php");
$id = $_GET['id'];
// query disesuaikan dengan data yang akan ditampilkan
$query_surat = mysqli_query($koneksi, 'SELECT * FROM tbl_surat WHERE tbl_surat.id = "' . $id . '"');
while ($data = mysqli_fetch_array($query_surat)) {
  $query_kepsek = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['kepada']);
  $data_kepsek = mysqli_fetch_array($query_kepsek);

  $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['keterangan']);
  $data_guru = mysqli_fetch_array($query_guru);
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT REKOMENDASI GURU</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>

  <body>
    <div style="margin-top: -50px;">
      <table style="margin: 0 auto;">
        <tr>
          <td colspan="3">
            <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; padding-bottom: 40px;">
            <b>SURAT REKOMENDASI</b> <br>
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Yang bertanda tangan dibawah ini,
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 170px;">Nama</td>
                <td>:</td>
                <td><?= $data_kepsek['nama'] ?></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?= $data_kepsek['nip'] ?></td>
              </tr>
              <tr>
                <td>Pangkat / Glongan</td>
                <td>:</td>
                <td><?= $data_kepsek['golongan'] ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $data_kepsek['jabatan'] ?></td>
              </tr>
              <tr>
                <td>Asal Instansi</td>
                <td>:</td>
                <td><?= $data_kepsek['instansi'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Dengan ini memberikan rekomendasi kepada :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 170px;">Nama</td>
                <td>:</td>
                <td><?= $data_guru['nama'] ?></td>
              </tr>
              <tr>
                <td style="width: 150px;">NIP</td>
                <td>:</td>
                <td><?= $data_guru['nip'] ?></td>
              </tr>
              <tr>
                <td>Tempat, Tanggal Lahir</td>
                <td>:</td>
                <td><?= $data_guru['tempat_lahir'] ?>, <?= tgl_indo($data_guru['tgl_lahir']) ?></td>
              </tr>
              <tr>
                <td>Pangkat / Glongan</td>
                <td>:</td>
                <td><?= $data_guru['golongan'] ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data_guru['alamat'] ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $data_guru['jabatan'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="height: 50px;">
          <td colspan="3">
            Untuk <?= $data['catatan'] ?>
          </td>
        </tr>
        <tr style="height: 50px; vertical-align: text-top;">
          <td colspan="3">
            Demikian surat rekomendasi ini dibuat, untuk dipergunakan sebagaimana mestinya
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 60%;"></td>
          <td>
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <img style="position: absolute; max-width: 240px; left: 21em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
            <br />
            <br>
            <br>
            <br>
            <br>
            Muhamad Dopir <img style="max-height: 20px;" src="../../dist/img/ttd/paraf.png"><br>
          </td>
        </tr>
      </table>
    </div>

    <script>
      window.print();
    </script>
  </body>

  </html>

<?php } ?>