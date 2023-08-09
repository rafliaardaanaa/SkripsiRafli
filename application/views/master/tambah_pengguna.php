                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                    </section>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Tambah <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form id="formTambah" action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="pegawai">Pilih Pegawai</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_pegawai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php foreach ($masterpegawai as $pg) : ?>
                                                    <?php
                                                    $cekpengguna = $this->db->get_where('pengguna', ['id_pegawai' => $pg['id_pegawai']]);
                                                    if ($cekpengguna->num_rows() < 1) {
                                                    ?>
                                                        <option value="<?= $pg['id_pegawai']; ?>"><?= $pg['nama_pegawai']; ?></option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="level">Pilih Level</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_level" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php foreach ($masterlevel as $lv) :; ?>
                                                    <option value="<?= $lv['id_level']; ?>"><?= $lv['nama_level']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" value="<?= set_value('username'); ?>" placeholder="Isi Username">
                                            <small class="text-danger"><?= form_error('username'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" name="password" class="form-control" id="password" value="<?= set_value('password'); ?>" placeholder="Isi Password">
                                            <small class="text-danger"><?= form_error('password'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="aktif">Status Pengguna</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="aktif" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/pengguna'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menambah data');"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->