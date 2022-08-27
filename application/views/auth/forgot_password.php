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

<body>
  <div id="auth">

    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
          <div class="card py-4">
            <div class="card-body">
              <div class="text-center mb-5">
                <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" height="48" class='mb-4'>
                <h3><?= "{$title}"; ?></h3>
                <p>Please enter your email to receive password reset link.</p>
              </div>
              <?php echo form_open("auth/forgot_password"); ?>
              <div class="form-group">
                <label for="identity">Email</label>
                <input type="email" id="identity" class="form-control" name="identity">
              </div>

              <div class="clearfix">
                <button class="btn btn-primary float-right">Submit</button>
              </div>
              <div class="clearfix">
                <a href="login">Login Page</a>
              </div>



              <?php echo form_close(); ?>
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