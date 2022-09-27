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
                                            tbl_siswa.*,
                                            tbl_kelas.nama AS nama_kel,
                                            tbl_kelas.nama_kelas,
                                            tbl_jurusan.nama AS nama_jurusan,
                                            tbl_detail_kelas.rombel,
                                            tbl_guru.nama AS nama_guru,
                                            tbl_guru.nip,
                                            tbl_guru.jabatan,
                                            tbl_guru.instansi
                                            FROM
                                            tbl_surat
                                            LEFT JOIN tbl_guru
                                                ON tbl_guru.id = tbl_surat.keterangan
                                            LEFT JOIN tbl_siswa
                                                ON tbl_siswa.id = tbl_surat.kepada
                                            LEFT JOIN tbl_detail_kelas
                                                ON tbl_detail_kelas.id_detail_kelas = tbl_siswa.id_detail_kelas
                                            INNER JOIN tbl_kelas
                                                ON tbl_kelas.id_kelas = tbl_detail_kelas.id_kelas
                                            INNER JOIN tbl_jurusan
                                                ON tbl_jurusan.id_jurusan = tbl_detail_kelas.id_jurusan
                                            WHERE tbl_surat.id = "'.$id_surat.'"');
    $data_surat = mysqli_fetch_array($query_surat);
    echo json_encode($data_surat);
 ?>