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
                                        <a href="<?= base_url('laporan/cetakpengirimanbarangall'); ?>" target="_blank"><button type="button" class="btn btn-success ml-3"><i class="fa fa-print"></i> Cetak Semua</button></a>
                                    </div>
                                    <div class="cols-4">
                                        <?php if (($this->session->flashdata()) and (isset($daritanggal))) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetakpengirimanbarang'); ?>" method="post" target="_blank">
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
                                        <th>No Faktur</th>
                                        <th>Tgl Kirim</th>
                                        <th>Pengirim</th>
                                        <th>Ekspedisi</th>
                                        <th>No Resi</th>
                                        <th>Tgl Terima</th>
                                        <th>Penerima</th>
                                        <th>Status</th>
                                        <th>Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($filter as $fr) :
                                        $id_barangkeluar = $fr['id_barangkeluar'];
                                        $barangkeluar = $this->db->get_where('barangkeluar', ['id_barangkeluar' => $id_barangkeluar])->row_array();
                                        $id_pengirim = $fr['id_pegawai'];
                                        $pengirim = $this->db->get_where('pegawai', ['id_pegawai' => $id_pengirim])->row_array();
                                        $id_ekspedisi = $fr['id_ekspedisi'];
                                        $ekspedisi = $this->db->get_where('ekspedisi', ['id_ekspedisi' => $id_ekspedisi])->row_array();
                                        $pengirimanbarang = $this->db->get_where('pengirimanbarang', ['id_pengirimanbarang' => $fr['id_pengirimanbarang']])->row_array();
                                        $no_resi = $fr['no_resi'];
                                        $biaya = $fr['biaya'];
                                        if ($fr['tanggal_terima'] == NULL) {
                                            $penerima = NULL;
                                            $statuspengiriman = 'Sudah Diterima';
                                            $tanggal_terima = NULL;
                                            $statuspengiriman = 'Belum Diterima';
                                        } else {
                                            $penerima = $pengirimanbarang['nama_penerima'];
                                            $statuspengiriman = 'Sudah Diterima';
                                            $tanggal_terima = tanggal_indo($fr['tanggal_terima']);
                                        }
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $barangkeluar['no_faktur']; ?></td>
                                            <td><?= tanggal_indo($fr['tanggal']); ?></td>
                                            <td><?= $pengirim['nama_pegawai']; ?></td>
                                            <td><?= $ekspedisi['nama_ekspedisi']; ?></td>
                                            <td><?= $fr['no_resi']; ?></td>
                                            <td><?= $tanggal_terima; ?></td>
                                            <td><?= $penerima; ?></td>
                                            <td><?= $statuspengiriman; ?></td>
                                            <td><?= rupiah($fr['biaya']); ?></td>
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
                                                    <label for="daritanggal">Dari Tanggal Faktur</label>
                                                    <input type="date" class="form-control" name="daritanggal" value="<?= date('Y-m-d'); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols-4">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="sampaitanggal">Sampai Tanggal Faktur</label>
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