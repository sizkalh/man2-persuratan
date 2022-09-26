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
    $nama_mhs = $_POST['nama_mhs'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];
    $kampus = $_POST['kampus'];
    $judul = $_POST['judul'];


    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_mulai = str_replace('/', '-', $tanggal_mulai );
    $tanggal_mulai = date('Y-m-d', strtotime($tanggal_mulai));


    $tanggal_selesai = $_POST['tanggal_selesai'];
    $tanggal_selesai = str_replace('/', '-', $tanggal_selesai );
    $tanggal_selesai = date('Y-m-d', strtotime($tanggal_selesai));

    $jenis_surat = 'surat_izin_penelitian';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", kepada="' . $id_guru . '" WHERE id="' . $id . '"');

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat_izin_penelitian set nama_mhs="'.$nama_mhs.'", nim="'.$nim. '", jurusan="'. $jurusan. '", semester="' . $semester . '", kampus="' . $kampus . '", judul="' . $judul . '", tanggal_mulai="' . $tanggal_mulai . '", tanggal_selesai="' . $tanggal_selesai . '" WHERE id_surat = "' . $id . '"');

    // echo 'UPDATE surat_izin_penelitian set nama_mhs="' . $nama_mhs . '", nim="' . $nim . '", jurusan="' . $jurusan . '", semester="' . $semester . '", kampus="' . $kampus . '", judul="' . $judul . '", tanggal_mulai="' . $tanggal_mulai . '", tanggal_selesai="' . $tanggal_selesai . '" WHERE id_surat = "' . $id . '"';
    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-izin-penelitian/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-izin-penelitian/index?pesan=gagal");
    }
?>