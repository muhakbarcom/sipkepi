<!-- Default box -->
<div class="row">

      <!--  box edit-->
      <div class="col-md-6 col-xs-12">
            <div class="box box-primary">
                  <!-- flashdata -->

                  <div class="box-header with-border">
                        <h3 class="box-title">Edit Profil</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="box-body">
                        <h1><?php echo lang('change_password_heading'); ?></h1>

                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open("auth/change_password"); ?>

                        <p>
                              <?php echo lang('change_password_old_password_label', 'old_password'); ?> <br />
                              <?php echo form_input($old_password); ?>
                        </p>

                        <p>
                              <label for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length); ?></label> <br />
                              <?php echo form_input($new_password); ?>
                        </p>

                        <p>
                              <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm'); ?> <br />
                              <?php echo form_input($new_password_confirm); ?>
                        </p>

                        <?php echo form_input($user_id); ?>
                        <p>
                              <button type="submit" class="btn btn-primary">Change Password</button>
                        </p>

                        <?php echo form_close(); ?>
                  </div>
                  <!-- /.box-body -->
            </div>
            <!-- /.box -->
      </div>
      <!-- /.box -->
</div>