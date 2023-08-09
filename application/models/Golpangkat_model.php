<?php

class Golpangkat_model extends CI_Model
{

    public function getAllgolpangkat()
    {

        return $this->db->get('golpangkat')->result_array();
    }

    public function getgolpangkatById($id_golpangkat)
    {

        return $this->db->get_where('golpangkat', ['id_golpangkat' => $id_golpangkat])->row_array();
    }

    public function tambahDatagolpangkat()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_gol" => $this->input->post('nama_gol', true),
            "nama_pangkat" => $this->input->post('nama_pangkat', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('golpangkat', $data);
    }

    public function ubahDatagolpangkat()
    {

        $data = [
            "urutan" => $this->input->post('urutan', true),
            "nama_gol" => $this->input->post('nama_gol', true),
            "nama_pangkat" => $this->input->post('nama_pangkat', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_golpangkat', $this->input->post('id_golpangkat', true));
        $this->db->update('golpangkat', $data);
    }

    public function hapusDatagolpangkat($id_golpangkat)
    {

        //$this->db->where('id_golpangkat',$id_golpangkat);
        //$this->db->delete('golpangkat');
        $this->db->delete('golpangkat', ['id_golpangkat' => $id_golpangkat]);
    }
}
