<?php

class Dashboard_model extends CI_Model
{
    function jml_user()
    {
        $this->db->select('userCode');
        $this->db->from('tbl_user');
        return $this->db->get()->result_array();
    }
    function jml_kapal()
    {
        $this->db->select('kapalCode');
        $this->db->from('tbl_kapal');
        return $this->db->get()->result_array();
    }
    function jml_sertifikat()
    {
        $this->db->select('sertifikatCode');
        $this->db->from('tbl_sertifikat');
        return $this->db->get()->result_array();
    }
    function jml_pemberi()
    {
        $this->db->select('pemberiCode');
        $this->db->from('tbl_pemberi');
        return $this->db->get()->result_array();
    }
    function all_sertifikat()
    {
        $this->db->from('tbl_sertifikat');
        return $this->db->get()->result_array();
    }
    function all_kapal()
    {
        $this->db->from('tbl_kapal');
        return $this->db->get()->result_array();
    }
    function only_one_berlaku($sertifikatCode, $kapalCode)
    {
        return $this->db->get_where('tbl_berlaku', array('sertifikatCode' => $sertifikatCode, 'kapalCode' => $kapalCode))->row_array();
    }
    function all_berlaku()
    {
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.sertifikatCode=tbl_berlaku.sertifikatCode');
        $this->db->join('tbl_pemberi', 'tbl_pemberi.pemberiCode=tbl_berlaku.pemberiCode');
        $this->db->join('tbl_kapal', 'tbl_kapal.kapalCode=tbl_berlaku.kapalCode');
        $this->db->order_by('berlakuCode', 'asc');
        return $this->db->get('tbl_berlaku')->result_array();
    }
}
