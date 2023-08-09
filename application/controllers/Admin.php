<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        check_login();

        $this->load->model('Profil_model');
        $this->load->model('Pengguna_model');
        $this->load->model('Level_model');
        $this->load->model('Pegawai_model');
        $this->load->model('Jabatan_model');
    }

    //BERANDA
    public function index()
    {
        $data['token'] = $this->session->userdata('token');

        $data['judul'] = 'Beranda';
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

        $data['jumlahbarang'] = $this->db->get('barang')->num_rows();
        $data['jumlahsupplier'] = $this->db->get('supplier')->num_rows();
        $data['jumlahbarangmasuk'] = $this->db->get('barangmasuk')->num_rows();
        $data['jumlahbarangkeluar'] = $this->db->get('barangkeluar')->num_rows();
        $data['profil'] = $this->Profil_model->getProfil();

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');
        $this->form_validation->set_rules('password_ulang', 'Ulangi Password Baru', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/bottom', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $cek_id_pengguna = $this->input->post('id_pengguna');
            $password_lama = password_hash($this->input->post('password_lama'), PASSWORD_DEFAULT);
            $password_baru = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
            $password_ulang = password_hash($this->input->post('password_ulang'), PASSWORD_DEFAULT);
            $cekpengguna = $this->db->get_where('pengguna', [
                'id_pengguna' => $cek_id_pengguna,
                'password' => $password_lama
            ]);
            if ($cekpengguna->num_rows() !== 1) {
                $this->session->set_flashdata('flashdata', $password_lama);
                redirect('admin/index');
            } else if ($password_baru !== $password_ulang) {
                $this->session->set_flashdata('flashdata', 'baru tidak sama dengan ulangi password');
                redirect('admin/index');
            } else {
                $this->Pengguna_model->UbahPasswordLama();
                $this->session->set_flashdata('flashdata', 'lama berhasil diubah');
                redirect('admin/index');
            }
        }
    }
}
