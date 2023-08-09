<?php

class Supplier_model extends CI_Model
{

    public function getAllsupplier()
    {

        return $this->db->get('supplier')->result_array();
    }

    public function getsupplierById($id_supplier)
    {

        return $this->db->get_where('supplier', ['id_supplier' => $id_supplier])->row_array();
    }

    public function tambahDatasupplier()
    {

        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_supplier" => $this->input->post('nama_supplier', true),
            "penanggungjawab" => $this->input->post('penanggungjawab', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('supplier', $data);
    }

    public function ubahDatasupplier()
    {

        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_supplier" => $this->input->post('nama_supplier', true),
            "penanggungjawab" => $this->input->post('penanggungjawab', true),
            "alamat" => $this->input->post('alamat', true),
            "nohp" => $this->input->post('nohp', true),
            "status" => $this->input->post('status', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_supplier', $this->input->post('id_supplier', true));
        $this->db->update('supplier', $data);
    }

    public function hapusDatasupplier($id_supplier)
    {

        //$this->db->where('id_supplier',$id_supplier);
        //$this->db->delete('supplier');
        $this->db->delete('supplier', ['id_supplier' => $id_supplier]);
    }
}
