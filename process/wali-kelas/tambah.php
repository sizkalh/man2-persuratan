<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_guru = $_POST['id_guru'];
    $id_detail_kelas = $_POST['id_detail_kelas'];

    $query = mysqli_query($koneksi, 'insert into tbl_wali_kelas set 
                                    id_guru = "' . $id_guru . '", 
                                    id_detail_kelas = "' . $id_detail_kelas . '"
                                    ');
    if ($query != 0) {
        header("location:" . base_url() . "wali-kelas/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "wali-kelas/index?pesan=gagal");
    }
