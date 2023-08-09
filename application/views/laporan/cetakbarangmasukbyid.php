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
              <table border="0" callpadding="2" collpadding="2" align="center" width="80%">
                  <tbody>
                      <tr>
                          <td>No Faktur</td>
                          <td>:</td>
                          <td><?= $barangmasuk['no_faktur']; ?></td>
                          <td rowspan="5" align="center">Bukti Transaksi<br /><a href="<?= base_url('files/' . $barangmasuk['foto']); ?>" target="_blank"><img src="<?= base_url('files/' . $barangmasuk['foto']); ?>" height="100" width="100" /></a></td>
                      </tr>
                      <tr>
                          <td>Tanggal Faktur</td>
                          <td>:</td>
                          <td><?= tanggal_indo($barangmasuk['tanggal_faktur']); ?></td>

                      </tr>
                      <?php
                        $penerima = $this->db->get_where('pegawai', ['id_pegawai' => $barangmasuk['id_pegawai']])->row_array();
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
                        $supplier = $this->db->get_where('supplier', ['id_supplier' => $barangmasuk['id_supplier']])->row_array();
                        ?>
                      <tr>
                          <td>Supplier</td>
                          <td>:</td>
                          <td><?= $supplier['nama_supplier']; ?></td>
                      </tr>
                  </tbody>
              </table>
              <br />
              <table class="table table-bordered" id="table" width="100%" cellspacing="0" border="1">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Harga</th>
                          <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        $grandtotal = 0;
                        foreach ($daftarbarangmasuk as $ft) :
                            $jumlah = $ft['jumlah'];

                            $id_barang = $ft['id_barang'];
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