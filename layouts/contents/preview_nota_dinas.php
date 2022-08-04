<?php
function tgl_indo($tanggal){
	$bulan = array (
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
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function tgl_indo_garing($tanggal){
	$bulan = array (
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
 
	return  $pecahkan[0]. ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
}
 
// echo tgl_indo_garing("01/08/2022");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nota Dinas</title>
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
          <b>NOTA DINAS</b> <br>
          NOMOR :
        </td>
      </tr>
      <tr>
        <td>Yth</td>
        <td colspan="2">: <?= $_GET['kepada'] ?></td>
      </tr>
      <tr>
        <td>Dari</td>
        <td colspan="2">: Kepala Madrasah
        <td>
      </tr>
      <tr>
        <td>Hal</td>
        <td colspan="2">: <?= $_GET['perihal'] ?>
        <td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td colspan="2">: <?= tgl_indo_garing($_GET['tanggal_pembuatan']) ?>
        <td>
      </tr>
      <tr>
        <td>Lampiran</td>
        <td colspan="2">: <?= $_GET['lampiran'] ?></td>
      </tr>
      <tr>
        <td colspan="3">
          <hr style="width: 100%; border: 1px solid black;">
        </td>
      </tr>
      <tr>
        <td colspan="3">
          Dalam rangka <?= $_GET['dalam_rangka'] ?>, maka mengharap kehadiran Bapak / Ibu Guru besok, pada :
        </td>
      </tr>
      <tr>
        <td>Hari</td>
        <td colspan="2">: <?= $_GET['hari'] ?></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td colspan="2">: <?= tgl_indo_garing($_GET['tanggal_pelaksanaan']) ?></td>
      </tr>
      <tr>
        <td>Waktu</td>
        <td colspan="2">: <?= $_GET['waktu'] ?></td>
      </tr>
      <tr>
        <td>Tempat</td>
        <td colspan="2">: <?= $_GET['tempat'] ?></td>
      </tr>
      <tr>
        <td colspan="3" style="padding-top: 20px; padding-bottom: 40px;">
          Demikian, atas kehadiran dan kesediaannya, disampaikan terima kasih.
        </td>
      </tr>
      <tr>
        <td></td>
        <td style="width: 60%;"></td>
        <td style="text-align: center;">
          Tulungagung, <?= tgl_indo(date('Y-m-d')) ?>
          <br>
          Kepala Madrasah,
          <br><br><br><br><br><br>
          Mohamad Dopir
        </td>
      </tr>
    </table>
  </div>
</body>

</html>