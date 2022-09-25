<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $penerima_kuasa = $_POST['penerima_kuasa'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tanggal_lahir = str_replace('/', '-', $tanggal_lahir );
    $new_tanggal_lahir = date('Y-m-d', strtotime($tanggal_lahir));
    $jabatan_penerima_kuasa = $_POST['jabatan_penerima_kuasa'];
    $ket = $_POST['ket'];
    
    $query = mysqli_query($koneksi, 'UPDATE tbl_surat_kuasa set penerima_kuasa="'.$penerima_kuasa.'", tempat_lahir="'.$tempat_lahir.'", tanggal_lahir="'.$new_tanggal_lahir.'", jabatan_penerima_kuasa="'.$jabatan_penerima_kuasa.'", ket="'.$ket.'" WHERE id_surat="'.$id.'"');

    if ($query != 0) {
        header("location:" . base_url() . "surat-kuasa/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-kuasa/index?pesan=gagal");
    }
?>