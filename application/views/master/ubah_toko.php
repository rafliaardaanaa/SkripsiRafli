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
                                <form id="formUbah" action="" method="post">
                                    <input type="hidden" name="id_toko" class="form-control" id="id_toko" value="<?= $toko['id_toko']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kode">Kode</label>
                                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $toko['kode']; ?>" placeholder="Isi Kode Toko">
                                            <small class="text-danger"><?= form_error('kode'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_toko">Nama Toko</label>
                                            <input type="text" name="nama_toko" class="form-control" id="nama_toko" value="<?= $toko['nama_toko']; ?>" placeholder="Isi Nama Toko">
                                            <small class="text-danger"><?= form_error('nama_toko'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_kepala">Nama Kepala</label>
                                            <input type="text" name="nama_kepala" class="form-control" id="nama_kepala" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= $toko['nama_kepala']; ?>" placeholder="Isi Nama kepala">
                                            <small class="text-danger"><?= form_error('nama_kepala'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $toko['alamat']; ?>" placeholder="Isi Alamat">
                                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="text" name="nohp" class="form-control" id="nohp" oninput="this.value=this.value.replace(/[^\d]/g, '');" value="<?= $toko['nohp']; ?>" placeholder="Isi Nomor HP">
                                            <small class="text-danger"><?= form_error('nohp'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" id="username" value="<?= $toko['username']; ?>" placeholder="Isi Username">
                                            <small class="text-danger"><?= form_error('username'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                            <input type="text" name="password" class="form-control" id="password" value="<?= $toko['password']; ?>" placeholder="Isi Password">
                                            <small class="text-danger"><?= form_error('password'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="aktif">Status</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="<?= $toko['status']; ?>"><?= check_aktif($toko['status']); ?></option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/toko'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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