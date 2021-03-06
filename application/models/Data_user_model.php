<?php

class Data_user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get data_user by userCode
     */
    function get_data_user($userCode)
    {
        return $this->db->get_where('tbl_user', array('userCode' => $userCode))->row_array();
    }

    /*
     * Get all data_user
     */
    function get_all_data_user()
    {
        $this->db->order_by('userCode', 'asc');
        return $this->db->get('tbl_user')->result_array();
    }

    /*
     * function to add new data_user
     */
    function add_data_user($params)
    {
        $this->db->insert('tbl_user', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update data_user
     */
    function update_data_user($userCode, $params)
    {
        $this->db->where('userCode', $userCode);
        return $this->db->update('tbl_user', $params);
    }

    /*
     * function to delete data_user
     */
    function delete_data_user($userCode)
    {
        return $this->db->delete('tbl_user', array('userCode' => $userCode));
    }

    function jml_request($userCode)
    {
        $this->db->where('userCode', $userCode);
        $this->db->where('qrStatus', '0');
        $this->db->from('tbl_qr');
        return $this->db->count_all_results();
    }

    function get_all_data_request($userCode)
    {
        return $this->db->get_where('tbl_qr', array('userCode' => $userCode))->result_array();
    }

    function get_data_qr($qrCode)
    {
        $this->db->join('tbl_user', 'tbl_user.userCode=tbl_qr.userCode');
        return $this->db->get_where('tbl_qr', array('qrCode' => $qrCode))->row_array();
    }

    function update_data_qr($qrCode, $params)
    {
        $this->db->where('qrCode', $qrCode);
        return $this->db->update('tbl_qr', $params);
    }
}
