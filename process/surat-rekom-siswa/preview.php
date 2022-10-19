<?php
include_once("../../config/database.php");
include_once("../../library/helper.php");
session_start();
if ($_SESSION['status'] != "login") {
  $_SESSION['massage'] = 'belum_login';
  redirect('auth');
}

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
  <title>SURAT REKOMENDASI SISWA</title>

  <style>
    #prestasi_data,
    #prestasi_data td,
    #prestasi_data th {
      border: 1px solid;
      padding: 5px;
    }

    #prestasi_data {
      width: 100%;
      border-collapse: collapse;
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
          <b>SURAT REKOMENDASI</b> <br>
          NOMOR :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Yang bertanda tangan dibawah ini,
        </td>
      </tr>
      <tr style="height: 100px; vertical-align: text-top;">
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
        <td colspan="3">
          Dengan ini memberikan rekomendasi kepada siswa tersebut dibawah ini :
        </td>
      </tr>
      <tr style="height: 150px; vertical-align: text-top;">
        <td colspan="3">
          <table>
            <tr>
              <td style="width: 150px;">Nama</td>
              <td>:</td>
              <td><?= $_GET['nama_siswa'] ?></td>
            </tr>
            <tr>
              <td>Tempat, Tanggal Lahir</td>
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
          </table>
        </td>
      </tr>
      <tr style="height: 50px;">
        <td colspan="3">
          Untuk mengikuti Seleksi Mahasiswa Baru Jalur Mandiri Prestasi Akademik/Non Akademik <?= $_GET['perihal'] ?> Tahun Akademik <?= $_GET['tahun_ajaran'] ?>
        </td>
      </tr>
      <tr style="height: 50px; vertical-align: text-top;">
        <td colspan="3">
          Berikut daftar prestasi yang diraih ananda sebagai bahan pertimbangan proses seleksi :
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <table id="prestasi_data">
            <tr>
              <th style="width: 35px; text-align: center;">No</th>
              <th>Prestasi</th>
              <th>Bidang</th>
              <th style="text-align: center;">Tahun</th>
            </tr>
            <?php
            $no = 1;
            $query_prestasi = mysqli_query($koneksi, 'SELECT
                                                      *
                                                      FROM
                                                      tbl_prestasi
                                                      WHERE id_siswa = ' . $_GET['id_siswa']);
            if (mysqli_num_rows($query_prestasi) > 0) {
              while ($prestasi = mysqli_fetch_array($query_prestasi)) {
            ?>
                <tr>
                  <td style="text-align: center;"><?= $no++ ?></td>
                  <td><?= $prestasi['prestasi'] ?></td>
                  <td><?= $prestasi['bidang'] ?></td>
                  <td style="text-align: center;"><?= $prestasi['tahun'] ?></td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td style="text-align: center;">1</td>
                <td style="text-align: center;">-</td>
                <td style="text-align: center;">-</td>
                <td style="text-align: center;">-</td>
              </tr>
            <?php } ?>
          </table>
        </td>
      </tr>
      <tr style="height: 50px;">
        <td colspan="3">
          Demikian surat rekomendasi ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
        </td>
      </tr>
      <tr style="height: 230px;">
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