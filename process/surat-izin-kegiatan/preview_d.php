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
          <td colspan="3" style="padding-top: 20px;">
            Berdasarkan dari surat <?= $data['alamat'] ?> , Nomor : <?= $data['catatan'] ?> , Tanggal : <?= tgl_indo_garing($data['tgl_pelaksanaan2']) ?> , Perihal : <?= $data['perihal'] ?> , maka dengan ini memberikan Izin untuk mengadakan kegiatan, pada :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 150px;">Hari</td>
                <td colspan="2">: <?= $data['hari'] ?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td colspan="2">: <?php if ($data['tgl_pelaksanaan'] <> '') {
                                    echo tgl_indo_garing($data['tgl_pelaksanaan']);
                                  } ?></td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td colspan="2">: <?= $data['waktu'] ?></td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td colspan="2">: <?= $data['tempat'] ?></td>
              </tr>
              <tr>
                <td>Kegiatan</td>
                <td colspan="2">: <?= $data['keterangan'] ?></td>
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
          <td style="width: 65%;"></td>
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
              <img style="position: absolute; max-width: 280px; right: 24em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
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