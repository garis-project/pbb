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
        <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
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
      <form action="<?= base_url('kdesa/changepassword'); ?>" method="post">
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
              <button type="submit" class="btn btn-primary" id="button_confirm" onclick="update_data()">Change password</button>
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

<!-- PAGE SCRIPTS -->
<!-- <script src="<?= base_url('assets/'); ?>dist/js/pages/dashboard2.js"></script> -->
<script>
  $("#example1").DataTable();
  $(document).ready(function(){
    $('#nop_mutasi').hide();
    $('#l_nop').hide();
    document.getElementById("new_password1").disabled = true;
    document.getElementById("new_password2").disabled = true;
    document.getElementById("button_confirm").disabled = true;
    document.getElementById("button_mutasi").disabled = true;
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

    $('#current_password').on('keyup',function(){
      var current=$(this).val();
      $.ajax({
          url:"<?= base_url('kdesa/matching_current'); ?>",
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

    $(document).on('keyup', '#cek_nop', function(){
      var nop = $("#cek_nop").val();
      var tahun = $("#tahun").val();
      var kode=nop+tahun;
      $.ajax({
        url:"<?= base_url('tagihan/cek_nop'); ?>",
        method:"POST",
        dataType:"json",
        data :{kode:kode},
        success:function(data){
          if(data!=null){
            $("#val_nop").text(data);
            document.getElementById("btn-save").disabled = true;
          }else{
            $("#val_nop").text(null);
            $('#blok').val(nop.substr(10,3));
            document.getElementById("btn-save").disabled = false;
          }  
        }
      });
    });

    $(document).on('keyup', '#cek_wp', function(){
      var nama_wp = $("#cek_wp").val();
      $.ajax({
        url:"<?= base_url('wp/cek_wp'); ?>",
        method:"POST",
        dataType:"json",
        data :{nama_wp:nama_wp},
        success:function(data){
          if(data!=null){
            $("#val_wp").text(data);
            document.getElementById("btn-save").disabled = true;
          }else{
            $("#val_wp").text(null);
            document.getElementById("btn-save").disabled = false;
          }  
        }
      });
    });

    $(document).on('change', '#file', function(){
      $("#file-name").text(this.files[0].name);
    });
  
    $(document).on('keyup', '#nop', function(){
      var nop = $("#nop").val();
      $('#blok').val(nop.substr(10,3));
      $.ajax({
        url:"<?= base_url('tagihan/search'); ?>",
        method:"POST",
        dataType:"json",
        data :{nop :nop},
        success:function(data){
          $('#id_wp').val(data[0]['id_wp']);
        }
      });
    });

    $(document).on('keyup', '#nama_wp', function(){
      var nama_wp=$(this).val();
      $.ajax({
        url:"<?= base_url('tagihan/search'); ?>",
        method:"POST",
        dataType:"json",
        data :{nama_wp :nama_wp},
        success:function(data){
          console.log(data[0]);
          $('#id_wp').val(data[0]['id_wp']);
        }
      });
    });

    $(document).on('keyup', '#mutasiNop', function(){
      var nop = $("#mutasiNop").val();
      var tahun = $("#tahun").val();
      var kode=nop+tahun;
      console.log(kode);
      $.ajax({
        url:"<?= base_url('mutasi/search'); ?>",
        method:"POST",
        dataType:"json",
        data :{kode:kode},
        success:function(data){
          console.log(data);
          $('#nama_wp_lama').val(data['nama_wp']);
          $('#luas_bumi').val(data['luas_bumi']);
          $('#luas_bangunan').val(data['luas_bangunan']);
          $('#id_wp_lama').val(data['id_wp']);
          $('#blok').val(data['blok']);
          $('#nop_mutasi').val(nop.substr(0,13));
        },
        error:function(data){
          console.log(data);
        }
      });
    });

    $(document).on('keyup', '#nama_wp_baru', function(){
      var nama_wp=$(this).val();
      $.ajax({
        url:"<?= base_url('tagihan/search'); ?>",
        method:"POST",
        dataType:"json",
        data :{nama_wp :nama_wp},
        success:function(data){
          console.log(data[0]);
          $('#id_wp_baru').val(data[0]['id_wp']);
        },
          // error:function(data){
          //   console.log(data);
          // },
        });
    });

    $(document).on('change', '#jenis_mutasi', function(){
      var jenis_mutasi=$(this).val();
      var luas_bumi=$('#luas_bumi').val();
      var luas_bangunan=$('#luas_bangunan').val();
      if(jenis_mutasi=="PENUH"){
        $('#luas_bumi_mutasi').val(luas_bumi);
        $('#luas_bangunan_mutasi').val(luas_bangunan);
        $('#nop_mutasi').hide();
        $('#l_nop').hide();
        document.getElementById("button_mutasi").disabled = false;
      }else{
        $('#luas_bumi_mutasi').val(0);
        $('#luas_bangunan_mutasi').val(0);
        $('#nop_mutasi').show();
        $('#l_nop').show();
        $('#nop_mutasi').val(($('#nop_mutasi').val()).substr(0,13));
        document.getElementById("button_mutasi").disabled = true;
      }
    });

    $(document).on('change', '#luas_bumi_mutasi', function(){
      var luas_bumi_mutasi=$(this).val();
      var luas_bumi=$('#luas_bumi').val();
      if(luas_bumi_mutasi>luas_bumi){
        $('#luas_bumi_mutasi').val(luas_bumi);
      }
    });

    $(document).on('change', '#luas_bangunan_mutasi', function(){
      var luas_bangunan_mutasi=$(this).val();
      var luas_bangunan=$('#luas_bangunan').val();
      if(luas_bangunan_mutasi>luas_bangunan){
        $('#luas_bangunan_mutasi').val(luas_bangunan);
      }
    });

    $(document).on('focus', '#nop_mutasi', function(){
      var luas_bangunan_mutasi=$('#luas_bangunan_mutasi').val();
      var luas_bangunan=$('#luas_bangunan').val();
      var luas_bumi_mutasi=$('#luas_bumi_mutasi').val();
      var luas_bumi=$('#luas_bumi').val();
      var status= document.getElementById('jenis_mutasi');
      if((luas_bangunan_mutasi==luas_bangunan) && (luas_bumi == luas_bumi_mutasi)){
      status.selectedIndex=1;
      }else{
        status.selectedIndex=2;
      }
    });

    $(document).on('keyup', '#nop_mutasi', function(){
      var nop = $("#nop_mutasi").val();
      var tahun = $("#tahun").val();
      var kode=nop+tahun;
      $.ajax({
        url:"<?= base_url('tagihan/cek_nop'); ?>",
        method:"POST",
        dataType:"json",
        data :{kode:kode},
        success:function(data){
          if((data==null)&&(($('#nop_mutasi').val()).length<=18)){
            $("#val_nop").text(null);
            document.getElementById("button_mutasi").disabled = false;
          }else{
            $("#val_nop").text(data);
            document.getElementById("button_mutasi").disabled = true;
          }  
        }
      });
    })

    $('img[data-enlargable]').addClass('img-enlargable').click(function(){
      var src = $(this).attr('src');
      var modal;
      function removeModal(){ modal.remove(); $('body').off('keyup.modal-close'); }
      modal = $('<div>').css({
          background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
          backgroundSize: 'contain',
          width:'100%', height:'100%',
          position:'fixed',
          zIndex:'10000',
          top:'0', left:'0',
          cursor: 'zoom-out'
      }).click(function(){
          removeModal();
      }).appendTo('body');
    //handling ESC
      $('body').on('keyup.modal-close', function(e){
        if(e.key==='Escape'){ removeModal(); } 
      });
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
}
)
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
