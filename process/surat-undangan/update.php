<?php
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];
    $kepada = $_POST['kepada'];
    $alamat = $_POST['alamat'];
    $perihal = $_POST['perihal'];
    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $tanggal_pembuatan = str_replace('/', '-', $tanggal_pembuatan );
    $new_tanggal_pembuatan = date('Y-m-d', strtotime($tanggal_pembuatan));
    $lampiran = $_POST['lampiran'];
    // $file_lampiran = $_FILES['file_lampiran'];
    $dalam_rangka = $_POST['dalam_rangka'];
    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $new_tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif','pdf');
    $filename = $_FILES['file_lampiran']['name'];
    $ukuran = $_FILES['file_lampiran']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $jenis_surat = 'surat_undangan';

    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="' . $jenis_surat . '", hari="' . $hari . '", tgl_pelaksanaan="' . $new_tanggal_pelaksanaan . '", waktu="' . $waktu . '", tempat="' . $tempat . '", kepada="' . $kepada . '", alamat="' . $alamat . '", perihal="' . $perihal . '", keterangan="' . $dalam_rangka . '", tgl_pembuatan="' . $new_tanggal_pembuatan . '" WHERE id="' . $id . '"');

    if($filename != null || $filename != ''){
        $cek = mysqli_query($koneksi, 'SELECT * FROM tbl_lampiran WHERE id_surat = "' . $id . '"');
        if(mysqli_num_rows($cek) > 0){
            $xx = $rand . '_surat_undangan_' . $filename;
            move_uploaded_file($_FILES['file_lampiran']['tmp_name'], '../../upload/' . $rand . '_surat_undangan_' . $filename);
            $insert_lampiran = mysqli_query($koneksi, 'UPDATE tbl_lampiran set lampiran = "' . $lampiran . '", file = "' . $xx . '" WHERE id_surat="' . $id . '"');
        }else{
            $xx = $rand . '_surat_undangan_' . $filename;
            move_uploaded_file($_FILES['file_lampiran']['tmp_name'], '../../upload/' . $rand . '_surat_undangan_' . $filename);
            $insert_lampiran = mysqli_query($koneksi, 'INSERT tbl_lampiran SET id_surat="' . $id . '", lampiran = "' . $lampiran . '", file = "' . $xx . '"');
        }
    }
    

    // echo $query;
    
    if ($query != 0) {
        header("location:" . base_url() . "surat-undangan/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-undangan/index?pesan=gagal");
    }
?>