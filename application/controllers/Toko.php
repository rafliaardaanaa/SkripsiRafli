<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pengguna_model');
        $this->load->model('Level_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Pegawai_model');

        $this->load->model('Barang_model');
        $this->load->model('Supplier_model');
        $this->load->model('Toko_model');
        $this->load->model('Ekspedisi_model');
        $this->load->model('Barangkeluar_model');
        $this->load->model('Daftarbarangkeluar_model');
        $this->load->model('Pengirimanbarang_model');
        $this->load->model('Baranghilang_model');
        $this->load->model('Barangrusak_model');
        check_login();
        check_username();
        $this->load->helper('string');
    }

    public function index()
    {

        $data['judul'] = 'Beranda';
        $data['pengguna'] = $this->db->get_where('toko', ['kode' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_toko'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = '2';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_toko'];
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_pegawai])->row_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('toko/index', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    //barangkeluar
    public function barangkeluar()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Keluar';
        $data['pengguna'] = $this->db->get_where('toko', ['kode' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_toko'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = '2';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_toko'];
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_pegawai])->row_array();

        $data['barangkeluar'] = $this->Barangkeluar_model->getbarangkeluarByIdToko($data['toko']['id_toko']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('toko/barangkeluar', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function detail_barangkeluar($id_barangkeluar)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang Keluar';
        $data['pengguna'] = $this->db->get_where('toko', ['kode' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_toko'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = '2';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_toko'];
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_pegawai])->row_array();

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
            $this->load->view('toko/detail_barangkeluar', $data);
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
                    redirect('toko/detail_barangkeluar/' . $id_barangkeluar);
                }
            } else if ($id_input == '2') {
                $this->Pengirimanbarang_model->tambahDatapengirimanbarang();
                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Berhasil menambah barang!</div>');
                redirect('toko/detail_barangkeluar/' . $id_barangkeluar);
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
                    redirect('toko/detail_barangkeluar/' . $id_barangkeluar);
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
                    redirect('toko/detail_barangkeluar/' . $id_barangkeluar);
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Gagal melakukan unggah foto!</div>');
                    echo "<script>history.go(-1);</script>";
                }
            }
            //$this->session->set_flashdata('flashdata', 'ditambah');
            //redirect('toko/detail_barangkeluar/' . $id_barangkeluar);
        }
    }
    // CETAK barangkeluarbyid
    public function cetakbarangkeluarbyid($id_barangkeluar)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Detail Barang Keluar';
        $data['pengguna'] = $this->db->get_where('toko', ['kode' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_toko'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = '2';
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_toko'];
        $data['toko'] = $this->db->get_where('toko', ['id_toko' => $id_pegawai])->row_array();

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['barangkeluar'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `id_barangkeluar` ='" . $id_barangkeluar . "'")->row_array();
        $data['pengirimanbarang'] = $this->db->query("SELECT * FROM `pengirimanbarang` WHERE `id_barangkeluar` ='" . $id_barangkeluar . "'")->row_array();
        $data['daftarbarangkeluar'] = $this->db->query("SELECT * FROM `daftarbarangkeluar` WHERE `id_barangkeluar` ='" . $id_barangkeluar . "'")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('toko/cetakbarangkeluarbyid', $data);
    }
}
