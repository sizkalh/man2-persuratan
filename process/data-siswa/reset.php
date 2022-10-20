<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }


    $id = $_GET['id'];
    $password = "123";
    $passwordmd = md5($password);
    $query = mysqli_query($koneksi, 'UPDATE tbl_siswa SET password="'.$passwordmd.'" WHERE id="' . $id . '"');
    // echo 'UPDATE tbl_surat SET delete="y" WHERE id="' . $id . '"';

    if ($query != 0) {
        $status = array(
            'status' => 'sukses'
        );
    } else {
        $status = array(
            'status' => 'gagal'
        );
    }
    echo json_encode($status);
