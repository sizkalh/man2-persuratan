<!-- /.content-wrapper -->
<footer class="main-footer">
<!--    
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
-->
    <strong>Copyright &copy; 2022 <a href="https://man2-tulungagung.sch.id/" target="blank">MAN 2 Tulungagung</a>.</strong>
</footer>
</div><!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- datatables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script>
    $(document).ready( function () {
        $('#nota_dinas').DataTable();
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    } );
</script>
</body>
</html>
