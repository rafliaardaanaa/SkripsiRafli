<?php

class Pegawai_model extends CI_Model
{

    public function getAllPegawai()
    {

        return $this->db->get('pegawai')->result_array();
    }

    public function getPegawaiById($id_pegawai)
    {

        return $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
    }

    public function tambahDataPegawai($file_baru)
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "alamat" => $this->input->post('alamat', true),
            "id_agama" => $this->input->post('id_agama', true),
            "id_pendidikan" => $this->input->post('id_pendidikan', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "foto" => $file_baru,
            "user_input" => check_username(),
            "tgl_input" => date('Y-m-d h:m:i')
        ];
        $this->db->insert('pegawai', $data);
    }

    public function ubahDataPegawai($file_baru)
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_pegawai" => $this->input->post('nama_pegawai', true),
            "id_jeniskelamin" => $this->input->post('id_jeniskelamin', true),
            "id_jabatan" => $this->input->post('id_jabatan', true),
            "alamat" => $this->input->post('alamat', true),
            "id_agama" => $this->input->post('id_agama', true),
            "id_pendidikan" => $this->input->post('id_pendidikan', true),
            "nohp" => $this->input->post('nohp', true),
            "email" => $this->input->post('email', true),
            "foto" => $file_baru,
            "aktif" => $this->input->post('aktif', true),
            "user_ubah" => check_username(),
            "tgl_ubah" => date('Y-m-d h:m:i')
        ];
        $this->db->where('id_pegawai', $this->input->post('id_pegawai', true));
        $this->db->update('pegawai', $data);
    }

    public function hapusDataPegawai($id_pegawai)
    {
        $this->db->delete('pegawai', ['id_pegawai' => $id_pegawai]);
    }
}
