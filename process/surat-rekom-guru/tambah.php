<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $kepada = $_POST['id_guru'];
    $keterangan = $_POST['id_karyawan'];
    $catatan = $_POST['perihal'];

    $new_tanggal_pembuatan = date('Y-m-d');

    $jenis_surat = 'surat_rekom_guru';
    
    $query_admin = mysqli_query($koneksi, 'select * from tbl_guru where pangkat="superuser"');
    $query_operator = mysqli_query($koneksi, 'select * from tbl_guru where pangkat="operator"');
    $query_kamad = mysqli_query($koneksi, 'select * from tbl_guru where pangkat="kamad"');
    $query_katu = mysqli_query($koneksi, 'select * from tbl_guru where pangkat="katu"');

    while($admin = mysqli_fetch_array($query_admin)){
        $id_admin = $admin['id'];
    }

    while($operator = mysqli_fetch_array($query_operator)){
        $id_operator = $operator['id'];
    }

    while($kamad = mysqli_fetch_array($query_kamad)){
        $id_kamad = $kamad['id'];
    }

    while($katu = mysqli_fetch_array($query_katu)){
        $id_katu = $katu['id'];
    }
    
    $query = mysqli_query($koneksi, 'insert into tbl_surat set jenis="'.$jenis_surat.'", kepada="'.$kepada. '", keterangan="'.$keterangan. '", catatan="' . $catatan . '", tgl_pembuatan="'.$new_tanggal_pembuatan.'", id_pemohon = "'.$_SESSION['id_user'].'", hapus = "n"');
    
    // echo 'insert into tbl_surat set jenis="'.$jenis_surat.'", hari="'.$hari.'", tgl_pelaksanaan="'.$new_tanggal_pelaksanaan.'", waktu="'.$waktu.'", tempat="'.$tempat.'", kepada="'.$kepada. '", alamat="' . $alamat . '", perihal="'.$perihal.'", keterangan="'.$dalam_rangka.'", tgl_pembuatan="'.$new_tanggal_pembuatan.'", id_pemohon = "'.$_SESSION['id_user'].'", hapus = "n"';

    $last_surat = mysqli_query($koneksi, 'SELECT * FROM tbl_surat ORDER BY id DESC LIMIT 1');
    while($l_surat = mysqli_fetch_array($last_surat)){
        $id_surat = $l_surat['id'];
    }
    
    $insert_admin = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_admin.'", status = "belum"');
    $insert_kamad = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_kamad.'", status = "belum"');
    $insert_katu = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_katu.'", status = "belum"');    
    $insert_operator = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_operator.'", status = "belum"');
    $insert_pemohon = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$_SESSION['id_user'].'", status = "cek"');

 
    if ($query != 0) {
        header("location:" . base_url() . "surat-rekom-guru/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-rekom-guru/index?pesan=gagal");
    }
