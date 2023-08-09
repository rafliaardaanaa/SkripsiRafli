<?php

class Barang_model extends CI_Model
{

    public function getAllbarang()
    {

        return $this->db->get('barang')->result_array();
    }

    public function getbarangById($id_barang)
    {

        return $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
    }

    public function tambahDatabarang()
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "id_jenisbarang" => $this->input->post('id_jenisbarang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
            "berat" => $this->input->post('berat', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('barang', $data);
    }
    public function UbahDatabarang()
    {
        $data = [
            "id_jenisbarang" => $this->input->post('id_jenisbarang', true),
            "nama_barang" => $this->input->post('nama_barang', true),
            "harga" => $this->input->post('harga', true),
            "berat" => $this->input->post('berat', true),
            "keterangan" => $this->input->post('keterangan', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barang', $this->input->post('id_barang', true));
        $this->db->update('barang', $data);
    }

    public function hapusDatabarang($id_barang)
    {

        //$this->db->where('id_barang',$id_barang);
        //$this->db->delete('barang');
        $this->db->delete('barang', ['id_barang' => $id_barang]);
    }
}
