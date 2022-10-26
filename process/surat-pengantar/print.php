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
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar</title>
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
        <tr style="height: 80px;">
          <td colspan="2" style="vertical-align: text-top;">
            <table>
              <tr>
                <td>Nomor</td>
                <td>: <?= $data['no_surat'] ?></td>
              </tr>
              <tr>
                <td>Hal</td>
                <td>: <?= $data['perihal'] ?></td>
              </tr>
            </table>
          </td>
          <td style="vertical-align: text-top; text-align: right;">
            <?= tgl_indo($data['tgl_pembuatan']) ?>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: text-top; width: 35%; padding-bottom: 3em;">
            Yth. Bapak/Ibu/Sdr <?= $data['kepada'] ?>
            <br>
            di <?= $data['alamat'] ?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            <?= $data['keterangan'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td rowspan="4" style="vertical-align: top;">1.</td>
                <td style="width: 100px;">Hari, Tanggal</td>
                <td>: <?= $data['hari'] ?>, <?php if ($data['tgl_pelaksanaan'] <> '') {
                                              echo tgl_indo($data['tgl_pelaksanaan']);
                                            } ?></td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>: <?= $data['waktu'] ?></td>
              </tr>
              <tr>
                <td>Materi</td>
                <td>: <?= $data['catatan'] ?></td>
              </tr>
              <tr>
                <td>Tempat</td>
                <td>: <?= $data['tempat'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
            Demikian surat permohonan ini kami sampaikan. Atas kesediaan dan kerjasamanya disampaikan terimakasih.
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 30%;"></td>
          <td>
            Tulungagung
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
              <img style="position: absolute; max-width: 230px; left: 23em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
            <?php } ?>
            <br />
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

    <script>
      window.print();
    </script>
  </body>

  </html>

<?php } ?>