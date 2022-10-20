<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id_surat = $_POST['id_surat'];

    $query_surat = mysqli_query($koneksi, "SELECT
                                            A.*,
                                            B.id_detail_kelas,
                                            B.rombel,
                                            C.nama AS kelas,
                                            C.nama_kelas,
                                            D.nama AS jurusan,
                                            E.id AS id_surat_dispen,
                                            E.keterangan
                                            FROM
                                            tbl_siswa A
                                            INNER JOIN tbl_detail_kelas B
                                                ON B.id_detail_kelas = A.id_detail_kelas
                                            INNER JOIN tbl_kelas C
                                                ON C.id_kelas = B.id_kelas
                                            INNER JOIN tbl_jurusan D
                                                ON D.id_jurusan = B.id_jurusan
                                                INNER JOIN tbl_surat_dispen E
                                                ON E.id_siswa = A.id
                                            WHERE E.id_surat = '" . $id_surat . "'
                                            ");
    // $data_surat = mysqli_fetch_array($query_surat);

    while ($row = mysqli_fetch_assoc($query_surat)) {
        $data[] = $row;
    }
    echo json_encode($data);
