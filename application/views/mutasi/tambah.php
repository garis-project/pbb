

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Mutasi Baru</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Mutasi</a></li>
            <li class="breadcrumb-item active">tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <form role="form" action='<?= base_url('mutasi/tambah') ?>' method='POST'>
        <div class="card-header">
          <div class= "row  float-sm-right">
            <button type='submit' name='insert' class="btn btn-primary" id="button_mutasi" onclick="simpan_data()">Simpan</button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="nop" class="col-sm-2 col-form-label">NOP</label>
            <div class="col-sm-4">
              <input type="text" pattern="\d*" class="form-control" id="mutasiNop" name="nop" placeholder="Nomor Objek Pajak" maxlength="18">
            </div>
            <label for="nop" class="col-sm-2 col-form-label">Blok</label>
            <div class="col-sm-1">
              <input type="text" pattern="\d*" class="form-control" id="blok" name="blok" placeholder="blok" readonly="readonly" maxlength="3">
            </div>
            <label for="nop" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-1">
              <input type="text" pattern="\d*" class="form-control" id="tahun" name="tahun" placeholder="Tahun Tagihan" Value="<?= date('Y') ?>" maxlength="4">
            </div>
          </div>
          <div class="form-group row">
            <label for="nop" class="col-sm-2 col-form-label">Pemilik Lama</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="nama_wp_lama" name="nama_wp" placeholder="Nama Wajib Pajak" readonly="readonly">
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="id_wp_lama" name="id_wp" placeholder="ID" readonly="readonly">
            </div>
            <label for="nop" class="col-sm-2 col-form-label">Luas Bumi</label>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="luas_bumi" name="luas_bumi" placeholder="M2" readonly="readonly">
            </div>
            <label for="nop" class="col-sm-2 col-form-label">Luas Bangunan</label>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="M2" readonly="readonly">
            </div>
          </div>
          <div class="row"><label for="nop" class="col-sm-12 col-form-label">DETAIL MUTASI</label>
          </div>
          <div class="form-group row">
            <label for="nop" class="col-sm-2 col-form-label">Pemilik Baru</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="nama_wp_baru" name="nama_wp_baru" placeholder="Nama Wajib Pajak">
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="id_wp_baru" name="id_wp_baru" placeholder="ID" readonly="readonly">
            </div>
            <label for="status-mutasi" class="col-sm-2 col-form-label">Jenis Mutasi</label>
            <div class="col-sm-4">
              <select class="custom-select" id="jenis_mutasi" name="jenis_mutasi">
                <option selected>Pilih Status Mutasi</option>
                <option value="PENUH">PENUH</option>
                <option value="SEBAGIAN">SEBAGIAN</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nop" class="col-sm-2 col-form-label">Luas Bumi</label>
            <div class="col-sm-1">
              <input type="text" pattern="\d*" class="form-control" id="luas_bumi_mutasi" name="luas_bumi_mutasi" placeholder="M2" Value="<?= 0 ?>" maxlength="4">
            </div>
            <label for="luas_bangunan_mutasi" class="col-sm-2 col-form-label">Luas Bangunan</label>
            <div class="col-sm-1">
              <input type="text" pattern="\d*" class="form-control" id="luas_bangunan_mutasi" name="luas_bangunan_mutasi" placeholder="M2" Value="<?= 0 ?>" maxlength="4">
            </div>
            <label id="l_nop" for="nop" class="col-sm-2 col-form-label">NOP Baru</label>
            <div class="col-sm-4">
              <input type="text" pattern="\d*" class="form-control" id="nop_mutasi" name="nop_mutasi" placeholder="NOP Mutasi" maxlength="18">
              <small class="text-danger" id="val_nop"></small>
            </div>
          </div>
        </div>
      </form>  
      <!-- /.card-body -->
      <div class="card-footer">
       <div class="row float-sm-right">
        <a href="<?= base_url('mutasi') ?>">
          <button type="button" name='Kembali' class="btn btn-danger col-sm-12">Kembali</button>
        </a>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
