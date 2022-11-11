<?php
include_once("../../config/database.php");
include_once("../../library/helper.php");
include_once("../../library/php-excel-reader-2.21/excel_reader2.php");

$target = basename($_FILES['file_e']['name']);
move_uploaded_file($_FILES['file_e']['tmp_name'], $target);

$data    = new Spreadsheet_Excel_Reader($_FILES['file_e']['name'], false);

$baris = $data->rowcount($sheet_index = 0);

$berhasil = 0;
for ($i = 2; $i <= $baris; $i++) {

    $nisn = $data->val($i, 1);
    $nis = $data->val($i, 2);
    $nama = $data->val($i, 3);
    $jk = $data->val($i, 4);
    $tempat_lahir = $data->val($i, 5);
    $tgl_lahir = $data->val($i, 6);
    $no_hp = $data->val($i, 7);
    $alamat = $data->val($i, 8);

    $nama_wali = $data->val($i, 9);
    $no_hp_wali = $data->val($i, 10);
    $pekerjaan_wali = $data->val($i, 11);
    $nama_ibu = $data->val($i, 12);
    $no_hp_ibu = $data->val($i, 13);
    $pekerjaan_ibu = $data->val($i, 14);
    $satdik = $data->val($i, 15);
    $jml_saudara = $data->val($i, 16);

    $username = $data->val($i, 1);
    $id_detail_kelas = $data->val($i, 18);
    $role = "siswa";

    $password = "123";
    $passwordmd = md5($password);

    if ($nama != "" || $nama != null) {
        $query = mysqli_query($koneksi, 'insert into tbl_siswa set 
                                        satdik = "' . $satdik . '", 
                                        id_detail_kelas = "' . $id_detail_kelas . '", 
                                        nis = "' . $nis . '", 
                                        nisn = "' . $nisn . '", 
                                        nama = "' . $nama . '", 
                                        jk = "' . $jk . '",
                                        tempat_lahir = "' . $tempat_lahir . '",
                                        tgl_lahir = "' . $tgl_lahir . '",
                                        jml_saudara = "' . $jml_saudara . '",
                                        alamat = "' . $alamat . '",
                                        no_hp = "' . $no_hp . '",
                                        nama_wali = "' . $nama_wali . '",
                                        no_hp_wali = "' . $no_hp_wali . '",
                                        pekerjaan_wali = "' . $pekerjaan_wali . '",
                                        nama_ibu = "' . $nama_ibu . '",
                                        no_hp_ibu = "' . $no_hp_ibu . '",
                                        pekerjaan_ibu = "' . $pekerjaan_ibu . '",
                                        username = "' . $username . '",
                                        role = "' . $role . '",
                                        password = "' . $passwordmd . '"
                                        ');
        $berhasil++;
    }
}

if ($query != 0) {
    header("location:" . base_url() . "data-siswa/index?pesan=berhasil");
} else {
    header("location:" . base_url() . "data-siswa/index?pesan=gagal");
}
unlink($_FILES['file_e']['name']);
?>