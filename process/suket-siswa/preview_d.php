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

  $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['keterangan']);
  $data_guru = mysqli_fetch_array($query_guru);
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT KETERANGAN</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>

  <body style="width: 50%; margin: 0 auto;">
    <div>
      <table>
        <tr>
          <td colspan="3">
            <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; padding-bottom: 40px;">
            <b>SURAT KETERANGAN</b> <br>
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Yang bertanda tangan dibawah ini Kepala Madrasah Aliyah Negeri 2 Tulungagung :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
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
          <td colspan="3">
            Menerangkan dengan sesungguhnya bahwa :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 150px;">Nama</td>
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
                <td>Satdik</td>
                <td>:</td>
                <td><?= $data_siswa['satdik'] ?></td>
              </tr>
              <tr>
                <td>Nama Ayah</td>
                <td>:</td>
                <td><?= $data_siswa['nama_wali'] ?></td>
              </tr>
              <tr>
                <td>Nama Ibu</td>
                <td>:</td>
                <td><?= $data_siswa['nama_ibu'] ?></td>
              </tr>
              <tr>
                <td>Jumlah Saudara</td>
                <td>:</td>
                <td><?= $data_siswa['jml_saudara'] ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $data_siswa['alamat'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="height: 50px;">
          <td colspan="3">
            adalah benar-benar siswa Madrasah Aliyah Negeri 2 Tulungagung Tahun Pelajaran <?= $data['catatan'] ?>
          </td>
        </tr>
        <tr style="height: 50px; vertical-align: text-top;">
          <td colspan="3">
            Demikian surat keterangan ini dibuat, untuk dipergunakan sebagaimana mestinya.
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 55%;"></td>
          <td>
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <?php
            $query = mysqli_query($koneksi, 'SELECT
                                                  *
                                                FROM
                                                  tbl_tanda_tangan A
                                                  INNER JOIN tbl_guru B
                                                    ON A.id_user = B.id
                                                WHERE B.pangkat = "kamad"
                                                  AND A.id_surat = "' . $id . '"
                                                  ');
            $data = mysqli_fetch_array($query);
            if ($data['status'] == "diterima") {
            ?>
              <img style="position: absolute; max-width: 280px; right: 29em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
            <?php } ?>
            <br />
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            Muhamad Dopir
            <?php
            $query = mysqli_query($koneksi, 'SELECT
                                                  *
                                                FROM
                                                  tbl_tanda_tangan A
                                                  INNER JOIN tbl_guru B
                                                    ON A.id_user = B.id
                                                WHERE B.pangkat = "katu"
                                                  AND A.id_surat = "' . $id . '"
                                                  ');
            $data = mysqli_fetch_array($query);
            if ($data['status'] == "diterima") {
            ?>
              <img style="max-height: 20px;" src="../../dist/img/ttd/paraf.png">
            <?php } ?>
            <br>
          </td>
        </tr>
      </table>
    </div>
  </body>

  </html>

<?php } ?>