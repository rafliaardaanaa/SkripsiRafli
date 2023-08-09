                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                    </section>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Ubah <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_pegawai" class="form-control" id="id_pegawai" value="<?= $masterpegawai['id_pegawai']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nip">NIK</label>
                                            <input type="text" name="nip" class="form-control" id="nip" oninput="this.value=this.value.replace(/[^\d]/g, '');" value="<?= $masterpegawai['nip']; ?>" placeholder="Isi NIK">
                                            <small class="text-danger"><?= form_error('nip'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pegawai">Nama Karyawan</label>
                                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '')" value=" <?= $masterpegawai['nama_pegawai']; ?>" placeholder="Isi Nama Karyawan">
                                            <small class="text-danger"><?= form_error('nama_pegawai'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jeniskelamin">Pilih Jenis Kelamin</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_jeniskelamin" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php $nama_jeniskelamin = check_jeniskelamin($masterpegawai['id_jeniskelamin']);; ?>
                                                <option value="<?= $masterpegawai['id_jeniskelamin']; ?>" selected="selected"><?= $nama_jeniskelamin; ?></option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jabatan">Pilih Jabatan</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_jabatan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php foreach ($masterjabatan as $jb) :; ?>
                                                    <?php
                                                    if ($jb['id_jabatan'] == $masterpegawai['id_jabatan']) {

                                                    ?>
                                                        <option value="<?= $jb['id_jabatan']; ?>" selected="selected"><?= $jb['nama_jabatan']; ?></option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $jb['id_jabatan']; ?>"><?= $jb['nama_jabatan']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_agama">Pilih Agama</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_agama" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php
                                                $agama = $this->db->get('agama')->result_array();
                                                foreach ($agama as $list) : ?>
                                                    <?php
                                                    if ($list['id_agama'] == $masterpegawai['id_agama']) {

                                                    ?>
                                                        <option value="<?= $list['id_agama']; ?>" selected="selected"><?= $list['nama_agama']; ?></option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $list['id_agama']; ?>"><?= $list['nama_agama']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pendidikan">Pilih Pendidikan</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_pendidikan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php
                                                $pendidikan = $this->db->get('pendidikan')->result_array();
                                                foreach ($pendidikan as $list) : ?>
                                                    <?php
                                                    if ($list['id_pendidikan'] == $masterpegawai['id_pendidikan']) {

                                                    ?>
                                                        <option value="<?= $list['id_pendidikan']; ?>" selected="selected"><?= $list['nama_pendidikan']; ?></option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $list['id_pendidikan']; ?>"><?= $list['nama_pendidikan']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $masterpegawai['alamat']; ?>" placeholder="Isi Alamat">
                                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">No HP</label>
                                            <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $masterpegawai['nohp']; ?>" placeholder="Isi No HP">
                                            <small class="text-danger"><?= form_error('nohp'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="<?= $masterpegawai['email']; ?>" placeholder="Isi Email">
                                            <small class="text-danger"><?= form_error('email'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" name="foto" class="form-control" id="foto" value="" required>
                                            <small class="text-danger"><?= form_error('foto'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="aktif">Status Aktif</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="aktif" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="<?= $masterpegawai['aktif']; ?>"><?= check_aktif($masterpegawai['aktif']); ?></option>
                                                <option value="1"><?= check_aktif("1"); ?></option>
                                                <option value="2"><?= check_aktif("2"); ?></option>
                                            </select>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/pegawai'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                            <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin mengubah data');"><i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->