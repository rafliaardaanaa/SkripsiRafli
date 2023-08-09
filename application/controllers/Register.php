<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        $this->load->model('Pengguna_model');
        $this->load->model('Level_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Golpangkat_model');
        $this->load->model('Pegawai_model');

        $this->load->model('Barang_model');
        $this->load->model('Supplier_model');
        $this->load->model('Toko_model');
        $this->load->model('Ekspedisi_model');
        $this->load->model('Barangmasuk_model');
        $this->load->model('Daftarbarangmasuk_model');
        $this->load->model('Barangkeluar_model');
        $this->load->model('Daftarbarangkeluar_model');
        $this->load->model('Pengirimanbarang_model');
        $this->load->model('Baranghilang_model');
        $this->load->model('Barangrusak_model');
        check_login();
        check_username();
        $this->load->helper('string');
    }

    //REGISTER INDEX
    public function index()
    {

        redirect(base_url());
    }

    //barangmasuk
    public function barangmasuk()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Masuk';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['supplier'] = $this->Supplier_model->getAllsupplier();
        $data['barangmasuk'] = $this->Barangmasuk_model->getAllbarangmasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('register/barangmasuk', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_barangmasuk()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Masuk';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['supplier'] = $this->Supplier_model->getAllsupplier();
        $data['penerima'] = $this->Pegawai_model->getAllPegawai();
        $data['barangmasuk'] = $this->Barangmasuk_model->getAllbarangmasuk();

        $this->form_validation->set_rules('tanggal_faktur', 'Tanggal Faktur', 'required');
        $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required');
        $this->form_validation->set_rules('tanggal_terima', 'Tanggal Terima', 'required');
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/tambah_barangmasuk', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barangmasuk_model->tambahDatabarangmasuk();
            $lastId = $this->db->order_by('id_barangmasuk', 'desc')->get('barangmasuk')->row_array();
            $id_barangmasuk = $lastId['id_barangmasuk'];
            redirect('register/detail_barangmasuk/' . $id_barangmasuk);
        }
    }

    public function ubah_barangmasuk($id_barangmasuk)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Masuk';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['penerima'] = $this->Pegawai_model->getAllPegawai();
        $data['supplier'] = $this->Supplier_model->getAllsupplier();
        $data['barangmasuk'] = $this->Barangmasuk_model->getbarangmasukById($id_barangmasuk);

        $this->form_validation->set_rules('id_barangmasuk', 'barang Masuk', 'required');
        $this->form_validation->set_rules('tanggal_faktur', 'Tanggal Faktur', 'required');
        $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required');
        $this->form_validation->set_rules('tanggal_terima', 'Tanggal Terima', 'required');
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/ubah_barangmasuk', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barangmasuk_model->ubahDatabarangmasuk();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/barangmasuk');
        }
    }

    public function hapus_barangmasuk($id_barangmasuk)
    {
        $barangmasuk = $this->Barangmasuk_model->getbarangmasukById($id_barangmasuk);
        $foto_lama = $barangmasuk['foto'];
        unlink(FCPATH . './files/' . $foto_lama);
        $this->Daftarbarangmasuk_model->hapusDatadaftarbarangmasukByIdMasuk($id_barangmasuk);
        $this->Barangmasuk_model->hapusDatabarangmasuk($id_barangmasuk);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/barangmasuk');
    }
    public function hapus_daftarbarangmasuk($id_barangmasuk, $id_daftarbarangmasuk)
    {

        $this->Daftarbarangmasuk_model->hapusDatadaftarbarangmasuk($id_daftarbarangmasuk);
        $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Berhasil menghapus data</div>');
        redirect('register/detail_barangmasuk/' . $id_barangmasuk);
    }

    public function detail_barangmasuk($id_barangmasuk)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Masuk';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['daftarbarangmasuk'] = $this->Daftarbarangmasuk_model->getdaftarbarangmasukByIdBarangMasuk($id_barangmasuk);
        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['barangmasuk'] = $this->Barangmasuk_model->getbarangmasukById($id_barangmasuk);

        $id_input = $this->input->post('id_input');
        if ($id_input == '1') {
            $this->form_validation->set_rules('id_barangmasuk', 'Barang Masuk', 'required');
            $this->form_validation->set_rules('id_barang', 'Barang', 'required');
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        } else {
            $this->form_validation->set_rules('id_barangmasuk', 'Barang Masuk', 'required');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/detail_barangmasuk', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            //            $id_input = $this->input->post('id_input');
            if ($id_input == '1') {
                $this->Daftarbarangmasuk_model->tambahDatadaftarbarangmasuk();
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil menambah data</div>');
                redirect('register/detail_barangmasuk/' . $id_barangmasuk);
            } else if ($id_input == '2') {
                $uploadfile = $_FILES['foto']['name'];
                $acak = random_string('alnum', 16);
                $file_baru = $acak . "." . pathinfo($uploadfile, PATHINFO_EXTENSION);
                if ($uploadfile) {
                    $config['file_name'] = $file_baru;
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '30000';
                    $config['upload_path'] = './files/';
                }

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $barangmasuk = $this->Barangmasuk_model->getbarangmasukById($id_barangmasuk);
                    $foto_lama = $barangmasuk['foto'];
                    if ($foto_lama !== '') {
                        unlink(FCPATH . './files/' . $foto_lama);
                    }
                    $this->Barangmasuk_model->uploadbuktitransaksi($id_barangmasuk, $file_baru);
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil melakukan unggah foto</div>');
                    redirect('register/detail_barangmasuk/' . $id_barangmasuk);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan unggah foto!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
        }
    }
    //barangkeluar
    public function barangkeluar()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Keluar';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['toko'] = $this->Toko_model->getAlltoko();
        $data['barangkeluar'] = $this->Barangkeluar_model->getAllbarangkeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('register/barangkeluar', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_barangkeluar()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Keluar';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['toko'] = $this->Toko_model->getAlltoko();
        $data['barangkeluar'] = $this->Barangkeluar_model->getAllbarangkeluar();

        $this->form_validation->set_rules('tanggal_faktur', 'Tanggal Faktur', 'required');
        $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required');
        $this->form_validation->set_rules('id_toko', 'toko', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/tambah_barangkeluar', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barangkeluar_model->tambahDatabarangkeluar();
            $lastId = $this->db->order_by('id_barangkeluar', 'desc')->get('barangkeluar')->row_array();
            $id_barangkeluar = $lastId['id_barangkeluar'];
            redirect('register/detail_barangkeluar/' . $id_barangkeluar);
        }
    }

    public function ubah_barangkeluar($id_barangkeluar)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Keluar';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['toko'] = $this->Toko_model->getAlltoko();
        $data['barangkeluar'] = $this->Barangkeluar_model->getbarangkeluarById($id_barangkeluar);

        $this->form_validation->set_rules('id_barangkeluar', 'barang keluar', 'required');
        $this->form_validation->set_rules('tanggal_faktur', 'Tanggal Faktur', 'required');
        $this->form_validation->set_rules('no_faktur', 'No Faktur', 'required');
        $this->form_validation->set_rules('id_toko', 'toko', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/ubah_barangkeluar', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barangkeluar_model->ubahDatabarangkeluar();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/barangkeluar');
        }
    }

    public function hapus_barangkeluar($id_barangkeluar)
    {
        $barangkeluar = $this->Barangkeluar_model->getbarangkeluarById($id_barangkeluar);
        $foto_lama = $barangkeluar['foto'];
        unlink(FCPATH . './files/' . $foto_lama);
        $pengirimanbarang = $this->db->get_where('pengirimanbarang', ['id_barangkeluar' => $id_barangkeluar])->row_array();
        unlink(FCPATH . './files/' . $pengirimanbarang['foto']);
        $this->Pengirimanbarang_model->hapusDatapengirimanbarangByIdKeluar($id_barangkeluar);
        $this->Daftarbarangkeluar_model->hapusDatadaftarbarangkeluarByIdKeluar($id_barangkeluar);
        $this->Barangkeluar_model->hapusDatabarangkeluar($id_barangkeluar);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/barangkeluar');
    }
    public function hapus_daftarbarangkeluar($id_barangkeluar, $id_daftarbarangkeluar)
    {

        $this->Daftarbarangkeluar_model->hapusDatadaftarbarangkeluar($id_daftarbarangkeluar);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/detail_barangkeluar/' . $id_barangkeluar);
    }
    public function hapus_pengirimanbarang($id_barangkeluar, $id_pengirimanbarang)
    {
        $pengirimanbarang = $this->db->get_where('pengirimanbarang', ['id_barangkeluar' => $id_barangkeluar])->row_array();
        unlink(FCPATH . './files/' . $pengirimanbarang['foto']);
        $this->Pengirimanbarang_model->hapusDatapengirimanbarang($id_pengirimanbarang);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/detail_barangkeluar/' . $id_barangkeluar);
    }

    public function detail_barangkeluar($id_barangkeluar)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Keluar';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['daftarbarangkeluar'] = $this->Daftarbarangkeluar_model->getdaftarbarangkeluarByIdBarangkeluar($id_barangkeluar);
        $data['cekpengirimanbarang'] = $this->db->get_where('pengirimanbarang', ['id_barangkeluar' => $id_barangkeluar])->num_rows();
        $data['pengirimanbarang'] = $this->Pengirimanbarang_model->getpengirimanbarangByIdbarangkeluar($id_barangkeluar);
        $data['pengirim'] = $this->Pegawai_model->getAllPegawai();
        $data['ekspedisi'] = $this->Ekspedisi_model->getAllekspedisi();
        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['barangkeluar'] = $this->Barangkeluar_model->getbarangkeluarById($id_barangkeluar);

        $this->form_validation->set_rules('id_barangkeluar', 'Barang keluar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/detail_barangkeluar', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $id_input = $this->input->post('id_input');
            if ($id_input == '1') {
                $id_barang = $this->input->post('id_barang');
                $input_jumlah = $this->input->post('jumlah');
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
                $all_sisa = $sisa - $input_jumlah;
                if ($all_sisa < 0) {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Stok Tidak Cukup! Sisa ' . $sisa . '</div>');
                    echo "<script>history.go(-1);</script>";
                } else {
                    $this->Daftarbarangkeluar_model->tambahDatadaftarbarangkeluar();
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data Barang Keluar berhasil ditambah!</div>');
                    redirect('register/detail_barangkeluar/' . $id_barangkeluar);
                }
            } else if ($id_input == '2') {
                $this->Pengirimanbarang_model->tambahDatapengirimanbarang();
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil menambah barang!</div>');
                redirect('register/detail_barangkeluar/' . $id_barangkeluar);
            } else if ($id_input == '3') {
                $uploadfile = $_FILES['foto']['name'];
                $acak = random_string('alnum', 16);
                $file_baru = $acak . "." . pathinfo($uploadfile, PATHINFO_EXTENSION);
                if ($uploadfile) {
                    $config['file_name'] = $file_baru;
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '10000';
                    $config['upload_path'] = './files/';
                }

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $this->Pengirimanbarang_model->pengirimanbarangditerima($file_baru);
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil menambah pengiriman diterima dan unggah foto!</div>');
                    redirect('register/detail_barangkeluar/' . $id_barangkeluar);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan unggah foto!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            } else {
                $uploadfile = $_FILES['foto']['name'];
                $acak = random_string('alnum', 16);
                $file_baru = $acak . "." . pathinfo($uploadfile, PATHINFO_EXTENSION);
                if ($uploadfile) {
                    $config['file_name'] = $file_baru;
                    $config['allowed_types'] = 'gif|jpg|jpeg|png';
                    $config['max_size'] = '10000';
                    $config['upload_path'] = './files/';
                }

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $this->Barangkeluar_model->uploadbuktitransaksi($id_barangkeluar, $file_baru);
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil melakukan unggah foto!</div>');
                    redirect('register/detail_barangkeluar/' . $id_barangkeluar);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan unggah foto!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //$this->session->set_flashdata('flashdata', 'ditambah');
            //redirect('register/detail_barangkeluar/' . $id_barangkeluar);
        }
    }

    //baranghilang
    public function baranghilang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Hilang';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['baranghilang'] = $this->Baranghilang_model->getAllbaranghilang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('register/baranghilang', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_baranghilang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Hilang';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['baranghilang'] = $this->Baranghilang_model->getAllbaranghilang();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_barang', 'barang', 'required');
        $this->form_validation->set_rules('hilang', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/tambah_baranghilang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Baranghilang_model->tambahDatabaranghilang();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('register/baranghilang');
        }
    }

    public function ubah_baranghilang($id_baranghilang)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Hilang';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['baranghilang'] = $this->Baranghilang_model->getbaranghilangById($id_baranghilang);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_barang', 'barang', 'required');
        $this->form_validation->set_rules('hilang', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/ubah_baranghilang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Baranghilang_model->ubahDatabaranghilang();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/baranghilang');
        }
    }

    public function hapus_baranghilang($id_baranghilang)
    {

        $this->Baranghilang_model->hapusDatabaranghilang($id_baranghilang);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/baranghilang');
    }

    public function detail_baranghilang($id_baranghilang)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Hilang';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['baranghilang'] = $this->Baranghilang_model->getbaranghilangById($id_baranghilang);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('register/detail_baranghilang', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    //barangrusak
    public function barangrusak()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Rusak';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['barangrusak'] = $this->Barangrusak_model->getAllbarangrusak();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('register/barangrusak', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_barangrusak()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Rusak';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['barangrusak'] = $this->Barangrusak_model->getAllbarangrusak();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_barang', 'barang', 'required');
        $this->form_validation->set_rules('rusak', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/tambah_barangrusak', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barangrusak_model->tambahDatabarangrusak();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('register/barangrusak');
        }
    }

    public function ubah_barangrusak($id_barangrusak)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Rusak';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barang'] = $this->Barang_model->getAllbarang();
        $data['barangrusak'] = $this->Barangrusak_model->getbarangrusakById($id_barangrusak);

        $this->form_validation->set_rules('id_barangrusak', 'barang Masuk', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_barang', 'barang', 'required');
        $this->form_validation->set_rules('rusak', 'Jumlah', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('register/ubah_barangrusak', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barangrusak_model->ubahDatabarangrusak();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('register/barangrusak');
        }
    }

    public function hapus_barangrusak($id_barangrusak)
    {

        $this->Barangrusak_model->hapusDatabarangrusak($id_barangrusak);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('register/barangrusak');
    }

    public function detail_barangrusak($id_barangrusak)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Rusak';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['id_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['id_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);

        $data['barangrusak'] = $this->Barangrusak_model->getbarangrusakById($id_barangrusak);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('register/detail_barangrusak', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
}
