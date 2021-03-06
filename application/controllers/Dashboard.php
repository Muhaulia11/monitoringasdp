<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') !== TRUE) {
            redirect('login');
        }
        $this->load->model('dashboard_model');
    }

    function index()
    {
        if ($this->session->userdata('userLevel') == 1) {
            $data['jml_user'] = count($this->dashboard_model->jml_user());
            $data['jml_kapal'] = count($this->dashboard_model->jml_kapal());
            $data['jml_sertifikat'] = count($this->dashboard_model->jml_sertifikat());
            $data['jml_pemberi'] = count($this->dashboard_model->jml_pemberi());
            $data['all_sertifikat'] = $this->dashboard_model->all_sertifikat();
            $data['all_kapal'] = $this->dashboard_model->all_kapal();

            foreach ($data['all_sertifikat'] as $d_serti) {
                foreach ($data['all_kapal'] as $d_kapal) {
                    $tes = $this->dashboard_model->only_one_berlaku($d_serti['sertifikatCode'], $d_kapal['kapalCode']);
                    $data['tanggalAkhir'][$d_serti['sertifikatCode']][$d_kapal['kapalCode']] = $tes['berlakuTanggalAkhir'];
                }
            }
            $data['_view'] = 'dashboard';
            $this->load->view('layouts/main', $data);
            
        } elseif ($this->session->userdata('userLevel') == 2) {
            $data['all_sertifikat'] = $this->dashboard_model->all_sertifikat();
            $data['all_kapal'] = $this->dashboard_model->all_kapal();

            foreach ($data['all_sertifikat'] as $d_serti) {
                foreach ($data['all_kapal'] as $d_kapal) {
                    $tes = $this->dashboard_model->only_one_berlaku($d_serti['sertifikatCode'], $d_kapal['kapalCode']);
                    $data['tanggalAkhir'][$d_serti['sertifikatCode']][$d_kapal['kapalCode']] = $tes['berlakuTanggalAkhir'];
                }
            }
            $data['_view'] = 'dashboard_member';
            $this->load->view('layouts/main', $data);
        }
    }
}
