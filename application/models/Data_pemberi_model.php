<?php

class Data_pemberi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get data_pemberi by pemberiCode
     */
    function get_data_pemberi($pemberiCode)
    {
        return $this->db->get_where('tbl_pemberi',array('pemberiCode'=>$pemberiCode))->row_array();
    }
        
    /*
     * Get all data_pemberi
     */
    function get_all_data_pemberi()
    {
        $this->db->order_by('pemberiCode', 'asc');
        return $this->db->get('tbl_pemberi')->result_array();
    }
        
    /*
     * function to add new data_pemberi
     */
    function add_data_pemberi($params)
    {
        $this->db->insert('tbl_pemberi',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update data_pemberi
     */
    function update_data_pemberi($pemberiCode,$params)
    {
        $this->db->where('pemberiCode',$pemberiCode);
        return $this->db->update('tbl_pemberi',$params);
    }
    
    /*
     * function to delete data_pemberi
     */
    function delete_data_pemberi($pemberiCode)
    {
        $this->db->delete('tbl_berlaku',array('pemberiCode'=>$pemberiCode));
        return $this->db->delete('tbl_pemberi',array('pemberiCode'=>$pemberiCode));
    }
}