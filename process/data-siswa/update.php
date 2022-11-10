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
    $id_detail_kelas = $_POST['id_detail_kelas'];
    $nis = $_POST['nis'];    
    $nisn = $_POST['nisn'];
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
    $role = $_POST['role'];

    $query = mysqli_query($koneksi, 'UPDATE tbl_siswa set 
                                    satdik = "' . $satdik . '", 
                                    id_detail_kelas = "' . $id_detail_kelas . '", 
                                    nis = "' . $nis . '", 
                                    nisn = "' . $nisn . '", 
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
                                    role = "' . $role . '"
                                    WHERE id="' . $id . '"');
    

    // echo 'UPDATE tbl_siswa set 
    //                                 satdik = "' . $satdik . '", 
    //                                 id_detail_kelas = "' . $id_detail_kelas . '", 
    //                                 nis = "' . $nis . '", 
    //                                 nisn = "' . $nisn . '", 
    //                                 nama = "' . $nama . '", 
    //                                 jk = "' . $jk . '",
    //                                 tempat_lahir = "' . $tempat_lahir . '",
    //                                 tgl_lahir = "' . $tgl_lahir . '",
    //                                 jml_saudara = "' . $jml_saudara . '",
    //                                 alamat = "' . $alamat . '",
    //                                 no_hp = "' . $no_hp . '",
    //                                 nama_wali = "' . $nama_wali . '",
    //                                 no_hp_wali = "' . $no_hp_wali . '",
    //                                 pekerjaan_wali = "' . $pekerjaan_wali . '",
    //                                 nama_ibu = "' . $nama_ibu . '",
    //                                 no_hp_ibu = "' . $no_hp_ibu . '",
    //                                 pekerjaan_ibu = "' . $pekerjaan_ibu . '",
    //                                 username = "' . $username . '",
    //                                 role = "' . $role . '"
    //                                 WHERE id="' . $id . '"';
    
    if ($query != 0) {
        header("location:" . base_url() . "data-siswa/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "data-siswa/index?pesan=gagal");
    }
?>