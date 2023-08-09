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
                          <input type="hidden" name="id_barangmasuk" class="form-control" id="id_barangmasuk" value="<?= $barangmasuk['id_barangmasuk']; ?>" readonly>
                          <div class="form-group">
                              <label for="no_faktur">No Faktur</label>
                              <input type="text" name="no_faktur" class="form-control" id="no_faktur" value="<?= $barangmasuk['no_faktur']; ?>">
                              <small class="text-danger"><?= form_error('no_faktur'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="tanggal_faktur">Tanggal Faktur</label>
                              <input type="date" name="tanggal_faktur" class="form-control" id="tanggal_faktur" value="<?= $barangmasuk['tanggal_faktur']; ?>" placeholder="Isi Tanggal Faktur">
                              <small class="text-danger"><?= form_error('tanggal_faktur'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_pegawai">Pilih Penerima Barang</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_pegawai" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php
                                    foreach ($penerima as $list) :
                                        $jabatanpenerima = $this->Jabatan_model->getJabatanById($list['id_jabatan']);
                                    ?>
                                      <?php
                                        if ($list['id_pegawai'] == $barangmasuk['id_pegawai']) {

                                        ?>
                                          <option value="<?= $list['id_pegawai']; ?>" selected="selected"><?= $list['nip'] . ' - ' . $list['nama_pegawai'] . ' (' . $jabatanpenerima['nama_jabatan'] . ')'; ?></option>
                                      <?php
                                        } else {
                                        ?>
                                          <option value="<?= $list['id_pegawai']; ?>"><?= $list['nip'] . ' - ' . $list['nama_pegawai'] . ' (' . $jabatanpenerima['nama_jabatan'] . ')'; ?></option>
                                      <?php
                                        }
                                        ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="tanggal_terima">Tanggal Terima</label>
                              <input type="date" name="tanggal_terima" class="form-control" id="tanggal_terima" value="<?= $barangmasuk['tanggal_terima']; ?>" placeholder="Isi Tanggal Terima">
                              <small class="text-danger"><?= form_error('tanggal_terima'); ?></small>
                          </div>
                          <div class="form-group">
                              <label for="id_supplier">Pilih Supplier</label>
                              <select class="form-control select2 select2-hidden-accessible" name="id_supplier" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                  <?php foreach ($supplier as $list) :; ?>
                                      <?php
                                        if ($list['id_supplier'] == $barangmasuk['id_supplier']) {

                                        ?>
                                          <option value="<?= $list['id_supplier']; ?>" selected="selected"><?= $list['nama_supplier']; ?></option>
                                      <?php
                                        } else {
                                        ?>
                                          <option value="<?= $list['id_supplier']; ?>"><?= $list['nama_supplier']; ?></option>
                                      <?php
                                        }
                                        ?>
                                  <?php endforeach; ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="keterangan">Keterangan</label>
                              <textarea name="keterangan" class="form-control" id="keterangan" rows="5" placeholder="Isi Keterangan"><?= $barangmasuk['keterangan']; ?></textarea>
                              <small class="text-danger"><?= form_error('keterangan'); ?></small>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-warning" onclick="window.location='<?= base_url('register/barangmasuk'); ?>'"><i class="fa fa-arrow-left"></i> Kembali</button>
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