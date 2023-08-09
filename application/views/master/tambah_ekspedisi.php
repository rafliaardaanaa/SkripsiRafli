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
                                        $queryKode = $this->db->query("SELECT max(kode) as kodeTerbesar FROM ekspedisi")->row_array();
                                        $kodeekspedisi = $queryKode['kodeTerbesar'];
                                        $urutan = (int) substr($kodeekspedisi, 2, 5);
                                        $urutan++;
                                        $huruf = "EP";
                                        $kodeekspedisi = $huruf . sprintf("%05s", $urutan);
                                        ?>
                                        <div class="form-group">
                                            <label for="kode">Kode Ekspedisi</label>
                                            <input type="hidden" name="kode" class="form-control" id="kode" value="<?= $kodeekspedisi; ?>">
                                            <input type="text" name="kode1" class="form-control" id="kode1" value="<?= $kodeekspedisi; ?>" disabled>
                                            <small class="text-danger"><?= form_error('kode'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_ekspedisi">Nama Ekspedisi</label>
                                            <input type="text" name="nama_ekspedisi" class="form-control" id="nama_ekspedisi" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= set_value('nama_ekspedisi'); ?>" placeholder="Isi Nama Ekspedisi">
                                            <small class="text-danger"><?= form_error('nama_ekspedisi'); ?></small>
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
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/ekspedisi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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