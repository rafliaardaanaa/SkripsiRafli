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
                          <td colspan="3" align="center"><b>Data Barang Keluar</b></td>
                      </tr>
                      <tr>
                          <td>No Faktur</td>
                          <td>:</td>
                          <td><?= $barangkeluar['no_faktur']; ?></td>
                      </tr>
                      <tr>
                          <td>Tanggal Faktur</td>
                          <td>:</td>
                          <td><?= tanggal_indo($barangkeluar['tanggal_faktur']); ?></td>
                      </tr>
                      <?php
                        $toko = $this->db->get_where('toko', ['id_toko' => $barangkeluar['id_toko']])->row_array();
                        ?>
                      <tr>
                          <td>Toko</td>
                          <td>:</td>
                          <td><?= $toko['nama_toko']; ?></td>
                      </tr>
                      <?php
                        if (($barangkeluar['foto'] !== '') and ($barangkeluar['foto'] !== NULL)) {
                        ?>
                          <tr>
                              <td>Bukti Transaksi</td>
                              <td>:</td>
                              <td><a href="<?= base_url('files/' . $barangkeluar['foto']); ?>" target="_blank"><img src="<?= base_url('files/' . $barangkeluar['foto']); ?>" height="100" width="100" /></a></td>
                          </tr>
                      <?php } ?>
                  </tbody>
              </table><br />
              <?php
                $cekpengirimanbarang = $this->db->get_where('pengirimanbarang', ['id_barangkeluar' => $barangkeluar['id_barangkeluar']])->num_rows();
                if ($cekpengirimanbarang <= 0) {
                    $biaya = 0;
                } else {
                    $nama_penerima = $pengirimanbarang['nama_penerima'];
                    $biaya = $pengirimanbarang['biaya'];
                    $pengirim = $this->db->get_where('pegawai', ['id_pegawai' => $pengirimanbarang['id_pegawai']])->row_array();
                    $ekspedisi = $this->db->get_where('ekspedisi', ['id_ekspedisi' => $pengirimanbarang['id_ekspedisi']])->row_array();
                    if ($pengirimanbarang['tanggal_terima'] == NULL) {
                        $statuspengiriman = 'Belum Diterima';
                    } else {
                        $statuspengiriman = 'Sudah Diterima';
                    }
                ?>
                  <table class="table table-sm" align="center">
                      <tbody>
                          <tr>
                              <td colspan="3" align="center"><b>Data Pengiriman Barang</b></td>
                          </tr>
                          <tr>
                              <td>Kode Pengiriman</td>
                              <td>:</td>
                              <td><?= $pengirimanbarang['kode']; ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal Pengiriman</td>
                              <td>:</td>
                              <td><?= tanggal_indo($pengirimanbarang['tanggal']); ?></td>
                          </tr>
                          <tr>
                              <td>Ekspedisi</td>
                              <td>:</td>
                              <td><?= $ekspedisi['nama_ekspedisi']; ?></td>
                          </tr>
                          <tr>
                              <td>No Resi</td>
                              <td>:</td>
                              <td><?= $pengirimanbarang['no_resi']; ?></td>
                          </tr>
                          <tr>
                              <td>Biaya Pengiriman</td>
                              <td>:</td>
                              <td><?= rupiah($biaya); ?></td>
                          </tr>
                          <?php
                            if ($pengirimanbarang['tanggal_terima'] !== NULL) {
                            ?>
                              <tr>
                                  <td>Tanggal Diterima</td>
                                  <td>:</td>
                                  <td><?= tanggal_indo($pengirimanbarang['tanggal_terima']); ?></td>
                              </tr>
                              <tr>
                                  <td>Penerima</td>
                                  <td>:</td>
                                  <td><?= $pengirimanbarang['nama_penerima']; ?></td>
                              </tr>
                          <?php
                            }
                            ?>
                          <tr>
                              <td>Status Barang</td>
                              <td>:</td>
                              <td><?= $statuspengiriman; ?></td>
                          </tr>
                          <?php
                            if (($pengirimanbarang['foto'] !== '')  and ($pengirimanbarang['foto'] !== NULL)) {
                            ?>
                              <tr>
                                  <td>Foto</td>
                                  <td>:</td>
                                  <td><a href="<?= base_url('files/' . $pengirimanbarang['foto']); ?>" target="_blank"><img src="<?= base_url('files/' . $pengirimanbarang['foto']); ?>" height="100" width="100" /></a></td>
                              </tr>
                          <?php } ?>
                      </tbody>
                  </table>
              <?php } ?>
              <br />
              <table class="table table-bordered" id="table" width="100%" cellspacing="0" border="1">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        $grandtotal = 0;
                        foreach ($daftarbarangkeluar as $ft) :
                            $jumlah = $ft['jumlah'];
                            $id_barang = $ft['id_barang'];
                            $masterbarang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                        ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $masterbarang['kode']; ?></td>
                              <td><?= $masterbarang['nama_barang']; ?></td>
                              <td><?= $jumlah; ?></td>
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