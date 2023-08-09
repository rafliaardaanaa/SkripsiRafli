<?php

class Barangkeluar_model extends CI_Model
{

    public function getAllbarangkeluar()
    {

        return $this->db->get('barangkeluar')->result_array();
    }

    public function getbarangkeluarById($id_barangkeluar)
    {

        return $this->db->get_where('barangkeluar', ['id_barangkeluar' => $id_barangkeluar])->row_array();
    }
    public function getbarangkeluarByIdToko($id_toko)
    {

        return $this->db->get_where('barangkeluar', ['id_toko' => $id_toko])->result_array();
    }

    public function tambahDatabarangkeluar()
    {
        $tanggal_faktur = date('Y-m-d', strtotime($this->input->post('tanggal_faktur')));
        $data = [
            "tanggal_faktur" => $tanggal_faktur,
            "no_faktur" => $this->input->post('no_faktur', true),
            "id_toko" => $this->input->post('id_toko', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('barangkeluar', $data);
    }
    public function UbahDatabarangkeluar()
    {
        $tanggal_faktur = date('Y-m-d', strtotime($this->input->post('tanggal_faktur')));
        $data = [
            "tanggal_faktur" => $tanggal_faktur,
            "no_faktur" => $this->input->post('no_faktur', true),
            "id_toko" => $this->input->post('id_toko', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barangkeluar', $this->input->post('id_barangkeluar', true));
        $this->db->update('barangkeluar', $data);
    }

    public function uploadbuktitransaksi($id_barangkeluar, $file_baru)
    {
        $data = [
            "foto" => $file_baru,
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barangkeluar', $id_barangkeluar);
        $this->db->update('barangkeluar', $data);
    }

    public function hapusDatabarangkeluar($id_barangkeluar)
    {
        $this->db->delete('barangkeluar', ['id_barangkeluar' => $id_barangkeluar]);
    }
}
