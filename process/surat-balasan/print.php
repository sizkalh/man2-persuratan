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
include_once("../../config/database.php");
$id = $_GET['id'];
// query disesuaikan dengan data yang akan ditampilkan
$query_surat = mysqli_query($koneksi, "SELECT 
                                      surat.id,
                                      surat.no_surat, 
                                      balas.* 
                                      FROM tbl_surat AS surat 
                                      LEFT JOIN tbl_surat_balasan AS balas 
                                      ON balas.id_surat = surat.id 
                                      WHERE surat.id='" . $id . "'
                                      ");
while ($data = mysqli_fetch_array($query_surat)) {
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURAT KETERANGAN KESEDIAAN</title>
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
            <b>SURAT KETERANGAN KESEDIAAN</b> <br>
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
                <td style="width: 100px;">Nama</td>
                <td>: <?= $data['nama'] ?></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>: <?= $data['nip'] ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>: <?= $data['jabatan'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="height: 100px;">
          <td colspan="3">
            Menerangkan dengan sebenarnya bahwa kami bersedia untuk menerima <?= $data['tugas_diterima'] ?> secara online atau secara offline yang akan dilaksanakan pada bulan <?= $data['bulan_awal'] ?>, untuk <?= $data['keterangan'] ?> dan bulan <?= $data['bulan_akhir'] ?>
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 60%;"></td>
          <td>
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <img style="position: absolute; max-width: 280px; left: 21em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
            <br />
            <br>
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