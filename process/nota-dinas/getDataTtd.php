<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_surat = $_POST['id_surat'];

    if($_SESSION['pangkat_user'] != 'superuser'){
        $query_ttd = mysqli_query($koneksi, 'SELECT tbl_tanda_tangan.*, tbl_guru.nama, tbl_guru.jabatan, tbl_guru.pangkat FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "'.$id_surat.'" AND tbl_guru.pangkat != "superuser" ORDER BY tbl_tanda_tangan.id ASC');
    }else{
        
        $query_ttd = mysqli_query($koneksi, 'SELECT tbl_tanda_tangan.*, tbl_guru.nama, tbl_guru.jabatan, tbl_guru.pangkat FROM tbl_tanda_tangan INNER JOIN tbl_guru ON tbl_guru.id=tbl_tanda_tangan.id_user WHERE tbl_tanda_tangan.id_surat = "'.$id_surat.'" ORDER BY tbl_tanda_tangan.id ASC');
    }
    
    while ($row = mysqli_fetch_assoc($query_ttd)) {
        $data[] = $row;
    }
    // echo '<pre>'; print_r($data); echo '</pre>';				
    echo json_encode($data);
 ?>