<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?php echo form_open_multipart('setting'); ?>

      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama Aplikasi</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama" name="nama" value="<?= $s_aplikasi->nama; ?>">
          <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>

      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nilai" name="nilai" value="<?= $s_aplikasi->nilai; ?>">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-2">
          Logo Aplikasi
        </div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url('assets/uploads/image/logo/') . $s_aplikasi->kode; ?>" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="kode" name="kode">
                <label class="custom-file-label" for="image">Choose file</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row justify-content-end">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary float-right">Save Changes</button>
        </div>
      </div>

      </form>
    </div>
  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->