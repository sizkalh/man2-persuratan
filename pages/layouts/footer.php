<!-- /.content-wrapper -->
<footer class="main-footer">
    <div style="position: fixed; right: 3em; bottom: 3.5rem;">
        <button class="btn bg-navy btn-flat" id="toTop">
            <i class="fa fa-arrow-up"></i>
        </button>
    </div>
    <strong>Copyright &copy; 2022 <a href="https://man2-tulungagung.sch.id/" target="blank">MAN 2 Tulungagung</a>.</strong>
</footer>
</div><!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- DataTables -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- date-range-picker -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck -->
<script src="https://adminlte.io/themes/AdminLTE/plugins/iCheck/icheck.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>

<script src="https://adminlte.io/themes/AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>

<script src="<?= base_url() ?>library/helper.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://adminlte.io/themes/AdminLTE/dist/js/demo.js"></script>


<script>
    $(document).ready(function() {
        var dateNow = new Date();
        $('#calendar').datepicker("setDate", dateNow);

        setInterval(function() {
            var date = new Date();

            var month = date.getMonth();
            var day = date.getDate();

            switch (month) {
                case 0:
                    month = "Jan";
                    break;
                case 1:
                    month = "Feb";
                    break;
                case 2:
                    month = "Mar";
                    break;
                case 3:
                    month = "Apr";
                    break;
                case 4:
                    month = "Mei";
                    break;
                case 5:
                    month = "Jun";
                    break;
                case 6:
                    month = "Jul";
                    break;
                case 7:
                    month = "Agu";
                    break;
                case 8:
                    month = "Sep";
                    break;
                case 9:
                    month = "Okt";
                    break;
                case 10:
                    month = "Nov";
                    break;
                case 11:
                    month = "Des";
                    break;
            }

            $('#jam-dinding').html(
                (day < 10 ? '0' : '') + day + ' ' +
                month + ' ' +
                date.getFullYear() +
                " - " +
                date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds()
            );
        }, 500);

        $('a[href*="#"]').on('click', function(e) {
            e.preventDefault()

            $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top,
                },
                800,
                'linear'
            )
        })

        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        $("#toTop").click(function() {
            //1 second of animation time
            //html works for FFX but not Chrome
            //body works for Chrome but not FFX
            //This strange selector seems to work universally
            $("html, body").animate({
                scrollTop: 0
            }, 1000);
        });
    })
</script>
</body>

</html>