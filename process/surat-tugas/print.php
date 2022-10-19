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
  // $query_guru = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE id = ' . $data['kepada']);
  // $data_guru = mysqli_fetch_array($query_guru);
?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Tugas</title>
  </head>

  <body>
    <div>
      <table>
        <tr>
          <td colspan="3">
            <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; padding-bottom: 40px;">
            <b>SURAT TUGAS</b> <br />
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 110px; vertical-align: top;" rowspan="2">Menimbang</td>
                <td style="vertical-align: top;" rowspan="2">:</td>
                <td style="vertical-align: top;">a.</td>
                <td>Bahwa dalam rangka <?= $data['perihal'] ?></td>
              </tr>
              <tr>
                <td style="vertical-align: top;">b.</td>
                <td>Bahwa berdasarkan pertimbangan sebagaimana pada huruf a dipandang perlu untuk memberi tugas kepada <?= $data['keterangan'] ?></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 110px; vertical-align: top;">Dasar</td>
                <td style="vertical-align: top;" colspan="2">:</td>
              </tr>
              <tr>
                <td style="vertical-align: top; width: 1000px; text-align: center;" colspan="4">Memberikan Tugas</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 110px; vertical-align: top;">Kapada</td>
                <td style="vertical-align: top;">:</td>
                <td colspan="2">
                  <table>
                    <?php
                    $no = 1;
                    $query_petugas = mysqli_query($koneksi, "SELECT
                                                              tbl_surat_tugas.id AS id_surat_tugas,
                                                              tbl_guru.*
                                                              FROM
                                                              tbl_surat_tugas
                                                              INNER JOIN tbl_guru
                                                                  ON tbl_guru.id = tbl_surat_tugas.id_guru
                                                              WHERE tbl_surat_tugas.id_surat = '" . $data['id'] . "'
                                                              ");
                    while ($data_petugas = mysqli_fetch_array($query_petugas)) {
                    ?>
                      <tr>
                        <td>
                          <table>
                            <tr>
                              <td style="vertical-align: top;" rowspan="4"><?= $no++ ?>.</td>
                              <td>Nama</td>
                              <td>: <?= $data_petugas['nama'] ?></td>
                            </tr>
                            <tr>
                              <td>NIP</td>
                              <td>: <?= $data_petugas['nip'] ?></td>
                            </tr>
                            <tr>
                              <td>Pangkalan/Gol</td>
                              <td>: <?= $data_petugas['golongan'] ?></td>
                            </tr>
                            <tr>
                              <td>Jabatan</td>
                              <td>: <?= $data_petugas['jabatan'] ?></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr style="height: 200px;">
          <td colspan="3">
            <table>
              <tr>
                <td style="width: 110px; vertical-align: top;" rowspan="6">Untuk</td>
                <td style="vertical-align: top;" rowspan="6">:</td>
                <td colspan="2">Mengikuti kegiatan <?= $data['alamat'] ?> pada : </td>
              </tr>
              <tr>
                <td style="width: 110px;">Hari</td>
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
          <td></td>
          <td style="width: 35%;"></td>
          <td style="text-align: center;">
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <br />
            <img src="../../dist/img/ttd/contohttd.png" style="max-width: 200px;">
            <br />
            <u>Drs. Muhamad Dopir, M.Pd.I.</u><br>
            NIP. 196212061990032001
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