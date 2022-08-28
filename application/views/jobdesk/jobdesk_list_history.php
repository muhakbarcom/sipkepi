<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">History Pengumpulan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('jobdesk/jobdesk_history'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('jobdesk/jobdesk_history'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?= site_url('jobdesk/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <?php if ($this->ion_auth->is_admin()) { ?><th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
                            <?php } ?><th>No</th>
                            <th>Nama Jobdesk</th>
                            <?php if ($this->ion_auth->in_group("Human Resource")) { ?>
                                <th>Nama Pegawai</th>
                            <?php } ?>
                            <th>Tanggal Pengumpulan</th>
                            <th>File Jobdesk</th>
                            <th>Komentar</th>
                            <th>Action</th>
                        </tr><?php
                                foreach ($jobdesk_data as $jobdesk) {
                                ?>
                            <tr>
                                <?php if ($this->ion_auth->is_admin()) { ?>
                                    <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $jobdesk->id_jobdesk; ?>" />&nbsp;</td>
                                <?php } ?>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $jobdesk->nama_jobdesk ?></td>
                                <?php if ($this->ion_auth->in_group("Human Resource")) { ?>
                                    <td><?php echo cek_nama($jobdesk->id_pegawai) ?></td>
                                <?php } ?>
                                <td><?php echo $jobdesk->tanggal_pengumpulan ?></td>
                                <td> <a href="<?= base_url('assets\uploads\files\jobdesk/' . $jobdesk->file); ?>"><?php echo $jobdesk->file ?></a>
                                </td>
                                <td><?php echo $jobdesk->komentar ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('jobdesk/read_history/' . $jobdesk->id), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"');
                                    echo ' ';

                                    ?>
                                </td>
                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <?php if ($this->ion_auth->is_admin()) { ?>
                                <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data Terpilih</button>
                            <?php } ?>
                            <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
    $(':checkbox[name=selectall]').click(function() {
        $(':checkbox[name=id]').prop('checked', this.checked);
    });

    $("#formbulk").on("submit", function() {
        var rowsel = [];
        $.each($("input[name='id']:checked"), function() {
            rowsel.push($(this).val());
        });
        if (rowsel.join(",") == "") {
            alertify.alert('', 'Tidak ada data terpilih!', function() {});

        } else {
            var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                ok: 'Yakin',
                cancel: 'Batal!'
            }).set('onok', function(closeEvent) {

                $.ajax({
                    url: "jobdesk/deletebulk",
                    type: "post",
                    data: "msg = " + rowsel.join(","),
                    success: function(response) {
                        if (response == true) {
                            location.reload();
                        }
                        //console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            $(".ajs-header").html("Konfirmasi");
        }
        return false;
    });
</script>