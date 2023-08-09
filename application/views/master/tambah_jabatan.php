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
                                        <?php
                                        $cekurutan = $this->db->query('SELECT * FROM jabatan ORDER BY urutan DESC');
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
                                            <label for="nama_jabatan">Nama Jabatan</label>
                                            <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= set_value('nama_jabatan'); ?>" placeholder="Isi Nama Jabatan">
                                            <small class="text-danger"><?= form_error('nama_jabatan'); ?></small>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/jabatan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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