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
                                            <label for="kode">Kode Toko</label>
                                            <input type="text" name="kode" class="form-control" id="kode" value="<?= set_value('kode'); ?>" placeholder="Isi Kode Toko">
                                            <small class="text-danger"><?= form_error('kode'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko">Nama Toko</label>
                                            <input type="text" name="nama_toko" class="form-control" id="nama_toko" value="<?= set_value('nama_toko'); ?>" placeholder="Isi Nama Toko">
                                            <small class="text-danger"><?= form_error('nama_toko'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kepala">Nama Kepala</label>
                                            <input type="text" name="nama_kepala" class="form-control" id="nama_kepala" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= set_value('nama_kepala'); ?>" placeholder="Isi Nama Kepala">
                                            <small class="text-danger"><?= form_error('nama_kepala'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= set_value('alamat'); ?>" placeholder="Isi Alamat">
                                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="text" name="nohp" class="form-control" id="nohp" oninput="this.value=this.value.replace(/[^\d]/g, '');" value="<?= set_value('nohp'); ?>" placeholder="Isi Nomor HP">
                                            <small class="text-danger"><?= form_error('nohp'); ?></small>
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
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/toko'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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