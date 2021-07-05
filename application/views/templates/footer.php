<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="<?php echo base_url(); ?>admin/https://adminlte.io"></a></strong>
    <div class="float-right d-none d-sm-inline-block">
    </div>
</footer>
<!-- Content Wrapper. Contains page content -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/select2/js/select2.full.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>admin/dist/js/adminlte.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>admin/dist/js/demo.js"></script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url(); ?>admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url(); ?>admin/plugins/select2/js/select2.full.min.js"></script>
<!-- sweet alert2 -->
<script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/myscript.js"></script>
<script src="<?php echo base_url(); ?>admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        //Date range picker
        // $('#reservation').daterangepicker()
    });
</script>


<script>
    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: flash
        })
    }


    $(document).on('click', '#btn-hapus', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya,hapus',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = link;
            }
        })
    })
</script>

<script>
    $('.form-check-input').on('click', function() {
        const revisiId = $(this).data('revisi');

        $.ajax({
            url: "<?= base_url('revisi_upload/approve'); ?>",
            type: 'post',
            data: {
                revisiId: revisiId,
            },
            success: function() {
                document.location.href = "<?= base_url('revisi_upload'); ?>";
            }
        });
    });
</script>

</body>

</html>