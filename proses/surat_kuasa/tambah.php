<?php 
    include_once("../../config/database.php");
    session_start();
    if($_SESSION['status'] != "login"){
        header("location:../../index.php?pesan=gagal");
    }
    
    $id_guru = $_POST['id_guru'];
    $pemberi_kuasa = $_POST['pemberi_kuasa'];
    $nip = $_POST['nip'];
    $pangkat = $_POST['pangkat'];
    $jabatan_pemberi_kuasa = $_POST['jabatan_pemberi_kuasa'];
    $instansi = $_POST['instansi'];
    $penerima_kuasa = $_POST['penerima_kuasa'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tanggal_lahir = str_replace('/', '-', $tanggal_lahir );
    $new_tanggal_lahir = date('Y-m-d', strtotime($tanggal_lahir));
    $jabatan_penerima_kuasa = $_POST['jabatan_penerima_kuasa'];
    $ket = $_POST['ket'];
    $tgl_pembuatan = $_POST['tgl_pembuatan'];
    $tgl_pembuatan = str_replace('/', '-', $tgl_pembuatan );
    $new_tgl_pembuatan = date('Y-m-d', strtotime($tgl_pembuatan));

    $jenis_surat = 'surat_kuasa';
    
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
    
    $query = mysqli_query($koneksi, 'insert into tbl_surat set jenis="'.$jenis_surat.'",tgl_pembuatan="'.$new_tgl_pembuatan.'", id_pemohon = "'.$_SESSION['id_user'].'", hapus = "n"');
    
    $last_surat = mysqli_query($koneksi, 'SELECT * FROM tbl_surat ORDER BY id DESC LIMIT 1');
    while($l_surat = mysqli_fetch_array($last_surat)){
        $id_surat = $l_surat['id'];
    }

    $query2 = mysqli_query($koneksi, 'insert into tbl_surat_kuasa set id_surat = "'.$id_surat.'", id_guru="'.$id_guru.'", nip="'.$nip.'", pemberi_kuasa = "'.$pemberi_kuasa.'", pangkat = "'.$pangkat.'", jabatan_pemberi_kuasa = "'.$jabatan_pemberi_kuasa.'", instansi = "'.$instansi.'" ,penerima_kuasa = "'.$penerima_kuasa.'",tempat_lahir = "'.$tempat_lahir.'",tanggal_lahir = "'.$new_tanggal_lahir.'",jabatan_penerima_kuasa = "'.$jabatan_penerima_kuasa.'",ket = "'.$ket.'"');
    
    $insert_admin = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_admin.'", status = "belum"');
    $insert_kamad = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_kamad.'", status = "belum"');
    $insert_katu = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_katu.'", status = "belum"');    
    $insert_operator = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$id_operator.'", status = "belum"');
    $insert_pemohon = mysqli_query($koneksi, 'insert into tbl_tanda_tangan set id_surat = "'.$id_surat.'", id_user = "'.$_SESSION['id_user'].'", status = "cek"');
    
    if($query!=0){
        header("location:../../layouts/contents/surat_kuasa.php?pesan=berhasil");
    }else{
        header("location:../../layouts/contents/surat_kuasa.php?pesan=gagal");
    }

?>