<?php 
    include_once("../../config/database.php");
    session_start();
    if($_SESSION['status'] != "login"){
        header("location:../../index.php?pesan=gagal");
    }

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

    $rand = rand();
    $ekstensi =  array('png','jpg','jpeg','gif','pdf');
    $filename = $_FILES['file_lampiran']['name'];
    $ukuran = $_FILES['file_lampiran']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

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
    
    $query = mysqli_query($koneksi, 'insert into tbl_surat set jenis="'.$jenis_surat.'", hari="'.$hari.'", tgl_pelaksanaan="'.$new_tanggal_pelaksanaan.'", waktu="'.$waktu.'", tempat="'.$tempat.'", kepada="'.$kepada.'", perihal="'.$perihal.'", keterangan="'.$dalam_rangka.'", tgl_pembuatan="'.$new_tanggal_pembuatan.'", id_pemohon = "'.$_SESSION['id_user'].'"');
    
    $last_surat = mysqli_query($koneksi, 'SELECT * FROM tbl_surat ORDER BY id DESC LIMIT 1');
    while($l_surat = mysqli_fetch_array($last_surat)){
        $id_surat = $l_surat['id'];
    }
    
    $insert_admin = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_admin.'"');
    $insert_kamad = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_kamad.'"');
    $insert_katu = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_katu.'"');    
    $insert_operator = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_operator.'"');
    $insert_pemohon = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$_SESSION['id_user'].'"');

    if($filename != null || $filename != ''){
        $xx = $rand.'_nota_dinas_'.$filename;
        move_uploaded_file($_FILES['file_lampiran']['tmp_name'], '../../upload/'.$rand.'_nota_dinas_'.$filename);
        $insert_lampiran = mysqli_query($koneksi, 'insert into tbl_lampiran set id_surat = "'.$id_surat.'", lampiran = "'.$lampiran.'", file = "'.$xx.'"');
    }
    
    if($insert_lampiran!=0){
        header("location:../../layouts/contents/nota_dinas.php?pesan=berhasil");
    }else{
        header("location:../../layouts/contents/tambah_nota_dinas.php?pesan=gagal");
    }

?>