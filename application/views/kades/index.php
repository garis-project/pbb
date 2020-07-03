

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-pie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pencapaian</span>
                <span class="info-box-number">
                  <?php
                    $var=0;
                    if(!empty($lunas['jml'])){
                      $var=100-((($lunas['jml']/$tagihan['jumlah_nop'])*100));
                    }else{
                      $var=0;
                    }
                  ?>
                  <?= number_format($var,2,",",".")."%"; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">  
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-table"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tagihan</span>
                  <span class="info-box-number"><?= $tagihan['jumlah_nop']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            <!-- /.info-box -->
            </a>
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cash-register"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Transaksi</span>
                  <span class="info-box-number"><?= $pembayaran['jumlah_transaksi']; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </a>
          </div>
         
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Wajib Pajak</span>
                    <span class="info-box-number"><?= $wp['jumlah_wp']; ?></span>
                  </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  