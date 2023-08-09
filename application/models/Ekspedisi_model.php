<?php

class Ekspedisi_model extends CI_Model
{

    public function getAllekspedisi()
    {

        return $this->db->get('ekspedisi')->result_array();
    }

    public function getekspedisiById($id_ekspedisi)
    {

        return $this->db->get_where('ekspedisi', ['id_ekspedisi' => $id_ekspedisi])->row_array();
    }

    public function tambahDataekspedisi()
    {

        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_ekspedisi" => $this->input->post('nama_ekspedisi', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('ekspedisi', $data);
    }

    public function ubahDataekspedisi()
    {

        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_ekspedisi" => $this->input->post('nama_ekspedisi', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "status" => $this->input->post('status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_ekspedisi', $this->input->post('id_ekspedisi', true));
        $this->db->update('ekspedisi', $data);
    }

    public function hapusDataekspedisi($id_ekspedisi)
    {

        //$this->db->where('id_ekspedisi',$id_ekspedisi);
        //$this->db->delete('ekspedisi');
        $this->db->delete('ekspedisi', ['id_ekspedisi' => $id_ekspedisi]);
    }
}
