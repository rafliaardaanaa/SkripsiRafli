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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/supplier'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>:</td>
                                            <td><?= $supplier['kode']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Supplier</td>
                                            <td>:</td>
                                            <td><?= $supplier['nama_supplier']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Penanggung Jawab</td>
                                            <td>:</td>
                                            <td><?= $supplier['penanggungjawab']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $supplier['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor HP</td>
                                            <td>:</td>
                                            <td><?= $supplier['nohp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?= check_aktif($supplier['status']); ?></td>
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