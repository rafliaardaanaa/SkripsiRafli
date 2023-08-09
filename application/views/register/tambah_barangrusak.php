  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <?= $this->session->flashdata('pesan_notifikasi'); ?>
      </section>
      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tambah Data <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-12">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                          <?php
                            $queryKode = $this->db->query("SELECT max(kode) as kodeTerbesar FROM barangrusak")->row_array();
                            $kodebarangrusak = $queryKode['kodeTerbesar'];
                            $urutan = (int) substr($kodebarangrusak, 2, 5);
                            $urutan++;
                            $huruf = "BR";
                            $kodebarangrusak = $huruf . sprintf("%05s", $urutan);
                            ?>
                          <div class="form-group">
                              <label for="kode">Kode Barang Rusak</label>
                              <input type="hidden" name="kode" class="form-control" id="kode" value="<?= $kodebarangrusak; ?>">
                              <input type="text" name="kode1" class="form-control" id="kode1" value="<?= $kodebarangrusak; ?>" disabled>
                              <small class="text-danger"><?= form_error('kode'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="tanggal">Tanggal</label>
                              <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= date('Y-m-d'); ?>" placeholder="Isi Tanggal">
                              <small class="text-danger"><?= form_error('tanggal'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_barang">Pilih Barang</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_barang" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($barang as $list) : ?>
                                      <option value="<?= $list['id_barang']; ?>"><?= $list['kode'] . ' - ' . $list['nama_barang']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              <small class="text-danger"><?= form_error('id_barang'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="rusak">Jumlah</label>
                              <input type="number" name="rusak" class="form-control" id="rusak" value="0" placeholder="Isi Jumlah">
                              <small class="text-danger"><?= form_error('rusak'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Isi Keterangan"><?= set_value('keterangan'); ?></textarea>
                              <small class="text-danger"><?= form_error('keterangan'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/barangrusak'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
                          <button type="submit" class="btn btn-primary" onclick="return confirm('Anda yakin ingin menambah data');"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                  </form>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->