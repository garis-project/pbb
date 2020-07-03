
<div class="login-box">
  <div class="login-logo">
    <b>Administrator</b><br>
    Desa Sindangsari
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="<?= base_url('auth/forgot_admin'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama Admin">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
          <a href="<?= base_url('auth'); ?>">Login</a>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block" onclick="load_email()">Send Email</button>
          </div>
          <!-- /.col -->
        </div>
      </form>     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

