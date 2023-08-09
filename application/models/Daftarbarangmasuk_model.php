<?php

class Daftarbarangmasuk_model extends CI_Model
{

    public function getAlldaftarbarangmasuk()
    {

        return $this->db->get('daftarbarangmasuk')->result_array();
    }

    public function getdaftarbarangmasukById($id_daftarbarangmasuk)
    {

        return $this->db->get_where('daftarbarangmasuk', ['id_daftarbarangmasuk' => $id_daftarbarangmasuk])->row_array();
    }
    public function getdaftarbarangmasukByIdbarangmasuk($id_barangmasuk)
    {

        return $this->db->get_where('daftarbarangmasuk', ['id_barangmasuk' => $id_barangmasuk])->result_array();
    }

    public function tambahDatadaftarbarangmasuk()
    {
        $data = [
            "id_barangmasuk" => $this->input->post('id_barangmasuk', true),
            "id_barang" => $this->input->post('id_barang', true),
            "jumlah" => $this->input->post('jumlah', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('daftarbarangmasuk', $data);
    }

    public function hapusDatadaftarbarangmasuk($id_daftarbarangmasuk)
    {
        $this->db->delete('daftarbarangmasuk', ['id_daftarbarangmasuk' => $id_daftarbarangmasuk]);
    }
    public function hapusDatadaftarbarangmasukByIdMasuk($id_barangmasuk)
    {
        $this->db->delete('daftarbarangmasuk', ['id_barangmasuk' => $id_barangmasuk]);
    }
}
