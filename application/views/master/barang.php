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
                                <a href="<?= base_url('master/tambah_barang') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
                                        <!--<th>Berat Barang (Kg)</th>-->
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($barang as $filter) :
                                        $id_jenisbarang = $filter['id_jenisbarang'];
                                        $jenisbarang = $this->db->get_where('jenisbarang', ['id_jenisbarang' => $id_jenisbarang])->row_array();
                                    ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $filter['kode']; ?></td>
                                            <td><?= $jenisbarang['nama_jenisbarang']; ?></td>
                                            <td><?= $filter['nama_barang']; ?></td>
                                            <td><?= rupiah($filter['harga']); ?></td>
                                            <!--<td><?= $filter['berat']; ?></td>-->
                                            <td><?= $filter['keterangan']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>master/detail_barang/<?= $filter['id_barang']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                                <a href="<?= base_url(); ?>master/ubah_barang/<?= $filter['id_barang']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                                <a href="<?= base_url(); ?>master/hapus_barang/<?= $filter['id_barang']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Barang</th>
                                        <!--<th>Berat Barang (Kg)</th>-->
                                        <th>Keterangan</th>
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