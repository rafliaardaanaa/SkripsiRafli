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
                              <?= $judul; ?>
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
              <table class="table table-sm" align="center">
                  <tbody>
                      <tr>
                          <td>Tanggal</td>
                          <td>:</td>
                          <td><?= tanggal_indo($baranghilang['tanggal']); ?></td>
                      </tr>
                      <tr>
                          <td>Kode</td>
                          <td>:</td>
                          <td><?= $baranghilang['kode']; ?></td>
                      </tr>
                      <?php
                        $barang = $this->db->get_where('barang', ['id_barang' => $baranghilang['id_barang']])->row_array();
                        ?>
                      <tr>
                          <td>Nama Barang</td>
                          <td>:</td>
                          <td><?= $barang['kode'] . ' - ' . $barang['nama_barang']; ?></td>
                      </tr>
                      <tr>
                          <td>Jumlah</td>
                          <td>:</td>
                          <td><?= $baranghilang['hilang']; ?></td>
                      </tr>
                      <tr>
                          <td>Harga</td>
                          <td>:</td>
                          <td><?= rupiah($barang['harga']); ?></td>
                      </tr>
                      <tr>
                          <td>Total</td>
                          <td>:</td>
                          <td><?= rupiah($baranghilang['hilang'] * $barang['harga']); ?></td>
                      </tr>
                      <tr>
                          <td>Keterangan</td>
                          <td>:</td>
                          <td><?= $baranghilang['keterangan']; ?></td>
                      </tr>
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