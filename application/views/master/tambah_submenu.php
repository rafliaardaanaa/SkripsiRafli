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
                                            <label for="urutan">Pilih Menu</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_menu" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php foreach ($menu as $mn) :; ?>
                                                    <option value="<?= $mn['id_menu']; ?>"><?= $mn['nama_menu']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <?php
                                        $cekurutan = $this->db->query('SELECT * FROM submenu ORDER BY urutan DESC');
                                        if ($cekurutan->num_rows() < 1) {
                                            $urutan = '1';
                                        } else {
                                            $cekurutan = $cekurutan->row_array();
                                            $urutan = $cekurutan['urutan'] + 1;
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="urutan">Urutan</label>
                                            <input type="number" name="urutan" class="form-control" id="urutan" value="<?= $urutan; ?>" placeholder="Isi Urutan Angka">
                                            <small class="text-danger"><?= form_error('urutan'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_submenu">Nama Sub Menu</label>
                                            <input type="text" name="nama_submenu" class="form-control" id="nama_submenu" value="<?= set_value('nama_submenu'); ?>" placeholder="Isi Nama Sub Menu">
                                            <small class="text-danger"><?= form_error('nama_submenu'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="url">URL</label>
                                            <input type="text" name="url" class="form-control" id="url" value="<?= set_value('url'); ?>" placeholder="Isi alamat URL Sub Menu">
                                            <small class="text-danger"><?= form_error('url'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon">Icon</label>
                                            <input type="text" name="icon" class="form-control" id="icon" value="<?= set_value('icon'); ?>" placeholder="Isi Icon Class Sub Menu">
                                            <small class="text-danger"><?= form_error('icon'); ?></small>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/submenu'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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