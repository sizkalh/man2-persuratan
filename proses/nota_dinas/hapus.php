<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../../index.php?pesan=gagal");
    }


    $id = $_GET['id'];
    $query = mysqli_query($koneksi, 'UPDATE tbl_surat SET hapus="y" WHERE id="' . $id . '"');
    // echo 'UPDATE tbl_surat SET delete="y" WHERE id="' . $id . '"';

    if ($query != 0) {
        header("location:../../layouts/contents/nota_dinas.php?pesan=berhasil");
    } else {
        header("location:../../layouts/contents/tambah_nota_dinas.php?pesan=gagal");
    }
?>