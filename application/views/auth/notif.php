<script>
     Swal.fire(
        'Email Telah Terkirim!',
        'Silahkan Cek Email Anda!',
        'success'
    ) 
    .then(function (result) {
    if (result.value) {
        window.location = "<?= base_url('auth'); ?>";
    }
})
</script>