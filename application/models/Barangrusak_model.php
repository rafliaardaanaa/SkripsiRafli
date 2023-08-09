<?php

class Barangrusak_model extends CI_Model
{

    public function getAllbarangrusak()
    {

        return $this->db->get('barangrusak')->result_array();
    }

    public function getbarangrusakById($id_barangrusak)
    {

        return $this->db->get_where('barangrusak', ['id_barangrusak' => $id_barangrusak])->row_array();
    }

    public function tambahDatabarangrusak()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => $this->input->post('kode', true),
            "id_barang" => $this->input->post('id_barang', true),
            "rusak" => $this->input->post('rusak', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('barangrusak', $data);
    }
    public function UbahDatabarangrusak()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => $this->input->post('kode', true),
            "id_barang" => $this->input->post('id_barang', true),
            "rusak" => $this->input->post('rusak', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barangrusak', $this->input->post('id_barangrusak', true));
        $this->db->update('barangrusak', $data);
    }

    public function hapusDatabarangrusak($id_barangrusak)
    {

        //$this->db->where('id_barangrusak',$id_barangrusak);
        //$this->db->delete('barangrusak');
        $this->db->delete('barangrusak', ['id_barangrusak' => $id_barangrusak]);
    }
}
