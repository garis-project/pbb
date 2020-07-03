
<div class="login-box">
  <div class="login-logo">
    <b>Administrator</b><br>
    Desa Sindangsari
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login</p>
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?= form_error('password','<small class="text-danger pl-3">', '</small>'); ?>
        </div>
         <div class="input-group mb-3">
          <input type="password" class="form-control" id="accesscode" name="accesscode" placeholder="Access Code">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <?= form_error('accesscode','<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?= base_url('auth/forgot_admin'); ?>">Lupa Password</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

