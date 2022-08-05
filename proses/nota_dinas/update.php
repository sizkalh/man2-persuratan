<?php
    include_once("../../config/database.php");
    session_start();
    if($_SESSION['status'] != "login"){
        header("location:../../index.php?pesan=gagal");
    }

    $id = $_POST['id'];
    $kepada = $_POST['kepada'];
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
    
    $query = mysqli_query($koneksi, 'UPDATE tbl_surat set jenis="'.$jenis_surat.'", hari="'.$hari.'", tgl_pelaksanaan="'.$new_tanggal_pelaksanaan.'", waktu="'.$waktu.'", tempat="'.$tempat.'", kepada="'.$kepada.'", perihal="'.$perihal.'", keterangan="'.$dalam_rangka.'", tgl_pembuatan="'.$new_tanggal_pembuatan.'" WHERE id="'.$id.'"');
    $query = mysqli_query($koneksi, 'UPDATE tbl_lampiran set lampiran="'.$lampiran.'", file="'.$file.'" WHERE id_surat="'.$id.'"');
    
    if($query!=0){
        header("location:../../layouts/contents/nota_dinas.php?pesan=berhasil");
    }else{
        header("location:../../layouts/contents/tambah_nota_dinas.php?pesan=gagal");
    }
?>