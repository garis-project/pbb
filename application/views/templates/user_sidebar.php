
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets/'); ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">PBB SINDANGSARI</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/'); ?>dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= "Wajib Pajak"; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('user'); ?>" class="nav-link <?php if(($this->uri->segment(1)=='user')&&(empty($this->uri->segment(2)))){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
  
          <li class="nav-item has-treeview">
            <a href="<?= base_url('user/pembayaran'); ?>" class="nav-link <?php if(($this->uri->segment(1)=='user')&&($this->uri->segment(2)=='pembayaran')){echo 'active';} ?>">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Pembayaran
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('user/mutasi'); ?>" class="nav-link <?php if(($this->uri->segment(1)=='user')&&($this->uri->segment(2)=='mutasi')){echo 'active';} ?>">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Mutasi
              </p>
            </a>
            
          </li>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>