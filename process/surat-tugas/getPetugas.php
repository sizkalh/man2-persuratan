<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_surat = $_POST['id_surat'];

    $query_surat = mysqli_query($koneksi, "SELECT
                                            tbl_surat_tugas.id AS id_surat_tugas,
                                            tbl_guru.*
                                            FROM
                                            tbl_surat_tugas
                                            INNER JOIN tbl_guru
                                                ON tbl_guru.id = tbl_surat_tugas.id_guru
                                            WHERE tbl_surat_tugas.id_surat = '" . $id_surat . "'");
    // $data_surat = mysqli_fetch_array($query_surat);

    while ($row = mysqli_fetch_assoc($query_surat)) {
        $data[] = $row;
    }
    echo json_encode($data);
