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
                                    Data <?= $this->session->flashdata('flashdata'); ?>
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
                                <a href="<?= base_url('master/tambah_pegawai') ?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a>
                            </div>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($masterpegawai as $pgw) : ?>
                                        <?php
                                        $id_jabatan = $pgw['id_jabatan'];
                                        $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $pgw['nip']; ?></td>
                                            <td><?= $pgw['nama_pegawai']; ?></td>
                                            <td><?= $jabatan['nama_jabatan']; ?></td>
                                            <td><?= $pgw['alamat']; ?></td>
                                            <td><?= agama($pgw['id_agama']); ?></td>
                                            <td><?= pendidikan($pgw['id_pendidikan']); ?></td>
                                            <td><?= $pgw['nohp']; ?></td>
                                            <td><?= $pgw['email']; ?></td>
                                            <td><img src="<?= base_url('files/') . $pgw['foto']; ?>" height="100" height="90" /></td>
                                            <td>
                                                <a href="<?= base_url(); ?>master/detail_pegawai/<?= $pgw['id_pegawai']; ?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-info"></i> Detail</button></a>
                                                <a href="<?= base_url(); ?>master/ubah_pegawai/<?= $pgw['id_pegawai']; ?>"><button type="button" class="btn btn-primary btn-sm"><i class=" fa fa-edit"></i> Ubah</button></a>
                                                <a href="<?= base_url(); ?>master/hapus_pegawai/<?= $pgw['id_pegawai']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama Karyawan</th>
                                        <th>Jabatan</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Pendidikan</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Foto</th>
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