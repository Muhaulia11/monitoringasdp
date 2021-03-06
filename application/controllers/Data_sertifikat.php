<?php

class Data_sertifikat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE && $this->session->userdata('userLevel') === '1') {
            redirect('login');
        }
        $this->load->model('Data_sertifikat_model');
    }

    /*
     * Listing of data_sertifikat
     */
    function index()
    {
        $data['data_sertifikat'] = $this->Data_sertifikat_model->get_all_data_sertifikat();

        $data['_view'] = 'data_sertifikat/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new data_sertifikat
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('sertifikatNama', 'SertifikatNama', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'sertifikatNama' => $this->input->post('sertifikatNama'),
            );

            $data_sertifikat_id = $this->Data_sertifikat_model->add_data_sertifikat($params);
            redirect('data_sertifikat/index');
        } else {
            $data['_view'] = 'data_sertifikat/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a data_sertifikat
     */
    function edit($sertifikatCode)
    {
        // check if the data_sertifikat exists before trying to edit it
        $data['data_sertifikat'] = $this->Data_sertifikat_model->get_data_sertifikat($sertifikatCode);

        if (isset($data['data_sertifikat']['sertifikatCode'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('sertifikatNama', 'SertifikatNama', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'sertifikatNama' => $this->input->post('sertifikatNama'),
                );

                $this->Data_sertifikat_model->update_data_sertifikat($sertifikatCode, $params);
                redirect('data_sertifikat/index');
            } else {
                $data['_view'] = 'data_sertifikat/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The data_sertifikat you are trying to edit does not exist.');
    }

    /*
     * Deleting data_sertifikat
     */
    function remove($sertifikatCode)
    {
        $data_sertifikat = $this->Data_sertifikat_model->get_data_sertifikat($sertifikatCode);

        // check if the data_sertifikat exists before trying to delete it
        if (isset($data_sertifikat['sertifikatCode'])) {
            $this->Data_sertifikat_model->delete_data_sertifikat($sertifikatCode);
            redirect('data_sertifikat/index');
        } else
            show_error('The data_sertifikat you are trying to delete does not exist.');
    }
}
