<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $perihal = $_POST['perihal'];
    $kepada = $_POST['kepada'];
    $alamat = $_POST['alamat'];

    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $tanggal_pembuatan = str_replace('/', '-', $tanggal_pembuatan );
    $new_tanggal_pembuatan = date('Y-m-d', strtotime($tanggal_pembuatan));

    
    $keterangan = $_POST['keterangan'];

    // $file_lampiran = $_FILES['file_lampiran'];
    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $new_tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $catatan = $_POST['catatan'];
    $tempat = $_POST['tempat'];

    $jenis_surat = 'surat_pengantar';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set 
                                    jenis="' . $jenis_surat . '",
                                    perihal="' . $perihal . '", 
                                    kepada="' . $kepada . '", 
                                    alamat="' . $alamat . '",  
                                    keterangan="' . $keterangan . '", 
                                    hari="' . $hari . '", 
                                    tgl_pelaksanaan="' . $new_tanggal_pelaksanaan . '", 
                                    waktu="' . $waktu . '",                                   
                                    catatan="' . $catatan . '", 
                                    tempat="' . $tempat . '",   
                                    tgl_pembuatan="' . $new_tanggal_pembuatan . '"
                                    WHERE id="' . $id . '"
                                    ');    

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-pengantar/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-pengantar/index?pesan=gagal");
    }
?>