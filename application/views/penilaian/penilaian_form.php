<style>
    .select2-selection__choice {
        color: #000;
    }
</style>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Penilaian</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">
                    <?php if ($button == "nilai") { ?>
                        <div class="form-group">
                            <label for="date">Jobdesk<sup>*</sup> <?php echo form_error('tanggal') ?></label>
                            <select class="select2 form-control" required="true" name="id_jobdesk" id="id_jobdesk">

                                <?php foreach ($jobdesk as $value) : ?>
                                    <?php
                                    // $cek_jobdesk = $this->db->query("SELECT * from penilaian where id_jobdesk=$value->id_jobdesk")->row();
                                    // if (!isset($cek_jobdesk)) {
                                    ?>
                                    <option value="<?= $value->id_jobdesk; ?>"><?php echo $value->nama_jobdesk; ?></option>
                                    <?php
                                    // }
                                    ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="int">Pegawai <?php echo form_error('nilai') ?></label>
                        <select class="select2 form-control" required="true" name="id_pegawai" id="id_pegawai">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="int">Nilai <?php echo form_error('nilai') ?></label>
                        <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
                    </div>
                    <input type="hidden" name="id_penilaian" value="<?php echo $id_penilaian; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('penilaian') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // #pegawai hide
    // get data get_pegawai_by_id_jobdesk when select jobdesk
    $(document).ready(function() {
        $('#id_jobdesk').change(function() {
            var id_jobdesk = $(this).val();
            $.ajax({
                url: "<?php echo base_url('penilaian/get_pegawai_by_id_jobdesk') ?>",
                method: "POST",
                data: {
                    id_jobdesk: id_jobdesk
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += "<option value=" + data[i].id_user + ">" + data[i].first_name + " " + data[i].last_name + "</option>";
                    }
                    $('#id_pegawai').html(html);
                }
            });
        });
    });
</script>