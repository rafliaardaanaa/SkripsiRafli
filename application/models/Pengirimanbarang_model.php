<?php

class Pengirimanbarang_model extends CI_Model
{

    public function getAllpengirimanbarang()
    {

        return $this->db->get('pengirimanbarang')->result_array();
    }

    public function getpengirimanbarangById($id_pengirimanbarang)
    {

        return $this->db->get_where('pengirimanbarang', ['id_pengirimanbarang' => $id_pengirimanbarang])->row_array();
    }
    public function getpengirimanbarangByIdbarangkeluar($id_barangkeluar)
    {

        return $this->db->get_where('pengirimanbarang', ['id_barangkeluar' => $id_barangkeluar])->row_array();
    }

    public function tambahDatapengirimanbarang()
    {
        $tanggal = date('Y-m-d', strtotime($this->input->post('tanggal')));
        $data = [
            "tanggal" => $tanggal,
            "id_barangkeluar" => $this->input->post('id_barangkeluar', true),
            "kode" => $this->input->post('kode', true),
            "id_pegawai" => $this->input->post('id_pegawai', true),
            "id_ekspedisi" => $this->input->post('id_ekspedisi', true),
            "biaya" => $this->input->post('biaya', true),
            "no_resi" => $this->input->post('no_resi', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pengirimanbarang', $data);
    }
    public function pengirimanbarangditerima($file_baru)
    {
        $tanggal_terima = date('Y-m-d', strtotime($this->input->post('tanggal_terima')));
        $data = [
            "tanggal_terima" => $tanggal_terima,
            "no_resi" => $this->input->post('no_resi', true),
            "nama_penerima" => $this->input->post('nama_penerima', true),
            "keterangan" => $this->input->post('keterangan', true),
            "foto" => $file_baru,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_barangkeluar', $this->input->post('id_barangkeluar', true));
        $this->db->update('pengirimanbarang', $data);
    }

    public function hapusDatapengirimanbarang($id_pengirimanbarang)
    {

        $this->db->delete('pengirimanbarang', ['id_pengirimanbarang' => $id_pengirimanbarang]);
    }
    public function hapusDatapengirimanbarangByIdKeluar($id_barangkeluar)
    {

        $this->db->delete('pengirimanbarang', ['id_barangkeluar' => $id_barangkeluar]);
    }
}
