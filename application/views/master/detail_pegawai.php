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
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/pegawai'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                <a href="<?= base_url('master/cetakdetailpegawai/' . $masterpegawai['id_pegawai']); ?>" target="_blank"><button type="button" class="btn btn-success ml-3"><i class="fa fa-print"></i> Cetak</button></a>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <td>:</td>
                                            <td><?= $masterpegawai['nip']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Karyawan</td>
                                            <td>:</td>
                                            <td><?= $masterpegawai['nama_pegawai']; ?></td>
                                        </tr>
                                        <?php
                                        $nama_jeniskelamin = check_jeniskelamin($masterpegawai['id_jeniskelamin']);
                                        ?>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td><?= $nama_jeniskelamin; ?></td>
                                        </tr>
                                        <?php
                                        $id_jabatan = $masterpegawai['id_jabatan'];
                                        $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
                                        ?>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td><?= $jabatan['nama_jabatan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $masterpegawai['alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td><?= agama($masterpegawai['id_agama']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan</td>
                                            <td>:</td>
                                            <td><?= pendidikan($masterpegawai['id_pendidikan']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>No HP</td>
                                            <td>:</td>
                                            <td><?= $masterpegawai['nohp']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td><?= $masterpegawai['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td>:</td>
                                            <td><img src="<?= base_url('files/') . $masterpegawai['foto']; ?>" height="100" height="90" /></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?= check_aktif($masterpegawai['aktif']); ?></td>
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