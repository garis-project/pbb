
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge"><?= $proses['jml']+$validasi['jml']; ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header"><?= $proses['jml']+$validasi['jml']; ?> Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="" class="dropdown-item">
          <i class="fas fa-calendar-check mr-2"></i><?= $proses['jml']; ?> Menunggu Pembayaran
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('pembayaran'); ?>" class="dropdown-item">
          <i class="fas fa-calendar-check mr-2"></i><?= $validasi['jml']; ?> Menunggu Validasi
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
        <span class="badge badge-info navbar-badge"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <?php $info= $this->kriptografi->deskripsi($user['data_admin'],$kunci);?>
        <span class="dropdown-item dropdown-header"><?= $info; ?></span>
        <div class="dropdown-divider"></div>
        <a href="" class="dropdown-item"  data-toggle="modal" data-target="#changePasswordModal"> 
          <i class="fas fa-key mr-2"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?= base_url('auth/logout') ?>" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
      </div>
    </li>
  </ul>
</nav>
  <!-- /.navbar -->