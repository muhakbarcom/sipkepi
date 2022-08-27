<!DOCTYPE html>
<html lang="en">
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">

      <link rel="shortcut icon" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" type="image/x-icon">
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/app.css">
      <!-- akbr custom -->
      <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">
</head>
<div id="auth">

      <div class="container">
            <div class="row">
                  <div class="col-md-5 col-sm-12 mx-auto">
                        <div class="card pt-4">
                              <div class="card-body">
                                    <div class="text-center mb-5">
                                          <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" height="48" class='mb-4'>
                                          <h3><?= "{$setting_aplikasi->nama}"; ?></h3>
                                          <p>Silahkan Daftar untuk membuat akun di <?= "{$setting_aplikasi->nama}"; ?>.</p>
                                    </div>
                                    <p><?php echo lang('create_user_subheading'); ?></p>
                                    <?php
                                    if ($message != "") {
                                    ?>
                                          <div id="infoMessage" class="callout callout-danger"><?php echo $message; ?></div>
                                    <?php } ?>
                                    <?php echo form_open("auth/register_user"); ?>

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
                                    <!-- <p>
                                          <?php echo lang('create_user_company_label', 'company'); ?> <br />
                                          <?php echo form_input($company); ?>
                                    </p> -->


                                    <!-- <p>
                                          <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                                          <?php echo form_input($phone); ?>
                                    </p> -->

                                    <p>
                                          <?php echo lang('create_user_password_label', 'password'); ?> <br />
                                          <?php echo form_input($password); ?>
                                    </p>

                                    <p>
                                          <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                                          <?php echo form_input($password_confirm); ?>
                                    </p>


                                    <!-- <p><?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn bg-blue"'); ?></p> -->
                                    <div class="clearfix">
                                          <button class="btn btn-primary float-right" type="submit">Daftar</button>
                                    </div>
                                    <?php echo form_close(); ?>

                                    <div class="row"><a href="<?= base_url(); ?>">Kembali</a></div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
</div>

</div>
<script src="<?= base_url(); ?>assets/js/feather-icons/feather.min.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>

<script src="<?= base_url(); ?>assets/js/main.js"></script>
<script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>

<script>
      // sweetallert
      <?php
      if (isset($this->session->success)) { ?>
            alertify.set('notifier', 'position', 'center');
            Swal.fire(
                  'Good Job!',
                  '<?= $this->session->success; ?>',
                  'success'
            )

      <?php } elseif (isset($this->session->error)) { ?>
            alertify.set('notifier', 'position', 'center');
            Swal.fire(
                  'Oopss!',
                  '<?= $this->session->error; ?>',
                  'error'
            )
      <?php } ?>
</script>
</body>

</html>