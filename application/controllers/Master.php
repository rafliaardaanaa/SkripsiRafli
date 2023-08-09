<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->model('Profil_model');
        $this->load->model('Menu_model');
        $this->load->model('Submenu_model');
        $this->load->model('Level_model');
        $this->load->model('Aksesmenu_model');
        $this->load->model('Pengguna_model');
        $this->load->model('Jabatan_model');
        $this->load->model('Golpangkat_model');
        $this->load->model('Pegawai_model');

        $this->load->model('Supplier_model');
        $this->load->model('Toko_model');
        $this->load->model('Ekspedisi_model');
        $this->load->model('Barang_model');
        $this->load->model('Jenisbarang_model');

        $this->load->helper('string');

        check_login();
    }

    //MASTER INDEX
    public function index()
    {

        redirect(base_url());
    }
    //MENU
    public function menu()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Menu';
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

        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/menu', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_menu()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Menu';
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

        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_menu', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Menu_model->tambahDataMenu();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/menu');
        }
    }

    public function ubah_menu($id_menu)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Menu';
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

        $data['menu'] = $this->Menu_model->getMenuById($id_menu);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_menu', 'Nama Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_menu', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Menu_model->ubahDataMenu();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/menu');
        }
    }

    public function hapus_menu($id_menu)
    {

        $this->Menu_model->hapusDataMenu($id_menu);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/menu');
    }

    public function detail_menu($id_menu)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Menu';
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

        $data['menu'] = $this->Menu_model->getMenuById($id_menu);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_menu', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    // SUB MENU
    public function submenu()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Sub Menu';
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

        $data['submenu'] = $this->Submenu_model->getAllsubmenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/submenu', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_submenu()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Sub Menu';
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

        $data['submenu'] = $this->Submenu_model->getAllsubmenu();
        $data['menu'] = $this->db->get('menu')->result_array();


        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_submenu', 'Nama Submenu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_submenu', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Submenu_model->tambahDataSubmenu();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/submenu');
        }
    }

    public function ubah_submenu($id_submenu)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Sub Menu';
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

        $data['submenu'] = $this->Submenu_model->getSubmenuById($id_submenu);
        $data['menu'] = $this->db->get('menu')->result_array();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_submenu', 'Nama Submenu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_submenu', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Submenu_model->ubahDataSubmenu();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/submenu');
        }
    }

    public function hapus_submenu($id_submenu)
    {

        $this->Submenu_model->hapusDataSubmenu($id_submenu);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/submenu');
    }

    public function detail_submenu($id_submenu)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Sub Menu';
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

        $data['submenu'] = $this->Submenu_model->getSubmenuById($id_submenu);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/detail_submenu', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    //LEVEL
    public function level()
    {

        $data['judul'] = 'Level';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->Level_model->getAllLevel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/level', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_level()
    {

        $data['judul'] = 'Level';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->Level_model->getAllLevel();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_level', 'Nama Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/tambah_level', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Level_model->tambahDataLevel();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/level');
        }
    }

    public function ubah_level($id_level)
    {

        $data['judul'] = 'Level';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->Level_model->getLevelById($id_level);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_level', 'Nama Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/ubah_level', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Level_model->ubahDataLevel();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/level');
        }
    }

    public function hapus_level($id_level)
    {

        $this->Level_model->hapusDataLevel($id_level);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/level');
    }

    public function detail_level($id_level)
    {
        $data['judul'] = 'Akses Menu';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['levelakses'] = $this->db->get_where('level', ['id_level' => $id_level])->row_array();

        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->form_validation->set_rules('id_level', 'Id Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/detail_level', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Aksesmenu_model->SimpanAksesMenu();
            $this->session->set_flashdata('flashdata', 'diperbaharui');
            redirect('master/level');
        }
    }
    // PENGGUNA
    public function pengguna()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Pengguna';
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

        $data['masterpengguna'] = $this->Pengguna_model->getAllPengguna();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/pengguna', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pengguna()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Pengguna';
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

        $data['masterpengguna'] = $this->Pengguna_model->getAllPengguna();
        $data['masterlevel'] = $this->Level_model->getAllLevel();
        $data['masterpegawai'] = $this->Pegawai_model->getAllPegawai();


        $this->form_validation->set_rules('id_level', 'Level', 'required');
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_pengguna', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pengguna_model->tambahDataPengguna();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/pengguna');
        }
    }

    public function ubah_pengguna($id_pengguna)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Pengguna';
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

        $data['masterpengguna'] = $this->Pengguna_model->getPenggunaById($id_pengguna);
        $data['masterlevel'] = $this->Level_model->getAllLevel();

        $this->form_validation->set_rules('id_level', 'Level', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_pengguna', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Pengguna_model->ubahDataPengguna();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/pengguna');
        }
    }

    public function hapus_pengguna($id_pengguna)
    {

        $this->Pengguna_model->hapusDataPengguna($id_pengguna);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/pengguna');
    }

    public function detail_pengguna($id_pengguna)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Pengguna';
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

        $data['masterpengguna'] = $this->Pengguna_model->getPenggunaById($id_pengguna);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_pengguna', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    //JABATAN
    public function jabatan()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Jabatan';
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

        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/jabatan', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_jabatan()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Jabatan';
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

        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_jabatan', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jabatan_model->tambahDataJabatan();
            $this->session->set_flashdata('flashdata', 'ditambahkan');
            redirect('master/jabatan');
        }
    }

    public function ubah_jabatan($id_jabatan)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Jabatan';
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

        $data['masterjabatan'] = $this->Jabatan_model->getjabatanById($id_jabatan);

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_jabatan', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jabatan_model->ubahDataJabatan();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/jabatan');
        }
    }

    public function hapus_jabatan($id_jabatan)
    {

        $this->Jabatan_model->hapusDataJabatan($id_jabatan);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/jabatan');
    }

    public function detail_jabatan($id_jabatan)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Jabatan';
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

        $data['masterjabatan'] = $this->Jabatan_model->getjabatanById($id_jabatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_jabatan', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    //PEGAWAI
    public function pegawai()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Karyawan';
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

        $data['masterpegawai'] = $this->Pegawai_model->getAllPegawai();
        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();
        $data['mastergolpangkat'] = $this->Golpangkat_model->getAllgolpangkat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/pegawai', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_pegawai()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Karyawan';
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

        $data['masterpegawai'] = $this->Pegawai_model->getAllPegawai();
        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();
        $data['mastergolpangkat'] = $this->Golpangkat_model->getAllgolpangkat();

        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_pegawai', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
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
                $this->Pegawai_model->tambahDataPegawai($file_baru);
                $this->session->set_flashdata('flashdata', 'ditambahkan');
                redirect('master/pegawai');
            } else {
                $this->session->set_flashdata('flashdata', 'Gagal');
                echo "<script>history.go(-1);</script>";
            }
        }
    }

    public function ubah_pegawai($id_pegawai)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Karyawan';
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

        $data['masterpegawai'] = $this->Pegawai_model->getPegawaiById($id_pegawai);
        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();
        $data['mastergolpangkat'] = $this->Golpangkat_model->getAllgolpangkat();

        $this->form_validation->set_rules('nip', 'nip', 'required');
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_pegawai', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
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
                $cekpegawai = $this->Pegawai_model->getPegawaiById($id_pegawai);
                $foto_lama = $cekpegawai['foto'];
                if ($foto_lama !== '') {
                    unlink(FCPATH . './files/' . $foto_lama);
                }
                $this->Pegawai_model->ubahDataPegawai($file_baru);
                $this->session->set_flashdata('flashdata', 'diubah');
                redirect('master/pegawai');
            } else {
                $this->session->set_flashdata('flashdata', 'Gagal');
                echo "<script>history.go(-1);</script>";
            }
        }
    }

    public function hapus_pegawai($id_pegawai)
    {

        $this->Pegawai_model->hapusDataPegawai($id_pegawai);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/pegawai');
    }

    public function detail_pegawai($id_pegawai)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Karyawan';
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

        $data['masterpegawai'] = $this->Pegawai_model->getPegawaiById($id_pegawai);
        $data['masterjabatan'] = $this->Jabatan_model->getAllJabatan();
        $data['mastergolpangkat'] = $this->Golpangkat_model->getAllgolpangkat();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_pegawai', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    //supplier
    public function supplier()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Supplier';
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/supplier', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_supplier()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Supplier';
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

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_supplier', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Supplier_model->tambahDatasupplier();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('master/supplier');
        }
    }

    public function ubah_supplier($id_supplier)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Supplier';
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

        $data['supplier'] = $this->Supplier_model->getsupplierById($id_supplier);

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama supplier', 'required');
        $this->form_validation->set_rules('penanggungjawab', 'Penanggung Jawab', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_supplier', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Supplier_model->ubahDatasupplier();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/supplier');
        }
    }

    public function hapus_supplier($id_supplier)
    {

        $this->Supplier_model->hapusDatasupplier($id_supplier);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/supplier');
    }

    public function detail_supplier($id_supplier)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Supplier';
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

        $data['supplier'] = $this->Supplier_model->getsupplierById($id_supplier);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_supplier', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    //toko
    public function toko()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Toko';
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/toko', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_toko()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Toko';
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

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_toko', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Toko_model->tambahDatatoko();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('master/toko');
        }
    }

    public function ubah_toko($id_toko)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Toko';
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

        $data['toko'] = $this->Toko_model->gettokoById($id_toko);

        $this->form_validation->set_rules('id_toko', 'Toko', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required');
        $this->form_validation->set_rules('nama_kepala', 'Nama Kepala', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        //$this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_toko', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $password = $this->input->post('password');
            if ($password !== '') {
                $this->Toko_model->ubahPasswordtoko();
            }
            $this->Toko_model->ubahDatatoko();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/toko');
        }
    }

    public function hapus_toko($id_toko)
    {

        $this->Toko_model->hapusDatatoko($id_toko);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/toko');
    }

    public function detail_toko($id_toko)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Toko';
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

        $data['toko'] = $this->Toko_model->gettokoById($id_toko);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_toko', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    //ekspedisi
    public function ekspedisi()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Ekspedisi';
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

        $data['ekspedisi'] = $this->Ekspedisi_model->getAllekspedisi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/ekspedisi', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_ekspedisi()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Ekspedisi';
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

        $data['ekspedisi'] = $this->Ekspedisi_model->getAllekspedisi();

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_ekspedisi', 'Nama ekspedisi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_ekspedisi', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Ekspedisi_model->tambahDataekspedisi();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('master/ekspedisi');
        }
    }

    public function ubah_ekspedisi($id_ekspedisi)
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Ekspedisi';
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

        $data['ekspedisi'] = $this->Ekspedisi_model->getekspedisiById($id_ekspedisi);

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_ekspedisi', 'Nama ekspedisi', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_ekspedisi', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Ekspedisi_model->ubahDataekspedisi();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/ekspedisi');
        }
    }

    public function hapus_ekspedisi($id_ekspedisi)
    {

        $this->Ekspedisi_model->hapusDataekspedisi($id_ekspedisi);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/ekspedisi');
    }

    public function detail_ekspedisi($id_ekspedisi)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Ekspedisi';
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

        $data['ekspedisi'] = $this->Ekspedisi_model->getekspedisiById($id_ekspedisi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_ekspedisi', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    //barang
    public function barang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang';
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/barang', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_barang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Barang';
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
        $data['toko'] = $this->Toko_model->getAlltoko();
        $data['supplier'] = $this->Supplier_model->getAllsupplier();

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_barang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Barang_model->tambahDatabarang();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('master/barang');
        }
    }

    public function ubah_barang($id_barang)
    {

        $data['judul'] = 'Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['barang'] = $this->Barang_model->getbarangById($id_barang);
        $data['toko'] = $this->Toko_model->getAlltoko();
        $data['supplier'] = $this->Supplier_model->getAllsupplier();

        $this->form_validation->set_rules('id_barang', 'barang', 'required');
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_barang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Barang_model->ubahDatabarang();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/barang');
        }
    }

    public function hapus_barang($id_barang)
    {
        $barang = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
        unlink(FCPATH . 'files/' . $barang['file']);
        $this->Barang_model->hapusDatabarang($id_barang);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/barang/');
    }

    public function detail_barang($id_barang)
    {
        $data['judul'] = 'Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['barang'] = $this->Barang_model->getbarangById($id_barang);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_barang', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    //jenisbarang
    public function jenisbarang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Jenis Barang';
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

        $data['jenisbarang'] = $this->Jenisbarang_model->getAlljenisbarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/jenisbarang', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_jenisbarang()
    {

        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Jenis Barang';
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

        $data['jenisbarang'] = $this->Jenisbarang_model->getAlljenisbarang();

        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_jenisbarang', 'Nama Jenis Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/tambah_jenisbarang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Jenisbarang_model->tambahDatajenisbarang();
            $this->session->set_flashdata('flashdata', 'ditambah');
            redirect('master/jenisbarang');
        }
    }

    public function ubah_jenisbarang($id_jenisbarang)
    {

        $data['judul'] = 'Jenis Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['jenisbarang'] = $this->Jenisbarang_model->getjenisbarangById($id_jenisbarang);

        $this->form_validation->set_rules('id_jenisbarang', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('urutan', 'Urutan', 'required');
        $this->form_validation->set_rules('nama_jenisbarang', 'Nama Jenis Barang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('master/ubah_jenisbarang', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $this->Jenisbarang_model->ubahDatajenisbarang();
            $this->session->set_flashdata('flashdata', 'diubah');
            redirect('master/jenisbarang');
        }
    }

    public function hapus_jenisbarang($id_jenisbarang)
    {
        $this->Jenisbarang_model->hapusDatajenisbarang($id_jenisbarang);
        $this->session->set_flashdata('flashdata', 'dihapus');
        redirect('master/jenisbarang/');
    }

    public function detail_jenisbarang($id_jenisbarang)
    {
        $data['judul'] = 'Jenis Barang';
        $data['pengguna'] = $this->db->get_where('pengguna', ['token' => $this->session->userdata('token')])->row_array();
        $data['nama_pengguna'] = $data['pengguna']['nama_pengguna'];
        $data['username'] = $data['pengguna']['username'];
        $data['id_level'] = $data['pengguna']['id_level'];
        $data['level'] = $this->db->get_where('level', ['id_level' => $data['id_level']])->row_array();
        $data['nama_level'] = $data['level']['nama_level'];
        $id_pegawai = $data['pengguna']['id_pegawai'];
        $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
        $id_jabatan = $data['pegawai']['id_jabatan'];
        $data['jabatan'] = $this->db->get_where('jabatan', ['id_jabatan' => $id_jabatan])->row_array();

        $data['jenisbarang'] = $this->Jenisbarang_model->getjenisbarangById($id_jenisbarang);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/detail_jenisbarang', $data);
        $this->load->view('templates/bottom', $data);
        $this->load->view('templates/footer', $data);
    }

    // CETAK pegawai
    public function cetakdetailpegawai($id_pegawai)
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Laporan Detail Karyawan';
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

        $data['masterpegawai'] = $this->Pegawai_model->getPegawaiById($id_pegawai);

        //$this->load->view('templates/laporan_header', $data);
        $this->load->view('master/cetakdetailpegawai', $data);
        //$this->load->view('templates/laporan_footer', $data);     
    }
}
