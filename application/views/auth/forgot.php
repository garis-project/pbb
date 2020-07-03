
<div class="login-box">
  <div class="login-logo">
    <b>Wajib Pajak</b><br>
    Desa Sindangsari
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="<?= base_url('auth/forgot'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Wajib Pajak">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          <a href="<?= base_url('auth/wp'); ?>">Login</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" onclick="success_wa()">Notify WA</button>
          </div>
          <!-- /.col -->
        </div>
      </form>     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

