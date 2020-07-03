

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tagihan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pencarian Tagihan</a></li>
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
                  <?php $kode=$this->kriptografi->deskripsi($value['kode'],$kunci); ?>
                  <td><?=  substr($kode,0,18)?></td>
                  <td><?=  substr($kode,18,4)?></td>
                  <?php $data_tagihan=explode("|",$this->kriptografi->deskripsi($value['data_tagihan'],$kunci));?>
                  <td><?= $data_tagihan[2]+$data_tagihan[3];?></td>
                  <td><?php if($value['nama_wp']){ echo $this->kriptografi->deskripsi($value['nama_wp'],$kunci);}?></td>
                  <td><?= $this->kriptografi->deskripsi($value['status_nop'],$kunci);?></td>
                  <td>
                    <form role="form" action='<?= base_url('tagihan/update') ?>' method='POST'>
                      <input type="hidden" id="kode" name="kode" value="<?= $value['kode'] ?>">
                      <button type="submit" class="btn btn-info">
                        <i class="nav-icon fas fa-edit fa-xs"></i>
                      </button>
                    </form>
                    <form role="form" action='<?= base_url('tagihan/hapus') ?>' method='POST'>
                      <input type="hidden" id="kode" name="kode" value="<?= $value['kode'] ?>">
                      <button type="submit" class="btn btn-danger">
                        <i class="nav-icon fas fa-trash fa-xs"></i>
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
