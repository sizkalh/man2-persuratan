<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $satdik = $_POST['satdik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jml_saudara = $_POST['jml_saudara'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $nama_wali = $_POST['nama_wali'];
    $no_hp_wali = $_POST['no_hp_wali'];
    $pekerjaan_wali = $_POST['pekerjaan_wali'];
    $nama_ibu = $_POST['nama_ibu'];
    $no_hp_ibu = $_POST['no_hp_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];

    $username = $_POST['username'];

    if($_POST['password'] != null || $_POST['password'] != ""){
        $password = $_POST['password'];
        $passwordmd = md5($password);

        $query = mysqli_query($koneksi, 'UPDATE tbl_siswa set 
                                    satdik = "' . $satdik . '", 
                                    nama = "' . $nama . '", 
                                    jk = "' . $jk . '",
                                    tempat_lahir = "' . $tempat_lahir . '",
                                    tgl_lahir = "' . $tgl_lahir . '",
                                    jml_saudara = "' . $jml_saudara . '",
                                    alamat = "' . $alamat . '",
                                    no_hp = "' . $no_hp . '",
                                    nama_wali = "' . $nama_wali . '",
                                    no_hp_wali = "' . $no_hp_wali . '",
                                    pekerjaan_wali = "' . $pekerjaan_wali . '",
                                    nama_ibu = "' . $nama_ibu . '",
                                    no_hp_ibu = "' . $no_hp_ibu . '",
                                    pekerjaan_ibu = "' . $pekerjaan_ibu . '",
                                    username = "' . $username . '",
                                    password = "' . $passwordmd . '"
                                    WHERE id="' . $id . '"');
    }else{
        $query = mysqli_query($koneksi, 'UPDATE tbl_siswa set 
                                    satdik = "' . $satdik . '", 
                                    nama = "' . $nama . '", 
                                    jk = "' . $jk . '",
                                    tempat_lahir = "' . $tempat_lahir . '",
                                    tgl_lahir = "' . $tgl_lahir . '",
                                    jml_saudara = "' . $jml_saudara . '",
                                    alamat = "' . $alamat . '",
                                    no_hp = "' . $no_hp . '",
                                    nama_wali = "' . $nama_wali . '",
                                    no_hp_wali = "' . $no_hp_wali . '",
                                    pekerjaan_wali = "' . $pekerjaan_wali . '",
                                    nama_ibu = "' . $nama_ibu . '",
                                    no_hp_ibu = "' . $no_hp_ibu . '",
                                    pekerjaan_ibu = "' . $pekerjaan_ibu . '",
                                    username = "' . $username . '"
                                    WHERE id="' . $id . '"');
    }
    
    if ($query != 0) {
        header("location:" . base_url() . "profil/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "profil/index?pesan=gagal");
    }
