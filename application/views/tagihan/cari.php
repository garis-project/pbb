

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pencarian Tagihan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tagihan</a></li>
              <li class="breadcrumb-item active">Index</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <form role="form" action='<?= base_url('tagihan/hasil_cari') ?>' method='POST'>
              <div class="form-group row">
                <div class="col-sm-2">Kata Kunci</div>
                <div class="col-sm-3">  
                <input type="text" class="form-control" id="kata_kunci" name="kata_kunci">
                </div>
                <div class="col-sm-3">
                <select name="konteks" id="konteks" class="form-control">
                  <option value="nama_wp" selected>Nama Wajib Pajak</option>
                  <option value="kode">NOP+Tahun</option>
                </select>
                </div>
                <div class="col-sm-2">
                <button type="submit" class="btn btn-info">
                  <span class="fa fa-search"></span>
                </button>
                </div>
              </div>
            </form>
          </div>   
        </div>
      </div>
  </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  