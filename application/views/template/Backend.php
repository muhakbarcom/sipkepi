<!DOCTYPE html>
<html>
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= "{$title} - {$setting_aplikasi->nama}"; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- logo website -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/fontawesome/css/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables/dataTables.checkboxes.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">

  <!-- akbr custom -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/akbr_custom.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/select2/dist/css/select2-spn.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/skin-custom.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/pace/pace.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/alertify/css/alertify.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-select/css/bootstrap-select.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/tamacms/custom.css">
  <!-- jQuery 3 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/PACE/pace.min.js"></script>
  <!-- CSS Datepicker -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datetimepicker.min.css"><!-- Datepicker -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/bootstrap-datetimepicker.id.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>

  <!-- AdminLTE App -->
  <!-- DataTables -->
  <script src="<?= base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/datatables/dataTables.checkboxes.js"></script>
  <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/jquery-nestable/jquery.nestable.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/alertify/alertify.js"></script>
  <script src="<?= base_url(); ?>assets/plugins/bootstrap-show-password/bootstrap-show-password.min.js"></script>
  <!-- Select2 -->
  <script src="<?= base_url(); ?>assets/bower_components/bootstrap-select/js/bootstrap-select.js"></script>
  <script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>

  <!-- mask -->
  <script src="<?= base_url(); ?>assets/dist/js/jquery.mask.min.js"></script>
  <style type="text/css">
    .pagination>li>a,
    .pagination>li>span {
      padding: 3px 10px !important;
    }
  </style>
</head>

<body class="sidebar-mini hold-transition fixed skin-blue sidebar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><?= $this->config->item('sitename_mini') ?></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?= $this->config->item('sitename') . "{$setting_aplikasi->nama}" ?></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php
            $user = $this->ion_auth->user()->row();
            ?>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/uploads/image/profile/') . $user->image; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= "{$user->first_name} {$user->last_name}"; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url('assets/uploads/image/profile/') . $user->image; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?= "{$user->first_name} {$user->last_name}"; ?>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url(); ?>profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url(); ?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?= base_url('assets/uploads/image/profile/') . $user->image; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $user->first_name; ?>&nbsp;<?= $user->last_name; ?></p>
            <p style="font-size: 10px; font-weight: none;word-wrap: break-word" ;>
              <?php
              echo $user->email;

              ?>
            </p>
          </div>
        </div>
        <!-- search form -->
        <form method="get" class="sidebar-form" id="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu list" id="menuList">
        </ul>
        <ul class="sidebar-menu list" id="menuSub">
          <?php $menus = $this->layout->get_menu() ?>
          <?php foreach ($menus as $menu) : ?>
            <li class="header"><?php echo $menu['label'] ?></li>
            <?php if (is_array($menu['children'])) : ?>
              <?php foreach ($menu['children'] as $menu2) : ?>
                <?php if ($title == $menu2['label']) : ?>
                  <li <?php echo $menu2['attr'] != '' ? ' id="' . $menu2['attr'] . '" ' : '' ?> <?php echo is_array($menu2['children']) ? ' class="treeview active" ' : '' ?>>
                  <?php else : ?>
                  <li <?php echo $menu2['attr'] != '' ? ' id="' . $menu2['attr'] . '" ' : '' ?> <?php echo is_array($menu2['children']) ? ' class="treeview" ' : '' ?>>
                  <?php endif ?>
                  <?php if (is_array($menu2['children'])) : ?>
                    <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                      <i class="<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?></span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                      <?php foreach ($menu2['children'] as $menu3) : ?>
                        <?php if (is_array($menu3['children'])) : ?>
                          <?php if ($title  and $subtitle == $menu3['label']) : ?>
                            <li <?php echo $menu3['attr'] != '' ? ' id="' . $menu3['attr'] . '" ' : '' ?> class="active">
                            <?php else : ?>
                            <li <?php echo $menu3['attr'] != '' ? ' id="' . $menu3['attr'] . '" ' : '' ?>>
                            <?php endif ?>
                            <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
                              <i class="<?php echo $menu3['icon'] ?>"></i> <span><?php echo $menu3['label'] ?></span>
                              <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            </li>
                            <ul class="treeview-menu">
                              <?php foreach ($menu3['children'] as $menu4) : ?>
                                <?php if ($title and $subtitle  == $menu4['label']) : ?>
                                  <li <?php echo $menu4['attr'] != '' ? ' id="' . $menu4['attr'] . '" ' : '' ?>>
                                  <?php else : ?>
                                  <li <?php echo $menu4['attr'] != '' ? ' id="' . $menu4['attr'] . '" ' : '' ?>>
                                  <?php endif ?>
                                  <a href="<?php echo $menu4['link'] != '#' ? base_url($menu4['link']) : '#' ?>" class="name">
                                    <i class="<?php echo $menu4['icon'] ?>"></i> <span><?php echo $menu4['label'] ?></span>
                                  </a>
                                  </li>
                                <?php endforeach ?>
                            </ul>
                          <?php else : ?>
                            <?php if ($subtitle == $menu3['label']) : ?>
                              <li class="active">
                              <?php else : ?>
                              <li>
                              <?php endif ?>
                              <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>" class="name">
                                <i class="<?php echo $menu3['icon'] ?>"></i> <span><?php echo $menu3['label'] ?></span>
                              </a>
                              </li>

                            <?php endif ?>

                          <?php endforeach ?>
                    </ul>
                  <?php else : ?>
                    <?php if ($title == $menu2['label']) : ?>
                  <li class="active">
                  <?php else : ?>
                  <li>
                  <?php endif ?>
                  <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                    <i class="<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?>
                  </a>
                  </li>
                <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>
          <?php endforeach ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $title; ?>
          <small><?= $subtitle; ?></small>
        </h1>
        <?php $this->layout->breadcrumb($crumb) ?>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php $this->load->view($page); ?>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Developed by<a href="#"> Koestiyandi Prayoga</b></a>
      </div>
      <strong>Copyright &copy; <?= date('Y'); ?> <a href="#">Sipkepi</a>.</strong> Sistem Informasi pendukung keputusan
      <!-- copyright -->
      <noscript><i>Javascript required</i></noscript>
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- sweetallert -->
  <script src="<?= base_url('/assets/dist/js/'); ?>sweetalert2.all.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script>
    $('.formdate').datepicker({
      format: "yyyy-mm-dd",
      autoclose: true,
      weekStart: 1,
      todayBtn: 1,
      // autoclose: 1,
      todayHighlight: 1,
      startView: 0,
      forceParse: 0,
      showMeridian: 1
    });
    $(document).ready(function() {
      $('.sidebar-menu').tree()
    })
    $(function() {
      $('.select2').select2();
      $('#sidebar-form').on('submit', function(e) {
        e.preventDefault();
      });
      $('.rupiah').mask('000.000.000.000', {
        reverse: true
      });
      $('.sidebar-menu li.active').data('lte.pushmenu.active', true);
      $('#search-input').on('keyup', function() {
        var term = $('#search-input').val().trim();
        if (term.length === 0) {
          $('.sidebar-menu li').each(function() {
            $(this).show(0);
            $(this).removeClass('active');
            if ($(this).data('lte.pushmenu.active')) {
              $(this).addClass('active');
            }
          });
          return;
        }
        $('.sidebar-menu li').each(function() {
          if ($(this).text().toLowerCase().indexOf(term.toLowerCase()) === -1) {
            $(this).hide(0);
            $(this).removeClass('pushmenu-search-found', false);
            if ($(this).is('.treeview')) {
              $(this).removeClass('active');
            }
          } else {
            $(this).show(0);
            $(this).addClass('pushmenu-search-found');
            if ($(this).is('.treeview')) {
              $(this).addClass('active');
            }
            var parent = $(this).parents('li').first();
            if (parent.is('.treeview')) {
              parent.show(0);
            }
          }
          if ($(this).is('.header')) {
            $(this).show();
          }
        });

        $('.sidebar-menu li.pushmenu-search-found.treeview').each(function() {
          $(this).find('.pushmenu-search-found').show(0);
        });
      });
    });

    // To make Pace works on Ajax calls
    $(document).ajaxStart(function() {
      Pace.restart()
    });


    // sweetallert
    <?php
    if (isset($this->session->success)) { ?>
      alertify.set('notifier', 'position', 'center');
      Swal.fire(
        'Berhasil!',
        '<?= $this->session->success; ?>',
        'success'
      )

    <?php } elseif (isset($this->session->error)) { ?>
      alertify.set('notifier', 'position', 'center');
      Swal.fire(
        'ups!',
        '<?= $this->session->error; ?>',
        'error'
      )
    <?php } ?>

    //var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });
  </script>

</body>

</html>