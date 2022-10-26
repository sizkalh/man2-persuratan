<?php
include_once("../../config/database.php");
session_start();
if ($_SESSION['status'] != "login") {
    $_SESSION['massage'] = 'belum_login';
    redirect('auth');
}
date_default_timezone_set('Asia/Jakarta');

$id_surat = $_POST['id_surat'];
$pangkat = $_POST['pangkat'];
$catatan = $_POST['catatan'];

$id_user = $_SESSION['id_user'];
$tgl_proses = date('Y-m-d H:i:s');

$query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="ditolak", status_notif="ditolak", catatan = "' . $catatan . '", tgl_proses = "' . $tgl_proses . '" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user . '"');

if ($pangkat == "operator") {
    $cek_pangkat = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_guru INNER JOIN tbl_tanda_tangan ON tbl_tanda_tangan.id_user=tbl_guru.id WHERE tbl_guru.pangkat = "guru"');
    while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
        $id_user_p = $data_pangkat['id_user'];
        $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek", status_notif="ditolak" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');
    }
} else if ($pangkat == "katu") {
    $cek_pangkat = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_guru INNER JOIN tbl_tanda_tangan ON tbl_tanda_tangan.id_user=tbl_guru.id WHERE tbl_guru.pangkat = "operator"');
    while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
        $id_user_p = $data_pangkat['id_user'];
        $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek", status_notif="ditolak" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');
    }
} else if ($pangkat == "kamad") {
    $cek_pangkat = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_guru INNER JOIN tbl_tanda_tangan ON tbl_tanda_tangan.id_user=tbl_guru.id WHERE tbl_guru.pangkat = "katu"');
    while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
        $id_user_p = $data_pangkat['id_user'];
        $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek", status_notif="ditolak" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');
    }
} else if ($pangkat == "superuser") {
    $cek_pangkat = mysqli_query($koneksi, 'SELECT tbl_guru.pangkat, tbl_tanda_tangan.* FROM tbl_guru INNER JOIN tbl_tanda_tangan ON tbl_tanda_tangan.id_user=tbl_guru.id WHERE tbl_guru.pangkat = "kamad"');
    while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
        $id_user_p = $data_pangkat['id_user'];
        $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek", status_notif="ditolak" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');
    }
}

if ($query_ttd > 0) {
    $status = array(
        'status' => 'sukses'
    );
} else {
    $status = array(
        'status' => 'gagal'
    );
}
echo json_encode($status);
