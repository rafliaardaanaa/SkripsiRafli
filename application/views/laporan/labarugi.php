                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <section class="content-header">
                        <!-- NOTIF FLASH DISINI-->
                    </section>
                    <!-- Page Heading -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="cols-4 mr-4">
                                        <a href="#"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-filter"><i class="fa fa-plus"></i> Filter Data</button></a>
                                    </div>
                                    <div class="cols-4">
                                        <?php if (($this->session->flashdata()) and (isset($daritanggal))) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetaklabarugi'); ?>" method="post" target="_blank">
                                                <input type="hidden" name="daritanggal" value=<?= $daritanggal; ?>>
                                                <input type="hidden" name="sampaitanggal" value=<?= $sampaitanggal; ?>>
                                                <button type="submit" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
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
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <div class="modal fade" id="modal-filter">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Filter Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" action="" method="post">
                                    <div class="row">
                                        <div class="cols-4">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="daritanggal">Dari Tanggal Faktur</label>
                                                    <input type="date" class="form-control" name="daritanggal" value="<?= date('Y-m-d'); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cols-4">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="sampaitanggal">Sampai Tanggal Faktur</label>
                                                    <input type="date" class="form-control" name="sampaitanggal" value="<?= date("Y-m-d", strtotime("+1 day"));; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-info"></i> Lihat Data</button>
                            </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>