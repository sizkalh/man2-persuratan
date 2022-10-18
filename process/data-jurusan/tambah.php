<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $nama = $_POST['nama'];
    
    $query = mysqli_query($koneksi, 'insert into tbl_jurusan set nama = "'. $nama .'"');
    
    if ($query != 0) {
        header("location:" . base_url() . "data-kelas/create?pesan=berhasil");
    } else {
        header("location:" . base_url() . "data-kelas/create?pesan=gagal");
    }
