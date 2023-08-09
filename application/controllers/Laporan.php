<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        check_login();

        $this->load->model('Pengguna_model');
        $this->load->model('Level_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Golpangkat_model');
        $this->load->model('Pegawai_model');
    }

    //LAPORAN INDEX
    public function index()
    {

        redirect(base_url());
    }
    // pegawai
    public function pegawai()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Karyawan';
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

        $data['masterjabatan'] = $this->db->get('jabatan')->result_array();
        $data['masterpegawai'] = $this->db->get('pegawai')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_input', 'Input', 'required');

        $data['filter'] = $this->db->query('SELECT * FROM pegawai ORDER BY id_jabatan ASC')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/pegawai', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_input'] = $this->input->post('id_input');
            if ($data['id_input'] == '1') {
                $data['id_jabatan'] = $this->input->post('id_jabatan', true);
                if ($data['id_jabatan'] == 'Semua') {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai ORDER BY id_jabatan ASC')->result_array();
                } else {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai WHERE id_jabatan=' . $data['id_jabatan'])->result_array();
                }
            } else {
                $data['id_pgw'] = $this->input->post('id_pgw', true);
                if ($data['id_pgw'] == 'Semua') {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai ORDER BY id_pegawai ASC')->result_array();
                } else {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai WHERE id_pegawai=' . $data['id_pgw'])->result_array();
                }
            }
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/pegawai', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK pegawai
    public function cetakpegawai()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Karyawan';
        $data['pengguna'] = $this->Pengguna_model->getPenggunaByToken($data['token']);
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->Level_model->getLevelById($data['id_level']);
        $data['nama_level'] = $data['level']['nama_level'];

        $data['masterid_pegawai'] = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->Pegawai_model->getPegawaiById($data['masterid_pegawai']);

        $data['id_jabatan'] = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->Jabatan_model->getJabatanById($data['id_jabatan']);


        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_input', 'Input', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data['id_input'] = $this->input->post('id_input', true);

            if ($data['id_input'] == '1') {
                $data['id_jabatan'] = $this->input->post('id_jabatan', true);
                if ($data['id_jabatan'] == 'Semua') {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai ORDER BY id_jabatan ASC')->result_array();
                } else {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai WHERE id_jabatan=' . $data['id_jabatan'])->result_array();
                }
            } else {
                $data['id_pgw'] = $this->input->post('id_pgw', true);
                if ($data['id_pgw'] == 'Semua') {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai ORDER BY id_pegawai ASC')->result_array();
                } else {
                    $data['filter'] = $this->db->query('SELECT * FROM pegawai WHERE id_pegawai=' . $data['id_pgw'])->result_array();
                }
            }

            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakpegawai', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/pegawai');
        }
    }
    // supplier
    public function supplier()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Supplier';
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

        $data['supplier'] = $this->db->get('supplier')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_supplier', 'supplier', 'required');

        $data['filter'] = $this->db->query('SELECT * FROM supplier ORDER BY id_supplier ASC')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/supplier', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_supplier'] = $this->input->post('id_supplier', true);
            if ($data['id_supplier'] == 'Semua') {
                $data['filter'] = $this->db->query('SELECT * FROM supplier ORDER BY id_supplier ASC')->result_array();
            } else {
                $data['filter'] = $this->db->query('SELECT * FROM supplier WHERE id_supplier=' . $data['id_supplier'])->result_array();
            }
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/supplier', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK supplier
    public function cetaksupplier()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Supplier';
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

        $data['id_supplier'] = $this->input->post('id_supplier', true);

        if ($data['id_supplier'] == 'Semua') {
            $data['filter'] = $this->db->query('SELECT * FROM supplier')->result_array();
        } else {
            $data['filter'] = $this->db->query('SELECT * FROM supplier WHERE id_supplier=' . $data['id_supplier'])->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_supplier', 'supplier', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaksupplier', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/supplier');
        }
    }

    // toko
    public function toko()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Toko';
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

        $data['toko'] = $this->db->get('toko')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_toko', 'toko', 'required');

        $data['filter'] = $this->db->query('SELECT * FROM toko ORDER BY id_toko ASC')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/toko', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_toko'] = $this->input->post('id_toko', true);
            if ($data['id_toko'] == 'Semua') {
                $data['filter'] = $this->db->query('SELECT * FROM toko ORDER BY id_toko ASC')->result_array();
            } else {
                $data['filter'] = $this->db->query('SELECT * FROM toko WHERE id_toko=' . $data['id_toko'])->result_array();
            }
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/toko', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK toko
    public function cetaktoko()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Toko';
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

        $data['id_toko'] = $this->input->post('id_toko', true);

        if ($data['id_toko'] == 'Semua') {
            $data['filter'] = $this->db->query('SELECT * FROM toko')->result_array();
        } else {
            $data['filter'] = $this->db->query('SELECT * FROM toko WHERE id_toko=' . $data['id_toko'])->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_toko', 'toko', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaktoko', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/toko');
        }
    }
    // ekspedisi
    public function ekspedisi()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Ekspedisi';
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

        $data['ekspedisi'] = $this->db->get('ekspedisi')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_ekspedisi', 'ekspedisi', 'required');

        $data['filter'] = $this->db->query('SELECT * FROM ekspedisi ORDER BY id_ekspedisi ASC')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/ekspedisi', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_ekspedisi'] = $this->input->post('id_ekspedisi', true);
            if ($data['id_ekspedisi'] == 'Semua') {
                $data['filter'] = $this->db->query('SELECT * FROM ekspedisi ORDER BY id_ekspedisi ASC')->result_array();
            } else {
                $data['filter'] = $this->db->query('SELECT * FROM ekspedisi WHERE id_ekspedisi=' . $data['id_ekspedisi'])->result_array();
            }
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/ekspedisi', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK ekspedisi
    public function cetakekspedisi()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Ekspedisi';
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

        $data['id_ekspedisi'] = $this->input->post('id_ekspedisi', true);

        if ($data['id_ekspedisi'] == 'Semua') {
            $data['filter'] = $this->db->query('SELECT * FROM ekspedisi')->result_array();
        } else {
            $data['filter'] = $this->db->query('SELECT * FROM ekspedisi WHERE id_ekspedisi=' . $data['id_ekspedisi'])->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_ekspedisi', 'ekspedisi', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakekspedisi', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/ekspedisi');
        }
    }
    // barang
    public function barang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang';
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

        $data['barang'] = $this->db->get('barang')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_jenisbarang', 'Jenis Barang', 'required');

        $data['filter'] = $this->db->query('SELECT * FROM barang ORDER BY id_barang ASC')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_jenisbarang'] = $this->input->post('id_jenisbarang', true);
            if ($data['id_jenisbarang'] == 'Semua') {
                $data['filter'] = $this->db->query('SELECT * FROM barang ORDER BY id_barang ASC')->result_array();
            } else {
                $data['filter'] = $this->db->query('SELECT * FROM barang WHERE id_jenisbarang=' . $data['id_jenisbarang'])->result_array();
            }
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK barang
    public function cetakbarang()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang';
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

        $data['id_jenisbarang'] = $this->input->post('id_jenisbarang', true);

        if ($data['id_jenisbarang'] == 'Semua') {
            $data['filter'] = $this->db->query('SELECT * FROM barang')->result_array();
        } else {
            $data['filter'] = $this->db->query('SELECT * FROM barang WHERE id_jenisbarang=' . $data['id_jenisbarang'])->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_jenisbarang', 'Jenis Barang', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakbarang', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/barang');
        }
    }
    //laporan register
    // barangmasuk
    public function barangmasuk()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Masuk';
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

        $data['penerima'] = $this->db->get('pegawai')->result_array();
        $data['supplier'] = $this->db->get('supplier')->result_array();
        $data['barangmasuk'] = $this->db->get('barangmasuk')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $data['filter'] = $this->db->query('SELECT * FROM barangmasuk ORDER BY tanggal_terima ASC')->result_array();

        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barangmasuk', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['daritanggal'] = $this->input->post('daritanggal', true);
            $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
            $data['filter'] = $this->db->query("SELECT * FROM `barangmasuk` WHERE `tanggal_terima` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_terima ASC")->result_array();
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barangmasuk', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK barangmasuk all
    public function cetakbarangmasukall()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Masuk';
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

        $data['filter'] = $this->db->query("SELECT * FROM `barangmasuk` ORDER BY tanggal_terima ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        //$this->load->view('templates/laporan_header', $data);
        $this->load->view('laporan/cetakbarangmasukall', $data);
        //$this->load->view('templates/laporan_footer', $data);
    }
    // CETAK barangmasuk
    public function cetakbarangmasuk()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Masuk';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['filter'] = $this->db->query("SELECT * FROM `barangmasuk` WHERE `tanggal_terima` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_terima ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakbarangmasuk', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/barangmasuk');
        }
    }
    // CETAK barangmasukbyid
    public function cetakbarangmasukbyid($id_barangmasuk)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Detail Barang Masuk';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['barangmasuk'] = $this->db->query("SELECT * FROM `barangmasuk` WHERE `id_barangmasuk` ='" . $id_barangmasuk . "'")->row_array();
        $data['daftarbarangmasuk'] = $this->db->query("SELECT * FROM `daftarbarangmasuk` WHERE `id_barangmasuk` ='" . $id_barangmasuk . "'")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('laporan/cetakbarangmasukbyid', $data);
    }
    // barangkeluar
    public function barangkeluar()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Keluar';
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

        $data['toko'] = $this->db->get('toko')->result_array();
        $data['barangkeluar'] = $this->db->get('barangkeluar')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $data['filter'] = $this->db->query('SELECT * FROM barangkeluar ORDER BY tanggal_faktur ASC')->result_array();

        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barangkeluar', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['daritanggal'] = $this->input->post('daritanggal', true);
            $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
            $data['filter'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `tanggal_faktur` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_faktur ASC")->result_array();
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barangkeluar', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK barangkeluar
    public function cetakbarangkeluar()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Keluar';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['filter'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `tanggal_faktur` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_faktur ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakbarangkeluar', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/barangkeluar');
        }
    }
    // CETAK barangkeluar
    public function cetakbarangkeluarall()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Keluar';
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
        $data['filter'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `tanggal_faktur` ORDER BY tanggal_faktur ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        //$this->load->view('templates/laporan_header', $data);
        $this->load->view('laporan/cetakbarangkeluarall', $data);
        //$this->load->view('templates/laporan_footer', $data);

    }
    // CETAK barangkeluarbyid
    public function cetakbarangkeluarbyid($id_barangkeluar)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Detail Barang Keluar';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['barangkeluar'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `id_barangkeluar` ='" . $id_barangkeluar . "'")->row_array();
        $data['pengirimanbarang'] = $this->db->query("SELECT * FROM `pengirimanbarang` WHERE `id_barangkeluar` ='" . $id_barangkeluar . "'")->row_array();
        $data['daftarbarangkeluar'] = $this->db->query("SELECT * FROM `daftarbarangkeluar` WHERE `id_barangkeluar` ='" . $id_barangkeluar . "'")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('laporan/cetakbarangkeluarbyid', $data);
    }

    // pengirimanbarang
    public function pengirimanbarang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Pengiriman Barang';
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

        $data['barang'] = $this->db->get('barang')->result_array();
        $data['pengirimanbarang'] = $this->db->get('pengirimanbarang')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $data['filter'] = $this->db->query('SELECT * FROM pengirimanbarang ORDER BY tanggal ASC')->result_array();

        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/pengirimanbarang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['daritanggal'] = $this->input->post('daritanggal', true);
            $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
            $data['filter'] = $this->db->query("SELECT * FROM `pengirimanbarang` WHERE `tanggal` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal ASC")->result_array();
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/pengirimanbarang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK pengirimanbarang
    public function cetakpengirimanbarang()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Pengiriman Barang';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['filter'] = $this->db->query("SELECT * FROM `pengirimanbarang` WHERE `tanggal` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakpengirimanbarang', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/pengirimanbarang');
        }
    }
    // CETAK pengirimanbarang
    public function cetakpengirimanbarangall()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Pengiriman Barang';
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


        $data['filter'] = $this->db->query("SELECT * FROM `pengirimanbarang`  ORDER BY tanggal ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        //$this->load->view('templates/laporan_header', $data);
        $this->load->view('laporan/cetakpengirimanbarangall', $data);
        //$this->load->view('templates/laporan_footer', $data);

    }
    // baranghilang
    public function baranghilang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Hilang';
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

        $data['barang'] = $this->db->get('barang')->result_array();
        $data['baranghilang'] = $this->db->get('baranghilang')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $data['filter'] = $this->db->query('SELECT * FROM baranghilang ORDER BY tanggal ASC')->result_array();

        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/baranghilang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['daritanggal'] = $this->input->post('daritanggal', true);
            $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
            $data['filter'] = $this->db->query("SELECT * FROM `baranghilang` WHERE `tanggal` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal ASC")->result_array();
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/baranghilang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK baranghilang
    public function cetakbaranghilang()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Hilang';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['filter'] = $this->db->query("SELECT * FROM `baranghilang` WHERE `tanggal` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakbaranghilang', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/baranghilang');
        }
    }
    // CETAK baranghilang
    public function cetakbaranghilangall()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Hilang';
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
        $data['filter'] = $this->db->query("SELECT * FROM `baranghilang` ORDER BY tanggal ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        //$this->load->view('templates/laporan_header', $data);
        $this->load->view('laporan/cetakbaranghilangall', $data);
        //$this->load->view('templates/laporan_footer', $data);

    }
    // CETAK baranghilangbyid
    public function cetakbaranghilangbyid($id_baranghilang)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Hilang';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['baranghilang'] = $this->db->query("SELECT * FROM `baranghilang` WHERE `id_baranghilang` ='" . $id_baranghilang . "'")->row_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('laporan/cetakbaranghilangbyid', $data);
    }
    // barangrusak
    public function barangrusak()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Rusak';
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

        $data['barang'] = $this->db->get('barang')->result_array();
        $data['barangrusak'] = $this->db->get('barangrusak')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $data['filter'] = $this->db->query('SELECT * FROM barangrusak ORDER BY tanggal ASC')->result_array();

        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barangrusak', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['daritanggal'] = $this->input->post('daritanggal', true);
            $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
            $data['filter'] = $this->db->query("SELECT * FROM `barangrusak` WHERE `tanggal` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal ASC")->result_array();
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/barangrusak', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK barangrusak
    public function cetakbarangrusak()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Rusak';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['filter'] = $this->db->query("SELECT * FROM `barangrusak` WHERE `tanggal` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakbarangrusak', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/barangrusak');
        }
    }
    // CETAK barangrusak
    public function cetakbarangrusakall()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Rusak';
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

        $data['filter'] = $this->db->query("SELECT * FROM `barangrusak` ORDER BY tanggal ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        //$this->load->view('templates/laporan_header', $data);
        $this->load->view('laporan/cetakbarangrusakall', $data);
        //$this->load->view('templates/laporan_footer', $data);

    }
    // CETAK barangrusakbyid
    public function cetakbarangrusakbyid($id_barangrusak)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Barang Rusak';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);

        $data['barangrusak'] = $this->db->query("SELECT * FROM `barangrusak` WHERE `id_barangrusak` ='" . $id_barangrusak . "'")->row_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();

        $this->load->view('laporan/cetakbarangrusakbyid', $data);
    }
    // stokbarang
    public function stokbarang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Rekapitulasi';
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

        $data['barang'] = $this->db->get('barang')->result_array();
        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_barang', 'barang', 'required');

        $data['filter'] = $this->db->query('SELECT * FROM barang ORDER BY id_barang ASC')->result_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/stokbarang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['id_barang'] = $this->input->post('id_barang', true);
            if ($data['id_barang'] == 'Semua') {
                $data['filter'] = $this->db->query('SELECT * FROM barang ORDER BY id_barang ASC')->result_array();
            } else {
                $data['filter'] = $this->db->query('SELECT * FROM barang WHERE id_barang=' . $data['id_barang'])->result_array();
            }
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/stokbarang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }

    // CETAK barang
    public function cetakstokbarang()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Rekapitulasi';
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

        $data['id_barang'] = $this->input->post('id_barang', true);

        if ($data['id_barang'] == 'Semua') {
            $data['filter'] = $this->db->query('SELECT * FROM barang')->result_array();
        } else {
            $data['filter'] = $this->db->query('SELECT * FROM barang WHERE id_barang=' . $data['id_barang'])->result_array();
        }

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('id_barang', 'barang', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetakstokbarang', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/barang');
        }
    }

    // labarugi
    public function labarugi()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Laba/Rugi';
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

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $data['barangmasuk'] = $this->db->query('SELECT * FROM barangmasuk ORDER BY tanggal_faktur ASC')->result_array();
        $data['barangkeluar'] = $this->db->query('SELECT * FROM barangkeluar ORDER BY tanggal_faktur ASC')->result_array();
        $data['periode'] = "Semua Periode";

        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/labarugi', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['daritanggal'] = $this->input->post('daritanggal', true);
            $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
            $data['periode'] = tanggal_indo($data['daritanggal']) . " s.d " . tanggal_indo($data['sampaitanggal']);
            $data['barangmasuk'] = $this->db->query("SELECT * FROM `barangmasuk` WHERE `tanggal_faktur` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_faktur ASC")->result_array();
            $data['barangkeluar'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `tanggal_faktur` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_faktur ASC")->result_array();
            $this->session->set_flashdata('flashdata', 'ditampilkan');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('laporan/labarugi', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    // CETAK labarugi
    public function cetaklabarugi()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Laba/Rugi';
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

        $data['daritanggal'] = $this->input->post('daritanggal', true);
        $data['sampaitanggal'] = $this->input->post('sampaitanggal', true);
        $data['periode'] = tanggal_indo($data['daritanggal']) . " s.d " . tanggal_indo($data['sampaitanggal']);
        $data['barangmasuk'] = $this->db->query("SELECT * FROM `barangmasuk` WHERE `tanggal_faktur` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_faktur ASC")->result_array();
        $data['barangkeluar'] = $this->db->query("SELECT * FROM `barangkeluar` WHERE `tanggal_faktur` BETWEEN '" . $data['daritanggal']  . "' AND '" . $data['sampaitanggal']  . "' ORDER BY tanggal_faktur ASC")->result_array();

        $data['profil'] = $this->db->get_where('profil')->row_array();


        $this->form_validation->set_rules('daritanggal', 'Dari Tanggal', 'required');
        $this->form_validation->set_rules('sampaitanggal', 'Sampai Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            //$this->load->view('templates/laporan_header', $data);
            $this->load->view('laporan/cetaklabarugi', $data);
            //$this->load->view('templates/laporan_footer', $data);
        } else {
            redirect('laporan/barang');
        }
    }
}
