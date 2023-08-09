                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                        <?php if ($this->session->flashdata()) : ?>
                            <!-- right column -->
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Notifkasi!</h5>
                                    Data berhasil <?= $this->session->flashdata('flashdata'); ?>
                                </div>
                            </div>
                            <!--/.col (right) -->
                        <?php endif; ?>
                    </section>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Faktur</th>
                                        <th>No Faktur</th>
                                        <th>Toko</th>
                                        <th>Total Barang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barangkeluar as $filter) :
                                        $id_toko = $filter['id_toko'];
                                        $toko = $this->db->get_where('toko', ['id_toko' => $id_toko])->row_array();
                                        $pengirimanbarang = $this->db->get_where('pengirimanbarang', ['id_barangkeluar' => $filter['id_barangkeluar']])->row_array();
                                        if ($pengirimanbarang['foto'] == '') {
                                            $statuspengiriman = 'Belum Diterima';
                                        } else {
                                            $statuspengiriman = 'Sudah Diterima';
                                        }
                                        $totalbarang  = $this->db->query("SELECT SUM(daftarbarangkeluar.jumlah) as total from daftarbarangkeluar WHERE id_barangkeluar='" . $filter['id_barangkeluar'] . "'")->row()
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= tanggal_indo($filter['tanggal_faktur']); ?></td>
                                            <td><?= $filter['no_faktur']; ?></td>
                                            <td><?= $toko['nama_toko']; ?></td>
                                            <td><?= $totalbarang->total; ?></td>
                                            <td><?= $statuspengiriman; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>toko/detail_barangkeluar/<?= $filter['id_barangkeluar']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Faktur</th>
                                        <th>No Faktur</th>
                                        <th>Toko</th>
                                        <th>Total Barang</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->