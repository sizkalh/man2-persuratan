<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $kepada = $_POST['id_guru'];

    $alamat = $_POST['alamat'];
    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];

    $jenis_surat = 'surat_dispen';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set 
                                    kepada="' . $kepada . '", 
                                    alamat="' . $alamat . '", 
                                    hari="' . $hari . '", 
                                    tgl_pelaksanaan="' . $tanggal_pelaksanaan . '", 
                                    waktu="' . $waktu . '", 
                                    tempat="' . $tempat . '"
                                    WHERE id="' . $id . '"
                                    ');
    
    // echo 'UPDATE tbl_surat set 
    //                                 perihal="' . $perihal . '", 
    //                                 keterangan="' . $keterangan . '", 
    //                                 alamat="' . $alamat . '", 
    //                                 hari="' . $hari . '", 
    //                                 tgl_pelaksanaan="' . $tanggal_pelaksanaan . '", 
    //                                 waktu="' . $waktu . '", 
    //                                 tempat="' . $tempat . '", 
    //                                 catatan="' . $catatan . '"
    //                                 WHERE id="' . $id . '"
    //                                 ';

    
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-dispen/create?id=".$id."&pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-dispen/create?id=".$id."&pesan=gagal");
    }
?>