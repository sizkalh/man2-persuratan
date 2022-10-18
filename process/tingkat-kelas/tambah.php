<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $nama = $_POST['nama'];
    $nama_kelas = $_POST['nama_kelas'];
    
    $query = mysqli_query($koneksi, 'insert into tbl_kelas set nama = "'. $nama .'", nama_kelas = "'.$nama_kelas.'"');
    
    if ($query != 0) {
        header("location:" . base_url() . "data-kelas/create?pesan=berhasil");
    } else {
        header("location:" . base_url() . "data-kelas/create?pesan=gagal");
    }
