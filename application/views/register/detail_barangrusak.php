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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/barangrusak'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                <a href="<?= base_url('laporan/cetakbarangrusakbyid/' . $barangrusak['id_barangrusak']); ?>" target="_blank"><button type="button" class="btn btn-primary ml-3"><i class="fa fa-print"></i> Cetak</button></a>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td><?= tanggal_indo($barangrusak['tanggal']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode</td>
                                            <td>:</td>
                                            <td><?= $barangrusak['kode']; ?></td>
                                        </tr>
                                        <?php
                                        $barang = $this->Barang_model->getbarangById($barangrusak['id_barang']);
                                        ?>
                                        <tr>
                                            <td>Nama barang</td>
                                            <td>:</td>
                                            <td><?= $barang['nama_barang']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>:</td>
                                            <td><?= $barangrusak['rusak']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td><?= rupiah($barang['harga']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>:</td>
                                            <td><?= rupiah($barangrusak['rusak'] * $barang['harga']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?= $barangrusak['keterangan']; ?></td>
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