

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tagihan Baru</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Tagihan</a></li>
            <li class="breadcrumb-item active">tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h4>Import File Excel</h4>
        </div>
        <div class="card-body">
          <div class="input-group row">
            <div class="col-sm-4">
              <form method="post" action="<?php echo base_url('tagihan/importExcel') ?>" enctype="multipart/form-data">
                <div class="input-group row">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file">
                    <label class="custom-file-label" for="pilih-file" id="file-name" name="file-name"></label>
                  </div>
                  <button type="submit" class="btn btn-info" onclick="load_data()">
                    <span class="fa fa-file-upload"></span>
                  </button>
                </div>
              </form>
            </div>
            <div class="col-sm-8">
              <div class="row float-sm-right">
              <a href="<?= base_url('tagihan'); ?>">
                <button type="button" name='Kembali' class="btn btn-danger col-sm-12">Kembali</button>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Small boxes (Stat box) -->
    <div class="card">
      <div class="card-header">
        
      </div>
    </div>
    <div class="card">
      <div class="card-header">
        <h4>Input Manual</h4>
      </div>
      <form role="form" action='<?= base_url('tagihan/tambah') ?>' method='POST'>
        <div class="card-body">
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">NOP</label>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="cek_nop" name="nop" placeholder="Nomor Objek Pajak" maxlength="18">
                <small class="text-danger" id="val_nop"></small>
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Blok</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="blok" name="blok" placeholder="blok" maxlength="3">
              </div>
              <label for="nop" class="col-sm-1 col-form-label">Tahun</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun Tagihan" Value="<?= date('Y') ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_nop" name="nama_nop" placeholder="Nama Pemilik">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="alamat_nop" name="alamat_nop" placeholder="Nama Kampung">
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">RT</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="rt_nop" name="rt_nop" placeholder="RT">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">RW</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="rw_nop" name="rw_nop" placeholder="RW">
              </div>
              <label for="status-tagihan" class="col-sm-2 col-form-label">Status Tagihan</label>
              <div class="col-sm-4">
                <select class="custom-select" id="status_nop" name="status_nop">
                  <option selected>Pilih Status Tagihan</option>
                  <option value="BELUM DIBAYAR">BELUM DIBAYAR</option>
                  <option value="LUNAS">LUNAS</option>
                  <option value="MEDIA LAIN">MEDIA LAIN</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Wajib Pajak</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="nama_wp" name="nama_wp" placeholder="Nama Wajib Pajak">
              </div>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="id_wp" name="id_wp" placeholder="ID" readonly="readonly">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Luas Bumi</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="luas_bumi" name="luas_bumi" placeholder="Luas Bumi" Value="<?= 0 ?>">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Luas Bangunan</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="Luas Bangunan" Value="<?= 0 ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Besar Tagihan</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Besar Tagihan">
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-footer">
          <div class= "row  float-sm-right">
              <button type='submit' name='insert' id="btn-save" class="btn btn-primary" onclick="simpan_data()">Simpan</button>
          </div>
        </div>
      </form>  
    ` 
      <!-- /.card-body -->
      
    </div>
       
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
