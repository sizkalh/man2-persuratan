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
    <title>Surat Pemberitahuan</title>
  </head>

  <body>
    <div>
      <table>
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
              <tr>
                <td>Lapiran</td>
                <td>: 
                  <?php
                      $query_lampiran = mysqli_query($koneksi, 'SELECT * FROM tbl_lampiran LEFT JOIN tbl_surat ON tbl_surat.id=tbl_lampiran.id_surat WHERE tbl_surat.id = "' . $id . '"');
                      if (mysqli_num_rows($query_lampiran) > 0) {
                        $data_lapiran = mysqli_fetch_array($query_lampiran);
                        echo $data_lapiran['lampiran'];
                      }else{
                        echo '-';
                      }
                  ?>
                </td>
              </tr>
            </table>
          </td>
          <td style="vertical-align: text-top; text-align: right;">
            <?= $data['tgl_pembuatan'] ?>
          </td>
        </tr>
        <tr>
          <td style="vertical-align: text-top; width: 35%; padding-bottom: 3em;">
            Yth. Wali Murid <?= $data['kepada'] ?>
            <br>
            di <?= $data['alamat'] ?>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3">
            Dalam rangka akan dilaksanakan Kegiatan <?= $data['keterangan'] ?> maka kami mengharap kesediaan Bapak / Ibu Wali Murid memberikan izin kepada putra – putrinya untuk mengikuti kegiatan tersebut, yang akan dilaksanakan, pada :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 100px;">Hari</td>
                <td>: <?= $data['hari'] ?></td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>: <?php if ($data['tgl_pelaksanaan'] <> '') {
                        echo tgl_indo($data['tgl_pelaksanaan']);
                      } ?></td>
              </tr>
              <tr>
                <td>Waktu</td>
                <td>: <?= $data['waktu'] ?></td>
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
            Demikian, disampaikan terima kasih.
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 30%;"></td>
          <td style="text-align: center;">
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <br />
            <img src="../../dist/img/ttd/contohttd.png" style="max-width: 200px;">
            <br />
            Mohamad Dopir
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