<?php

class Baranghilang_model extends CI_Model
{

    public function getAllbaranghilang()
    {

        return $this->db->get('baranghilang')->result_array();
    }

    public function getbaranghilangById($id_baranghilang)
    {

        return $this->db->get_where('baranghilang', ['id_baranghilang' => $id_baranghilang])->row_array();
    }

    public function tambahDatabaranghilang()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => $this->input->post('kode', true),
            "id_barang" => $this->input->post('id_barang', true),
            "hilang" => $this->input->post('hilang', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('baranghilang', $data);
    }
    public function UbahDatabaranghilang()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "kode" => $this->input->post('kode', true),
            "id_barang" => $this->input->post('id_barang', true),
            "hilang" => $this->input->post('hilang', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_baranghilang', $this->input->post('id_baranghilang', true));
        $this->db->update('baranghilang', $data);
    }

    public function hapusDatabaranghilang($id_baranghilang)
    {

        //$this->db->where('id_baranghilang',$id_baranghilang);
        //$this->db->delete('baranghilang');
        $this->db->delete('baranghilang', ['id_baranghilang' => $id_baranghilang]);
    }
}
