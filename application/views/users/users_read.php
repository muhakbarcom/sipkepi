<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Users Detail</h3>
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
                        <td>Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td><?php echo $first_name; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td><?php echo $last_name; ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $phone; ?></td>
                    </tr>
                    <tr>
                        <td>image</td>
                        <td><img src="<?= base_url('/assets/uploads/image/profile/' . $image); ?>" alt="" width="150px"></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('users') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>