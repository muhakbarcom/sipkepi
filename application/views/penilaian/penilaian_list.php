<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Penilaian</h3>
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
                        <?php if (!$this->ion_auth->in_group("Pegawai")) { ?>
                            <?php echo anchor(site_url('penilaian/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <?php echo anchor(site_url('penilaian/printdoc'), '<i class="fa fa-print"></i> Print Preview', 'class="btn bg-maroon"'); ?><form action="<?php echo site_url('penilaian/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('penilaian'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?= site_url('penilaian/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <?php if (!$this->ion_auth->in_group("Pegawai")) { ?>
                                <th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
                            <?php } ?>
                            <th>No</th>
                            <th>Jobdesk</th>
                            <th>Nilai</th>
                            <th>Tanggal Penilaian</th>
                            <th>Action</th>
                        </tr><?php
                                foreach ($penilaian_data as $penilaian) {
                                ?>
                            <tr>
                                <?php if (!$this->ion_auth->in_group("Pegawai")) { ?>
                                    <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $penilaian->id_penilaian; ?>" />&nbsp;</td>
                                <?php } ?>
                                <td width="80px"><?php echo ++$start ?></td>
                                <?php
                                    $nama_jobdesk = $this->db->query("SELECT * FROM jobdesk where id_jobdesk=$penilaian->id_jobdesk")->row();
                                ?>
                                <td><?php echo $nama_jobdesk->nama_jobdesk; ?></td>
                                <td><?php echo $penilaian->nilai ?></td>
                                <td><?php echo $penilaian->tanggal_penilaian ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('penilaian/read/' . $penilaian->id_penilaian), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"');
                                    echo ' ';
                                    if (!$this->ion_auth->in_group("Pegawai")) {
                                        echo anchor(site_url('penilaian/update/' . $penilaian->id_penilaian), ' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"');
                                        echo ' ';
                                        echo anchor(site_url('penilaian/delete/' . $penilaian->id_penilaian), ' <i class="fa fa-trash"></i>', 'class="btn btn-xs btn-danger" onclick="javasciprt: return confirmdelete(\'penilaian/delete/' . $penilaian->id_penilaian . '\')"  data-toggle="tooltip" title="Delete" ');
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <?php if (!$this->ion_auth->in_group("Pegawai")) { ?>
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
                    url: "penilaian/deletebulk",
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