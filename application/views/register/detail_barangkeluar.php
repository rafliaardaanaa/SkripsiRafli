                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <?php if ($this->session->flashdata()) : ?>
                            <?= $this->session->flashdata('pesan_notifikasi'); ?>
                        <?php endif; ?>
                    </section>
                    <?php $foto = $barangkeluar['foto']; ?>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/barangkeluar'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                <a href="<?= base_url('laporan/cetakbarangkeluarbyid/' . $barangkeluar['id_barangkeluar']); ?>" target="_blank"><button type="button" class="btn btn-primary ml-3"><i class="fa fa-print"></i> Cetak</button></a>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td colspan="3" align="center"><b>Data Barang Keluar</b></td>
                                            </tr>
                                            <tr>
                                                <td>No Faktur</td>
                                                <td>:</td>
                                                <td><?= $barangkeluar['no_faktur']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Faktur</td>
                                                <td>:</td>
                                                <td><?= tanggal_indo($barangkeluar['tanggal_faktur']); ?></td>
                                            </tr>
                                            <?php
                                            $toko = $this->Toko_model->gettokoById($barangkeluar['id_toko']);
                                            ?>
                                            <tr>
                                                <td>Toko</td>
                                                <td>:</td>
                                                <td><?= $toko['nama_toko']; ?></td>
                                            </tr>
                                            <?php
                                            if (($foto !== '') and ($foto !== NULL)) {
                                            ?>
                                                <tr>
                                                    <td>Bukti Transaksi</td>
                                                    <td>:</td>
                                                    <td><a href="<?= base_url('files/' . $barangkeluar['foto']); ?>" target="_blank"><img src="<?= base_url('files/' . $barangkeluar['foto']); ?>" height="100" width="100" /></a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                    if ($cekpengirimanbarang <= 0) {
                                        $biaya = 0;
                                    ?>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengirimanbarang"><i class="fa fa-plus"></i> Tambah Pengiriman Barang</button></a>
                                        </div>
                                    <?php
                                    } else {
                                        $biaya = $pengirimanbarang['biaya'];
                                        $pengirim = $this->Pegawai_model->getPegawaiById($pengirimanbarang['id_pegawai']);
                                        $ekspedisi = $this->Ekspedisi_model->getekspedisiById($pengirimanbarang['id_ekspedisi']);
                                        if ($pengirimanbarang['tanggal_terima'] == NULL) {
                                            $statuspengiriman = 'Belum Diterima';
                                        } else {
                                            $statuspengiriman = 'Sudah Diterima';
                                        }
                                    ?>
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" align="center"><b>Data Pengiriman Barang</b></td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Pengiriman</td>
                                                    <td>:</td>
                                                    <td><?= $pengirimanbarang['kode']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Pengiriman</td>
                                                    <td>:</td>
                                                    <td><?= tanggal_indo($pengirimanbarang['tanggal']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ekspedisi</td>
                                                    <td>:</td>
                                                    <td><?= $ekspedisi['nama_ekspedisi']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No Resi</td>
                                                    <td>:</td>
                                                    <td><?= $pengirimanbarang['no_resi']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya Pengiriman</td>
                                                    <td>:</td>
                                                    <td><?= rupiah($biaya); ?></td>
                                                </tr>
                                                <?php
                                                if ($pengirimanbarang['tanggal_terima'] !== NULL) {
                                                ?>
                                                    <tr>
                                                        <td>Tanggal Diterima</td>
                                                        <td>:</td>
                                                        <td><?= tanggal_indo($pengirimanbarang['tanggal_terima']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penerima</td>
                                                        <td>:</td>
                                                        <td><?= $pengirimanbarang['nama_penerima']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td>Status Barang</td>
                                                    <td>:</td>
                                                    <td><?= $statuspengiriman; ?></td>
                                                </tr>
                                                <?php
                                                if (($pengirimanbarang['foto'] !== '')  and ($pengirimanbarang['foto'] !== NULL)) {
                                                ?>
                                                    <tr>
                                                        <td>Foto</td>
                                                        <td>:</td>
                                                        <td><a href="<?= base_url('files/' . $pengirimanbarang['foto']); ?>" target="_blank"><img src="<?= base_url('files/' . $pengirimanbarang['foto']); ?>" height="100" width="100" /></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php
                                        if ($pengirimanbarang['tanggal_terima'] == NULL) {
                                        ?>
                                            <a href="#"><button type="button" class="btn btn-success btn-sm mt-2" data-toggle="modal" data-target="#pengirimanditerima"><i class="fa fa-plus"></i></i> Pengiriman Diterima</button></a>
                                        <?php } ?>
                                        <a href="<?= base_url(); ?>register/hapus_pengirimanbarang/<?= $pengirimanbarang['id_barangkeluar'] . '/' . $pengirimanbarang['id_pengirimanbarang']; ?>"><button type="button" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus Pengiriman</button></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr />
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahbarang"><i class="fa fa-plus"></i> Tambah Barang</button></a>
                                    <!--<button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#uploadbukti"><i class="fa fa-upload"></i> Unggah Bukti Transaksi</button></a>-->
                                </div>
                                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $grandtotal = 0;
                                        foreach ($daftarbarangkeluar as $filter) :
                                            $jumlah = $filter['jumlah'];
                                            $id_barang = $filter['id_barang'];
                                            $masterbarang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $masterbarang['kode']; ?></td>
                                                <td><?= $masterbarang['nama_barang']; ?></td>
                                                <td><?= $jumlah; ?></td>

                                                <td>
                                                    <a href="<?= base_url(); ?>register/hapus_daftarbarangkeluar/<?= $filter['id_barangkeluar'] . '/' . $filter['id_daftarbarangkeluar']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                                </td>
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
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal Tambah Barang-->
                <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Keluar</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_input" class="form-control" id="id_input" value="1">
                                    <input type="hidden" name="id_barangkeluar" class="form-control" id="id_barangkeluar" value="<?= $barangkeluar['id_barangkeluar']; ?>">
                                    <div class="form-group">
                                        <label for="id_barang">Pilih Barang</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="id_barang" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php foreach ($barang as $list) : ?>
                                                <option value="<?= $list['id_barang']; ?>"><?= $list['kode'] . ' - ' . $list['nama_barang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_pendaftaran'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" name="jumlah" class="form-control" id="jumlah" value="0" placeholder="Isi Jumlah">
                                        <small class="text-danger"><?= form_error('jumlah'); ?></small>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" type="submnit" onclick="return confirm('Anda yakin ingin menambah data');">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Pengiriman Barang-->
                <div class="modal fade" id="pengirimanbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pengiriman Barang</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_input" class="form-control" id="id_input" value="2">
                                    <input type="hidden" name="id_barangkeluar" class="form-control" id="id_barangkeluar" value="<?= $barangkeluar['id_barangkeluar']; ?>">
                                    <?php
                                    $queryKode = $this->db->query("SELECT max(kode) as kodeTerbesar FROM pengirimanbarang")->row_array();
                                    $kodepengirimanbarang = $queryKode['kodeTerbesar'];
                                    $urutan = (int) substr($kodepengirimanbarang, 2, 5);
                                    $urutan++;
                                    $huruf = "BT";
                                    $kodepengirimanbarang = $huruf . sprintf("%05s", $urutan);
                                    ?>
                                    <div class="form-group">
                                        <label for="kode">Kode Pengiriman Barang</label>
                                        <input type="hidden" name="kode" class="form-control" id="kode" value="<?= $kodepengirimanbarang; ?>">
                                        <input type="text" name="kode1" class="form-control" id="kode1" value="<?= $kodepengirimanbarang; ?>" disabled>
                                        <small class="text-danger"><?= form_error('kode'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= date('Y-m-d'); ?>" placeholder="Isi Tanggal">
                                        <small class="text-danger"><?= form_error('tanggal'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_pegawai">Pilih Pegawai Yang Mengirim</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="id_pegawai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php
                                            foreach ($pengirim as $list) :
                                                $jabatanpenerima = $this->Jabatan_model->getJabatanById($list['id_jabatan']);
                                            ?>
                                                <option value="<?= $list['id_pegawai']; ?>"><?= $list['nip'] . ' - ' . $list['nama_pegawai'] . ' (' . $jabatanpenerima['nama_jabatan'] . ')'; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_pegawai'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_ekspedisi">Pilih Ekspedisi</label>
                                        <select class="form-control select2 select2-hidden-accessible" name="id_ekspedisi" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                            <?php foreach ($ekspedisi as $list) : ?>
                                                <option value="<?= $list['id_ekspedisi']; ?>"><?= $list['nama_ekspedisi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-danger"><?= form_error('id_ekspedisi'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="biaya">Biaya Pengiriman</label>
                                        <input type="number" name="biaya" class="form-control" id="biaya" value="0" placeholder="Isi Biaya Pengiriman">
                                        <small class="text-danger"><?= form_error('biaya'); ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_resi">No Resi Pengiriman</label>
                                        <input type="text" name="no_resi" class="form-control" id="no_resi" value="" placeholder="Isi No Resi Pengiriman">
                                        <small class="text-danger"><?= form_error('no_resi'); ?></small>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" type="submnit" onclick="return confirm('Anda yakin ingin menambah data');">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                if ($cekpengirimanbarang == 1) {
                    if ($pengirimanbarang['tanggal_terima'] == NULL) {
                        $toko = $this->Toko_model->gettokoById($barangkeluar['id_toko']);
                        $id_toko = $toko['id_toko'];
                        $nama_penerima = $toko['nama_kepala'];
                ?>
                        <!-- Modal Pengiriman Diterima-->
                        <div class="modal fade" id="pengirimanditerima" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pengiriman Diterima</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_input" class="form-control" id="id_input" value="3">
                                            <input type="hidden" name="id_barangkeluar" class="form-control" id="id_barangkeluar" value="<?= $barangkeluar['id_barangkeluar']; ?>">
                                            <div class="form-group">
                                                <label for="kode">Kode Pengiriman Barang</label>
                                                <input type="text" name="kode" class="form-control" id="kode" value="<?= $pengirimanbarang['kode']; ?>" readonly>
                                                <small class="text-danger"><?= form_error('kode'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_resi">No Resi</label>
                                                <input type="text" name="no_resi" class="form-control" id="no_resi" value="<?= $pengirimanbarang['no_resi']; ?>" placeholder="Isi No Resi">
                                                <small class="text-danger"><?= form_error('no_resi'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_terima">Tanggal Diterima</label>
                                                <input type="date" name="tanggal_terima" class="form-control" id="tanggal_terima" value="<?= date('Y-m-d'); ?>" placeholder="Isi Tanggal Diterima">
                                                <small class="text-danger"><?= form_error('tanggal_terima'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_penerima">Penerima</label>
                                                <input type="text" name="nama_penerima" class="form-control" id="nama_penerima" value="<?= $nama_penerima; ?>" placeholder="Isi Nama Penerima">
                                                <small class="text-danger"><?= form_error('id_pendaftaran'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="keterangan">Keterangan</label>
                                                <input type="text" name="keterangan" class="form-control" id="keterangan" value="" placeholder="Isi Keterangan">
                                                <small class="text-danger"><?= form_error('keterangan'); ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file" name="foto" class="form-control" id="foto" value="" required>
                                                <small class="text-danger"><?= form_error('foto'); ?></small>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submnit" onclick="return confirm('Anda yakin ingin menambah data');">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>
                <!-- Modal-->
                <div class="modal fade" id="uploadbukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Unggah Bukti Transaksi</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_input" class="form-control" id="id_input" value="4">
                                    <input type="hidden" name="id_barangkeluar" class="form-control" id="id_barangkeluar" value="<?= $barangkeluar['id_barangkeluar']; ?>">
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" name="foto" class="form-control" id="foto" value="" required>
                                        <small class="text-danger"><?= form_error('foto'); ?></small>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary" type="submnit" onclick="return confirm('Anda yakin ingin menambah data');">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>