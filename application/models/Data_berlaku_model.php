<?php

class Data_berlaku_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_data_berlaku_kapal($kapalCode)
    {
        $this->db->join('tbl_sertifikat', 'tbl_sertifikat.sertifikatCode=tbl_berlaku.sertifikatCode');
        $this->db->join('tbl_pemberi', 'tbl_pemberi.pemberiCode=tbl_berlaku.pemberiCode');
        $this->db->join('tbl_kapal', 'tbl_kapal.kapalCode=tbl_berlaku.kapalCode');
        $this->db->join('tbl_user', 'tbl_user.userCode=tbl_berlaku.userCode');
        $this->db->order_by('berlakuCode', 'asc');
        return $this->db->get_where('tbl_berlaku', array('tbl_berlaku.kapalCode' => $kapalCode))->result_array();
    }
    function cek($kapalCode, $sertifikatCode)
    {
        return $this->db->get_where('tbl_berlaku', array('kapalCode' => $kapalCode, 'sertifikatCode' => $sertifikatCode))->result_array();
    }
    function get_data_berlaku($berlakuCode)
    {
        return $this->db->get_where('tbl_berlaku', array('berlakuCode' => $berlakuCode))->row_array();
    }

    /*
     * Get all data_berlaku
     */
    function get_all_data_berlaku()
    {

        $this->db->order_by('berlakuCode', 'asc');
        return $this->db->get('tbl_berlaku')->result_array();
    }

    /*
     * function to add new data_berlaku
     */
    function add_data_berlaku($params)
    {
        $this->db->insert('tbl_berlaku', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update data_berlaku
     */
    function update_data_berlaku($berlakuCode, $params)
    {
        $this->db->where('berlakuCode', $berlakuCode);
        return $this->db->update('tbl_berlaku', $params);
    }

    /*
     * function to delete data_berlaku
     */
    function delete_data_berlaku($berlakuCode)
    {
        return $this->db->delete('tbl_berlaku', array('berlakuCode' => $berlakuCode));
    }
}
