<?php
date_default_timezone_set('Asia/Jakarta');
class Kirim extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kirim_model');
    }

    function cek()
    {
        $cek = $this->Kirim_model->all_berlaku();
        $user = $this->Kirim_model->all_user();
        foreach ($user as $u) {
            foreach ($cek as $c) {
                if ($c['berlakuTanggalAkhir'] != 'PERMANEN') {
                    $date1 = new DateTime();
                    $date2 = new DateTime($c['berlakuTanggalAkhir'] . "23:59");

                    if ($date1 < $date2) {
                        $interval = $date1->diff($date2);
                        // echo $interval->days . "<br>";

                        if ($interval->days == 1) {
                            // echo $interval->days;
                            $config = [
                                'mailtype'  => 'html',
                                'charset'   => 'utf-8',
                                'protocol'  => 'smtp',
                                'smtp_host' => 'smtp.gmail.com',
                                'smtp_user' => 'muhaulia11@gmail.com',  // Email gmail
                                'smtp_pass'   => 'aulia1112',  // Password gmail
                                'smtp_crypto' => 'ssl',
                                'smtp_port'   => 465,
                                'crlf'    => "\r\n",
                                'newline' => "\r\n"
                            ];


                            $this->load->library('email', $config);


                            $this->email->from('kacuk@yaya.co', 'Administrator Aplikasi Monitoring Surat Kapal');


                            $this->email->to($u['userEmail']);


                            $this->email->subject('Notification');


                            $this->email->message("Sertifikat " . $c['sertifikatNama'] . " dari kapal " . $c['kapalNama'] . " akan expired besok!");

                            if($this->email->send()){
                                echo "kirim email berhasil<br>";
                            }
                        }
                    }
                }
            }
        }
    }
}
