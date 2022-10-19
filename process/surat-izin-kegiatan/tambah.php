<?php 
    include_once("../../config/database.php");
    include_once("../../library/helper.php");
    session_start();
    if($_SESSION['status'] != "login"){
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_guru = $_POST['id_guru'];

    $surat_dari = $_POST['surat_dari'];
    $no_surat_dari = $_POST['no_surat_dari'];
    $tgl_surat_dari = $_POST['tgl_surat_dari'];
    $tgl_surat_dari = str_replace('/', '-', $tgl_surat_dari );
    $tgl_surat_dari = date('Y-m-d', strtotime($tgl_surat_dari));
    $perihal_surat_dari = $_POST['perihal_surat_dari'];

    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];
    $keterangan = $_POST['keterangan'];

    $new_tanggal_pembuatan = date('Y-m-d');

    $jenis_surat = 'surat_izin_kegiatan';
    
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
    
    $query = mysqli_query($koneksi, 'insert into tbl_surat set 
                                    jenis="'.$jenis_surat.'", 
                                    kepada="'.$id_guru. '", 
                                    alamat="' . $surat_dari . '", 
                                    catatan="' . $no_surat_dari . '", 
                                    tgl_pelaksanaan2="' . $tgl_surat_dari . '", 
                                    perihal="' . $perihal_surat_dari . '", 
                                    hari="' . $hari . '", 
                                    tgl_pelaksanaan="' . $tanggal_pelaksanaan . '", 
                                    waktu="' . $waktu . '", 
                                    tempat="' . $tempat . '", 
                                    keterangan="' . $keterangan . '", 
                                    tgl_pembuatan="'.$new_tanggal_pembuatan.'", 
                                    id_pemohon = "'.$_SESSION['id_user'].'", 
                                    hapus = "n"');
    
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
        header("location:" . base_url() . "surat-izin-kegiatan/index?pesan=berhasil");
    } else {
        header("location:" . base_url() . "surat-izin-kegiatan/index?pesan=gagal");
    }

?>