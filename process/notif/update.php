<?php
include_once("../../config/database.php");
include_once("../../library/helper.php");
session_start();
if ($_SESSION['status'] != "login") {
    $_SESSION['massage'] = 'belum_login';
    redirect('auth');
}

$id = $_POST['id'];

$cek = mysqli_query($koneksi, 'SELECT
                                    tbl_tanda_tangan.id,
                                    tbl_tanda_tangan.notif
                                    FROM
                                    tbl_tanda_tangan
                                    INNER JOIN tbl_guru
                                        ON tbl_guru.id = tbl_tanda_tangan.id_user
                                    WHERE tbl_tanda_tangan.id_surat = "' . $id . '"
                                    AND tbl_guru.pangkat = "kamad"
                                    AND tbl_tanda_tangan.status = "diterima"
                                    AND tbl_tanda_tangan.status_notif = "diterima"
                                    AND tbl_tanda_tangan.notif = "belum"');
$data = mysqli_fetch_array($cek);

$query = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan set 
                                    notif = "dilihat"
                                    WHERE id="' . $data['id'] . '"');
