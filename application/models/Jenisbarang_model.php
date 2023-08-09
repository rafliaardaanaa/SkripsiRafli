<?php

class Jenisbarang_model extends CI_Model
{

    public function getAlljenisbarang()
    {

        return $this->db->get('jenisbarang')->result_array();
    }

    public function getjenisbarangById($id_jenisbarang)
    {

        return $this->db->get_where('jenisbarang', ['id_jenisbarang' => $id_jenisbarang])->row_array();
    }

    public function tambahDatajenisbarang()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_jenisbarang" => $this->input->post('nama_jenisbarang', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('jenisbarang', $data);
    }

    public function ubahDatajenisbarang()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_jenisbarang" => $this->input->post('nama_jenisbarang', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_jenisbarang', $this->input->post('id_jenisbarang', true));
        $this->db->update('jenisbarang', $data);
    }

    public function hapusDatajenisbarang($id_jenisbarang)
    {
        $this->db->delete('jenisbarang', ['id_jenisbarang' => $id_jenisbarang]);
    }
}
