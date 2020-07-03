

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">List Tagihan</h1>
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
        <div class="card-header">
        </div>
        <div class="card-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th>No</th>
                <th>Nama Wajib Pajak</th>
                 <th>Kontak</th>
                <th>Tagihan</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($list as $value){ 
                ?>
                <tr>
                  <td><?= $no ?> </td>
                  <td><?= $this->kriptografi->deskripsi($value['nama_wp'],$kunci);  ?></td>
                   <td><?= $this->kriptografi->deskripsi($value['kontak_wp'],$kunci);  ?></td>
                  <td><?= "Rp.".number_format($value['nominal']); ?></td>
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
