<div class="row">
    <div class="col-md card23">
        <div class="col">
            <span style="font-size: 48px; color: Dodgerblue;">
                <i class="fas fa-users"></i>
                <p class="float-right"><?php echo $jml_user; ?></p>
                <hr>
                <h6 class="float-right"><a href="<?php echo base_url('data_user') ?>">Detail...</a></h6>
            </span>
        </div>
    </div>
    <div class="col-md card23">
        <div class="col">
            <span style="font-size: 48px; color: Dodgerblue;">
                <i class="fas fa-ship"></i>
                <p class="float-right"><?php echo $jml_kapal; ?></p>
                <hr>
                <h6 class="float-right"><a href="<?php echo base_url('data_kapal') ?>">Detail...</a></h6>
            </span>
        </div>
    </div>
    <div class="col-md card23">
        <div class="col">
            <span style="font-size: 48px; color: Dodgerblue;">
                <i class="fas fa-certificate"></i>
                <p class="float-right"><?php echo $jml_sertifikat; ?></p>
                <hr>
                <h6 class="float-right"><a href="<?php echo base_url('data_sertifikat') ?>">Detail...</a></h6>
            </span>
        </div>
    </div>
    <div class="col-md card23">
        <div class="col">
            <span style="font-size: 48px; color: Dodgerblue;">
                <i class="fas fa-check"></i>
                <p class="float-right"><?php echo $jml_pemberi; ?></p>
                <hr>
                <h6 class="float-right"><a href="<?php echo base_url('data_pemberi') ?>">Detail...</a></h6>
            </span>
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