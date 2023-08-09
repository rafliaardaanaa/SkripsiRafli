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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/barang'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>:</td>
                                            <td><?= $barang['kode']; ?></td>
                                        </tr>
                                        <?php
                                        $id_jenisbarang = $barang['id_jenisbarang'];
                                        $jenisbarang = $this->db->get_where('jenisbarang', ['id_jenisbarang' => $id_jenisbarang])->row_array();
                                        ?>
                                        <tr>
                                            <td>Jenis Barang</td>
                                            <td>:</td>
                                            <td><?= $jenisbarang['nama_jenisbarang']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Barang</td>
                                            <td>:</td>
                                            <td><?= $barang['nama_barang']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td><?= rupiah($barang['harga']); ?></td>
                                        </tr>
                                        <!--<tr>
                                            <td>Berat (Kg)</td>
                                            <td>:</td>
                                            <td><?= $barang['berat']; ?> Kg</td>
                                        </tr>-->
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?= $barang['keterangan']; ?></td>
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