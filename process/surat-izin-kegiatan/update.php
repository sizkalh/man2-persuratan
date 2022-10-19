<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $id_guru = $_POST['id_guru'];

    $surat_dari = $_POST['surat_dari'];
    $no_surat_dari = $_POST['no_surat_dari'];
    $tgl_surat_dari = $_POST['tgl_surat_dari'];
    $tgl_surat_dari = str_replace('/', '-', $tgl_surat_dari );
    $tgl_surat_dari = date('Y-m-d', strtotime($tgl_surat_dari));
    $perihal_surat_dari = $_POST['perihal_surat_dari'];

    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $keterangan = $_POST['keterangan'];

    $jenis_surat = 'surat_izin_kegiatan';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set 
                                    jenis="' . $jenis_surat . '", 
                                    kepada="' . $id_guru . '", 
                                    alamat="' . $surat_dari . '", 
                                    catatan="' . $no_surat_dari . '", 
                                    tgl_pelaksanaan2="' . $tgl_surat_dari . '", 
                                    perihal="' . $perihal_surat_dari . '", 
                                    hari="' . $hari . '", 
                                    tgl_pelaksanaan="' . $tanggal_pelaksanaan . '", 
                                    waktu="' . $waktu . '", 
                                    tempat="' . $tempat . '", 
                                    keterangan="' . $keterangan . '"
                                    WHERE id="' . $id . '"
                                    ');

    
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-izin-kegiatan/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-izin-kegiatan/index?pesan=gagal");
    }
?>