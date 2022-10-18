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

  return  $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
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
    <title>Nota Dinas</title>
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
            <b>NOTA DINAS</b> <br>
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td>Yth</td>
          <td colspan="2">: <?= $data['kepada'] ?></td>
        </tr>
        <tr>
          <td>Dari</td>
          <td colspan="2">: Kepala Madrasah</td>
        </tr>
        <tr>
          <td>Hal</td>
          <td colspan="2">: <?= $data['perihal'] ?></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td colspan="2">: <?= tgl_indo_garing($data['tgl_pembuatan']) ?></td>
        </tr>
        <tr>
          <td>Lampiran</td>
          <td colspan="2">:
            <?php
            $cek_lampiran = mysqli_query($koneksi, 'select * from tbl_lampiran where id_surat = "' . $data['id'] . '"');
            if (mysqli_num_rows($cek_lampiran) > 0) {
              while ($data_lampiran = mysqli_fetch_array($cek_lampiran)) { ?>
                <?= $data_lampiran['lampiran'] ?>
              <?php }
            } else { ?>
              -
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <hr style="width: 100%; border: 1px solid black;">
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Dalam rangka <?= $data['keterangan'] ?>, maka mengharap kehadiran Bapak / Ibu Guru besok, pada :
          </td>
        </tr>
        <tr>
          <td>Hari</td>
          <td colspan="2">: <?= $data['hari'] ?></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td colspan="2">:
            <?php if ($data['tgl_pelaksanaan'] <> '') {
              echo tgl_indo_garing($data['tgl_pelaksanaan']);
            } ?>
          </td>
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
          <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
            Demikian, atas kehadiran dan kesediaannya, disampaikan terima kasih.
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 50%;"></td>
          <td style="text-align: center;">
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <br />
            <br />
            <br />
            <br />
            <br />
            <!-- <img src="../../dist/img/ttd/contohttd.png" style="max-width: 200px;"> -->
            <br />
            <u>Drs. Muhamad Dopir, M.Pd.I.</u> <br>
            NIP. 196212061990032001
          </td>
        </tr>
      </table>
    </div>


  </body>

  </html>

<?php } ?>