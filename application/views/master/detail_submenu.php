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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/submenu'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <tbody>
                                    <?php
                                    $id_menu = $submenu['id_menu'];
                                    $menu = $this->db->get_where('menu', ['id_menu' => $id_menu])->row_array();
                                    ?>
                                    <tr>
                                        <td>Menu</td>
                                        <td>:</td>
                                        <td><?= $menu['nama_menu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Urutan</td>
                                        <td>:</td>
                                        <td><?= $submenu['urutan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Sub Menu</td>
                                        <td>:</td>
                                        <td><?= $submenu['nama_submenu']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>URL</td>
                                        <td>:</td>
                                        <td><?= $submenu['url']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Icon</td>
                                        <td>:</td>
                                        <td><?= $submenu['icon']; ?></td>
                                    </tr>
                                </tbody>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->