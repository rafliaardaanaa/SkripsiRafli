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
              <table class="table" width="100%" border="1" cellpadding="2" cellspacing="2">
                  <thead>
                      <tr>
                          <th class="text-center align-middle">No</th>
                          <th class="text-center align-middle">Kode</th>
                          <th class="text-center align-middle">Nama Barang</th>
                          <th class="text-center align-middle">Masuk</th>
                          <th class="text-center align-middle">Keluar</th>
                          <th class="text-center align-middle">Hilang</th>
                          <th class="text-center align-middle">Rusak</th>
                          <th class="text-center align-middle">Sisa</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        foreach ($filter as $fr) :
                            $id_barang = $fr['id_barang'];
                            $kode_barang = $fr['kode'];
                            $nama_barang = $fr['nama_barang'];
                            //daftarbarangmasuk
                            $masuk = 0;
                            $keluar = 0;
                            $hilang = 0;
                            $rusak = 0;
                            $daftarbarangmasuk = $this->db->order_by('id_barang', 'ASC')->get_where('daftarbarangmasuk', ['id_barang' => $id_barang])->result_array();
                            foreach ($daftarbarangmasuk as $daftarmasuk) {
                                $jumlah = $daftarmasuk['jumlah'];
                                $masuk = $masuk + $jumlah;
                            }
                            //daftarbarangkeluar
                            $daftarbarangkeluar = $this->db->order_by('id_barang', 'ASC')->get_where('daftarbarangkeluar', ['id_barang' => $id_barang])->result_array();
                            foreach ($daftarbarangkeluar as $daftarkeluar) {
                                $jumlah = $daftarkeluar['jumlah'];
                                $keluar = $keluar + $jumlah;
                            }
                            //baranghilang
                            $baranghilang = $this->db->order_by('id_barang', 'ASC')->get_where('baranghilang', ['id_barang' => $id_barang])->result_array();
                            foreach ($baranghilang as $daftarhilang) {
                                $jumlah = $daftarhilang['hilang'];
                                $hilang = $hilang + $jumlah;
                            }
                            //barangrusak
                            $barangrusak = $this->db->order_by('id_barang', 'ASC')->get_where('barangrusak', ['id_barang' => $id_barang])->result_array();
                            foreach ($barangrusak as $daftarrusak) {
                                $jumlah = $daftarrusak['rusak'];
                                $rusak = $rusak + $jumlah;
                            }
                            $sisa = $masuk - ($keluar + $hilang + $rusak);

                        ?>
                          <tr>
                              <td><?= $no; ?></td>
                              <td><?= $kode_barang; ?></td>
                              <td><?= $nama_barang; ?></td>
                              <td><?= $masuk; ?></td>
                              <td><?= $keluar; ?></td>
                              <td><?= $hilang; ?></td>
                              <td><?= $rusak; ?></td>
                              <td><?= $sisa; ?></td>
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