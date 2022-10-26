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
    $jk = $_POST['jk'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $pangkat = $_POST['pangkat'];
    $golongan = $_POST['golongan'];
    $jabatan = $_POST['jabatan'];
    $lama_pengabdian = $_POST['lama_pengabdian'];
    $username = $_POST['username'];

    if($_POST['password'] != null || $_POST['password'] != ""){
        $password = $_POST['password'];
        $passwordmd = md5($password);

        $query = mysqli_query($koneksi, 'UPDATE tbl_guru set 
                                        nama = "' . $nama . '", 
                                        nip = "' . $nip . '", 
                                        jk = "' . $jk . '",
                                        no_hp = "' . $no_hp . '",
                                        email = "' . $email . '",
                                        tempat_lahir = "' . $tempat_lahir . '",
                                        tgl_lahir = "' . $tgl_lahir . '",
                                        alamat = "' . $alamat . '",
                                        golongan = "' . $golongan . '",
                                        jabatan = "' . $jabatan . '",
                                        lama_pengabdian = "' . $lama_pengabdian . '",
                                        username = "' . $username . '",
                                        password = "' . $passwordmd . '",
                                        password2 = "' . $password . '"
                                        WHERE id="' . $id . '"');
    }else{
        $query = mysqli_query($koneksi, 'UPDATE tbl_guru set 
                                        nama = "' . $nama . '", 
                                        nip = "' . $nip . '", 
                                        jk = "' . $jk . '",
                                        no_hp = "' . $no_hp . '",
                                        email = "' . $email . '",
                                        tempat_lahir = "' . $tempat_lahir . '",
                                        tgl_lahir = "' . $tgl_lahir . '",
                                        alamat = "' . $alamat . '",
                                        golongan = "' . $golongan . '",
                                        jabatan = "' . $jabatan . '",
                                        lama_pengabdian = "' . $lama_pengabdian . '",
                                        username = "' . $username . '"
                                        WHERE id="' . $id . '"');
    }
    

    
    

    echo 'UPDATE tbl_guru set 
                                        nama = "' . $nama . '", 
                                        nip = "' . $nip . '", 
                                        jk = "' . $jk . '",
                                        no_hp = "' . $no_hp . '",
                                        email = "' . $email . '",
                                        tempat_lahir = "' . $tempat_lahir . '",
                                        tgl_lahir = "' . $tgl_lahir . '",
                                        alamat = "' . $alamat . '",
                                        pangkat = "' . $pangkat . '",
                                        golongan = "' . $golongan . '",
                                        jabatan = "' . $jabatan . '",
                                        lama_pengabdian = "' . $lama_pengabdian . '",
                                        username = "' . $username . '"
                                        WHERE id="' . $id . '"';
    
    if ($query != 0) {
        header("location:" . base_url() . "profil/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "profil/index?pesan=gagal");
    }
?>