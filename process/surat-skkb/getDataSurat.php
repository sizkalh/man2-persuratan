<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_surat = $_POST['id_surat'];

    $query_surat = mysqli_query($koneksi, "SELECT surat.id, balas.* FROM tbl_surat AS surat LEFT JOIN tbl_surat_balasan AS balas ON balas.id_surat = surat.id WHERE surat.id='" . $id_surat . "'");
    $data_surat = mysqli_fetch_array($query_surat);
    echo json_encode($data_surat);
 ?>