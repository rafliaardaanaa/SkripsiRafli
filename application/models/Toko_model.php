<?php

class Toko_model extends CI_Model
{

    public function getAlltoko()
    {

        return $this->db->get('toko')->result_array();
    }

    public function gettokoById($id_toko)
    {

        return $this->db->get_where('toko', ['id_toko' => $id_toko])->row_array();
    }

    public function tambahDatatoko()
    {

        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_toko" => $this->input->post('nama_toko', true),
            "nama_kepala" => $this->input->post('nama_kepala', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "username" => $this->input->post('username', true),
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('toko', $data);
    }

    public function ubahDatatoko()
    {

        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_toko" => $this->input->post('nama_toko', true),
            "nama_kepala" => $this->input->post('nama_kepala', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "username" => $this->input->post('username', true),
            "status" => $this->input->post('status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_toko', $this->input->post('id_toko', true));
        $this->db->update('toko', $data);
    }
    public function ubahPasswordtoko()
    {

        $data = [
            "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            "status" => $this->input->post('status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_toko', $this->input->post('id_toko', true));
        $this->db->update('toko', $data);
    }

    public function hapusDatatoko($id_toko)
    {
        $this->db->delete('toko', ['id_toko' => $id_toko]);
    }
}
