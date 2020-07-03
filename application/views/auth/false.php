<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Nama Admin Tidak Terdaftar!',
        footer: 'Pastikan Penggunaan Huruf Besar dan Kecil Benar'
    })
    .then(function (result) {
    if (result.value) {
        window.location = "<?= base_url('auth/forgot_admin'); ?>";
    }
})
</script>