<?php

class Data_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE && $this->session->userdata('userLevel') === '1') {
            redirect('login');
        }
        $this->load->model('Data_user_model');
    }


    function index()
    {
        $data['data_user'] = $this->Data_user_model->get_all_data_user();
        // $data_user = $this->Data_user_model->get_all_data_user();
        // foreach ($data_user as $d_user) {
        //     $data['jml_request'][$d_user['userCode']] = $this->Data_user_model->jml_request($d_user['userCode']);
        //     $jml_expired = 0;
        //     $data_qr = $this->Data_user_model->get_all_data_request($d_user['userCode']);
        //     foreach ($data_qr as $d_qr) {
        //         $date1 = new DateTime($d_qr['qrTanggal'] . " " . $d_qr['qrJam']);
        //         $date2 = new DateTime($d_qr['qrTanggalAkhir'] . " " . $d_qr['qrJamAkhir']);
        //         if ($date1 < $date2) {
        //             $tanggal = 0;
        //         } else {
        //             $tanggal = 1;
        //         }
        //         $jml_expired = $jml_expired + $tanggal;
        //     }
        //     $data['jml_expired'][$d_user['userCode']] = $jml_expired;
        // }
        $data['_view'] = 'data_user/index';
        $this->load->view('layouts/main', $data);
    }

    /*
         * Adding a new data_user
         */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_user.username]');
        $this->form_validation->set_rules('userNama', 'Nama', 'required');
        $this->form_validation->set_rules('userEmail', 'Email', 'required|valid_email|is_unique[tbl_user.userEmail]');
        $this->form_validation->set_rules('userNoHP', 'No HP', 'required|integer|is_unique[tbl_user.userNoHP]');

        if ($this->form_validation->run()) {
            $params = array(
                'password' => md5($this->input->post('password')),
                'username' => $this->input->post('username'),
                'userNama' => $this->input->post('userNama'),
                'userEmail' => $this->input->post('userEmail'),
                'userNoHP' => $this->input->post('userNoHP'),
            );

            $data_user_id = $this->Data_user_model->add_data_user($params);
            redirect('data_user/index');
        } else {
            $data['_view'] = 'data_user/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
         * Editing a data_user
         */
    function edit($userCode)
    {
        // check if the data_user exists before trying to edit it
        $data['data_user'] = $this->Data_user_model->get_data_user($userCode);

        if (isset($data['data_user']['userCode'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('userNama', 'UserNama', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'userNama' => $this->input->post('userNama'),
                );

                $this->Data_user_model->update_data_user($userCode, $params);
                redirect('data_user/index');
            } else {
                $data['_view'] = 'data_user/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The data_user you are trying to edit does not exist.');
    }

    /*
         * Deleting data_user
         */
    function remove($userCode)
    {
        $data_user = $this->Data_user_model->get_data_user($userCode);

        // check if the data_user exists before trying to delete it
        if (isset($data_user['userCode'])) {
            $this->Data_user_model->delete_data_user($userCode);
            redirect('data_user/index');
        } else
            show_error('The data_user you are trying to delete does not exist.');
    }


    function ganpass($userCode)
    {
        // check if the data_user exists before trying to edit it
        $data['data_user'] = $this->Data_user_model->get_data_user($userCode);

        if (isset($data['data_user']['userCode'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('passbaru', 'Username', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'password' => $this->input->post('passbaru'),
                );

                $this->Data_user_model->update_data_user($userCode, $params);
                redirect('data_user/index');
            } else {
                $data['_view'] = 'data_user/ganpass';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The data_user you are trying to edit does not exist.');
    }

    function nonaktif($userCode)
    {
        $data['data_user'] = $this->Data_user_model->get_data_user($userCode);

        if (isset($data['data_user']['userCode'])) {

            $params = array(
                'userAktif' => '0',
            );

            $this->Data_user_model->update_data_user($userCode, $params);
            redirect('data_user/index');
        } else
            show_error('The data_user you are trying to edit does not exist.');
    }

    function aktif($userCode)
    {
        $data['data_user'] = $this->Data_user_model->get_data_user($userCode);

        if (isset($data['data_user']['userCode'])) {

            $params = array(
                'userAktif' => '1',
            );

            $this->Data_user_model->update_data_user($userCode, $params);
            redirect('data_user/index');
        } else
            show_error('The data_user you are trying to edit does not exist.');
    }

    function nonaktifnotif($userCode)
    {
        $data['data_user'] = $this->Data_user_model->get_data_user($userCode);

        if (isset($data['data_user']['userCode'])) {

            $params = array(
                'userNotif' => '0',
            );

            $this->Data_user_model->update_data_user($userCode, $params);
            redirect('data_user/index');
        } else
            show_error('The data_user you are trying to edit does not exist.');
    }

    function aktifnotif($userCode)
    {
        $data['data_user'] = $this->Data_user_model->get_data_user($userCode);

        if (isset($data['data_user']['userCode'])) {

            $params = array(
                'userNotif' => '1',
            );

            $this->Data_user_model->update_data_user($userCode, $params);
            redirect('data_user/index');
        } else
            show_error('The data_user you are trying to edit does not exist.');
    }

    
}
