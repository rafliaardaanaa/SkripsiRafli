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
                          <th>No Faktur</th>
                          <th>Tgl Kirim</th>
                          <th>Pengirim</th>
                          <th>Ekspedisi</th>
                          <th>No Resi</th>
                          <th>Tgl Terima</th>
                          <th>Penerima</th>
                          <th>Status</th>
                          <th>Biaya</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        $totalbiaya = 0;
                        foreach ($filter as $fr) :
                            $id_barangkeluar = $fr['id_barangkeluar'];
                            $barangkeluar = $this->db->get_where('barangkeluar', ['id_barangkeluar' => $id_barangkeluar])->row_array();
                            $id_pengirim = $fr['id_pegawai'];
                            $pengirim = $this->db->get_where('pegawai', ['id_pegawai' => $id_pengirim])->row_array();
                            $id_ekspedisi = $fr['id_ekspedisi'];
                            $ekspedisi = $this->db->get_where('ekspedisi', ['id_ekspedisi' => $id_ekspedisi])->row_array();
                            $pengirimanbarang = $this->db->get_where('pengirimanbarang', ['id_pengirimanbarang' => $fr['id_pengirimanbarang']])->row_array();
                            $no_resi = $fr['no_resi'];
                            $biaya = $fr['biaya'];
                            if ($fr['tanggal_terima'] == NULL) {
                                $penerima = NULL;
                                $statuspengiriman = 'Sudah Diterima';
                                $tanggal_terima = NULL;
                                $statuspengiriman = 'Belum Diterima';
                            } else {
                                $penerima = $pengirimanbarang['nama_penerima'];
                                $statuspengiriman = 'Sudah Diterima';
                                $tanggal_terima = tanggal_indo($fr['tanggal_terima']);
                            }
                            $totalbiaya = $totalbiaya + $fr['biaya'];
                        ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $barangkeluar['no_faktur']; ?></td>
                              <td><?= tanggal_indo($fr['tanggal']); ?></td>
                              <td><?= $pengirim['nama_pegawai']; ?></td>
                              <td><?= $ekspedisi['nama_ekspedisi']; ?></td>
                              <td><?= $fr['no_resi']; ?></td>
                              <td><?= $tanggal_terima; ?></td>
                              <td><?= $penerima; ?></td>
                              <td><?= $statuspengiriman; ?></td>
                              <td><?= rupiah($fr['biaya']); ?></td>
                          </tr>
                      <?php
                            $no++;
                        endforeach;
                        ?>
                      <tr>
                          <td colspan="9" align="right">Total Biaya</td>
                          <td><?= rupiah($totalbiaya); ?></td>

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