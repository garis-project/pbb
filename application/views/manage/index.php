

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
            <li class="breadcrumb-item"><a href="#">Validasi Pembayaran</a></li>
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
                <th>ID</th>
                <th>Nama Wajib Pajak</th>
                <th>Tanggal Pembayaran</th>
                <th>Tanggal Validasi</th>
                <th>Total Pembayaran</th>
                <th>Status</th>
                <th>Operasi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($pembayaran as $value){ 
                ?>
                <tr>
                 <!--  <td><?= $no ?> </td> -->
                  <td><?= $value['id_pembayaran']; ?> </td>
                  <td><?= $this->kriptografi->deskripsi($value['nama_wp'],$kunci); ?></td>   
                  <td><?= $value['tanggal_pembayaran']; ?></td>
                  <td><?= $value['tanggal_validasi']; ?></td>
                  <td><?= "Rp.".number_format($value['total']); ?></td>
                  <td><?= $this->kriptografi->deskripsi($value['status_pembayaran'],$kunci); ?></td>
                 <!--  <td><?= $no ?> </td> -->
                 <td>
                    <form role="form" action='<?= base_url('manage/validasi') ?>' method='POST'>
                      <input type="hidden" id="id_pembayaran" name="id_pembayaran" value="<?= $value['id_pembayaran'] ?>">
                      <input type="hidden" id="id_wp" name="id_wp" value="<?= $value['id_wp'] ?>">
                      <input type="hidden" id="nama_wp" name="nama_wp" value="<?= $value['nama_wp'] ?>">
                      <button type="submit" class="btn btn-info">
                        <i class="nav-icon fas fa-edit fa-xs"></i>
                      </button>
                    </form>
                 </td>

              <!--     <?php $no ++ ?> -->
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
