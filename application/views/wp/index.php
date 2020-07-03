

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
              <li class="breadcrumb-item"><a href="">Wajib Pajak</a></li>
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
                      <th>Nama WP</th>
                      <th>RT</th>
                      <th>RW</th>
                      <th>Dusun</th>
                      <th>Desa/Kec/Kota</th>
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
                    <td><?= $this->kriptografi->deskripsi($value['nama_wp'],$this->kunci); ?> </td>
                    <?php 
                    $data_wp=explode("|",$this->kriptografi->deskripsi($value['data_wp'],$kunci));
                    ?>
                    <?php for($x=0;$x<3;$x++){?>
                      <td><?= $data_wp[$x]; ?></td>
                    <?php } ?>
                    <td><?= $data_wp[3]."/".$data_wp[4]."/".$data_wp[5]; ?></td>
                  <?php $login_wp=explode("|",$this->kriptografi->deskripsi($value['login_wp'],$kunci));
                    ?>
                     <td><?= $login_wp[0]; ?></td>
                    <td>
                      <form role="form" action='<?= base_url('wp/update') ?>' method='POST'>
                        <input type="hidden" id="id" name="id" value="<?= $value['id_wp'] ?>">
                        <button type="submit" class="btn btn-info">
                          <i class="nav-icon fas fa-edit fa-xs"></i>
                        </button>
                      </form>
                      <form role="form" action='<?= base_url('wp/hapus') ?>' method='POST'>
                      <input type="hidden" id="id" name="id" value="<?= $value['id_wp'] ?>">  
                      <button type="submit" class="btn btn-danger" onclick="hapus_data()">
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  