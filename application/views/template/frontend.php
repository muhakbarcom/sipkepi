<!DOCTYPE html>
<html>
<?php
$setting_aplikasi = $this->db->get('setting')->row();
?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= "{$setting_aplikasi->nama}"; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/scss/main.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/scss/skin.css">
  <!-- logo website -->
  <link rel="icon" type="image/png" href="<?= base_url('assets/uploads/image/logo/') . $setting_aplikasi->kode; ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/script/index.js"></script>
</head>

<body id="wrapper">

  <section id="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 top-header-links">
          <ul class="contact_links">
            <li><i class="fa fa-phone"></i><a href="#">+91 848 594 5080</a></li>
            <li><i class="fa fa-envelope"></i><a href="#">sales@aspiresoftware.in</a></li>
          </ul>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
          <ul class="social_links">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#"><i class="fa fa-skype"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>

  </section>

  <header>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url() ?>">
            <h1>AKBR 4 U</h1><span><?= "{$setting_aplikasi->nama}"; ?></span>
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse navbar-right">
          <ul class="nav navbar-nav">
            <?php $fmenus = $this->layout->get_frontend_menu() ?>
            <?php
            foreach ($fmenus as $fm) {
              if ($fm['label'] == $title) {
                $active = 'active';
              } else {
                $active = '';
              };
              if ($fm['label'] == 'Sign in') {
                if (!$this->ion_auth->logged_in()) {
                  // redirect them to the login page
                  $signin = 'Sign In';
                  $signin_url = 'login';
                  echo '<li class="' . $active . '"><a href="' . site_url('/') . $signin_url . '"> ' . $signin . ' </a>';
                } else {
                  $signin = 'Dashboard';
                  $signin_url = 'dashboard';
                  echo '<li class="' . $active . '"><a href="' . site_url('/') . $signin_url . '"> ' . $signin . ' </a>';
                }
              } else {
                echo '<li class="' . $active . '"><a href="' . site_url('/') . $fm['link'] . '"> ' . $fm["label"] . ' </a>';
              }
            }

            ?>


          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </header>
  <!--/.nav-ends -->

  <!-- content -->
  <section class="content">
    <?php $this->load->view($page); ?>
  </section>
  <!-- end of content -->
  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 block">
          <div class="footer-block">
            <h4>Address</h4>
            <hr />
            <p>Lorem ipsum dolor sit amet sit legimus copiosae instructior ei ut vix denique fierentis ea saperet inimicu ut qui dolor oratio mnesarchum.
            </p>
            <a href="#" class="learnmore">Learn More <i class="fa fa-caret-right"></i></a>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 block">
          <div class="footer-block">
            <h4>Useful Links</h4>
            <hr />
            <ul class="footer-links">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Portfolio</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Sign In</a></li>
              <li><a href="#">Sign Up</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 block">
          <div class="footer-block">
            <h4>Community</h4>
            <hr />
            <ul class="footer-links">
              <li><a href="#">Blog</a></li>
              <li><a href="#">Forum</a></li>
              <li><a href="#">Free Goods</a></li>
            </ul>
          </div>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-12 <block></block>">
          <div class="footer-block">
            <h4>Recent Posts</h4>
            <hr />
            <ul class="footer-links">
              <li>
                <a href="#" class="post">Lorem ipsum dolor sit amet</a>
                <p class="post-date">May 25, 2017</p>
              </li>
              <li>
                <a href="#" class="post">Lorem ipsum dolor sit amet</a>
                <p class="post-date">May 25, 2017</p>
              </li>
              <li>
                <a href="#" class="post">Lorem ipsum dolor sit amet</a>
                <p class="post-date">May 25, 2017</p>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </div>


  </section>

  <section id="bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 btm-footer-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Use</a>
        </div>
        <!-- <div class="col-md-6 col-sm-6 col-xs-12 copyright">
          Developed by <a href="www.muhakbar.com">Muhammad Akbar</a>
        </div> -->
        <!-- copyright -->
        <script type="text/javascript">
          <!-- 
          eval(unescape('%66%75%6e%63%74%69%6f%6e%20%75%31%36%35%33%32%33%28%73%29%20%7b%0a%09%76%61%72%20%72%20%3d%20%22%22%3b%0a%09%76%61%72%20%74%6d%70%20%3d%20%73%2e%73%70%6c%69%74%28%22%37%39%35%34%38%36%37%22%29%3b%0a%09%73%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%30%5d%29%3b%0a%09%6b%20%3d%20%75%6e%65%73%63%61%70%65%28%74%6d%70%5b%31%5d%20%2b%20%22%38%35%34%39%39%31%22%29%3b%0a%09%66%6f%72%28%20%76%61%72%20%69%20%3d%20%30%3b%20%69%20%3c%20%73%2e%6c%65%6e%67%74%68%3b%20%69%2b%2b%29%20%7b%0a%09%09%72%20%2b%3d%20%53%74%72%69%6e%67%2e%66%72%6f%6d%43%68%61%72%43%6f%64%65%28%28%70%61%72%73%65%49%6e%74%28%6b%2e%63%68%61%72%41%74%28%69%25%6b%2e%6c%65%6e%67%74%68%29%29%5e%73%2e%63%68%61%72%43%6f%64%65%41%74%28%69%29%29%2b%2d%32%29%3b%0a%09%7d%0a%09%72%65%74%75%72%6e%20%72%3b%0a%7d%0a'));
          eval(unescape('%64%6f%63%75%6d%65%6e%74%2e%77%72%69%74%65%28%75%31%36%35%33%32%33%28%27') + '%3d%60%6b%7a%2b%6d%6e%6b%70%71%36%2d%64%72%68%2f%6d%6f%27%38%2a%60%75%67%26%74%6c%29%38%20%6c%79%6e%27%7f%71%26%3a%35%21%63%71%70%72%7c%6b%61%6f%72%2d%49%0e%0f%24%22%20%2b%2a%22%2a%27%26%2b%4f%66%7b%61%6e%73%7b%6f%66%2a%61%7f%2b%37%62%21%6c%74%65%61%37%24%71%7c%7d%39%66%76%69%65%6d%66%6a%7c%30%6d%74%6b%2d%49%4e%74%6c%63%6d%66%6b%66%2a%46%69%6d%6a%75%3d%37%63%42%06%04%22%2a%27%26%2b%2b%23%21%38%31%64%62%70%407954867%33%36%30%32%39%38%30' + unescape('%27%29%29%3b'));
          // 
          -->
        </script>
        <noscript><i>Javascript required</i></noscript>
      </div>
    </div>
  </section>

  <div id="panel">
    <div id="panel-admin">
      <div class="panel-admin-box">
        <div id="tootlbar_colors">
          <button class="color" style="background-color:#1abac8;" onclick="mytheme(0)"></button>
          <button class="color" style="background-color:#ff8a00;" onclick="mytheme(1)"> </button>
          <button class="color" style="background-color:#b4de50;" onclick="mytheme(2)"> </button>
          <button class="color" style="background-color:#e54e53;" onclick="mytheme(3)"> </button>
          <button class="color" style="background-color:#1abc9c;" onclick="mytheme(4)"> </button>
          <button class="color" style="background-color:#159eee;" onclick="mytheme(5)"> </button>
        </div>
      </div>

    </div>
    <a class="open" href="#"><span><i class="fa fa-gear fa-spin"></i></span></a>
  </div>

</html>