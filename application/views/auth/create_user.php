<div class="row">
      <div class="col-xs-12 col-md-6">
            <div class="box">
                  <div class="box-header">
                        <h3 class="box-title"><?php echo lang('create_user_heading'); ?></h3>
                        <div class="box-tools pull-right">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                                    <i class="fa fa-refresh"></i></button>
                        </div>
                  </div>


                  <!-- /.box-header -->
                  <div class="box-body">
                        <p><?php echo lang('create_user_subheading'); ?></p>
                        <?php
                        if ($message != "") {
                        ?>
                              <div id="infoMessage" class="callout callout-danger"><?php echo $message; ?></div>
                        <?php } ?>
                        <?php echo form_open("auth/create_user"); ?>

                        <p>
                              <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                              <?php echo form_input($first_name); ?>
                        </p>

                        <p>
                              <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                              <?php echo form_input($last_name); ?>
                        </p>

                        <?php
                        if ($identity_column !== 'email') {
                              echo '<p>';
                              echo lang('create_user_identity_label', 'identity');
                              echo '<br />';
                              echo form_error('identity');
                              echo form_input($identity);
                              echo '</p>';
                        }
                        ?>

                        <p>
                              <?php echo lang('create_user_email_label', 'email'); ?> <br />
                              <?php echo form_input($email); ?>
                        </p>

                        <p>
                              <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                              <?php echo form_input($phone); ?>
                        </p>
                        <!-- <p>
                    <?php echo lang('create_user_nik_label', 'nik'); ?> <br />
                    <?php echo form_input($nik); ?>
                  </p> -->
                        <!-- <p>
          <?php echo lang('create_user_jabatan_label', 'jabatan'); ?> <br />
          <?php echo form_input($jabatan); ?>
        </p> -->

                        <p>
                              <?php echo lang('create_user_password_label', 'password'); ?> <br />
                              <?php echo form_input($password); ?>
                        </p>

                        <p>
                              <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                              <?php echo form_input($password_confirm); ?>
                        </p>

                        <p>
                              <?php if ($this->ion_auth->is_admin()) : ?>
                        <div class="form-group">
                              <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                              <?php foreach ($groups as $group) : ?>
                                    <div class="checkbox">
                                          <label class="col-md-3">
                                                <?php
                                                $gID = $group['id'];
                                                $checked = null;
                                                $item = null;
                                                ?>
                                                <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo $checked; ?>>
                                                <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                          </label>
                                    </div>
                              <?php endforeach ?>
                        </div>
                  <?php endif ?>
                  </p>
                  <p></p>
                  <p style="margin-top:100px;"><?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn bg-purple"'); ?></p>

                  <?php echo form_close(); ?>

                  </div>
            </div>
      </div>
</div>