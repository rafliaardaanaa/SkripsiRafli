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
                                <a href="<?= base_url('master/tambah_pengguna') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Level</th>
                                        <th>Nama Pengguna</th>
                                        <th>Username</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($masterpengguna as $pg) : ?>
                                        <?php
                                        $id_level = $pg['id_level'];
                                        $level = $this->db->get_where('level', ['id_level' => $id_level])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $level['nama_level']; ?></td>
                                            <td><?= $pg['nama_pengguna']; ?></td>
                                            <td><?= $pg['username']; ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>master/detail_pengguna/<?= $pg['id_pengguna']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                                <a href="<?= base_url(); ?>master/ubah_pengguna/<?= $pg['id_pengguna']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                                <a href="<?= base_url(); ?>master/hapus_pengguna/<?= $pg['id_pengguna']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Level</th>
                                        <th>Nama Pengguna</th>
                                        <th>Username</th>
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