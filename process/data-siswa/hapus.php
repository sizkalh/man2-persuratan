<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }


    $id = $_GET['id'];
    $query = mysqli_query($koneksi, 'DELETE FROM tbl_siswa WHERE id="' . $id . '"');
    // echo 'UPDATE tbl_surat SET delete="y" WHERE id="' . $id . '"';

    if ($query != 0) {
        header("location:" . base_url() . "data-siswa/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "data-siswa/index?pesan=gagal");
    }
