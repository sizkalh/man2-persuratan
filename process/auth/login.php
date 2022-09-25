<?php 
    // mengaktifkan session php
    session_start();
    
    // menghubungkan dengan koneksi
    include '../../config/database.php';
    include '../../library/helper.php';
    
    // menangkap data yang dikirim dari form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    // menyeleksi data admin dengan username dan password yang sesuai
    if($_POST['role'] == 'guru'){
        $data = mysqli_query($koneksi,"select * from tbl_guru where username='$username' and password='$password'");
    }else if($_POST['role'] == 'siswa'){
        $data = mysqli_query($koneksi,"select * from tbl_siswa where username='$username' and password='$password'");
    }
       
    // menghitung jumlah data yang ditemukan
    $cek = mysqli_num_rows($data);
    // echo $cek;
    
    if($cek > 0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['role'] = $_POST['role'];

        while ($data_user = mysqli_fetch_array($data)) {
            $_SESSION['id_user'] = $data_user['id'];
            $_SESSION['nama_user'] = $data_user['nama'];
            if($_POST['role'] == 'guru'){
                $_SESSION['jabatan_user'] = $data_user['jabatan'];
                $_SESSION['pangkat_user'] = $data_user['pangkat'];
                if($data_user['nip'] != null || $data_user['nip'] != ''){
                    $_SESSION['nip'] = $data_user['nip'];
                }
            }else if($_POST['role'] == 'siswa'){
                $_SESSION['jabatan_user'] = 'siswa';
            }            
        }

        redirect('index');
    }else{
        $_SESSION['massage'] = 'gagal';
        redirect('auth');
    }
?>