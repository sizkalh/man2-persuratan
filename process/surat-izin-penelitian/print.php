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
  $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['kepada']);
  $data_guru = mysqli_fetch_array($query_guru);

  $query_mhs = mysqli_query($koneksi, 'SELECT * FROM tbl_surat_izin_penelitian WHERE id_surat = ' . $data['id']);
  $data_mhs = mysqli_fetch_array($query_mhs);
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Penelitan</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>

  <body>
    <div style="margin-top: -50px;">
      <table style="margin: 0 auto; border-collapse: collapse;">
        <tr>
          <td colspan="3">
            <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; padding-bottom: 40px;">
            <b>SURAT KETERANGAN PENELITIAN</b> <br />
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Yang bertanda tangan dibawah ini :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table style="border-collapse: collapse;">
              <tr>
                <td style="width: 150px;">Nama</td>
                <td>:</td>
                <td><?= $data_guru['nama'] ?></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?= $data_guru['nip'] ?></td>
              </tr>
              <tr>
                <td>Pangkat/Golongan</td>
                <td>:</td>
                <td><?= $data_guru['golongan'] ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?= $data_guru['jabatan'] ?></td>
              </tr>
              <tr>
                <td>Unit Kerja</td>
                <td>:</td>
                <td><?= $data_guru['instansi'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding-top: 20px;">
            Dengan inimemberikan izin penelitian kepada :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table style="border-collapse: collapse;">
              <tr>
                <td style="width: 150px;">Nama</td>
                <td>:</td>
                <td><?= $data_mhs['nama_mhs'] ?></td>
              </tr>
              <tr>
                <td>NIM</td>
                <td>:</td>
                <td><?= $data_mhs['nim'] ?></td>
              </tr>
              <tr>
                <td>Fakultas / Jurusan</td>
                <td>:</td>
                <td><?= $data_mhs['jurusan'] ?></td>
              </tr>
              <tr>
                <td>Semester</td>
                <td>:</td>
                <td><?= $data_mhs['semester'] ?></td>
              </tr>
              <tr>
                <td>Perguruan Tinggi</td>
                <td>:</td>
                <td><?= $data_mhs['kampus'] ?></td>
              </tr>
              <tr>
                <td style="vertical-align: text-top;">Judul</td>
                <td style="vertical-align: text-top;">:</td>
                <td><?= $data_mhs['judul'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding-top: 20px;">
            Untuk mengadakan penelitian di MAN 2 Tulungagung dalam rangka menyelesaikan tugas akhir / skripsi yang dilaksanakan pada tanggal <?= tgl_indo_garing($data_mhs['tanggal_mulai']) ?> sampai dengan <?= tgl_indo_garing($data_mhs['tanggal_selesai']) ?>.
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding-top: 10px; padding-bottom: 40px;">
            Demikian izin ini diberikan untuk dipergunakan sebagaimana mestinya.
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 60%;"></td>
          <td>
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <img style="position: absolute; max-width: 230px; left: 21em; margin-top: 0em;" src="../../dist/img/ttd/contohttd.png">
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