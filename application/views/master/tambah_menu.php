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
                                            <label for="urutan">Urutan</label>
                                            <input type="number" name="urutan" class="form-control" id="urutan" value="<?= set_value('urutan'); ?>" placeholder="Isi Urutan Angka">
                                            <small class="text-danger"><?= form_error('urutan'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_menu">Nama Menu</label>
                                            <input type="text" name="nama_menu" class="form-control" id="nama_menu" value="<?= set_value('nama_menu'); ?>" placeholder="Isi Nama Menu">
                                            <small class="text-danger"><?= form_error('nama_menu'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="text" name="url" class="form-control" id="url" value="<?= set_value('url'); ?>" placeholder="Isi alamat URL Menu">
                                            <small class="text-danger"><?= form_error('url'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon">Icon</label>
                                            <input type="text" name="icon" class="form-control" id="icon" value="<?= set_value('icon'); ?>" placeholder="Isi Icon Class Menu">
                                            <small class="text-danger"><?= form_error('icon'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= set_value('keterangan'); ?>" placeholder="Isi Keterangan">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/menu'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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