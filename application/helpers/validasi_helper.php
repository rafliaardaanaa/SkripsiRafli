<?php
//fungsi token
function get_token($panjang)
{
    $token = array(
        range(1, 9),
        range('a', 'z'),
        range('A', 'Z')
    );
    $karakter = array();
    foreach ($token as $key => $val) {
        foreach ($val as $k => $v) {
            $karakter[] = $v;
        }
    }
    $token = null;
    for ($i = 1; $i <= $panjang; $i++) {
        // mengambil array secara acak
        $token .= $karakter[rand($i, count($karakter) - 1)];
    }
    return $token;
}

function check_login()
{
    $ini = get_instance();
    if (!$ini->session->userdata('token')) {
        redirect(base_url());
    } else {
        $id_level = $ini->session->userdata('id_level');
        $url = $ini->uri->segment(1);

        $queryMenu = $ini->db->get_where('menu', ['url' => $url])->row_array();
        $id_menu = $queryMenu['id_menu'];

        $queryAksesMenu = $ini->db->get_where('aksesmenu', [
            'id_level' => $id_level,
            'id_menu' => $id_menu
        ]);

        if ($queryAksesMenu->num_rows() < 1) {
            redirect(base_url());
        }
    }
}

function check_username()
{
    $ini = get_instance();
    $token = $ini->session->userdata('token');
    $queryPengguna = $ini->db->get_where('pengguna', ['token' => $token]);
    $queryToko = $ini->db->get_where('toko', ['kode' => $token]);
    if ($queryPengguna->num_rows() == 1) {
        $queryUsername = $ini->db->get_where('pengguna', ['token' => $token])->row_array();
        $username = $queryUsername['username'];
    } else {
        $queryUsername = $ini->db->get_where('toko', ['kode' => $token])->row_array();
        $username = $queryUsername['username'];
    }

    return $username;
}

function check_jeniskelamin($id_jeniskelamin = '1')
{
    if ($id_jeniskelamin == '1') {
        return 'Laki-laki';
    } else {
        return 'Perempuan';
    }
}
function rupiah($rupiah)
{

    $hasil_rupiah = "Rp. " . number_format($rupiah, 0, ',', '.');
    return $hasil_rupiah;
}
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

function bulan_romawi($bln)
{
    switch ($bln) {
        case 1:
            return "I";
            break;
        case 2:
            return "II";
            break;
        case 3:
            return "III";
            break;
        case 4:
            return "IV";
            break;
        case 5:
            return "V";
            break;
        case 6:
            return "VI";
            break;
        case 7:
            return "VII";
            break;
        case 8:
            return "VIII";
            break;
        case 9:
            return "IX";
            break;
        case 10:
            return "X";
            break;
        case 11:
            return "XI";
            break;
        case 12:
            return "XII";
            break;
    }
}

function check_aktif($aktif = '1')
{
    if ($aktif == '1') {
        $nama_status = 'Aktif';
    } else {
        $nama_status = 'Tidak Aktif';
    }
    return $nama_status;
}
function namabulan($bulan)
{

    if ($bulan == '01') {
        $nama_bulan = 'Januari';
    } else if ($bulan == '02') {
        $nama_bulan = 'Februari';
    } else if ($bulan == '03') {
        $nama_bulan = 'Maret';
    } else if ($bulan == '04') {
        $nama_bulan = 'April';
    } else if ($bulan == '05') {
        $nama_bulan = 'Mei';
    } else if ($bulan == '06') {
        $nama_bulan = 'Juni';
    } else if ($bulan == '07') {
        $nama_bulan = 'Juli';
    } else if ($bulan == '08') {
        $nama_bulan = 'Agustus';
    } else if ($bulan == '09') {
        $nama_bulan = 'September';
    } else if ($bulan == '10') {
        $nama_bulan = 'Oktober';
    } else if ($bulan == '11') {
        $nama_bulan = 'November';
    } else if ($bulan == '12') {
        $nama_bulan = 'Desember';
    } else {
        $nama_bulan = 'Kesalahan';
    }
    return $nama_bulan;
}
function agama($id_agama = '1')
{
    $ini = get_instance();
    $agama = $ini->db->get_where('agama', ['id_agama' => $id_agama])->row_array();
    return $agama['nama_agama'];
}
function pendidikan($id_pendidikan = '1')
{
    $ini = get_instance();
    $pendidikan = $ini->db->get_where('pendidikan', ['id_pendidikan' => $id_pendidikan])->row_array();
    return $pendidikan['nama_pendidikan'];
}
