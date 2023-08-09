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
                          <th>No</th>
                          <th>Periode</th>
                          <th>Total Barang Keluar</th>
                          <th>Total Barang Masuk</th>
                          <th>Total Laba/Rugi</th>
                          <th>Keterangan</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $no = 1;
                        $totalbarangkeluar = 0;
                        $totalbarangmasuk = 0;
                        foreach ($barangkeluar as $brgkeluar) :
                            $id_barangkeluar = $brgkeluar['id_barangkeluar'];
                            $daftarbarangkeluar = $this->db->get_where('daftarbarangkeluar', ['id_barangkeluar' => $id_barangkeluar])->result_array();

                            foreach ($daftarbarangkeluar as $daftarkeluar) {
                                $id_barang = $daftarkeluar['id_barang'];
                                $barang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                                $harga_jualkarton = $barang['harga_jualkarton'];
                                $harga_juallusin = $barang['harga_juallusin'];
                                $harga_jualsatuan = $barang['harga_jualsatuan'];

                                $jumlah_jualkarton = $daftarkeluar['jumlah_jualkarton'];
                                $jumlah_juallusin = $daftarkeluar['jumlah_juallusin'];
                                $jumlah_jualsatuan = $daftarkeluar['jumlah_jualsatuan'];

                                $totalkarton = $harga_jualkarton * $jumlah_jualkarton;
                                $totallusin = $harga_juallusin * $jumlah_juallusin;
                                $totalsatuan = $harga_jualsatuan * $jumlah_jualsatuan;
                                $totalbarangkeluar = $totalbarangkeluar + ($totalkarton + $totallusin + $totalsatuan);
                            }
                        endforeach;
                        foreach ($barangmasuk as $brgmasuk) :
                            $id_barangmasuk = $brgmasuk['id_barangmasuk'];
                            $daftarbarangmasuk = $this->db->get_where('daftarbarangmasuk', ['id_barangmasuk' => $id_barangmasuk])->result_array();

                            foreach ($daftarbarangmasuk as $daftarmasuk) {
                                $id_barang = $daftarmasuk['id_barang'];
                                $barang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                                $harga_belikarton = $barang['harga_belikarton'];
                                $harga_belilusin = $barang['harga_belilusin'];
                                $harga_belisatuan = $barang['harga_belisatuan'];

                                $jumlah_belikarton = $daftarmasuk['jumlah_belikarton'];
                                $jumlah_belilusin = $daftarmasuk['jumlah_belilusin'];
                                $jumlah_belisatuan = $daftarmasuk['jumlah_belisatuan'];

                                $totalkarton = $harga_belikarton * $jumlah_belikarton;
                                $totallusin = $harga_belilusin * $jumlah_belilusin;
                                $totalsatuan = $harga_belisatuan * $jumlah_belisatuan;
                                $totalbarangmasuk = $totalbarangmasuk + ($totalkarton + $totallusin + $totalsatuan);
                            }
                        endforeach;
                        $totallabarugi = $totalbarangkeluar - $totalbarangmasuk;
                        if ($totallabarugi < 0) {
                            $keterangan = "Rugi";
                        } else {
                            $keterangan = "Laba";
                        }
                        ?>
                      <tr>
                          <td><?= $no; ?></td>
                          <td><?= $periode; ?></td>
                          <td><?= rupiah($totalbarangkeluar); ?></td>
                          <td><?= rupiah($totalbarangmasuk); ?></td>
                          <td><?= rupiah($totallabarugi); ?></td>
                          <td><?= $keterangan; ?></td>
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