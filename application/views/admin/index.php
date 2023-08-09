                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php if ($this->session->flashdata()) : ?>
                        <!-- right column -->
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Notifkasi!</h5>
                                Data Password <?= $this->session->flashdata('flashdata'); ?>
                            </div>
                        </div>
                        <!--/.col (right) -->
                    <?php endif; ?>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="card bg-info text-white shadow mb-4">
                                <div class="card-body">
                                    <center>
                                        <h5 style='color:black'><?= $profil['nama_aplikasi']; ?></h5>
                                    </center>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Barang</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbarang; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Supplier</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahsupplier; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Barang Masuk</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbarangmasuk; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Barang Keluar</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahbarangkeluar; ?></div>
                                                </div>
                                                <div class="col-auto">
                                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card bg-success text-white shadow mt-4">
                                <div class="card-body">
                                    <p>
                                        <b>Visi :</b><br />

                                        <i>“Meraih rasa cinta dan penghargaan dari masyarakat Indonesia dengan menyentuh kehidupan setiap orang Indonesia setiap harinya”</i><br /><br />

                                        <b>Misi :</b><br />

                                    <ul>
                                        <li>Menjamin barang Uniliever Indonesia tersedia dimana saja kapan saja agar mudah diperoleh konsumen.</li>
                                        <li>Mencapai dampak MERCHANDISING di pasar.</li>
                                        <li>Mendapatkan kepercayaan hubungan dagang melalui peningkatan pelayanan kepada pedagang.</li>
                                        <li>Membina komitmen dan loyalitas distributor dengan keterampilan keuntungan dan servis yang memadai.</li>
                                        <li>Meningkatkan pelatihan dan perkembangan keterampilan profesional bagi seluruh jajaran sales.</li>
                                        <li>Memberikan perhatian terhadap produk-produk kecil dan produk-produk baru.</li>
                                        <li>Melakukan promosi lokal yang sesuai dengan keadaan di lapangan (Tailor-Made).</li>
                                        <li>Mengendalikan biaya-biaya secara realistis.</li>
                                    </ul>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <div class="modal fade" id="modal-password">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ubah Password</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="text" class="form-control" name="id_pengguna" placeholder="<?= $pengguna['id_pengguna']; ?>">
                                        <div class="form-group">
                                            <label for="password_lama">Password Lama</label>
                                            <input type="password" class="form-control" name="password_lama" placeholder="Isi Password Lama" required>
                                            <small class="text-danger"><?= form_error('password_lama'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_baru">Password Baru</label>
                                            <input type="password" class="form-control" name="password_baru" placeholder="Isi Password Baru" required>
                                            <small class="text-danger"><?= form_error('password_baru'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_ulang">Ulangi Password Baru</label>
                                            <input type="password" class="form-control" name="password_ulang" placeholder="Isi Ulangi Password Baru" required>
                                            <small class="text-danger"><?= form_error('password_ulang'); ?></small>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-info"></i> Simpan</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>