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
                                        <?php if (($this->session->flashdata()) and (isset($id_barang))) : ?>
                                            <form id="formTambah" action="<?= base_url('laporan/cetakstokbarang'); ?>" method="post" target="_blank">
                                                <input type="hidden" name="id_barang" value=<?= $id_barang; ?>>
                                                <button type="submit" class="btn btn-warning"><i class="fa fa-print"></i> Cetak</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
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
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="id_barang">Pilih Barang</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="id_barang" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                <option value="Semua">Semua</option>
                                                <?php foreach ($barang as $list) : ?>
                                                    <option value="<?= $list['id_barang']; ?>"><?= $list['kode'] . ' - ' . $list['nama_barang']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <small class="text-danger"><?= form_error('id_barang'); ?></small>
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