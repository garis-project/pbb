

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
      <!-- Small boxes (Stat box) -->
      <form role="form" action='<?= base_url('user/pembayaran_input') ?>' method='POST'>
        <div class="card-header">
          
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="nop" class="col-sm-2 col-form-label float-sm-right">Total Tagihan</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" id="total" name="total" placeholder="Total Tagihan" readonly>
            </div>
            <div class= "float-sm-right">
              <!-- <label id="format_total"></label> -->
              <button type='submit' name='insert' class="btn btn-primary">Simpan</button>
            </div>
          </div>
      </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th>No</th>
                <th>NOP</th>
                <th>Tahun</th>
                <th>Luas</th>
                <th>Harga</th>
                <th>Bayar</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($tagihan as $value){ 
                ?>
                <tr>
                  <td><?= $no ?> </td>
                  <?php $kode=$this->kriptografi->deskripsi($value['kode'],$kunci); ?>
                  <td ><?= substr($kode,0,18); ?> </td>
                  <td align="center"><?= substr($kode,18,4); ?> </td>
                  <?php $data_tagihan=explode("|",$this->kriptografi->deskripsi($value['data_tagihan'],$kunci));?>
                  <td align="right"><?= $data_tagihan[2]+$data_tagihan[3];?></td>
                  <td align="right"><?= "Rp.".number_format($data_tagihan[7]); ?></td>
                  <td align="center">
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" data-kode="<?= $value['kode']; ?>" data-harga="<?= $data_tagihan[7]; ?>" >
                      <label for="form-check-label" for=""> 
                      </label> 
                    </div>
                  </td>
                  <?php $no ++ ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="row float-sm-right">
            <a href="<?= base_url('user/pembayaran') ?>">
              <button type="button" name='Kembali' class="btn btn-danger col-sm-12" onclick="simpan_data()">Kembali</button>
            </a>
          </div>
        </div>
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
