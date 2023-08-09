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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/toko'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>:</td>
                                            <td><?= $toko['kode']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Toko</td>
                                            <td>:</td>
                                            <td><?= $toko['nama_toko']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Kepala</td>
                                            <td>:</td>
                                            <td><?= $toko['nama_kepala']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $toko['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor HP</td>
                                            <td>:</td>
                                            <td><?= $toko['nohp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= $toko['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?= check_aktif($toko['status']); ?></td>
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