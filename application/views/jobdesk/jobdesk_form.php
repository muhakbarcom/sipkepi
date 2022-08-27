<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Jobdesk</h3>
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
                    <div class="form-group">
                        <label for="varchar">Nama Jobdesk <?php echo form_error('nama_jobdesk') ?></label>
                        <input type="text" class="form-control" name="nama_jobdesk" id="nama_jobdesk" placeholder="Nama Jobdesk" value="<?php echo $nama_jobdesk; ?>" />
                    </div>
                    <!-- <div class="form-group">
                        <label for="int">Status <?php echo form_error('status') ?></label>
                        <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="date">Tanggal Dibuat <?php echo form_error('tanggal_dibuat') ?></label>
                        <input type="text" class="form-control formdate" name="tanggal_dibuat" id="tanggal_dibuat" placeholder="Tanggal Dibuat" value="<?php echo $tanggal_dibuat; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="date">Tanggal Selesai <?php echo form_error('tanggal_selesai') ?></label>
                        <input type="text" class="form-control formdate" name="tanggal_selesai" id="tanggal_selesai" placeholder="Tanggal Selesai" value="<?php echo $tanggal_selesai; ?>" />
                    </div> -->
                    <div class="form-group">
                        <label for="date">Pegawai<sup>*</sup> <?php echo form_error('tanggal') ?></label>
                        <select class="form-control select2" required="true" name="pegawai[]" multiple="multiple">
                            <?php
                            if (isset($pegawai)) : //jika ada pegawai alias update d
                            ?>
                                <?php foreach ($pegawai as $pegawai) : ?> //looping pegawai
                                    <option value="<?php echo $pegawai->id_user ?>" selected><?php echo cek_nama($pegawai->id_user) ?> </option>
                                <?php endforeach ?>
                                <?php foreach ($list_user as $lu) : ?>

                                    <?php $user_groups = $this->ion_auth->get_users_groups($lu->id)->row();
                                    if ($user_groups->id === '2') {
                                    ?>
                                        <option value="<?php echo $lu->id ?>"><?php echo $lu->first_name ?> <?php echo $lu->last_name; ?></option>
                                    <?php } ?>
                                <?php endforeach ?>
                            <?php else : ?> // jika create
                                <?php foreach ($list_user as $lu) : ?>
                                    <?php $user_groups = $this->ion_auth->get_users_groups($lu->id)->row();
                                    if ($user_groups->id === '2') {
                                    ?>
                                        <option value="<?php echo $lu->id ?>"><?php echo $lu->first_name ?> <?php echo $lu->last_name; ?></option>
                                    <?php } ?> <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date">Masa Tenggat <?php echo form_error('masa_tenggat') ?></label>
                        <input type="text" class="form-control formdate" name="masa_tenggat" id="masa_tenggat" placeholder="Masa Tenggat" value="<?php echo $masa_tenggat; ?>" />
                    </div>
                    <input type="hidden" name="id_jobdesk" value="<?php echo $id_jobdesk; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('jobdesk') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>