

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Validasi Pembayaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Pembayaran</a></li>
            <li class="breadcrumb-item active">Validasi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <form role="form" action='<?= base_url('pembayaran/input') ?>' method='POST'>
        <div class="card-header">
          <div class= "row  float-sm-right">
            <button type='submit' name='insert' class="btn btn-primary">Simpan</button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="nop" class="col-sm-2 col-form-label">Wajib Pajak</label>
            <div class="col-sm-3">
 
              <input type="text" class="form-control" id="nama_wp" name="nama_wp" value="" readonly="readonly">
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control" id="id_wp" name="id_wp" value="<" readonly="readonly">
            </div>
            <label for="nop" class="col-sm-2 col-form-label float-sm-right">Total Tagihan</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="total" name="total"  readonly>
            </div>
            </div>
      
         <div class="row float-sm-right">
          <a href="<?= base_url('tagihan') ?>">
            <button type="button" name='Kembali' class="btn btn-danger col-sm-12">Kembali</button>
          </a>
        </div>
      </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th>No</th>
                <th>NOP</th>
                <th>Tahun</th>
                <th>Harga</th>
                <th>Verifikasi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($list as $value){ 
                ?>
                <tr>
                  <td><?= $no ?> </td>
                  <td><?= $this->kriptografi->deskripsi($value['nop'],$kunci); ?></td>
                  <td><?= $this->kriptografi->deskripsi($value['tahun'],$kunci);?></td>
                  <td><?= $value['harga'] ?></td>
                  <td>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" data-nop="<?= $value['nop']; ?>" data-tahun="<?= $value['tahun']; ?>" data-harga="<?= $value['harga']; ?>" >
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
        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
