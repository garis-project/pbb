

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Mutasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Mutasi</a></li>
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
              <a href="<?= base_url('mutasi/tambah') ?>">
                <button type="button" class="btn btn-info">Tambah Mutasi</button>
              </a>
            </div>
            <div class="col-md-10"></div>
          </div>
        </div>
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pemilik Awal</th>
                <th>NOP</th>
                <th>Tahun</th>
                <th>Pemilik Baru</th>
                <th>Jenis Mutasi</th>
                <th>Luas</th>
                <th>NOP Baru</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($mutasi as $value){ 
                ?>
                <tr>
                  <td><?= $no ?> </td>
                  <?php $data_mutasi=explode("|",$this->kriptografi->deskripsi($value['data_mutasi'],$kunci)); ?>
                  <td><?= $data_mutasi[1]; ?></td>
                  <td><?= $this->kriptografi->deskripsi($value['nama_wp_lama'],$kunci) ?></td>
                  <td><?= substr($data_mutasi[0],0,18); ?></td>
                  <td><?= substr($data_mutasi[0],18,4); ?></td>
                  <td><?= $this->kriptografi->deskripsi($value['nama_wp_baru'],$kunci); ?></td>
                  <td><?=  $data_mutasi[2]; ?></td>
                  <td><?=$data_mutasi[3]+$data_mutasi[4];?></td>
                  <td><?= substr($data_mutasi[5],0,18);?></td>
                  <?php $no ++ ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  