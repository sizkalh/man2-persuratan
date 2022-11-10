<form action="<?= base_url() ?>process/profil/update-siswa.php" enctype="multipart/form-data" method="post" id="form_data_profil">
    <h4>
        <i class="fa fa-info-circle"></i> Apabila terdapat kesalahan penulisan pada <b>NISN</b> atau <b>NIS</b> silahkan mengubungi operator terkait untuk melakukan pembenahan.
    </h4>
    <div class="form-group" style="margin-top: 2em;">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
                <input type="text" name="nisn" id="nisn" class="form-control" placeholder="Masukkan NISN" value="<?= $data['nisn'] ?>" disabled>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">NIS</label>
            <div class="col-sm-10">
                <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukkan NIS" value="<?= $data['nis'] ?>" disabled>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Siswa</label>
            <div class="col-sm-10">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" value="<?= $data['nama'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <input type="radio" name="jk" id="laki-laki" value="L" <?= $data['jk'] == "L" ? "checked" : "" ?>>
                <label for="laki-laki">Laki - Laki</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="jk" id="perempuan" value="P" <?= $data['jk'] == "P" ? "checked" : "" ?>>
                <label for="perempuan">Perempuan</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-10">
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?= $data['tempat_lahir'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="text" class="form-control" id="tanggalan" name="tgl_lahir" autocomplete="off" placeholder="Masukkan Tanggal Lahir" value="<?= $data['tgl_lahir'] ?>" />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">No. HP</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No. HP" value="<?= $data['no_hp'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat"><?= $data['alamat'] ?></textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Wali</label>
            <div class="col-sm-10">
                <input type="text" name="nama_wali" id="nama_wali" class="form-control" placeholder="Masukkan Nama Wali" value="<?= $data['nama_wali'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">No. HP Wali</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp_wali" id="no_hp_wali" class="form-control" placeholder="Masukkan No. HP Wali" value="<?= $data['no_hp_wali'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Pekerjaan Wali</label>
            <div class="col-sm-10">
                <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control" placeholder="Masukkan Pekerjaan Wali" value="<?= $data['pekerjaan_wali'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Nama Ibu</label>
            <div class="col-sm-10">
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu" value="<?= $data['nama_ibu'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">No. HP Ibu</label>
            <div class="col-sm-10">
                <input type="text" name="no_hp_ibu" id="no_hp_ibu" class="form-control" placeholder="Masukkan No. HP Ibu" value="<?= $data['no_hp_ibu'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
            <div class="col-sm-10">
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control" placeholder="Masukkan Pekerjaan Ibu" value="<?= $data['pekerjaan_ibu'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Satuan Pendidikan</label>
            <div class="col-sm-10">
                <input type="text" name="satdik" id="satdik" class="form-control" placeholder="Masukkan Satdik" value="<?= $data['satdik'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Jumlah Saudara</label>
            <div class="col-sm-10">
                <input type="number" min="0" name="jml_saudara" id="jml_saudara" class="form-control" placeholder="Masukkan Jumlah Saudara" value="<?= $data['jml_saudara'] ?>">
            </div>
        </div>
    </div>
    <h3>
        Login Akun
    </h3>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" value="<?= $data['username'] ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password Baru">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Ulangi Password Baru</label>
            <div class="col-sm-10">
                <input type="password" name="repassword" id="repassword" onkeyup="cekPassword()" class="form-control" placeholder="Ulangi Password Baru">
                <div id="cek" style="margin-top: 1em;"></div>
            </div>
        </div>
    </div>
    <div class="form-group" style="margin-top: 3em;">
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="button" onclick="goBack()" class="btn btn-default"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</form>