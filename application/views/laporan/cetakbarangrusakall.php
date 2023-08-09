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
                          <th>Kode</th>
                          <th>Tanggal</th>
                          <th>Barang</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        $totaljumlah = 0;
                        $grandtotal = 0;
                        foreach ($filter as $ft) :
                            $id_barang = $ft['id_barang'];
                            $barang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                            $harga = $barang['harga'];
                            $jumlah = $ft['rusak'];
                            $total = $harga * $jumlah;
                            $totaljumlah = $totaljumlah + $jumlah;
                            $grandtotal = $grandtotal + $total;
                        ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $ft['kode']; ?></td>
                              <td><?= tanggal_indo($ft['tanggal']); ?></td>
                              <td><?= $barang['nama_barang']; ?></td>
                              <td><?= $jumlah; ?></td>
                              <td><?= rupiah($harga); ?></td>
                              <td><?= rupiah($total); ?></td>
                          </tr>
                      <?php
                            $no++;
                        endforeach;
                        ?>
                      <tr>
                          <td colspan="4"></td>
                          <td><?= $totaljumlah; ?></td>
                          <td></td>
                          <td><?= rupiah($grandtotal); ?></td>
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