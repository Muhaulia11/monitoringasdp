<?php

class Data_sertifikat_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get data_sertifikat by sertifikatCode
     */
    function get_data_sertifikat($sertifikatCode)
    {
        return $this->db->get_where('tbl_sertifikat',array('sertifikatCode'=>$sertifikatCode))->row_array();
    }
        
    /*
     * Get all data_sertifikat
     */
    function get_all_data_sertifikat()
    {
        $this->db->order_by('sertifikatCode', 'asc');
        return $this->db->get('tbl_sertifikat')->result_array();
    }
        
    /*
     * function to add new data_sertifikat
     */
    function add_data_sertifikat($params)
    {
        $this->db->insert('tbl_sertifikat',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update data_sertifikat
     */
    function update_data_sertifikat($sertifikatCode,$params)
    {
        $this->db->where('sertifikatCode',$sertifikatCode);
        return $this->db->update('tbl_sertifikat',$params);
    }
    
    /*
     * function to delete data_sertifikat
     */
    function delete_data_sertifikat($sertifikatCode)
    {
        $this->db->delete('tbl_berlaku',array('sertifikatCode'=>$sertifikatCode));
        return $this->db->delete('tbl_sertifikat',array('sertifikatCode'=>$sertifikatCode));
    }
}