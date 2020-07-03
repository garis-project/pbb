

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Wajib Pajak Baru</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Wajib Pajak</a></li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <form role="form" action='<?= base_url('wp/tambah') ?>' method='POST'>
          <div class="card-header">
            <div class= "row  float-sm-right">
                  <button type='submit' name='insert' id="btn-save" class="btn btn-primary" onclick="simpan_data()">Simpan</button>
            </div>
        </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Nama Wajib Pajak</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="cek_wp" name="nama_wp" placeholder="Nama Wajib Pajak">
                <small class="text-danger" id="val_wp"></small>
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Kontak</label>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="kontak_wp" name="kontak_wp" placeholder="Nomor Handphone" maxlength="13">
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">RT</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="rt_wp" name="rt_wp" placeholder="RT" maxlength="2">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">RW</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="rw_wp" name="rw_wp" placeholder="RW" maxlength="2">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Dusun</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="dusun_wp" name="dusun_wp" placeholder="Nama Dusun">
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Desa</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="desa_wp" name="desa_wp" placeholder="Nama Desa">
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Kecamatan</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="kec_wp" name="kec_wp" placeholder="Nama Kecamatan">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Kabupaten</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="kab_wp" name="kab_wp" placeholder="Nama Kabupaten">
              </div>
            </div>
          </div>
         </form>  
                <!-- /.card-body -->
          <div class="card-footer">
             <div class="row float-sm-right">
              <a href="<?= base_url('wp') ?>">
                <button type="button" name='Kembali' class="btn btn-danger col-sm-12">Kembali</button>
              </a>
            </div>
          </div>
             
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  