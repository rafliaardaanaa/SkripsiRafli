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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/menu'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Urutan</td>
                                            <td>:</td>
                                            <td><?= $menu['urutan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Menu</td>
                                            <td>:</td>
                                            <td><?= $menu['nama_menu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>URL</td>
                                            <td>:</td>
                                            <td><?= $menu['url']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Icon</td>
                                            <td>:</td>
                                            <td><?= $menu['icon']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?= $menu['keterangan']; ?></td>
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