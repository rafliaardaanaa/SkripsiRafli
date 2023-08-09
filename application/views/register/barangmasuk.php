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
                            <div class="mb-3">
                                <a href="<?= base_url('register/tambah_barangmasuk') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tgl Faktur</th>
                                        <th>No Faktur</th>
                                        <th>Penerima</th>
                                        <th>Tgl Terima</th>
                                        <th>Supplier</th>
                                        <th>Total Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barangmasuk as $filter) :
                                        $id_penerima = $filter['id_pegawai'];
                                        $penerima = $this->db->get_where('pegawai', ['id_pegawai' => $id_penerima])->row_array();
                                        $id_supplier = $filter['id_supplier'];
                                        $supplier = $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
                                        $totalbarang  = $this->db->query("SELECT SUM(daftarbarangmasuk.jumlah) as total from daftarbarangmasuk WHERE id_barangmasuk='" . $filter['id_barangmasuk'] . "'")->row()
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= tanggal_indo($filter['tanggal_faktur']); ?></td>
                                            <td><?= $filter['no_faktur']; ?></td>
                                            <td><?= $penerima['nama_pegawai']; ?></td>
                                            <td><?= tanggal_indo($filter['tanggal_terima']); ?></td>
                                            <td><?= $supplier['nama_supplier']; ?></td>
                                            <td><?= $totalbarang->total; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>register/detail_barangmasuk/<?= $filter['id_barangmasuk']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                                <a href="<?= base_url(); ?>register/ubah_barangmasuk/<?= $filter['id_barangmasuk']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                                <a href="<?= base_url(); ?>register/hapus_barangmasuk/<?= $filter['id_barangmasuk']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
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
                                        <th>Penerima</th>
                                        <th>Tgl Terima</th>
                                        <th>Supplier</th>
                                        <th>Total Barang</th>
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