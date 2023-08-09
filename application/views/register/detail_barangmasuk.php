                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                        <?php if ($this->session->flashdata()) : ?>
                            <?= $this->session->flashdata('pesan_notifikasi'); ?>
                        <?php endif; ?>
                    </section>
                    <?php $foto = $barangmasuk['foto']; ?>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/barangmasuk'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                <a href="<?= base_url('laporan/cetakbarangmasukbyid/' . $barangmasuk['id_barangmasuk']); ?>" target="_blank"><button type="button" class="btn btn-primary ml-3"><i class="fa fa-print"></i> Cetak</button></a>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>No Faktur</td>
                                            <td>:</td>
                                            <td><?= $barangmasuk['no_faktur']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Faktur</td>
                                            <td>:</td>
                                            <td><?= tanggal_indo($barangmasuk['tanggal_faktur']); ?></td>
                                        </tr>
                                        <?php
                                        $penerima = $this->Pegawai_model->getpegawaiById($barangmasuk['id_pegawai']);
                                        ?>
                                        <tr>
                                            <td>Penerima Barang</td>
                                            <td>:</td>
                                            <td><?= $penerima['nama_pegawai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Terima</td>
                                            <td>:</td>
                                            <td><?= tanggal_indo($barangmasuk['tanggal_terima']); ?></td>
                                        </tr>
                                        <?php
                                        $supplier = $this->Supplier_model->getsupplierById($barangmasuk['id_supplier']);
                                        ?>
                                        <tr>
                                            <td>Supplier</td>
                                            <td>:</td>
                                            <td><?= $supplier['nama_supplier']; ?></td>
                                        </tr>
                                        <?php
                                        if (($foto !== '') and ($foto !== NULL)) {
                                        ?>
                                            <tr>
                                                <td>Bukti Transaksi</td>
                                                <td>:</td>
                                                <td><a href="<?= base_url('files/' . $barangmasuk['foto']); ?>" target="_blank"><img src="<?= base_url('files/' . $barangmasuk['foto']); ?>" height="100" width="100" /></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr />
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahbarang"><i class="fa fa-plus"></i> Tambah Barang</button></a>
                                    <button type="button" class="btn btn-success ml-3" data-toggle="modal" data-target="#uploadbukti"><i class="fa fa-upload"></i> Unggah Bukti Transaksi</button></a>
                                </div>
                                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $grandtotal = 0;
                                        foreach ($daftarbarangmasuk as $filter) :
                                            $jumlah = $filter['jumlah'];

                                            $id_barang = $filter['id_barang'];
                                            $masterbarang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                                            $harga = $masterbarang['harga'];

                                            $total = $jumlah * $harga;

                                            $totalsemua = $total;
                                            $grandtotal = $grandtotal + $totalsemua;
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $masterbarang['kode']; ?></td>
                                                <td><?= $masterbarang['nama_barang']; ?></td>
                                                <td><?= $jumlah; ?></td>
                                                <td><?= rupiah($harga); ?></td>
                                                <td><?= rupiah($totalsemua); ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>register/hapus_daftarbarangmasuk/<?= $filter['id_barangmasuk'] . '/' . $filter['id_daftarbarangmasuk']; ?>"><button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini');"><i class="fa fa-trash"></i> Hapus</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                                <h3 align="right">Total : <?= rupiah($grandtotal); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal-->
                <div class="modal fade" id="tambahbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_input" class="form-control" id="id_input" value="1">
                                    <input type="hidden" name="id_barangmasuk" class="form-control" id="id_barangmasuk" value="<?= $barangmasuk['id_barangmasuk']; ?>">
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
                                    <input type="hidden" name="id_input" class="form-control" id="id_input" value="2">
                                    <input type="hidden" name="id_barangmasuk" class="form-control" id="id_barangmasuk" value="<?= $barangmasuk['id_barangmasuk']; ?>">
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