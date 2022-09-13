<?php 
    include_once("../../../../config/database.php");
    session_start();
    date_default_timezone_set('Asia/Jakarta');

    $id_surat = $_POST['id_surat'];
    $pangkat = $_POST['pangkat'];
    $catatan = $_POST['catatan'];
    $no_surat = $_POST['no_surat'];

    $id_user = $_SESSION['id_user'];
    $tgl_proses = date('Y-m-d H:i:s');

    $query_no = mysqli_query($koneksi, 'UPDATE tbl_surat SET no_surat="'.$no_surat.'" WHERE id="' . $id_surat . '"');	
    $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="diterima", catatan="' . $catatan . '", tgl_proses = "' . $tgl_proses . '" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user . '"');	
    
    if($pangkat == "guru"){
        $cek_pangkat = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE pangkat="operator"');
        while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
            $id_user_p = $data_pangkat['id'];
            $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');	
        }	
    }else if($pangkat == "operator"){
        $cek_pangkat = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE pangkat="katu"');
        while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
            $id_user_p = $data_pangkat['id'];
            $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');	
        }
    }else if($pangkat == "katu"){
        $cek_pangkat = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE pangkat="kamad"');
        while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
            $id_user_p = $data_pangkat['id'];
            $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');	
        }
    }else if($pangkat == "kamad"){
        $cek_pangkat = mysqli_query($koneksi, 'SELECT * FROM tbl_guru WHERE pangkat="superuser"');
        while ($data_pangkat = mysqli_fetch_array($cek_pangkat)) {
            $id_user_p = $data_pangkat['id'];
            $query_ttd = mysqli_query($koneksi, 'UPDATE tbl_tanda_tangan SET STATUS="cek" WHERE id_surat="' . $id_surat . '" AND id_user ="' . $id_user_p . '"');	
        }
    }
    
    if($query_ttd > 0){
        $status = array(
            'status' => 'sukses'
        );
    }else{
        $status = array(
            'status' => 'gagal'
        );
    }
    echo json_encode($status);
