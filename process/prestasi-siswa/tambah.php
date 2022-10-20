<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_siswa = $_POST['id'];
    $prestasi = $_POST['prestasi'];
    $bidang = $_POST['bidang'];    
    $tahun = $_POST['tahun'];

    $query = mysqli_query($koneksi, 'insert into tbl_prestasi set 
                                    id_siswa = "' . $id_siswa . '", 
                                    prestasi = "' . $prestasi . '", 
                                    bidang = "' . $bidang . '", 
                                    tahun = "' . $tahun . '"
                                    ');


        //    echo 'insert into tbl_siswa set 
        //                             satdik = "' . $satdik . '", 
        //                             nis = "' . $nis . '", 
        //                             nisn = "' . $nisn . '", 
        //                             nama = "' . $nama . '", 
        //                             jk = "' . $jk . '",
        //                             tempat_lahir = "' . $tempat_lahir . '",
        //                             tgl_lahir = "' . $tgl_lahir . '",
        //                             jml_saudara = "' . $jml_saudara . '",
        //                             alamat = "' . $alamat . '",
        //                             no_hp = "' . $no_hp . '",
        //                             nama_wali = "' . $nama_wali . '",
        //                             no_hp_wali = "' . $no_hp_wali . '",
        //                             pekerjaan_wali = "' . $pekerjaan_wali . '",
        //                             nama_ibu = "' . $nama_ibu . '",
        //                             no_hp_ibu = "' . $no_hp_ibu . '",
        //                             pekerjaan_ibu = "' . $pekerjaan_ibu . '",
        //                             username = "' . $username . '",
        //                             role = "' . $role . '",
        //                             password = "' . $passwordmd . '"
        //                             ';
    if ($query != 0) {
        header("location:" . base_url() . "prestasi-siswa/edit?id=".$id_siswa."&pesan=berhasil");
    } else {
        header("location:" . base_url() . "prestasi-siswa/edit?id=".$id_siswa."&pesan=gagal");
    }
