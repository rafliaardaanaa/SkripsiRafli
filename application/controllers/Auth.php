<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Profil_model');
    }

    public function index()
    {

        if ($this->session->userdata('token')) {
            $id_level = $this->session->userdata('id_level');
            if ($id_level == '1') {
                redirect('admin');
            } else if ($id_level == '2') {
                redirect('toko');
            }
        } else {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Halaman Login';
                $data['profil'] = $this->Profil_model->getProfil();
                $this->load->view('templates/header', $data);
                $this->load->view('auth/index', $data);
                $this->load->view('templates/footer', $data);
            } else {

                //validasi sukses
                $this->_login();
            }
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $pengguna = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        $toko = $this->db->get_where('toko', ['username' => $username])->row_array();

        //pengguna ada
        if ($pengguna) {
            //jika user aktif
            if ($pengguna['aktif'] == '1') {

                //periksa Password
                if (password_verify($password, $pengguna['password'])) {

                    $data = [
                        'token' => $pengguna['token'],
                        'id_level' => $pengguna['id_level']
                    ];

                    //simpan data sesi login
                    $this->session->set_userdata($data);
                    if ($pengguna['id_level'] == '1') {
                        redirect('admin');
                    } else {
                        $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Level pengguna tidak tersedia.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Password salah.</div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Maaf akun ini belum diaktivasi.</div>');
                redirect('auth');
            }
        } else if ($toko) {
            //jika user aktif
            if ($toko['status'] == '1') {

                //periksa Password
                if (password_verify($password, $toko['password'])) {

                    $data = [
                        'token' => $toko['kode'],
                        'id_level' => '2'
                    ];

                    //simpan data sesi login
                    $this->session->set_userdata($data);
                    if ($pengguna['id_level'] == '2') {
                        redirect('toko');
                    } else {
                        $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Level pengguna tidak tersedia.</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Password salah.</div>');
                    redirect('auth');
                }
            } else {

                $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Maaf akun ini belum diaktivasi.</div>');
                redirect('auth');
            }
        } else {

            //pengguna tidak ada
            $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-danger role="alert">Maaf Username belum terdaftar.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('token');
        $this->session->unset_userdata('id_level');
        $this->session->set_flashdata('pesan_notifikasi', '<div class="alert alert-success role="alert">Selamat!, anda berhasil keluar</div>');
        redirect('auth');
    }
}
