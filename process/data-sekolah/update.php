<?php
include_once("../../config/database.php");
include_once("../../library/helper.php");
session_start();
if ($_SESSION['status'] != "login") {
    $_SESSION['massage'] = 'belum_login';
    redirect('auth');
}

$id = 1;
$nama_sekolah = $_POST['nama_sekolah'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$website = $_POST['website'];
$kode_pos = $_POST['kode_pos'];
$npsn = $_POST['npsn'];

$query = mysqli_query($koneksi, 'UPDATE tbl_sekolah set nama_sekolah="' . $nama_sekolah . '", alamat="' . $alamat . '", telp="' . $telp . '", email="' . $email . '", website="' . $website . '", kode_pos="' . $kode_pos . '", npsn="' . $npsn . '" WHERE id="' . $id . '"');

// echo 'UPDATE tbl_sekolah set nama_sekolah="' . $nama_sekolah . '", alamat="' . $alamat . '", telp="' . $telp . '", email="' . $email . '", website="' . $website . '", kode_pos="' . $kode_pos . '", npsn="' . $npsn . '" WHERE id="' . $id . '"';

if ($query != 0) {
    header("location:" . base_url() . "data-sekolah/index?pesan=berhasil");
} else {
    header("location:" . base_url() . "data-sekolah/index?pesan=gagal");
}
