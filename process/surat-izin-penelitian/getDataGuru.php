<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];

    $query_siswa = mysqli_query($koneksi, "SELECT * FROM tbl_guru WHERE id = ".$id);
    $data_siswa = mysqli_fetch_array($query_siswa);
    echo json_encode($data_siswa);
