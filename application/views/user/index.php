

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Daftar Tagihan</h1>
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
                <th>NOP</th>
                <th>Tahun</th>
                <th>Luas</th>
                <th>Wajib Pajak</th>
                <th>Status</th>
                <th>Operasi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($tagihan as $value){ 
                ?>
                <tr>
                  <td><?= $no ?> </td>
                  <?php $k_nop=$this->kriptografi->deskripsi($value['kode'],$kunci);?>
                  <td><?=  substr($k_nop,0,18); ?></td>
                  <td><?=  substr($k_nop,18,4); ?></td>
                  <?php $data_tagihan=explode("|",$this->kriptografi->deskripsi($value['data_tagihan'],$kunci));?>
                  <td><?= $data_tagihan[2]+$data_tagihan[3];?></td>
                  <td><?= $this->kriptografi->deskripsi($value['nama_wp'],$kunci);?></td>
                  <td><?= $this->kriptografi->deskripsi($value['status_nop'],$kunci);?></td>
                  <td align="center">
                    <form role="form" action='<?= base_url('user/tagihan') ?>' method='POST'>
                      <input type="hidden" id="kode" name="kode" value="<?= $value['kode'] ?>">
                      <button type="submit" class="btn btn-info">
                        <i class="nav-icon fas fa-eye fa-xs"></i>
                      </button>
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
