<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }


    $id = $_GET['id'];
    $id_surat = $_GET['id_surat'];
    $query = mysqli_query($koneksi, 'DELETE FROM tbl_surat_dispen WHERE id="' . $id . '"');
    // echo 'UPDATE tbl_surat SET delete="y" WHERE id="' . $id . '"';

    if ($query != 0) {
        header("location:" . base_url() . "surat-dispen/create?id=".$id_surat."&pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-dispen/create?id=".$id_surat."&pesan=gagal");
    }
