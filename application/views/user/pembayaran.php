

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
          <div class="form-group row">
            <div class="col-md-2">
              <a href="<?= base_url('user/pembayaran_input'); ?>">
                <button type="button" class="btn btn-info">
                 <!-- <span class="fas fa-cash-register fa-2x"></span><br></br> -->Input Pembayaran</button>
              </a>
            </div>
            <div class="col-sm-10"></div>
          </div>
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th>No</th>
                <th>Tanggal Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Validasi</th>
                <th>Status Pembayaran</th>
                <th>Validator</th>
                <th>Operasi</th>
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
                    <img src="<?= base_url('assets/data/image/'). $data_pembayaran[3]; ?>" alt="..." class="img-thumbnail">
                  </td>
                  <td><?= $data_pembayaran[2];?></td> 
                  <td><?= $data_pembayaran[1];?></td> 
                  <td><?= $this->kriptografi->deskripsi($value['status_pembayaran'],$kunci); ?></td>
                  <td><?php if (!empty($value['data_admin'])){
                    echo $this->kriptografi->deskripsi($value['data_admin'],$kunci);}?>
                  </td>
                  <td>
                    <form role="form" action='<?= base_url('user/pembayaran_update') ?>' method='POST'>
                      <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                      <?php if (empty($data_pembayaran[3])){
                        echo "
                              <button type='submit' class='btn btn-info'>
                                Upload Bukti
                              </button>";
                      }?>
                    </form>
                  </td> 
                  <?php $no ++ ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
