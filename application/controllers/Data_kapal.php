<?php


class Data_kapal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE && $this->session->userdata('userLevel') === '1') {
            redirect('login');
        }
        $this->load->model('Data_kapal_model');
        $this->load->model('Data_berlaku_model');
    }

    /*
     * Listing of data_kapal
     */
    function index()
    {
        $data['data_kapal'] = $this->Data_kapal_model->get_all_data_kapal();

        $data['_view'] = 'data_kapal/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new data_kapal
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('kapalNama', 'KapalNama', 'required');
        $this->form_validation->set_rules('kapalBendera', 'KapalBendera', 'required');
        $this->form_validation->set_rules('kapalIsiKotor', 'KapalIsiKotor', 'required');
        $this->form_validation->set_rules('kapalHP-ME', 'KapalHP-ME', 'required');
        $this->form_validation->set_rules('kapalTahunPembuatan', 'KapalTahunPembuatan', 'required|integer');
        $this->form_validation->set_rules('kapalNahkoda', 'KapalNahkoda', 'required');
        $this->form_validation->set_rules('kapalJumlahCrew', 'KapalJumlahCrew', 'required|integer');
        $this->form_validation->set_rules('kapalLintasan', 'KapalLintasan', 'required');
        $this->form_validation->set_rules('kapalPemilik', 'KapalPemilik', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'kapalNama' => $this->input->post('kapalNama'),
                'kapalBendera' => $this->input->post('kapalBendera'),
                'kapalIsiKotor' => $this->input->post('kapalIsiKotor'),
                'kapalHP-ME' => $this->input->post('kapalHP-ME'),
                'kapalTahunPembuatan' => $this->input->post('kapalTahunPembuatan'),
                'kapalNahkoda' => $this->input->post('kapalNahkoda'),
                'kapalJumlahCrew' => $this->input->post('kapalJumlahCrew'),
                'kapalLintasan' => $this->input->post('kapalLintasan'),
                'kapalPemilik' => $this->input->post('kapalPemilik'),
            );

            $data_kapal_id = $this->Data_kapal_model->add_data_kapal($params);
            redirect('data_kapal/index');
        } else {
            $data['_view'] = 'data_kapal/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a data_kapal
     */
    function edit($kapalCode)
    {
        // check if the data_kapal exists before trying to edit it
        $data['data_kapal'] = $this->Data_kapal_model->get_data_kapal($kapalCode);

        if (isset($data['data_kapal']['kapalCode'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('kapalNama', 'KapalNama', 'required');
            $this->form_validation->set_rules('kapalBendera', 'KapalBendera', 'required');
            $this->form_validation->set_rules('kapalIsiKotor', 'KapalIsiKotor', 'required');
            $this->form_validation->set_rules('kapalHP-ME', 'KapalHP-ME', 'required');
            $this->form_validation->set_rules('kapalTahunPembuatan', 'KapalTahunPembuatan', 'required|integer');
            $this->form_validation->set_rules('kapalNahkoda', 'KapalNahkoda', 'required');
            $this->form_validation->set_rules('kapalJumlahCrew', 'KapalJumlahCrew', 'required|integer');
            $this->form_validation->set_rules('kapalLintasan', 'KapalLintasan', 'required');
            $this->form_validation->set_rules('kapalPemilik', 'KapalPemilik', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'kapalNama' => $this->input->post('kapalNama'),
                    'kapalBendera' => $this->input->post('kapalBendera'),
                    'kapalIsiKotor' => $this->input->post('kapalIsiKotor'),
                    'kapalHP-ME' => $this->input->post('kapalHP-ME'),
                    'kapalTahunPembuatan' => $this->input->post('kapalTahunPembuatan'),
                    'kapalNahkoda' => $this->input->post('kapalNahkoda'),
                    'kapalJumlahCrew' => $this->input->post('kapalJumlahCrew'),
                    'kapalLintasan' => $this->input->post('kapalLintasan'),
                    'kapalPemilik' => $this->input->post('kapalPemilik'),
                );

                $this->Data_kapal_model->update_data_kapal($kapalCode, $params);
                redirect('data_kapal/index');
            } else {
                $data['_view'] = 'data_kapal/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The data_kapal you are trying to edit does not exist.');
    }

    /*
     * Deleting data_kapal
     */
    function remove($kapalCode)
    {
        $data_kapal = $this->Data_kapal_model->get_data_kapal($kapalCode);

        // check if the data_kapal exists before trying to delete it
        if (isset($data_kapal['kapalCode'])) {
            $this->Data_kapal_model->delete_data_kapal($kapalCode);
            redirect('data_kapal/index');
        } else
            show_error('The data_kapal you are trying to delete does not exist.');
    }

    function sertifikat($kapalCode)
    {
        $data['data_berlaku'] = $this->Data_berlaku_model->get_data_berlaku_kapal($kapalCode);
        $data['kapalCode'] = $kapalCode;
        $data['_view'] = 'data_kapal/indexsertifikat';
        $this->load->view('layouts/main', $data);
    }

    function addsertifikat($kapalCode)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('sertifikatCode', 'SertifikatCode', 'required');
        $this->form_validation->set_rules('pemberiCode', 'PemberiCode', 'required');
        $this->form_validation->set_rules('berlakuTanggalAwal', 'BerlakuTanggalAwal', 'required');
        // $this->form_validation->set_rules('berkas', 'Berkas', 'required');

        if ($this->form_validation->run()) {
            if (count($this->Data_berlaku_model->cek($kapalCode, $this->input->post('sertifikatCode'))) > 0) {
                show_error('Sertifikat sudah ada untuk kapal ini. Silahkan Edit melalui menu yang ada.');
            } else {
                $config['upload_path']          = './assets/sertifikat/';
                $config['allowed_types']        = 'docx|pdf';
                $config['overwrite']            = true;
                $config['encrypt_name']         = TRUE;
                $config['max_size']             = 10024; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('berkas')) {
                    $hah =  $this->upload->data("file_name");
                } else {
                    $hah =  'default.pdf';
                }
                if ($this->input->post('per') == '1') {
                    $isi = "PERMANEN";
                } else {
                    $isi = $this->input->post('berlakuTanggalAkhir');
                }
                $params = array(
                    'sertifikatCode' => $this->input->post('sertifikatCode'),
                    'kapalCode' => $kapalCode,
                    'pemberiCode' => $this->input->post('pemberiCode'),
                    'berlakuTanggalAwal' => $this->input->post('berlakuTanggalAwal'),
                    'berlakuTanggalAkhir' => $isi,
                    'file' => $hah,
                    'userCode' => $this->session->userdata('userCode')
                );

                $data_berlaku_id = $this->Data_berlaku_model->add_data_berlaku($params);
                redirect('data_kapal/sertifikat/' . $kapalCode);
            }
        } else {
            $this->load->model('Data_sertifikat_model');
            $data['all_data_sertifikat'] = $this->Data_sertifikat_model->get_all_data_sertifikat();

            $this->load->model('Data_pemberi_model');
            $data['all_data_pemberi'] = $this->Data_pemberi_model->get_all_data_pemberi();
            $data['kapalCode'] = $kapalCode;
            $data['_view'] = 'data_kapal/addsertifikat';
            $this->load->view('layouts/main', $data);
        }
    }
    function editsertifikat($berlakuCode, $kapalCode)
    {
        // check if the data_berlaku exists before trying to edit it
        $data['data_berlaku'] = $this->Data_berlaku_model->get_data_berlaku($berlakuCode);

        if (isset($data['data_berlaku']['berlakuCode'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('berlakuTanggalAwal', 'BerlakuTanggalAwal', 'required');

            if ($this->form_validation->run()) {
                if ($this->input->post('per') == '1') {
                    $isi = "PERMANEN";
                } else {
                    $isi = $this->input->post('berlakuTanggalAkhir');
                }
                if ($_FILES['berkas2']['name'] == null) {
                    $hah = $data['data_berlaku']['file'];
                } else {
                    $config['upload_path']          = './assets/sertifikat/';
                    $config['allowed_types']        = 'docx|pdf';
                    $config['overwrite']            = true;
                    $config['encrypt_name']         = TRUE;
                    $config['max_size']             = 10000; // 1MB

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('berkas2')) {
                        $hah =  $this->upload->data("file_name");
                    } else {
                        $hah =  'default2.pdf';
                    }
                }
                $params = array(
                    'berlakuTanggalAwal' => $this->input->post('berlakuTanggalAwal'),
                    'berlakuTanggalAkhir' => $isi,
                    'file' => $hah
                );

                $this->Data_berlaku_model->update_data_berlaku($berlakuCode, $params);
                redirect('data_kapal/sertifikat/' . $kapalCode);
            } else {
                $data['kapalCode'] = $kapalCode;
                $data['_view'] = 'data_kapal/editsertifikat';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The data_berlaku you are trying to edit does not exist.');
    }
    function removesertifikat($berlakuCode, $kapalCode)
    {
        $data_berlaku = $this->Data_berlaku_model->get_data_berlaku($berlakuCode);

        // check if the data_berlaku exists before trying to delete it
        if (isset($data_berlaku['berlakuCode'])) {
            $this->Data_berlaku_model->delete_data_berlaku($berlakuCode);
            redirect('data_kapal/sertifikat/' . $kapalCode);
        } else
            show_error('The data_berlaku you are trying to delete does not exist.');
    }
}
