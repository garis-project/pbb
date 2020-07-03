<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Detail Tagihan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('user');?>">Tagihan</a></li>
            <li class="breadcrumb-item active">view</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
            </div>
            <?php $kode=$this->kriptografi->deskripsi($tagihan['kode'],$kunci); 
            $data_tagihan=explode("|",$this->kriptografi->deskripsi($tagihan['data_tagihan'],$kunci));
            ?>
            <div class="card-body">
          <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">NOP</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nop" name="nop" placeholder="Nomor Objek Pajak" value="<?= substr($kode,0,18); ?> " readonly="readonly">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Blok</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="blok" name="blok" readonly="readonly" placeholder="blok" value="<?= substr($kode,11,3); ; ?>">
              </div>
              <label for="nop" class="col-sm-1 col-form-label">Tahun</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Tahun Tagihan" Value="<?= substr($kode,18,4); ; ?>" readonly="readonly">
              </div>
          </div>
          <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_nop" name="nama_nop" placeholder="Nama Pemilik" readonly="readonly" value="<?= $data_tagihan[0]; ?>">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="alamat_nop" name="alamat_nop" readonly="readonly" placeholder="Nama Kampung" value="<?= $data_tagihan[1];?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">RT</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="rt_nop" name="rt_nop" readonly="readonly" placeholder="RT" Value="<?php if(!empty($data_tagihan[4])){echo $data_tagihan[4];} ?>">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">RW</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="rw_nop" name="rw_nop" readonly="readonly" placeholder="RW" Value="<?php if(!empty($data_tagihan[5])){echo $data_tagihan[5];}; ?>">
              </div>
              <label for="status-tagihan" class="col-sm-2 col-form-label">Status Tagihan</label>
              <div class="col-sm-4">
                <select class="custom-select" id="status_nop" name="status_nop" disabled>
                  <option 
                  <?php 
                  if(($this->kriptografi->deskripsi($tagihan['status_nop'],$kunci))=='BELUM DIBAYAR'){
                    echo " selected ";
                  }
                  ?> 
                  value="BELUM DIBAYAR">BELUM DIBAYAR</option>
                  <option
                  <?php 
                  if(($this->kriptografi->deskripsi($tagihan['status_nop'],$kunci))=='LUNAS'){
                    echo " selected ";
                  }
                  ?>
                  value="LUNAS">LUNAS</option>
                  <option
                  <?php 
                  if(($this->kriptografi->deskripsi($tagihan['status_nop'],$kunci))=='MEDIA LAIN'){
                    echo " selected ";
                  }
                  ?> 
                  value="MEDIA LAIN">MEDIA LAIN</option>
                </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Wajib Pajak</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="nama_wp" name="nama_wp" placeholder="Nama Wajib Pajak" readonly="readonly" value="<?= $this->kriptografi->deskripsi($tagihan['nama_wp'],$kunci);?>">
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="id_wp" name="id_wp" placeholder="ID" readonly="readonly" value="<?= $tagihan['id_wp'];?>">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Luas Bumi</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="luas_bumi" name="luas_bumi" placeholder="Luas Bumi" readonly="readonly" Value="<?= $data_tagihan[2]; ?>">
              </div>
              <label for="nop" class="col-sm-2 col-form-label">Luas Bangunan</label>
              <div class="col-sm-1">
                <input type="number" class="form-control" id="luas_bangunan" name="luas_bangunan" placeholder="Luas Bangunan" readonly="readonly" Value="<?= $data_tagihan[3]; ?>">
              </div>
          </div>
          <div class="form-group row">
              <label for="nop" class="col-sm-2 col-form-label">Besar Tagihan</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Besar Tagihan" readonly="readonly" value="<?= $data_tagihan[7];?>">
              </div>
          </div>
            </div>
            <div class="card-footer">
          <div class="row float-sm-right">
            <a href="<?= base_url('user') ?>">
              <button type="button" name='Kembali' class="btn btn-danger col-sm-12">Kembali</button>
            </a>
          </div>
            </div>
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
