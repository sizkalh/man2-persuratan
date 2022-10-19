<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_siswa = $_POST['id_siswa'];
    $id_surat = $_POST['id_surat'];
    $id_detail_kelas = $_POST['id_detail_kelas'];
    $keterangan = $_POST['keterangan'];
    

    $query = mysqli_query($koneksi, 'insert into tbl_surat_dispen set 
                                    id_surat="'.$id_surat.'",
                                    id_siswa="'.$id_siswa. '",
                                    id_detail_kelas="' . $id_detail_kelas . '",
                                    keterangan="' . $keterangan . '"
                                    ');

    
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-dispen/create?id=".$id_surat."&pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-dispen/create?id=".$id_surat."&pesan=gagal");
    }
