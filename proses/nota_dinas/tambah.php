<?php 
    include_once("../../config/database.php");

    $kepada = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $tanggal_pembuatan = $_POST['tanggal_pembuatan'];
    $tanggal_pembuatan = str_replace('/', '-', $tanggal_pembuatan );
    $new_tanggal_pembuatan = date('Y-m-d', strtotime($tanggal_pembuatan));
    // $lampiran = $_POST['lampiran'];
    // $file_lampiran = $_FILES['file_lampiran'];
    $dalam_rangka = $_POST['dalam_rangka'];
    $hari = $_POST['hari'];
    $tanggal_pelaksanaan = $_POST['tanggal_pelaksanaan'];
    $tanggal_pelaksanaan = str_replace('/', '-', $tanggal_pelaksanaan );
    $new_tanggal_pelaksanaan = date('Y-m-d', strtotime($tanggal_pelaksanaan));
    $waktu = $_POST['waktu'];
    $tempat = $_POST['tempat'];

    $jenis_surat = 'nota_dinas';
    
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
    
    $query = mysqli_query($koneksi, 'insert into tbl_surat set jenis="'.$jenis_surat.'", hari="'.$hari.'", tgl_pelaksanaan="'.$new_tanggal_pelaksanaan.'", waktu="'.$waktu.'", tempat="'.$tempat.'", kepada="'.$kepada.'", perihal="'.$perihal.'", keterangan="'.$dalam_rangka.'", tgl_pembuatan="'.$new_tanggal_pembuatan.'"');

    // if($query!=0){
    //     header("location:../../layouts/contents/nota_dinas.php?pesan=berhasil");
    // }else{
    //     header("location:../../layouts/contents/tambah_nota_dinas.php?pesan=gagal");
    // }

?>