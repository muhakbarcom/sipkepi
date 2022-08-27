<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Penilaian Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Id Jobdesk</td>
                        <td><?php echo $id_jobdesk; ?></td>
                    </tr>
                    <tr>
                        <td>Nilai</td>
                        <td><?php echo $nilai; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Penilaian</td>
                        <td><?php echo $tanggal_penilaian; ?></td>
                    </tr>
                    <?php
                    $datax = $this->db->query("SELECT concat(u.first_name,' ',u.last_name) as name from jobdesk_pegawai jp join users u on (jp.id_user=u.id) where jp.id_jobdesk=$id_jobdesk")->result();
                    ?>
                    <tr>
                        <td>Pegawai</td>
                        <td>
                            <?php
                            foreach ($datax as $value) :
                            ?>
                                <li><?= $value->name ?></li>
                            <?php endforeach ?>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('penilaian') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>