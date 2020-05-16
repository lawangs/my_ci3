<script type="text/javascript">
    $('.btn-show').on('click', function(e) {
        let level = e.target.dataset.level;

        $.ajax({
            method: "POST",
            url: "<?= base_url($this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both')) ?>edit",
            data: "level_user=" + level,

            success: function(response) {
                $('.tampil-edit').html(response);
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

    $(function() {
        $('#datatable-polos').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
        });

        $('[data-toggle="popover"').popover();
        $('[data-toggle="tooltip"').tooltip();
    });
</script>