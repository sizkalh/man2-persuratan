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
    <title>Surat Dispen</title>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
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
    <div style="margin-top: -50px;">
      <table style="margin: 0 auto;">
        <tr>
          <td colspan="3">
            <img src="../../dist/img/kop_surat.png" alt="" style="max-width: 100%;">
          </td>
        </tr>
        <tr>
          <td colspan="3" style="text-align: center; padding-bottom: 40px;">
            <b>SURAT DISPENSASI</b> <br />
            NOMOR : <?= $data['no_surat'] ?>
          </td>
        </tr>
        <tr>
          <td colspan="3">
            Yang bertanda tangan dibawah ini,
          </td>
        </tr>
        <tr style="height: 50px; vertical-align: text-top;">
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
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding-top: 10px;">
            Dengan ini memberikan dispensasi kepada siswa MAN 2 Tulungagung yang namanya tercantum dibawah ini :
          </td>
        </tr>
        <tr>
          <td colspan="3">
            <table id="prestasi_data">
              <tr>
                <th style="width: 35px; text-align: center;">No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th style="text-align: center;">Keterangan</th>
              </tr>
              <?php
              $no = 1;
              $query_petugas = mysqli_query($koneksi, "SELECT
                                                      A.*,
                                                      B.id_detail_kelas,
                                                      B.rombel,
                                                      C.nama AS kelas,
                                                      C.nama_kelas,
                                                      D.nama AS jurusan,
                                                      E.id AS id_surat_dispen,
                                                      E.keterangan
                                                      FROM
                                                      tbl_siswa A
                                                      INNER JOIN tbl_detail_kelas B
                                                          ON B.id_detail_kelas = A.id_detail_kelas
                                                      INNER JOIN tbl_kelas C
                                                          ON C.id_kelas = B.id_kelas
                                                      INNER JOIN tbl_jurusan D
                                                          ON D.id_jurusan = B.id_jurusan
                                                          INNER JOIN tbl_surat_dispen E
                                                          ON E.id_siswa = A.id
                                                      WHERE E.id_surat = '" . $data['id'] . "'
                                                      ");
              if (mysqli_num_rows($query_petugas) > 0) {
                while ($siswa = mysqli_fetch_array($query_petugas)) {
              ?>
                  <tr>
                    <td style="text-align: center;"><?= $no++ ?></td>
                    <td><?= $siswa['nama'] ?></td>
                    <td style="text-align: center;"><?= $siswa['rombel'] != '0' ? $siswa['kelas'] . '  ' . $siswa['jurusan'] . '  ' . $siswa['rombel'] : $siswa['kelas'] . '  ' . $siswa['jurusan']  ?></td>
                    <td><?= $siswa['keterangan'] ?></td>
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
        <tr>
          <td colspan="3" style="padding-top: 20px;">
            Untuk tidak mengikuti Kegiatan Belajar Mengajar (KBM) seperti biasa dikarenakan <?= $data['alamat'] ?>, pada :
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
                <td>
                  : <?php if ($data['tgl_pelaksanaan'] <> '') {
                      echo tgl_indo($data['tgl_pelaksanaan']);
                    } ?>
                </td>
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
            Demikian, untuk dipergunakan sebagaimana mestinya.
          </td>
        </tr>
        <tr>
          <td></td>
          <td style="width: 65%;"></td>
          <td>
            Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
            <br />
            Kepala Madrasah,
            <img style="position: absolute; max-width: 240px; left: 23em; margin-top: -1em;" src="../../dist/img/ttd/contohttd.png">
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

<?php } ?>