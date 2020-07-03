

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
      <div class="card">
        <div class="card-body">
        <form method="post" action="<?php echo base_url('user/update') ?>" enctype="multipart/form-data">
          <input type="hidden" name="id_pembayaran" value="<?= $identity;?>">
          <div class="form-group row">
              <label class="col-sm-2 col-form-label float-sm-right">Pilih Bukti Pembayaran : </label>
              <div class="col-sm-4">
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="file" name="file">
                    <label class="custom-file-label" for="pilih-file" id="file-name" name="file-name"></label>
                </div>
                <input type="hidden" id="image-name" name="image-name">
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-primary" onclick="update_data()">Upload</button>
              </div>
              <?php $kolom=explode("|",$this->kriptografi->deskripsi($total['data_pembayaran'],$kunci));?>
              <h3>Total Pembayaran : <?= "Rp.".number_format($kolom[2]);?></h3>
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
              </tr>
            </thead>
            <tbody>
              <?php 
              $no=$this->uri->segment('3')+1;
              foreach($detail as $value){ 
                ?>
                <tr>
                  <td><?= $no ?> </td>
                  <?php $kode=$this->kriptografi->deskripsi($value['kode'],$kunci); ?>
                  <td ><?= substr($kode,0,18); ?> </td>
                  <td align="center"><?= substr($kode,18,4); ?> </td>
                  <?php $data_tagihan=explode("|",$this->kriptografi->deskripsi($value['data_tagihan'],$kunci));?>
                  <td align="right"><?= $data_tagihan[2]+$data_tagihan[3];?></td>
                  <td align="right"><?= "Rp.".number_format($data_tagihan[7]); ?></td>
                  <?php $no ++ ?>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <div class="row float-sm-right">
            <a href="<?= base_url('tagihan') ?>">
              <button type="button" name='Kembali' class="btn btn-danger col-sm-12">Kembali</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
