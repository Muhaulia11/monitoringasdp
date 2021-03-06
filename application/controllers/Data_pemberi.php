<?php


class Data_pemberi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE && $this->session->userdata('userLevel') === '1') {
            redirect('login');
        }
        $this->load->model('Data_pemberi_model');
    }

    /*
     * Listing of data_pemberi
     */
    function index()
    {
        $data['data_pemberi'] = $this->Data_pemberi_model->get_all_data_pemberi();

        $data['_view'] = 'data_pemberi/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new data_pemberi
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('pemberiNama', 'PemberiNama', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'pemberiNama' => $this->input->post('pemberiNama'),
            );

            $data_pemberi_id = $this->Data_pemberi_model->add_data_pemberi($params);
            redirect('data_pemberi/index');
        } else {
            $data['_view'] = 'data_pemberi/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a data_pemberi
     */
    function edit($pemberiCode)
    {
        // check if the data_pemberi exists before trying to edit it
        $data['data_pemberi'] = $this->Data_pemberi_model->get_data_pemberi($pemberiCode);

        if (isset($data['data_pemberi']['pemberiCode'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('pemberiNama', 'PemberiNama', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'pemberiNama' => $this->input->post('pemberiNama'),
                );

                $this->Data_pemberi_model->update_data_pemberi($pemberiCode, $params);
                redirect('data_pemberi/index');
            } else {
                $data['_view'] = 'data_pemberi/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The data_pemberi you are trying to edit does not exist.');
    }

    /*
     * Deleting data_pemberi
     */
    function remove($pemberiCode)
    {
        $data_pemberi = $this->Data_pemberi_model->get_data_pemberi($pemberiCode);

        // check if the data_pemberi exists before trying to delete it
        if (isset($data_pemberi['pemberiCode'])) {
            $this->Data_pemberi_model->delete_data_pemberi($pemberiCode);
            redirect('data_pemberi/index');
        } else
            show_error('The data_pemberi you are trying to delete does not exist.');
    }
}
