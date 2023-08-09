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
                          <div class="form-group">
                              <label for="no_faktur">No Faktur</label>
                              <input type="text" name="no_faktur" class="form-control" id="no_faktur" value="<?= set_value('no_faktur'); ?>" placeholder="Isi No Faktur">
                              <small class="text-danger"><?= form_error('no_faktur'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="tanggal_faktur">Tanggal Faktur</label>
                              <input type="date" name="tanggal_faktur" class="form-control" id="tanggal_faktur" value="<?= date('Y-m-d'); ?>" placeholder="Isi Tanggal Faktur">
                              <small class="text-danger"><?= form_error('tanggal_faktur'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_toko">Pilih Toko</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_toko" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($toko as $list) : ?>
                                      <option value="<?= $list['id_toko']; ?>"><?= $list['kode'] . ' - ' . $list['nama_toko']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                              <small class="text-danger"><?= form_error('id_barang'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Isi Keterangan"><?= set_value('keterangan'); ?></textarea>
                              <small class="text-danger"><?= form_error('keterangan'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/barangkeluar'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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