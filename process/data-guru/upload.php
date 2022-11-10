<?php
include_once("../../config/database.php");
include_once("../../library/helper.php");
include_once("../../library/php-excel-reader-2.21/excel_reader2.php");

$target = basename($_FILES['file_e']['name']);
move_uploaded_file($_FILES['file_e']['tmp_name'], $target);

$data    = new Spreadsheet_Excel_Reader($_FILES['file_e']['name'], false);

$baris = $data->rowcount($sheet_index = 0);

for ($i = 2; $i <= $baris; $i++) {

    $nip = $data->val($i, 1);
    $nama = $data->val($i, 2);
    $jk = $data->val($i, 3);
    $no_hp = $data->val($i, 4);
    $alamat = $data->val($i, 5);

    $email = $data->val($i, 6);
    $pangkat_guru = $data->val($i, 7);
    $golongan = $data->val($i, 8);
    $jabatan = $data->val($i, 9);
    $tempat_lahir = $data->val($i, 10);
    $tgl_lahir = $data->val($i, 11);
    $lama_pengabdian = $data->val($i, 12);

    $username = $data->val($i, 13);
    $role = "guru";

    $password = "123";
    $passwordmd = md5($password);

    $query = mysqli_query($koneksi, 'insert into tbl_guru set 
                                    nama = "' . $nama . '", 
                                    nip = "' . $nip . '", 
                                    jk = "' . $jk . '",
                                    no_hp = "' . $no_hp . '",
                                    email = "' . $email . '",
                                    tempat_lahir = "' . $tempat_lahir . '",
                                    tgl_lahir = "' . $tgl_lahir . '",
                                    alamat = "' . $alamat . '",
                                    pangkat_guru = "' . $pangkat_guru . '",
                                    golongan = "' . $golongan . '",
                                    jabatan = "' . $jabatan . '",
                                    lama_pengabdian = "' . $lama_pengabdian . '",
                                    username = "' . $username . '",
                                    role = "' . $role . '",
                                    pangkat = "' . $role . '",
                                    password = "' . $passwordmd . '",
                                    password2 = "' . $password . '",
                                    instansi = "MAN 2 Tulungagung"
                                    ');
}

if ($query != 0) {
    header("location:" . base_url() . "data-guru/index?pesan=berhasil");
} else {
    header("location:" . base_url() . "data-guru/index?pesan=gagal");
}
unlink($_FILES['file_e']['name']);
?>