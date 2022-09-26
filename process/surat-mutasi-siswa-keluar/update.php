<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $kepada = $_POST['id_siswa'];
    $perihal = $_POST['pindah_ke'];
    $dalam_rangka = $_POST['diterima_di'];
    $catatan = $_POST['alasan_pindah'];

    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $tanggal_pembuatan = str_replace('/', '-', $tanggal_pembuatan );
    $new_tanggal_pembuatan = date('Y-m-d', strtotime($tanggal_pembuatan));

    $jenis_surat = 'surat_mutasi_siswa_keluar';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", kepada="' . $kepada . '", perihal="' . $perihal . '", keterangan="' . $dalam_rangka . '", catatan="' . $catatan . '", tgl_pembuatan="' . $new_tanggal_pembuatan . '" WHERE id="' . $id . '"');
    

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-mutasi-siswa-keluar/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-mutasi-siswa-keluar/index?pesan=gagal");
    }
?>