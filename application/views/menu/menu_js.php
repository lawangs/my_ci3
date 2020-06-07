<script type="text/javascript">
    $('.btn-tambah').on('click', function(e) {
        // let level = e.target.dataset.level;

        $.ajax({
            method: "POST",
            url: "<?= base_url('menu/create') ?>",
            data: "create",

            success: function(response) {
                $('.tampil-tambah').html(response);
                $('#modalTambah').modal({
                    backdrop: 'static'
                }, 'show');

            },

            statusCode: {
                401: function() {
                    window.location = "<?= base_url() ?>auth"
                },
                403: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Access Not Granted.',
                        timer: 1500,
                        showConfirmButton: false,
                    })
                }
            }
        })
    });

    $('.btn-edit').on('click', function(e) {
        let id = e.target.dataset.id;

        $.ajax({
            method: "POST",
            url: "<?= base_url('menu/edit') ?>",
            data: "id=" + id,

            success: function(response) {
                $('.tampil-tambah').html(response);
                $('#modalTambah').modal({
                    backdrop: 'static'
                }, 'show');

            },

            statusCode: {
                401: function() {
                    window.location = "<?= base_url() ?>auth"
                },
                403: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Access Not Granted.',
                        timer: 1500,
                        showConfirmButton: false,
                    })
                }
            }
        })
    });
</script>