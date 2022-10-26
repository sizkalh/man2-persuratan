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
    $role = $_POST['role'];

    $query = mysqli_query($koneksi, 'UPDATE tbl_guru set 
                                    nama = "' . $nama . '", 
                                    nip = "' . $nip . '", 
                                    jk = "' . $jk . '",
                                    no_hp = "' . $no_hp . '",
                                    email = "' . $email . '",
                                    tempat_lahir = "' . $tempat_lahir . '",
                                    tgl_lahir = "' . $tgl_lahir . '",
                                    alamat = "' . $alamat . '",
                                    pangkat_guru = "' . $pangkat . '",
                                    golongan = "' . $golongan . '",
                                    jabatan = "' . $jabatan . '",
                                    lama_pengabdian = "' . $lama_pengabdian . '",
                                    username = "' . $username . '",
                                    role = "' . $role . '",
                                    pangkat = "' . $role . '",
                                    instansi = "MAN 2 Tulungagung"
                                    WHERE id="' . $id . '"');
    

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "data-guru/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "data-guru/index?pesan=gagal");
    }
?>