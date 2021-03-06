<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" >
    <script src="<?= base_url('assets/js/font.js') ?>" ></script>

    <title>MSK - Monitoring Surat Kapal</title>
</head>
<style type="text/css">
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }

    body {
        background: #007bff;
        background: linear-gradient(to right, #0062E6, #33AEFF);
    }

    .hide {
        display: none;
    }

    .card23 {
        background: #fff;
        margin: 2%;
        border: 0;
        border-radius: 0.5rem;
        box-shadow: 0 0.5rem 0.5rem 0 rgba(0, 0, 0, 0.1);
    }

    .card234 {
        margin: 5%;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <strong><a class="navbar-brand" href="#">MSK - Monitoring Surat Kapal</a></strong>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item <?php if ($this->uri->segment(1) == 'dashboard' || empty($this->uri->segment(1))) {
                                        echo "active";
                                    } ?>">
                    <a class="nav-link" href="<?php echo base_url('dashboard') ?>"><i class="fas fa-home"></i> Beranda</a>
                </li>
                <?php if ($this->session->userdata('userLevel') == 1) { ?>
                    <li class="nav-item <?php if ($this->uri->segment(1) == 'data_user') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('data_user') ?>"><i class="fas fa-users"></i> Data User</a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(1) == 'data_kapal') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('data_kapal') ?>"><i class="fas fa-ship"></i> Data Kapal</a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(1) == 'data_sertifikat') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('data_sertifikat') ?>"><i class="fas fa-certificate"></i> Data Sertifikat</a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->segment(1) == 'data_pemberi') {
                                            echo "active";
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('data_pemberi') ?>"><i class="fas fa-check"></i> Data Penerbit Sertifikat</a>
                    </li>
                <?php } elseif ($this->session->userdata('userLevel') == 2) { ?>
                <?php } ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo base_url('login/logout') ?>" class="btn btn-sm btn-outline-danger my-2 my-sm-0">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="card234">
        <?php
        if (isset($_view) && $_view)
            $this->load->view($_view);
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/js/jquery.js') ?>" ></script>
    <script src="<?= base_url('assets/js/popper.js') ?>" ></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>" ></script>
</body>

</html>