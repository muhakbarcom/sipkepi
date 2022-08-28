<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Jobdesk Detail</h3>
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
                        <td>Nama Jobdesk</td>
                        <td><?php echo $nama_jobdesk; ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo cek_status($status); ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Dibuat</td>
                        <td><?php echo $tanggal_dibuat; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td><?php echo $tanggal_selesai; ?></td>
                    </tr>
                    <tr>
                        <td>Pegawai</td>
                        <td>
                            <?php foreach ($pegawai as $key => $value) {
                                $nama = $this->db->query("SELECT first_name,last_name from users where id=$value->id_user")->row();
                                echo "<li>" . $nama->first_name . " " . $nama->last_name . "</li>";
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Masa Tenggat</td>
                        <td><?php echo $masa_tenggat; ?></td>
                    </tr>

                    <td>
                        File Jobdesk
                    </td>
                    <td>
                        <a href="<?php echo base_url('assets/uploads/files/jobdesk/' . $file); ?>"><?php echo $file ?> </a>
                    </td>
                    </tr>
                    <tr>
                        <?php if ($this->ion_auth->in_group("Pegawai")) { ?>
                            <td><a href="<?php echo site_url('jobdesk/jobdesk_history') ?>" class="btn bg-purple">Cancel</a></td>
                        <?php } else { ?>
                            <td><a href="<?php echo site_url('jobdesk/jobdesk_history') ?>" class="btn bg-purple">Cancel</a></td>

                        <?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php if ($file) : ?>
        <div class="col-xs-12 col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Komentar Jobdesk</h3>
                </div>
                <div class="box-body">
                    <?php if ($komentar) : ?>
                        <p><?php echo $komentar ?></p>
                    <?php else : ?>
                        <?php if ($this->ion_auth->in_group("Human Resource")) : ?>
                            <form action="<?php echo base_url('jobdesk/komentar') ?>" method="post">
                                <textarea class="form-control" name="komentar" id="komentar" cols="30" rows="10" required></textarea><br>
                                <input type="hidden" value="<?= $id_jobdesk ?>" name="id_jobdesk">
                                <input type="hidden" value="<?= $id_history_pengumpulan ?>" name="id_history_pengumpulan">
                                <button class="btn btn-primary pull-right" type="submit">Submit</button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
</div>