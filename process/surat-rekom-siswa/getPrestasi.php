<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];

    $query_surat = mysqli_query($koneksi, 'SELECT
                                            tbl_prestasi.*
                                            FROM
                                            tbl_siswa
                                            INNER JOIN tbl_prestasi
                                                ON tbl_prestasi.id_siswa = tbl_siswa.id
                                            WHERE tbl_siswa.id = "'.$id.'"');

    if(mysqli_num_rows($query_surat) > 0){
        while ($data = mysqli_fetch_array($query_surat)) {
            $data_prestasi[] = $data;
        }
    }else{
        $data_prestasi[] = array(
            "prestasi"=>"-", 
            "bidang"=>"-", 
            "tahun"=>"-"
        );
    }
    
    echo json_encode($data_prestasi);
