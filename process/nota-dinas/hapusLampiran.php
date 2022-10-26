<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }


    $id = $_GET['id'];
    $jenis = $_GET['jenis'];
    $query = mysqli_query($koneksi, 'DELETE FROM tbl_lampiran WHERE id_surat="' . $id . '"');
    // echo 'DELETE tbl_lampiran WHERE id_surat="' . $id . '"';

    if ($query != 0) {
        header("location:" . base_url() . $jenis . "/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . $jenis . "/index?pesan=gagal");
    }
