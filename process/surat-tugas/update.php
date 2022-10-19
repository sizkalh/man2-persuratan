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
    $keterangan = $_POST['keterangan'];

    $alamat = $_POST['alamat'];
    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $catatan = $_POST['catatan'];

    $jenis_surat = 'surat_tugas';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set 
                                    perihal="' . $perihal . '", 
                                    keterangan="' . $keterangan . '", 
                                    alamat="' . $alamat . '", 
                                    hari="' . $hari . '", 
                                    tgl_pelaksanaan="' . $tanggal_pelaksanaan . '", 
                                    waktu="' . $waktu . '", 
                                    tempat="' . $tempat . '", 
                                    catatan="' . $catatan . '"
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
        header("location:" . base_url() . "surat-tugas/create?id=".$id."&pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-tugas/create?id=".$id."&pesan=gagal");
    }
?>