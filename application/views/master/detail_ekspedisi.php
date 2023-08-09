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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/ekspedisi'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>:</td>
                                            <td><?= $ekspedisi['kode']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ekspedisi</td>
                                            <td>:</td>
                                            <td><?= $ekspedisi['nama_ekspedisi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $ekspedisi['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor HP</td>
                                            <td>:</td>
                                            <td><?= $ekspedisi['nohp']; ?></td>
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