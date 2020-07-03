

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Riwayat Pembayaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Pembayaran</a></li>
            <li class="breadcrumb-item active">Index</li>
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
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th>No</th>
                <th>Tanggal Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Validasi</th>
                <th>Status Pembayaran</th>
                <th>Metode Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($pembayaran as $value){ 
                ?>
                <tr>
                 <td><?= $no ?> </td>  
                  <?php $data_pembayaran=explode("|",$this->kriptografi->deskripsi($value['data_pembayaran'],$kunci)); ?>
                  <td><?= $data_pembayaran[0];?></td> 
                  <td width="20%">
                    <img data-enlargable width="100" style="cursor: zoom-in" src="<?= base_url('assets/data/image/'). $data_pembayaran[3]; ?>" alt="..." class="img-thumbnail"/>
                  </td>
                  <td><?= $data_pembayaran[2];?></td> 
                  <td><?= $data_pembayaran[1];?></td> 
                  <td><?= $this->kriptografi->deskripsi($value['status_pembayaran'],$kunci); ?></td>
                  <td>
                    <form role="form" action='<?= base_url('pembayaran/validasi_internal') ?>' method='POST'>
                      <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                        <button type='submit' class='btn btn-info'>
                          Internal
                        </button>  
                    </form>
                    <form role="form" action='<?= base_url('pembayaran/validasi_eksternal') ?>' method='POST'>
                      <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                        <button type='submit' class='btn btn-info'>
                         Eksternal
                        </button>
                        
                    </form>
                  </td> 
                  <?php $no ++ ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
        <h5>Keterangan</h5>
        <h6>*Internal : Pembayaran dilakukan ke Desa (E-Money/Transfer)</h6>
        <h6>*Eksternal : Pembayaran dilakukan Melalui Media Lain (Agen/Aplikasi Lain)</h6>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
