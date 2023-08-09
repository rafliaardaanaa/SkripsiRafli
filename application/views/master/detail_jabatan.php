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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/jabatan'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Urutan</td>
                                            <td>:</td>
                                            <td><?= $masterjabatan['urutan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Jabatan</td>
                                            <td>:</td>
                                            <td><?= $masterjabatan['nama_jabatan']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->