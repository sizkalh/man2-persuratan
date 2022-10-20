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
  $query_siswa = mysqli_query($koneksi, 'SELECT
                                        tbl_siswa.*,
                                        tbl_kelas.nama AS nama_kel,
                                        tbl_kelas.nama_kelas,
                                        tbl_jurusan.nama AS nama_jurusan,
                                        tbl_detail_kelas.rombel
                                        FROM
                                        tbl_siswa
                                        LEFT JOIN tbl_detail_kelas
                                            ON tbl_detail_kelas.id_detail_kelas = tbl_siswa.id_detail_kelas
                                        INNER JOIN tbl_kelas
                                            ON tbl_kelas.id_kelas = tbl_detail_kelas.id_kelas
                                        INNER JOIN tbl_jurusan
                                            ON tbl_jurusan.id_jurusan = tbl_detail_kelas.id_jurusan 
                                        WHERE tbl_siswa.id = ' . $data['kepada']);
  $data_siswa = mysqli_fetch_array($query_siswa);
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kelakuan Baik</title>
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
            <b>SURAT KETERANGAN KELAKUAN BAIK</b> <br />
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3"; style ="padding-bottom: 0px;">
            Yang bertanda tangan dibawah ini Kepala Madrasah Aliyah Negeri 2 Tulungagung menerangkan dengan sebenarnya bahwa:
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table style="height:20px; border-collapse: collapse;">
              <tr>
                <td style="width: 100px;">Nama</td>
                <td>:</td>
                <td><?= $data_siswa['nama'] ?></td>
              </tr>
              <tr>
                <td>TTL</td>
                <td>:</td>
                <td><?= $data_siswa['tempat_lahir'] ?>, <?= tgl_indo($data_siswa['tgl_lahir']) ?></td>
              </tr>
              <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><?= $data_siswa['nama_kel'] . ' ' . $data_siswa['nama_jurusan'] . ' ' . $data_siswa['rombel'] ?></td>
              </tr>
              <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $data_siswa['nis'] ?></td>
              </tr>
              <tr>
                <td>NISN</td>
                <td>:</td>
                <td><?= $data_siswa['nisn'] ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data_siswa['alamat'] ?></td>
              </tr>
              <tr>
                <td style="vertical-align: text-top;">Keterangan</td>
                <td style="vertical-align: text-top;">:</td>
                <td>Yang Bersangkutan Benar-Benar Siswa Madrasah
                  Aliyah Negeri 2 Tulungagung Tahun Pelajaran <?= $data['keterangan'] ?>
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
          <td style="width: 60%;"></td>
          <td>
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <img style="position: absolute; max-width: 280px; left: 22em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
            <br />
            <br>
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