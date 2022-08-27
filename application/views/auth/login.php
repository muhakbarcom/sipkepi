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
          <div class="card pt-4">
            <div class="card-body">
              <div class="text-center mb-5">
                <img src="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>" height="48" class='mb-4'>
                <h3><?= "{$setting_aplikasi->nama}"; ?></h3>
                <p>Please sign in to continue to <?= "{$setting_aplikasi->nama}"; ?>.</p>
              </div>
              <?php echo $message; ?>
              <?= $this->session->flashdata('success'); ?>
              <?php echo form_open("auth/login"); ?>
              <div class="form-group position-relative has-icon-left">
                <label for="identity">Email</label>
                <div class="position-relative">
                  <input type="text" class="form-control" id="identity" name="identity">
                  <div class="form-control-icon">
                    <i data-feather="user"></i>
                  </div>
                </div>
              </div>
              <div class="form-group position-relative has-icon-left">
                <div class="clearfix">
                  <label for="password">Password</label>
                </div>
                <div class="position-relative">
                  <input type="password" class="form-control" id="password" name="password">
                  <div class="form-control-icon">
                    <i data-feather="lock"></i>
                  </div>
                </div>
              </div>

              <div class="clearfix mt-4">
                <button class="btn btn-secondary float-right" type="submit">Login</button>
              </div>
              <?php echo form_close(); ?>
              <!-- <div class="row"><a href="<?= base_url('auth/register_user'); ?>">Daftar Sekarang</a></div> -->
              <!-- <div class="divider">
                <div class="divider-text">OR</div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <button class="btn btn-block mb-2 btn-primary"><i data-feather="facebook"></i> Facebook</button>
                </div>
                <div class="col-sm-6">
                  <button class="btn btn-block mb-2 btn-secondary"><i data-feather="github"></i> Github</button>
                </div> -->
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