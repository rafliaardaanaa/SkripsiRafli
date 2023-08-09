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
                                    <input type="hidden" name="id_supplier" class="form-control" id="id_supplier" value="<?= $supplier['id_supplier']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="kode">Kode</label>
                                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $supplier['kode']; ?>" placeholder="Isi kode Angka">
                                            <small class="text-danger"><?= form_error('kode'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_supplier">Nama Supplier</label>
                                            <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= $supplier['nama_supplier']; ?>" placeholder="Isi Nama Supplier">
                                            <small class="text-danger"><?= form_error('nama_supplier'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="penanggungjawab">Penanggung Jawab</label>
                                            <input type="text" name="penanggungjawab" class="form-control" id="penanggungjawab" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= $supplier['penanggungjawab']; ?>" placeholder="Isi Penanggung Jawab">
                                            <small class="text-danger"><?= form_error('penanggungjawab'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $supplier['alamat']; ?>" placeholder="Isi Alamat">
                                            <small class="text-danger"><?= form_error('alamat'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nohp">Nomor HP</label>
                                            <input type="text" name="nohp" class="form-control" id="nohp" oninput="this.value=this.value.replace(/[^\d]/g, '');" value="<?= $supplier['nohp']; ?>" placeholder="Isi Nomor HP">
                                            <small class="text-danger"><?= form_error('nohp'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="aktif">Status</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="<?= $supplier['status']; ?>"><?= check_aktif($supplier['status']); ?></option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/supplier'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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