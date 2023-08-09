                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                    </section>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="cols-4 mr-4">
                                        <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-plus"></i> Filter Data</button></a>
                                    </div>
                                    <div class="cols-4">
                                        <?php if (($this->session->flashdata()) and (isset($id_toko))) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetaktoko'); ?>" method="post" target="_blank">
                                                <input type="hidden" name="id_toko" value=<?= $id_toko; ?>>
                                                <button type="submit" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Toko</th>
                                        <th>Nama Kepala</th>
                                        <th>Alamat</th>
                                        <th>Nomor HP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($filter as $fr) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $fr['kode']; ?></td>
                                            <td><?= $fr['nama_toko']; ?></td>
                                            <td><?= $fr['nama_kepala']; ?></td>
                                            <td><?= $fr['alamat']; ?></td>
                                            <td><?= $fr['nohp']; ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <div class="modal fade" id="modal-filter">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Filter Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_toko">Pilih toko</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_toko" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="Semua">Semua</option>
                                                <?php foreach ($toko as $list) : ?>
                                                    <option value="<?= $list['id_toko']; ?>"><?= $list['nama_toko']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?= form_error('id_toko'); ?></small>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-info"></i> Lihat Data</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>