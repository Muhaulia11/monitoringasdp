<?php

class Kirim_model extends CI_Model
{
    function all_berlaku()
    {
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.sertifikatCode=tbl_berlaku.sertifikatCode');
        $this->db->join('tbl_pemberi', 'tbl_pemberi.pemberiCode=tbl_berlaku.pemberiCode');
        $this->db->join('tbl_kapal', 'tbl_kapal.kapalCode=tbl_berlaku.kapalCode');
        $this->db->order_by('berlakuCode', 'asc');
        return $this->db->get('tbl_berlaku')->result_array();
    }

    function all_user()
    {
        return $this->db->get_where('tbl_user', array('userNotif' => '1'))->result_array();
    }
}
