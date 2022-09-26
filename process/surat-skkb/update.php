<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $tahun_ajaran = $_POST['tahun_ajaran'];

    $jenis_surat = 'surat_skkb';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", keterangan="' . $tahun_ajaran . '" WHERE id="' . $id . '"');

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-skkb/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-skkb/index?pesan=gagal");
    }
?>