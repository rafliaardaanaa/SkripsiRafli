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
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <hr />

    <!-- Table row -->
    <div class="row">
        <div class="col-12 table-responsive">
            <center>
                <p><b>DATA PRIBADI KARYAWAN</b></p>
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td colspan="3" align="center"><img src="<?= base_url('files/') . $masterpegawai['foto']; ?>" height="100" height="90" /></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?= $masterpegawai['nip']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td><?= $masterpegawai['nama_pegawai']; ?></td>
                        </tr>
                        <?php
                        $nama_jeniskelamin = check_jeniskelamin($masterpegawai['id_jeniskelamin']);
                        ?>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $nama_jeniskelamin; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $masterpegawai['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>:</td>
                            <td><?= $masterpegawai['nohp']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?= $masterpegawai['email']; ?></td>
                        </tr>
                        <?php
                        $id_jabatan = $masterpegawai['id_jabatan'];
                        $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();
                        ?>
                        <tr>
                            <td>Jabatan</td>
                            <td>:</td>
                            <td><?= $jabatan['nama_jabatan']; ?></td>
                        </tr>
                    </tbody>
                </table><br />
            </center>
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
            $NIP_pejabattd = $pejabatttd['nip'];
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