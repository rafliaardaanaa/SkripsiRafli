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
                                    <input type="hidden" name="id_jenisbarang" class="form-control" id="id_jenisbarang" value="<?= $masterjenisbarang['id_jenisbarang']; ?>">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="urutan">Urutan</label>
                                            <input type="number" name="urutan" class="form-control" id="urutan" value="<?= $masterjenisbarang['urutan']; ?>" placeholder="Isi Urutan Angka">
                                            <small class="text-danger"><?= form_error('urutan'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_jenisbarang">Nama Jenis Barang</label>
                                            <input type="text" name="nama_jenisbarang" class="form-control" id="nama_jenisbarang" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= $masterjenisbarang['nama_jenisbarang']; ?>" placeholder="Isi Nama Jenis Barang">
                                            <small class="text-danger"><?= form_error('nama_jenisbarang'); ?></small>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/jenisbarang'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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