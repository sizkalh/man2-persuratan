<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $kepada = $_POST['id_guru'];
    $keterangan = $_POST['id_karyawan'];
    $catatan = $_POST['perihal'];

    $jenis_surat = 'surat_rekom_guru';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", kepada="' . $kepada . '", keterangan="' . $keterangan . '", catatan="' . $catatan . '" WHERE id="' . $id . '"');
    

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-rekom-guru/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-rekom-guru/index?pesan=gagal");
    }
?>