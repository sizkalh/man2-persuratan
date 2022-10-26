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
    <title>Permohonan Narasumber</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
  </head>

  <body style="border-collapse: collapse;">
    <div style="margin-top: -50px;">
      <table style="margin: 0 auto;">
        <tr>
          <td colspan="3">
            <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
          </td>
        </tr>
        <tr>
          <td colspan="2" style="vertical-align: text-top;">
            <table style="border-collapse: collapse;">
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
        <tr style="height: 60px;">
          <td>
            Yth. Bapak/Ibu/Sdr <?= $data['kepada'] ?>
            <br>
            di <?= $data['alamat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Sehubungan akan diselenggarakan kegiatan <?= $data['keterangan'] ?> sebagai narasumber dalam kegiatan tersebut yang akan dilaksanakan pada :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table style="border-collapse: collapse;">
              <tr>
                <td rowspan="4" style="vertical-align: text-top;"></td>
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
          <td colspan="3">
            Demikian surat permohonan ini kami sampaikan. Atas kesediaan dan kerjasamanya, disampaikan terima kasih.
          </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            Tulungagung
            <br />
            Kepala Madrasah,
            <img style="position: absolute; max-width: 230px; left: 25em; margin-top: 0em;" src="../../dist/img/ttd/contohttd.png">
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

  </html>

<?php } ?>