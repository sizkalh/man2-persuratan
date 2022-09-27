<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_surat = $_POST['id_surat'];

    $query_surat = mysqli_query($koneksi, 'SELECT
                                            tbl_surat.id AS id_surat,
                                            tbl_surat.no_surat,
                                            tbl_surat.catatan,
                                            tbl_guru.*
                                            FROM
                                            tbl_surat
                                            LEFT JOIN tbl_guru
                                                ON tbl_guru.id = tbl_surat.keterangan
                                            WHERE tbl_surat.id = "'.$id_surat.'"');
    $data_surat = mysqli_fetch_array($query_surat);
    echo json_encode($data_surat);
