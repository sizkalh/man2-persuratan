<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_kelas = $_POST['id_kelas'];
    $id_jurusan = $_POST['id_jurusan'];
    $rombel = $_POST['rombel'];
    
    $query = mysqli_query($koneksi, 'insert into tbl_detail_kelas set id_kelas = "'. $id_kelas .'", id_jurusan = "'. $id_jurusan .'", rombel = "'. $rombel .'"');
    
    if ($query != 0) {
        header("location:" . base_url() . "data-kelas/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "data-kelas/index?pesan=gagal");
    }
