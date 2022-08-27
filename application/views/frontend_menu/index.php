<div class="row">

  <div class="col-sm-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Menu</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
      </div><!-- /.box-header -->
      <div class="box-body">
        <?php echo form_open('cms/update_menu') ?>
        <div class="form-group">
          <a href="<?php echo site_url('menu/create') ?>" class="btn btn-primary bg-purple"><i class="fa fa-plus-circle"></i> Add Menu</a>
          <button type="submit" id="saveMenu" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save</button>
        </div>
        <div id="sideMenu" class="dd">
          <?php echo $admin_menu ?>
        </div>
        <input type="hidden" name="type" value="<?php echo $this->uri->segment(3) ?>">
        <textarea name="json_menu" hidden id="tampilJsonSideMenu"></textarea>
        <?php echo form_close() ?>
      </div><!-- /.box-body -->
    </div>
  </div>
</div>
<script>
  $(function() {
    $('#navMenu').addClass('active');
    $('#sideMenu').nestable();
    $('#tampilJsonSideMenu').html(window.JSON.stringify($('#sideMenu').nestable('serialize')));
    $('#sideMenu').on('change', function() {
      $('#tampilJsonSideMenu').val(window.JSON.stringify($('#sideMenu').nestable('serialize')));
    });
  });

  function confirmdelete(linkdelete) {
    alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
      location.href = "<?= base_url(); ?>/" + linkdelete;
    }, function() {
      alertify.error("Penghapusan data dibatalkan.");
    });
    $(".ajs-header").html("Konfirmasi");
    return false;
  }
</script>