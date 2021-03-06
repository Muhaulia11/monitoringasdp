<?php
class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
  }

  function index()
  {
    $this->load->view('login_view');
  }

  function auth()
  {
    $username = $this->input->post('username', TRUE);
    $password = md5($this->input->post('password', TRUE));
    $validate = $this->login_model->validate($username, $password);
    if ($validate->num_rows() > 0) {
      $data  = $validate->row_array();
      if ($data['userAktif'] == 1) {
        $userCode = $data['userCode'];
        $level = $data['userLevel'];
        $nama = $data['userNama'];

        $sesdata = array(
          'userCode'  => $userCode,
          'userNama'  => $nama,
          'userLevel' => $level,
          'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        redirect('dashboard');
      } else {
        echo $this->session->set_flashdata('msg', 'Your Account Not Actived!');
        redirect('login');
      }
    } else {
      echo $this->session->set_flashdata('msg', 'Username or Password is Wrong!');
      redirect('login');
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}
