<?php

 
class Data_kapal_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get data_kapal by kapalCode
     */
    function get_data_kapal($kapalCode)
    {
        return $this->db->get_where('tbl_kapal',array('kapalCode'=>$kapalCode))->row_array();
    }
        
    /*
     * Get all data_kapal
     */
    function get_all_data_kapal()
    {
        $this->db->order_by('kapalCode', 'asc');
        return $this->db->get('tbl_kapal')->result_array();
    }
        
    /*
     * function to add new data_kapal
     */
    function add_data_kapal($params)
    {
        $this->db->insert('tbl_kapal',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update data_kapal
     */
    function update_data_kapal($kapalCode,$params)
    {
        $this->db->where('kapalCode',$kapalCode);
        return $this->db->update('tbl_kapal',$params);
    }
    
    /*
     * function to delete data_kapal
     */
    function delete_data_kapal($kapalCode)
    {
        $this->db->delete('tbl_berlaku',array('kapalCode'=>$kapalCode));
        return $this->db->delete('tbl_kapal',array('kapalCode'=>$kapalCode));
    }
}