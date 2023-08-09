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
                  <h3 class="card-title">Ubah Data <?= $judul; ?></h3>
              </div>
              <div class="card-body col-md-12">
                  <form id="formTambah" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-body">
                          <input type="hidden" name="id_barangrusak" class="form-control" id="id_barangrusak" value="<?= $barangrusak['id_barangrusak']; ?>" readonly>
                          <div class="form-group">
                              <label for="kode">Kode Barang Rusak</label>
                              <input type="text" name="kode" class="form-control" id="kode" value="<?= $barangrusak['kode']; ?>" readonly>
                              <small class="text-danger"><?= form_error('kode'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="tanggal">Tanggal</label>
                              <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= $barangrusak['tanggal']; ?>" placeholder="Isi Tanggal">
                              <small class="text-danger"><?= form_error('tanggal'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_barang">Pilih barang</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_barang" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($barang as $list) :; ?>
                                      <?php
                                        if ($list['id_barang'] == $barangrusak['id_barang']) {

                                        ?>
                                          <option value="<?= $list['id_barang']; ?>" selected="selected"><?= $list['kode'] . ' - ' . $list['nama_barang']; ?></option>
                                      <?php
                                        } else {
                                        ?>
                                          <option value="<?= $list['id_barang']; ?>"><?= $list['nama_barang']; ?></option>
                                      <?php
                                        }
                                        ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="rusak">Jumlah</label>
                              <input type="number" name="rusak" class="form-control" id="rusak" value="<?= $barangrusak['rusak']; ?>" placeholder="Isi Jumlah">
                              <small class="text-danger"><?= form_error('rusak'); ?></small>
                          </div>

                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Isi Keterangan"><?= $barangrusak['keterangan']; ?></textarea>
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