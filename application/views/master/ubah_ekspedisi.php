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
                                    <input type="hidden" name="id_ekspedisi" class="form-control" id="id_ekspedisi" value="<?= $ekspedisi['id_ekspedisi']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kode">Kode</label>
                                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $ekspedisi['kode']; ?>" placeholder="Isi kode Angka">
                                            <small class="text-danger"><?= form_error('kode'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_ekspedisi">Nama Ekspedisi</label>
                                            <input type="text" name="nama_ekspedisi" class="form-control" id="nama_ekspedisi" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= $ekspedisi['nama_ekspedisi']; ?>" placeholder="Isi Nama Ekspedisi">
                                            <small class="text-danger"><?= form_error('nama_ekspedisi'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $ekspedisi['alamat']; ?>" placeholder="Isi Alamat">
                                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="text" name="nohp" class="form-control" id="nohp" oninput="this.value=this.value.replace(/[^\d]/g, '');" value="<?= $ekspedisi['nohp']; ?>" placeholder="Isi Nomor HP">
                                            <small class="text-danger"><?= form_error('nohp'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="aktif">Status</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="<?= $ekspedisi['status']; ?>"><?= check_aktif($ekspedisi['status']); ?></option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/ekspedisi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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