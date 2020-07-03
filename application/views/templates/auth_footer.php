<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>.plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
<script>
function success(){
    Swal.fire(
        'Email Telah Terkirim!',
        'Silahkan Cek Email Anda!',
        'success'
    ) 
}

function success_wa(){
    Swal.fire(
        'Pesan Telah Terkirim!',
        'Silahkan Cek Whatsapp Anda!',
        'success'
    ) 
}

function send_email(){
   
}

function load_email(){
  Swal.fire({
    title: 'Mohon Tunggu!',
    html: 'Sedang Mengirimkan Email',// add html attribute if you want or remove
    allowOutsideClick: false,
    onBeforeOpen: () => {
        Swal.showLoading()
    },
  });
}
</script>
</body>
</html>
