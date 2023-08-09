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
                                        <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-plus"></i> Filter Data</button></a>
                                        <a href="<?= base_url('laporan/cetakbarangmasukall'); ?>" target="_blank"><button type="button" class="btn btn-success ml-3"><i class="fa fa-print"></i> Cetak Semua</button></a>
                                    </div>
                                    <div class="cols-4">
                                        <?php if (($this->session->flashdata()) and (isset($daritanggal))) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetakbarangmasuk'); ?>" method="post" target="_blank">
                                                <input type="hidden" name="daritanggal" value=<?= $daritanggal; ?>>
                                                <input type="hidden" name="sampaitanggal" value=<?= $sampaitanggal; ?>>
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
                                        <th>Tgl Faktur</th>
                                        <th>No Faktur</th>
                                        <th>Penerima</th>
                                        <th>Tgl Terima</th>
                                        <th>Supplier</th>
                                        <th>Total Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($filter as $ft) :
                                        $id_penerima = $ft['id_pegawai'];
                                        $penerima = $this->db->get_where('pegawai', ['id_pegawai' => $id_penerima])->row_array();
                                        $id_supplier = $ft['id_supplier'];
                                        $supplier = $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
                                        $totalbarang  = $this->db->query("SELECT SUM(daftarbarangmasuk.jumlah) as total from daftarbarangmasuk WHERE id_barangmasuk='" . $ft['id_barangmasuk'] . "'")->row()
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= tanggal_indo($ft['tanggal_faktur']); ?></td>
                                            <td><?= $ft['no_faktur']; ?></td>
                                            <td><?= $penerima['nama_pegawai']; ?></td>
                                            <td><?= tanggal_indo($ft['tanggal_terima']); ?></td>
                                            <td><?= $supplier['nama_supplier']; ?></td>
                                            <td><?= $totalbarang->total; ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <div class="modal fade" id="modal-filter">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Filter Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="" method="post">
                                    <div class="row">
                                        <div class="cols-4">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="daritanggal">Dari Tanggal Terima</label>
                                                    <input type="date" class="form-control" name="daritanggal" value="<?= date('Y-m-d'); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols-4">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="sampaitanggal">Sampai Tanggal Terima</label>
                                                    <input type="date" class="form-control" name="sampaitanggal" value="<?= date("Y-m-d", strtotime("+1 day"));; ?>" required>
                                                </div>
                                            </div>
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