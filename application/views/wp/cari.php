

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
       <div class="col-sm-6">
        <h1 class="m-0 text-dark">Wajib Pajak</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('wp') ?>">Wajib Pajak</a></li>
          <li class="breadcrumb-item active">Pencarian</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="form-group row">
        <div class="col-md-2">
          <a href="<?= base_url('wp/tambah') ?>">
            <button type="button" class="btn btn-info">Tambah</button>
          </a>
        </div>
        <div class="col-sm-7"></div>
        <div class="col-sm-3">
          <form role="form" action='<?= base_url('wp/cari') ?>' method='POST'>
            <div class="input-group">
              <input type="text" class="form-control" id="cari_wp" name="cari_wp">
              <button type="submit" class="btn btn-info">
                <span class="fa fa-search"></span>
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.content-header -->
      <table class="table table-bordered table-striped" id="dataTagihan">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama WP</th>
            <th>RT</th>
            <th>RW</th>
            <th>Dusun</th>
            <th>Desa</th>
            <th>Kec</th>
            <th>Kab</th>
            <th>Kontak</th>
            <th>Operasi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no=$this->uri->segment('3')+1;
          foreach($wp as $value){ 
           ?>
           <tr>
            <td><?= $no ?> </td>
            <td><?= $this->kriptografi->deskripsi($value['nama_wp'],$kunci); ?></td>
            <td><?= $this->kriptografi->deskripsi($value['rt_wp'],$kunci); ?></td>
            <td><?= $this->kriptografi->deskripsi($value['rw_wp'],$kunci); ?></td>
            <td><?= $this->kriptografi->deskripsi($value['dusun_wp'],$kunci);?></td>
            <td><?= $this->kriptografi->deskripsi($value['desa_wp'],$kunci);?></td>
            <td><?= $this->kriptografi->deskripsi($value['kec_wp'],$kunci);?></td>
            <td><?= $this->kriptografi->deskripsi($value['kab_wp'],$kunci);?></td>
            <td><?= $this->kriptografi->deskripsi($value['kontak_wp'],$kunci);?></td>
            <td>
              <a href="<?= base_url('wp/update/').$value['id_wp'] ?>"
                <input type="hidden" id="id_wp" name="id_wp" value="<?= $value['id_wp'] ?>">
                <button type="submit" class="btn btn-info">Update</button>
              </a>
            </td>
            <?php $no ++ ?>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  <!-- Main content -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
