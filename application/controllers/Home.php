<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
    }

    //BERANDA
    public function index()
    {
        $data['profil'] = $this->db->get('profil')->row_array();
        $data['judul'] = $data['profil']['nama_aplikasi'];
        $data['nama_profil'] = $data['profil']['nama_profil'];
        $data['alamat'] = $data['profil']['alamat'];
        $data['telepon'] = $data['profil']['telepon'];
        $data['kodepos'] = $data['profil']['kodepos'];
        $data['email'] = $data['profil']['email'];
        $data['website'] = $data['profil']['website'];
        $data['logo'] = $data['profil']['logo'];
        $this->load->view('home/index', $data);
    }
}
