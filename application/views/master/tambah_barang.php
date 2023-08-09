                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                    </section>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            Tambah <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <?php
                                        $queryKode = $this->db->query("SELECT max(kode) as kodeTerbesar FROM barang")->row_array();
                                        $kodebarang = $queryKode['kodeTerbesar'];
                                        $urutan = (int) substr($kodebarang, 3, 7);
                                        $urutan++;
                                        $huruf = "BRG";
                                        $kodebarang = $huruf . sprintf("%07s", $urutan);
                                        ?>
                                        <div class="form-group">
                                            <label for="kode">Kode Barang</label>
                                            <input type="hidden" name="kode" class="form-control" id="kode" value="<?= $kodebarang; ?>">
                                            <input type="text" name="kode1" class="form-control" id="kode1" value="<?= $kodebarang; ?>" disabled>
                                            <small class="text-danger"><?= form_error('kode'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jenisbarang">Pilih Jenis Barang</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_jenisbarang" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <?php
                                                $jenisbarang = $this->db->order_by('urutan', 'asc')->get('jenisbarang')->result_array();
                                                foreach ($jenisbarang as $list) :
                                                ?>
                                                    <option value="<?= $list['id_jenisbarang']; ?>"><?= $list['nama_jenisbarang']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" name="nama_barang" class="form-control" id="nama_barang" oninput="this.value=this.value.replace(/[^a-zA-Z\s.,]/g, '');" value="<?= set_value('nama_barang'); ?>" placeholder="Isi Nama Barang">
                                            <small class="text-danger"><?= form_error('nama_barang'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga</label>
                                            <input type="number" name="harga" class="form-control" id="harga" value="<?= set_value('harga'); ?>" placeholder="Isi Harga">
                                            <small class="text-danger"><?= form_error('harga'); ?></small>
                                        </div>
                                        <input type="hidden" name="berat" class="form-control" id="berat" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" value="1" placeholder="Isi Berat Per Karton">
                                        <!--<div class="form-group">
                                            <label for="berat">Berat (Kg)</label>
                                            <input type="text" name="berat" class="form-control" id="berat" oninput="this.value=this.value.replace(/[^0-9.]/g,'');" value="<?= set_value('berat'); ?>" placeholder="Isi Berat Per Karton">
                                            <small class="text-danger"><?= form_error('berat'); ?></small>
                                        </div>-->
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= set_value('keterangan'); ?>" placeholder="Isi Keterangan">
                                            <small class="text-danger"><?= form_error('keterangan'); ?></small>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('master/barang'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menambah data');"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->