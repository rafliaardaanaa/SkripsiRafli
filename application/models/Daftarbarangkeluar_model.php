<?php

class Daftarbarangkeluar_model extends CI_Model
{

    public function getAlldaftarbarangkeluar()
    {

        return $this->db->get('daftarbarangkeluar')->result_array();
    }

    public function getdaftarbarangkeluarById($id_daftarbarangkeluar)
    {

        return $this->db->get_where('daftarbarangkeluar', ['id_daftarbarangkeluar' => $id_daftarbarangkeluar])->row_array();
    }
    public function getdaftarbarangkeluarByIdbarangkeluar($id_barangkeluar)
    {

        return $this->db->get_where('daftarbarangkeluar', ['id_barangkeluar' => $id_barangkeluar])->result_array();
    }

    public function tambahDatadaftarbarangkeluar()
    {
        $data = [
            "id_barangkeluar" => $this->input->post('id_barangkeluar', true),
            "id_barang" => $this->input->post('id_barang', true),
            "jumlah" => $this->input->post('jumlah', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('daftarbarangkeluar', $data);
    }

    public function hapusDatadaftarbarangkeluar($id_daftarbarangkeluar)
    {
        $this->db->delete('daftarbarangkeluar', ['id_daftarbarangkeluar' => $id_daftarbarangkeluar]);
    }
    public function hapusDatadaftarbarangkeluarByIdKeluar($id_barangkeluar)
    {
        $this->db->delete('daftarbarangkeluar', ['id_barangkeluar' => $id_barangkeluar]);
    }
}
