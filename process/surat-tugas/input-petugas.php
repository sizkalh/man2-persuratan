<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_guru = $_POST['id_guru'];
    $id_surat = $_POST['id_surat'];

    $query = mysqli_query($koneksi, 'insert into tbl_surat_tugas set 
                                    id_surat="'.$id_surat.'",
                                    id_guru="'.$id_guru.'"
                                    ');

    
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-tugas/create?id=".$id_surat."&pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-tugas/create?id=".$id_surat."&pesan=gagal");
    }
