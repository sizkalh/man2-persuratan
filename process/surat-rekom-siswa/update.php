<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $kepada = $_POST['id_siswa'];
    $keterangan = $_POST['id_guru'];
    $perihal = $_POST['perihal'];
    $catatan = $_POST['tahun_ajaran'];

    $jenis_surat = 'surat_rekom_siswa';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", kepada="' . $kepada . '", keterangan="' . $keterangan . '", perihal="' . $perihal . '", catatan="' . $catatan . '" WHERE id="' . $id . '"');
    

    // echo 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", kepada="' . $kepada . '", keterangan="' . $keterangan . '", perihal="' . $perihal . '", catatan="' . $catatan . '" WHERE id="' . $id . '"';
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-rekom-siswa/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-rekom-siswa/index?pesan=gagal");
    }
?>