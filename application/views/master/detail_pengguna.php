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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/pengguna'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <?php
                                        $id_level = $masterpengguna['id_level'];
                                        $level = $this->db->get_where('level', ['id_level' => $id_level])->row_array();
                                        ?>
                                        <tr>
                                            <td>Level</td>
                                            <td>:</td>
                                            <td><?= $level['nama_level']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Pengguna</td>
                                            <td>:</td>
                                            <td><?= $masterpengguna['nama_pengguna']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Username</td>
                                            <td>:</td>
                                            <td><?= $masterpengguna['username']; ?></td>
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