<div class="row">
    <div class="col">
        <div class="jumbotron">
            <h1 class="display-5">Hello, <?php echo $this->session->userdata('userNama'); ?></h1>
            <p class="lead">Ini adalah aplikasi Monitoring Surat Kapal</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col card23">
        <div class="row">
            <div class="col mx-auto" style="margin-top: 2%;">
                <center>
                    <h4>Monitoring Sertifikat Kapal</h4>
                </center>
            </div>
        </div>
        <table class="table table-striped table-bordered " style="margin-top:2%">
            <thead>
                <tr>
                    <th>Sertifikat</th>
                    <?php foreach ($all_kapal as $t) { ?>
                        <th><?php echo $t['kapalNama']; ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($all_sertifikat as $a_serti) { ?>
                    <tr>
                        <td><?php echo $a_serti['sertifikatNama']; ?></td>
                        <?php foreach ($all_kapal as $a_kapal) { ?>
                            <td><?php
                                if ($tanggalAkhir[$a_serti['sertifikatCode']][$a_kapal['kapalCode']] != 'PERMANEN') {
                                    if ($tanggalAkhir[$a_serti['sertifikatCode']][$a_kapal['kapalCode']] == null) {
                                        echo "-";
                                    } else {
                                        $q = $tanggalAkhir[$a_serti['sertifikatCode']][$a_kapal['kapalCode']];
                                        $tahun = substr($q, 0, 4);
                                        $bulan = substr($q, 5, 2);
                                        $tanggal = substr($q, 8, 2);
                                        $date1 = new DateTime($q);
                                        $date2 = new DateTime();
                                        if ($date1 > $date2) {
                                            echo $tanggal . " - " . $bulan . " - " . $tahun;
                                        } else {
                                            echo '<p style="color:red;">' . $tanggal . " - " . $bulan . " - " . $tahun . '</p>';
                                        }
                                    }
                                }else{
                                    echo "PERMANEN";
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>