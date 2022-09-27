<?php
    include_once("../../config/database.php");
    session_start();
    if ($_SESSION['status'] != "login") {
        $_SESSION['massage'] = 'belum_login';
        redirect('auth');
    }

    $id = $_POST['id'];

    $query_siswa = mysqli_query($koneksi, "SELECT
                                            tbl_siswa.*,
                                            tbl_kelas.nama AS nama_kel,
                                            tbl_kelas.nama_kelas,
                                            tbl_jurusan.nama AS nama_jurusan,
                                            tbl_detail_kelas.rombel
                                            FROM
                                            tbl_siswa
                                            LEFT JOIN tbl_detail_kelas
                                                ON tbl_detail_kelas.id_detail_kelas = tbl_siswa.id_detail_kelas
                                            INNER JOIN tbl_kelas
                                                ON tbl_kelas.id_kelas = tbl_detail_kelas.id_kelas
                                            INNER JOIN tbl_jurusan
                                                ON tbl_jurusan.id_jurusan = tbl_detail_kelas.id_jurusan WHERE tbl_siswa.id = ". $id);
    $data_siswa = mysqli_fetch_array($query_siswa);
    echo json_encode($data_siswa);
