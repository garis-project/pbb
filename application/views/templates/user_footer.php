<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Garis Project</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0
  </div>
</footer>
</div>
<!-- ./wrapper -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin Akan Keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih Logout Untuk Mengakhiri Sesi Login</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('auth/logout_wp') ?>">Logout</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" id="batal_perubahan">×</span>
        </button>
      </div>
      <form action="<?= base_url('user/changepassword'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="current_password" class="col-sm-4">Current Password</label>
            <div class="input-group col-sm-8">    
              <input type="password" class="form-control" id="current_password" name="current_password">
              <div class="input-group-append">
                <div class="input-group-text">
                <span id="v_current" class="fas fa-eye"></span>
                </div>
              </div>
            </div>
          </div>
          <label class="col-sm-4"></label>
          <small class="text-danger col-sm-8" id="current"></small>
          <div class="form-group row">
            <label for="new_password1" class="col-sm-4">New Password</label>
            <div class="input-group col-sm-8">
              <input type="password" class="form-control" id="new_password1" name="new_password1">
              <div class="input-group-append">
                <div class="input-group-text">
                 <span id="v_new1" class="fas fa-eye"></span>
                </div>
              </div>
            </div>
          </div>   
          <label class="col-sm-4"></label>
          <small class="text-danger pl-3 col-sm-8" id="new1"></small>
          <div class="form-group row">
            <label for="new_password2" class="col-sm-4">Confirm Password</label>
            <div class="input-group col-sm-8">
              <input type="password" class="form-control" id="new_password2" name="new_password2">
              <div class="input-group-append">
                <div class="input-group-text">
                 <span id="v_new2" class="fas fa-eye"></span>
                </div>
              </div>
            </div>
          </div>
          <label class="col-sm-4"></label>
          <small class="text-danger pl-3 col-sm-8" id="new2"></small>
          <div class="form-group">
              <button type="submit" class="btn btn-primary" id="button_confirm" onclick="swall('succes')">Change password</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery-2.1.1.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="<?= base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<script>
$(document).ready(function(){
  $('#example2').DataTable();
  example1=$('#example1').DataTable();
  document.getElementById("new_password1").disabled = true;
  document.getElementById("new_password2").disabled = true;
  document.getElementById("button_confirm").disabled = true;

  $('#v_current').on('click',function(){
    var x = document.getElementById("current_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });

  $('#v_new1').on('click',function(){
    var x = document.getElementById("new_password1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });

  $('#v_new2').on('click',function(){
    var x = document.getElementById("new_password2");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  });

  $(document).on('change', '#file', function(){
     $("#file-name").text(this.files[0].name);
     $("#image-name").val(this.files[0].name);
   });


  $('.form-check-input').on('click',function(){
      const kode=$(this).data('kode');
      const harga=$(this).data('harga');
      $.ajax({
        url:"<?= base_url('user/hitung'); ?>",
        type:'post',
        dataType:"json",
        data:{
          kode:kode,
          harga:harga
        },
        success:function(data){
          $('#total').val(data);
          $('#format_total').text(data,"Rp.");
        }
      });
    });

  $(document).on('keyup', '#nama_wp', function(){
      var nama_wp=$(this).val();
      $('#example1').show();
      if(nama_wp){
        example1=$('#example1').DataTable();
        example1.search(nama_wp).draw();
        $.ajax({
          url:"<?= base_url('pembayaran/cari'); ?>",
          method:"POST",
          dataType:"json",
          data :{nama_wp :nama_wp},
          success:function(data){
            console.log(data);
            $('#id_wp').val(data[0]['id_wp']);
          }
        });
    }else{
      $('#example1').hide();
    }
  });


  $('#current_password').on('keyup',function(){
    var current=$(this).val();
    $.ajax({
          url:"<?= base_url('user/matching_current'); ?>",
          method:"POST",
          dataType:"json",
          data :{current_password :current},
          success:function(data){
            if (data=="Password Tidak Cocok"){
              $('#current').text(data);
              document.getElementById("new_password1").disabled = true;
              document.getElementById("new_password2").disabled = true;  
            }else{
              $('#current').text(null);
              document.getElementById("new_password1").disabled = false;
              document.getElementById("new_password2").disabled = false;
            }
            $('#new_password1').val(null);
            $('#new_password2').val(null);
          
          }
        });
  });
  $('#new_password1').on('keyup',function(){
    var current=$('#current_password').val();
    var new1=$(this).val();
    if(new1==current){
      $('#new1').text('Password Harus Berbeda dari Sebelumnya');
      document.getElementById("new_password2").disabled = true;
    }else{
      $('#new1').text(null);
      document.getElementById("new_password2").disabled = false;
    }  
    $('#new_password2').val(null);
  });
  $('#new_password2').on('keyup',function(){
    var new1=$('#new_password1').val();
    var new2=$(this).val();
    if(new2!=new1){
      $('#new2').text('Password Tidak Cocok');
      document.getElementById("button_confirm").disabled = true;
    }else{
      $('#new2').text(null);
      document.getElementById("button_confirm").disabled = false;
    }  
  });
  
  $('#batal_perubahan').on('click',function(){
    $('#current_password').val(null);
    $('#new_password1').val(null);
    $('#new_password2').val(null);
    $('#current').text(null);
    $('#new1').text(null);
    $('#new2').text(null);
  });
});
</script>
<script>
function simpan_data(){
  Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Data Telah Disimpan!',
    showConfirmButton: false,
    timer: 1500
  })
}
function update_data(){
  Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Data Telah Diupdate!',
    showConfirmButton: false,
    timer: 1500
  })
}

function hapus_data(){
  Swal.fire({
    position: 'top-center',
    icon: 'success',
    title: 'Data Telah Dihapus!',
    showConfirmButton: false,
    timer: 1500
  })
}
function load_data(){
  Swal.fire({
    title: 'Please Wait !',
    html: 'Data Uploading',// add html attribute if you want or remove
    allowOutsideClick: false,
    onBeforeOpen: () => {
        Swal.showLoading()
    },
  });
}

</script>
</body>
</html>
