  <script>
      window.print();
  </script>
  <!-- Main content -->
  <div class="invoice">
      <!-- title row -->
      <div class="row">
          <div class="col-12" align="center">
              <table width="80%" align="center">
                  <tr>
                      <td rowspan="2" align="right"><img src="<?= base_url('assets/img/' . $profil['logo']); ?>" height="100" width="90" /></td>
                  </tr>
                  <tr>
                      <td align="center">
                          <h4><?= $profil['nama_profil']; ?></h4>
                          <p>Alamat : <?= $profil['alamat']; ?>. Telp : <?= $profil['telepon']; ?>. Kodepos : <?= $profil['kodepos']; ?> <br />
                              Email : <?= $profil['email']; ?>. Website : <?= $profil['website']; ?></p>
                          <h4>
                              <?= $judul; ?><br />
                          </h4>
                      </td>
                  </tr>
              </table>
          </div>
      </div>
      <hr />

      <!-- Table row -->
      <div class="row">
          <div class="col-12 table-responsive">
              <table class="table" width="100%" border="1" cellpadding="2" cellspacing="2">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tgl Faktur</th>
                          <th>No Faktur</th>
                          <th>Penerima</th>
                          <th>Tgl Terima</th>
                          <th>Supplier</th>
                          <th>Total Barang</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($filter as $ft) :
                            $id_penerima = $ft['id_pegawai'];
                            $penerima = $this->db->get_where('pegawai', ['id_pegawai' => $id_penerima])->row_array();
                            $id_supplier = $ft['id_supplier'];
                            $supplier = $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
                            $totalbarang  = $this->db->query("SELECT SUM(daftarbarangmasuk.jumlah) as total from daftarbarangmasuk WHERE id_barangmasuk='" . $ft['id_barangmasuk'] . "'")->row()
                        ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= tanggal_indo($ft['tanggal_faktur']); ?></td>
                              <td><?= $ft['no_faktur']; ?></td>
                              <td><?= $penerima['nama_pegawai']; ?></td>
                              <td><?= tanggal_indo($ft['tanggal_terima']); ?></td>
                              <td><?= $supplier['nama_supplier']; ?></td>
                              <td><?= $totalbarang->total; ?></td>
                          </tr>
                      <?php
                            $no++;
                        endforeach;
                        ?>
                  </tbody>
              </table>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">

          </div>
          <!-- /.col -->
          <div class="col-6">
              <?php
                $pejabatttd = $this->db->get_where('pejabat_ttd', [
                    'aktif' => '1'
                ])->row_array();
                $nik_pejabattd = $pejabatttd['nip'];
                $nama_pejabattd = $pejabatttd['nama_pegawai'];
                $id_jabatanttd = $pejabatttd['id_jabatan'];
                $jabatanttd = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatanttd])->row_array();
                $nama_jabatanttd = $jabatanttd['nama_jabatan'];
                ?>
              <table align="right" width="60%">
                  <tr align="center">
                      <td>Banjarmasin, <?= tanggal_indo(date('Y-m-d')); ?></td>
                  </tr>
                  <tr align="center">
                      <td><?= $nama_jabatanttd; ?><br /><br /><br /></td>
                  </tr>
                  <tr align="center">
                      <td><b><u><?= $nama_pejabattd ?></u></b></td>
                  </tr>
              </table>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
  </div>