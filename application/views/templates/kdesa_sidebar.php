
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
        <img src="<?= base_url('assets/'); ?>dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $this->kriptografi->deskripsi($role['data_role'],$this->session->userdata('key')) ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="<?= base_url('kdesa'); ?>" class="nav-link <?php if($this->uri->segment(1)=='kdesa'){echo 'active';} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link <?php if($this->uri->segment(1)=='wp'){echo 'active';} ?>">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data WP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('wp');?>" class="nav-link <?php if(($this->uri->segment(1)=='wp')&&($this->uri->segment(2)==null)){echo 'active';} ?>"">
                  <i class="fas fa-eye nav-icon"></i>
                  <p>Lihat Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('wp/tambah');?>" class="nav-link <?php if(($this->uri->segment(1)=='wp')&&($this->uri->segment(2)=='tambah')){echo 'active';} ?>"">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Tambah Data</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="" class="nav-link <?php if($this->uri->segment(1)=='tagihan'){echo 'active';} ?>"">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Tagihan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url('tagihan');?>" class="nav-link <?php if(($this->uri->segment(1)=='tagihan')&&($this->uri->segment(2)==null)){echo 'active';} ?>"">
                    <i class="fas fa-eye nav-icon"></i>
                    <p>Lihat Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tagihan/tambah');?>" class="nav-link <?php if(($this->uri->segment(1)=='tagihan')&&($this->uri->segment(2)=='tambah')){echo 'active';} ?>"">
                    <i class="fas fa-folder-plus nav-icon"></i>
                    <p>Tambah Data</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url('tagihan/cari');?>" class="nav-link <?php if(($this->uri->segment(1)=='tagihan')&&($this->uri->segment(2)=='cari')){echo 'active';} ?>"">
                  <i class="fas fa-search nav-icon"></i>
                  <p>Cari Data</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?= base_url('mutasi'); ?>" class="nav-link <?php if($this->uri->segment(1)=='mutasi'){echo 'active';} ?>"">
              <i class="nav-icon fas fa-exchange-alt"></i>
              <p>
                Data Mutasi
              </p>
            </a>
          </li>
          <li class="nav-header">Operasi</li>
          <li class="nav-item has-treeview">
          <a href="<?= base_url('pembayaran'); ?>" class="nav-link <?php if($this->uri->segment(1)=='manage'){echo 'active';} ?>"">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Pembayaran
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