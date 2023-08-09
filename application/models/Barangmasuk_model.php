<?php

class Barangmasuk_model extends CI_Model
{

    public function getAllbarangmasuk()
    {

        return $this->db->get('barangmasuk')->result_array();
    }

    public function getbarangmasukById($id_barangmasuk)
    {

        return $this->db->get_where('barangmasuk', ['id_barangmasuk' => $id_barangmasuk])->row_array();
    }

    public function tambahDatabarangmasuk()
    {
        $tanggal_faktur = date('Y-m-d', strtotime($this->input->post('tanggal_faktur')));
        $tanggal_terima = date('Y-m-d', strtotime($this->input->post('tanggal_terima')));
        $data = [
            "tanggal_faktur" => $tanggal_faktur,
            "no_faktur" => $this->input->post('no_faktur', true),
            "id_pegawai" => $this->input->post('id_pegawai', true),
            "tanggal_terima" => $tanggal_terima,
            "id_supplier" => $this->input->post('id_supplier', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('barangmasuk', $data);
    }
    public function UbahDatabarangmasuk()
    {
        $tanggal_faktur = date('Y-m-d', strtotime($this->input->post('tanggal_faktur')));
        $tanggal_terima = date('Y-m-d', strtotime($this->input->post('tanggal_terima')));
        $data = [
            "tanggal_faktur" => $tanggal_faktur,
            "no_faktur" => $this->input->post('no_faktur', true),
            "id_pegawai" => $this->input->post('id_pegawai', true),
            "tanggal_terima" => $tanggal_terima,
            "id_supplier" => $this->input->post('id_supplier', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barangmasuk', $this->input->post('id_barangmasuk', true));
        $this->db->update('barangmasuk', $data);
    }
    public function uploadbuktitransaksi($id_barangmasuk, $file_baru)
    {
        $data = [
            "foto" => $file_baru,
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barangmasuk', $id_barangmasuk);
        $this->db->update('barangmasuk', $data);
    }

    public function hapusDatabarangmasuk($id_barangmasuk)
    {
        $this->db->delete('barangmasuk', ['id_barangmasuk' => $id_barangmasuk]);
    }
}
