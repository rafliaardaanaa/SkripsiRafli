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
                                        <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-filterjabatan"><i class="fa fa-plus"></i> Filter By Jabatan</button></a>
                                        <a href="#"><button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#modal-filternik"><i class="fa fa-plus"></i> Filter By NIK</button></a>
                                    </div>
                                    <div class="cols-4">
                                        <?php if ((isset($id_input)) and ($id_input == '1')) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetakpegawai'); ?>" method="post" target="_blank">
                                                <input type="hidden" name="id_input" value=<?= $id_input; ?>>
                                                <input type="hidden" name="id_jabatan" value=<?= $id_jabatan; ?>>
                                                <button type="submit" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
                                            </form>
                                        <?php endif; ?>
                                        <?php if ((isset($id_input)) and ($id_input == '2')) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetakpegawai'); ?>" method="post" target="_blank">
                                                <input type="hidden" name="id_input" value=<?= $id_input; ?>>
                                                <input type="hidden" name="id_pgw" value=<?= $id_pgw; ?>>
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
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($filter as $ft) : ?>
                                        <?php
                                        $id_jabatan = $ft['id_jabatan'];
                                        $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $ft['nip']; ?></td>
                                            <td><?= $ft['nama_pegawai']; ?></td>
                                            <td><?= $jabatan['nama_jabatan']; ?></td>
                                            <td><?= $ft['alamat']; ?></td>
                                            <td><?= agama($ft['id_agama']); ?></td>
                                            <td><?= pendidikan($ft['id_pendidikan']); ?></td>
                                            <td><?= $ft['nohp']; ?></td>
                                            <td><?= $ft['email']; ?></td>
                                            <td><img src="<?= base_url('files/') . $ft['foto']; ?>" height="100" height="90" /></td>
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

                <div class="modal fade" id="modal-filterjabatan">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Filter By Jabatan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="" method="post">
                                    <input type="hidden" name="id_input" value="1">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_jabatan">Pilih Jabatan</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_jabatan" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="Semua">Semua</option>
                                                <?php foreach ($masterjabatan as $list) : ?>
                                                    <option value="<?= $list['id_jabatan']; ?>"><?= $list['nama_jabatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?= form_error('id_jabatan'); ?></small>
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
                <div class="modal fade" id="modal-filternik">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Filter By NIK</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="" method="post">
                                    <input type="hidden" name="id_input" value="2">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_pgw">Pilih NIK</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_pgw" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="Semua">Semua</option>
                                                <?php foreach ($masterpegawai as $list) : ?>
                                                    <option value="<?= $list['id_pegawai']; ?>"><?= $list['nip'] . ' - ' . $list['nama_pegawai']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?= form_error('id_pegawai'); ?></small>
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