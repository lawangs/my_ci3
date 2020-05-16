<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Version 20.5.3
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#">Lawangs</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/'); ?>dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<!-- <script src="<?= base_url('assets/AdminLTE/'); ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets/AdminLTE/'); ?>plugins/jquery-validation/additional-methods.min.js"></script> -->

<!-- Menu Aktif -->
<script>
    $(document).ready(function() {
        var url = window.location;
        const allLinks = document.querySelectorAll('.nav-item a');
        const currentLink = [...allLinks].filter(e => {
            return e.href == url;
        });

        currentLink[0].classList.add("active");
        currentLink[0].closest(".has-treeview").classList.add("menu-open");
    });
</script>
<!-- End Menu Aktif -->

<script>
    $(function() {
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        $('[data-toggle="popover"').popover();
        $('[data-toggle="tooltip"').tooltip();

    });
</script>

<!-- Pemberitahuan Toastr -->
<?php if ($this->session->flashdata('toastr')) : $alert = $this->session->flashdata('toastr'); ?>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr["<?= $alert['type']; ?>"]("<?= $alert['message']; ?>", "<?= $alert['title']; ?>");
    </script>
<?php endif; ?>
<!-- // Pemberitahuan Toastr -->

<!-- Pemberitahuan Sweet -->
<?php if ($this->session->flashdata('sweet')) : $alert = $this->session->flashdata('sweet'); ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '<?= $alert['title']; ?>',
            timer: 1500,
            showConfirmButton: false,
        })
    </script>
<?php endif; ?>
<!-- // Pemberitahuan Sweet -->


<!-- Jika Ada load JS Custom -->
<?php if ($js) {
    $this->load->view($js);
} ?>
<!-- // Jika Ada load JS Custom -->

</body>

</html>