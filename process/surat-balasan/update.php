<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $jabatan = $_POST['jabatan'];
    $tugas_diterima = $_POST['tugas_diterima'];
    $keterangan = $_POST['keterangan'];
    $bulan_awal = $_POST['bulan_awal'];
    $bulan_akhir = $_POST['bulan_akhir'];

    $new_tanggal_pembuatan = date('Y-m-d');

    $jenis_surat = 'surat_balasan';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", perihal = "' . $tugas_diterima . '", tgl_pembuatan="' . $new_tanggal_pembuatan . '" WHERE id="' . $id . '"');

    // echo 'UPDATE tbl_surat_balasan set id_surat="' . $id . '", nama="' . $nama . '", nip="' . $nip . '", jabatan="' . $jabatan . '", tugas_diterima="' . $tugas_diterima . '", keterangan="' . $keterangan . '", bulan_awal="' . $bulan_awal . '", bulan_akhir="' . $bulan_akhir . '" WHERE id_surat="' . $id . '"';
    $query = mysqli_query($koneksi, 'UPDATE tbl_surat_balasan set id_surat="'. $id.'", nama="'.$nama.'", nip="'.$nip.'", jabatan="'.$jabatan.'", tugas_diterima="'.$tugas_diterima.'", keterangan="'.$keterangan. '", bulan_awal="' . $bulan_awal . '", bulan_akhir="'.$bulan_akhir. '" WHERE id="' . $id . '"');
    

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-balasan/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-balasan/index?pesan=gagal");
    }
?>